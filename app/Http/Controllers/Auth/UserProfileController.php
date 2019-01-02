<?php

namespace App\Http\Controllers\Auth;

use App\EmailVerify;
use App\Http\Controllers\Controller;
use App\Mail\VerifyUserEmail;
use App\Rules\Captcha;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Webpatser\Uuid\Uuid;

class UserProfileController extends Controller
{
    public function __construct()
    {
        // 使用到此controller中的route，都會經過middleware的保護
        // 可以加上except()來指定某個route可以繞過middleware
        // $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming update email request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function emailValidator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'email',
                Rule::unique('users', 'email')->ignore(Auth::user()->user_id, 'user_id')],
        ], [
            'email.required' => trans('custom_validation.error_email_validation'),
            'email.regex' => trans('custom_validation.error_email_validation'),
            'email.unique' => trans('custom_validation.error_email_exist'),
        ]);
    }

    public function updateEmail(Request $request)
    {
        $user = Auth::user();
        if ($user->email_verified == 1) {
            return response()->json(['redirect' => '/verifyUserEmail']);
        }

        $user_id = $user->user_id;
        $new_email = $request->get('email');
        // 驗證輸入的是否符合email格式
        $this->emailValidator($request->all())->validate();

        User::where('user_id', $user_id)->first()
            ->update(['email' => $new_email,
                'email_verified' => 0]);

        $emailVerify = EmailVerify::where('user_id', $user_id)->first();
        if (!isset($emailVerify)) {
            // 若沒有還沒有email verify model的話，則建立一個
            EmailVerify::create([
                'email_verify_id' => Uuid::generate(4),
                'user_id' => $user_id,
                'token' => Uuid::generate(1)
            ]);
        } else {
            // 若已經有email verify model的話，則更新token
            $emailVerify->update(['token' => Uuid::generate(1)]);
        }

        Mail::to($new_email)->send(new VerifyUserEmail());
        session(['verifyUserEmail_message' => '已經重新發送驗證信']);
        return response()->json(['redirect' => '/verifyUserEmail']);
    }

    protected function profileValidator($data)
    {
        return Validator::make($data, [
            'g-recaptcha-response' => [new Captcha()],
            'name' => ['required', "regex:/^[\x{4e00}-\x{9fa5}]{2,}$|[^!@#$%\^&*()_\-=+~`,.<>\]\[\{\}\|\'\"\/\\\\\;:]{3,}$/Au"],
            'address' => 'nullable | string',
            'department' => 'nullable | string',
            'position' => 'nullable | string',
            'phone' => ['nullable', 'max:10', 'regex:/^[0]{1}[0-9]{1,3}[0-9]{5,8}$/'],
            'phone_ext' => ['nullable', 'max:10', 'regex:/^[0-9]{0,10}$/'],
            'fax' => ['nullable', 'max:10', 'regex:/^[0]{1}[0-9]{1,3}[0-9]{5,8}$/'],
            'fax_ext' => ['nullable', 'max:10', 'regex:/^[0-9]{0,10}$/']
        ], [
            'name.*' => trans('custom_validation.error_name_validation'),
            'address.*' => trans('custom_validation.error_address_validation'),
            'department.*' => trans('custom_validation.error_department_validation'),
            'position.*' => trans('custom_validation.error_position_validation'),
            'phone.*' => trans('custom_validation.error_phone_validation'),
            'phone_ext.*' => trans('custom_validation.error_phone_ext_validation'),
            'fax.*' => trans('custom_validation.error_fax_validation'),
            'fax_ext.*' => trans('custom_validation.error_fax_ext_validation'),
        ]);
    }

    public function updateProfile(Request $request)
    {
        $this->profileValidator($request->all())->validate();

        $user = Auth::user();

        try {
            // 若符合規則，便會寫入資料庫
            User::where('user_id', $user->user_id)->first()
                ->update([
                    'name' => $request->name,
                    'address' => $request->address,
                    'department' => $request->department,
                    'job_title' => $request->job_title,
                    'phone' => $request->phone,
                    'phone_ext' => $request->phone_ext,
                    'fax' => $request->fax,
                    'fax_ext' => $request->fax_ext,
                ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            return response()->json(['error' => '找不到該帳號']);
        }

        session(['profile_message' => '個人資料更新成功']);

        return response()->json([
            'redirect' => '/profile'
        ]);
    }
}
