<?php

namespace App\Http\Controllers\Auth;


use App\EmailVerify;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Mail\VerifyUserEmail;
use App\Rules\Captcha;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Webpatser\Uuid\Uuid;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('verifyUser');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'g-recaptcha-response' => [new Captcha()],
            'username' => ['required', 'min:6', 'regex:/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{6,20}$/', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'different:username', 'regex:/^(?=.*\d)(?=.*[a-zA-Z]).{6,20}$/'],
            'confirm_password' => 'required | same:password',
            'name' => ['required', "regex:/^[\x{4e00}-\x{9fa5}]{2,}$|^[a-zA-Z0-9]{3,}$|[^!@#$%\^&*()_\-=+~`,.<>\]\[\{\}\|\'\"\/\\\\\;:]{3,}$/u"],
            'address' => 'nullable | string',
            'department' => 'nullable | string',
            'position' => 'nullable | string',
            'phone' => ['nullable', 'max:10', 'regex:/^[0]{1}[0-9]{1,3}[0-9]{5,8}$/'],
            'phone_ext' => ['nullable', 'max:10', 'regex:/^[0-9]{0,10}$/'],
            'fax' => ['nullable', 'max:10', 'regex:/^[0]{1}[0-9]{1,3}[0-9]{5,8}$/'],
            'fax_ext' => ['nullable', 'max:10', 'regex:/^[0-9]{0,10}$/']
        ], [
            'username.required' => trans('custom_validation.error_username_validation'),
            'username.min' => trans('custom_validation.error_username_validation'),
            'username.regex' => trans('custom_validation.error_username_validation'),
            'username.unique' => trans('custom_validation.error_username_exist'),
            'email.required' => trans('custom_validation.error_email_validation'),
            'email.min' => trans('custom_validation.error_email_validation'),
            'email.regex' => trans('custom_validation.error_email_validation'),
            'email.unique' => trans('custom_validation.error_email_exist'),
            'password.required' => trans('custom_validation.error_password_validation'),
            'password.different' => trans('custom_validation.error_password_same_as_username'),
            'password.regex' => trans('custom_validation.error_password_validation'),
            'confirm_password.*' => trans('custom_validation.error_password_confirm'),
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user_id = Uuid::generate(4);
        $user = User::create([
            'user_id' => $user_id,
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'name' => $data['name'],
            'address' => $data['address'],
            'department' => $data['department'],
            'position' => $data['position'],
            'phone' => $data['phone'],
            'phone_ext' => $data['phone_ext'],
            'fax' => $data['fax'],
            'fax_ext' => $data['fax_ext']
        ]);

        $verifyUser = EmailVerify::create([
            'email_verify_id' => Uuid::generate(4),
            'user_id' => $user_id,
            'token' => Uuid::generate(1)
        ]);

        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function signup(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);

        Mail::to($user->email)->send(new VerifyUserEmail());

        return response()->json(['redirect' => '/verifyUserEmail']);
    }

    public function verifyUser($user_id, $token)
    {
        $status = 0;
        $username = '';
        $email = '';
        $emailVerify = EmailVerify::where('$user_id', $user_id)->first();

        if (isset($emailVerify)) {
            if (!$emailVerify->token != $token) {
                // 若驗證信的token與資料庫中的token不相符，則驗證失敗
                // 必須以最新收到的驗證信為主
                $status = 0;
            } else {
                $user = $emailVerify->user;

                $username = $user->username;
                $email = $user->email;

                if (!$user->email_verified) {
                    $user->email_verified = 1;
                    $user->save();
                    $status = 1;
                } else {
                    $status = 2;
                }
            }
        } else {
            $status = 3;
        }

        return redirect('verifyUserEmailResult')
            ->with([
                'status' => $status,
                'username' => $username,
                'email' => $email]);
//        'pages.auth.verifyUserEmailResult')

        // return redirect('/login')->with('status', $status);
    }
}
