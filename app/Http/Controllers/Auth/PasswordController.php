<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordEmail;
use App\PasswordReset;
use App\Rules\Captcha;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Webpatser\Uuid\Uuid;

class PasswordController extends Controller
{
    /**
     * 跳轉至首頁
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * 建構子，設定中介層
     *
     * @return void
     */
    public function __construct()
    {
        // 受到guest的中介層保護，若為登入狀態則跳轉到首頁
        $this->middleware('guest', [
            'except' => 'updatePassword'
        ]);
    }

    /**
     * 自定義一個驗證器來驗證表單資料格式是否正確
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function forgetPasswordValidator(array $data)
    {
        return Validator::make($data, [
            'g-recaptcha-response' => [new Captcha()],
            'email' => ['required', 'email'],
        ], [
            'email.required' => trans('custom_validation.error_email_empty'),
            'email.email' => trans('custom_validation.error_email_validation'),
        ]);
    }

    public function forgetPassword(Request $request)
    {
        $email = $request->get('email');

        $data = [
            'g-recaptcha-response' => $request->get('g-recaptcha-response'),
            'email' => $email
        ];

        $this->forgetPasswordValidator($data)->validate();

        $user = User::where('email', $email)->first();

        if (!isset($user)) {
            return response()->json([
                'errors' => [
                    'email' => trans('custom_validation.error_email')
                ]
            ]);
        }

        $passwordReset = PasswordReset::where('user_id', $user->user_id)->first();

        if (!isset($passwordReset)) {
            // 若沒有還沒有password reset model的話，則建立一個
            $passwordReset = PasswordReset::create([
                'password_reset_id' => Uuid::generate(4),
                'user_id' => $user->user_id,
                'token' => Uuid::generate(1)
            ]);
        } else {
            // 若已經有password reset model的話，則更新token
            $passwordReset->update(['token' => Uuid::generate(1)]);
        }

        Mail::to($email)->send(new ResetPasswordEmail([
            'user_id' => (string)$user->user_id,
            'username' => $user->username,
            'name' => $user->name,
            'email' => $user->email,
            'token' => (string)$passwordReset->token
        ]));

        session(['forgetPassword_message' => '已經寄送重設密碼的信件']);
        return response()->json(['redirect' => '/forgetPassword']);
    }

    public function verifyResetPassword($user_id, $token)
    {
        $status = 5;
        $username = '';
        $email = '';
        $passwordReset = PasswordReset::where('user_id', $user_id)->first();

        if (isset($passwordReset)) {
            $user = $passwordReset->user;
            $username = $user->username;
            $email = $user->email;
            $current = Carbon::now();
            $updated_at = $passwordReset->updated_at;
            $expired = ($current->diffInMinutes($updated_at) > env('EMAIL_EXPIRED_TIME')) ? true : false;

            if ($passwordReset->token != $token) {
                // 若重設密碼的token與資料庫中的token不相符，則失敗
                // 必須以最新收到的重設密碼信為主
                $status = 0;
            } else if ($expired) {
                // 伺服器收到的token與user_id皆正確
                // 但是已經超過時間了
                $status = 1;
            } else {
                // 伺服器收到的token與user_id皆正確
                // 也沒有超過時間
                $status = 2;
            }
        } else {
            // 沒有這個user
            $status = 3;
        }

        return redirect()->route('resetPassword')->with([
            'status' => $status,
            'username' => $username,
            'email' => $email,
            'token' => $token
        ]);
    }

    public function showResetPassword()
    {
        $resetPassword_message = Session::pull('resetPassword_message', '');
        $status = Session::pull('status', '');
        $username = Session::pull('username', '');
        $email = Session::pull('email', '');
        $token = Session::pull('token', '');

        return view('pages.auth.resetPassword')->with([
            'resetPassword_message' => $resetPassword_message,
            'status' => $status,
            'username' => $username,
            'email' => $email,
            'token' => $token
        ]);
    }

    /**
     * 自定義一個驗證器來驗證表單資料格式是否正確
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function resetPasswordValidator(array $data)
    {
        return Validator::make($data, [
            'g-recaptcha-response' => [new Captcha()],
            'password' => ['required', 'different:username', 'regex:/^(?=.*\d)(?=.*[a-zA-Z]).{6,20}$/'],
            'confirm_password' => 'required | same:password',
        ], [
            'password.required' => trans('custom_validation.error_password_validation'),
            'password.different' => trans('custom_validation.error_password_same_as_username'),
            'password.regex' => trans('custom_validation.error_password_validation'),
            'confirm_password.*' => trans('custom_validation.error_password_confirm'),
        ]);
    }

    public function resetPassword(Request $request)
    {
        $expired_time = config('app.email_expired_time');
        $token = $request->get('token');

        $passwordReset = PasswordReset::where('token', $token)->first();
        $status = 5;

        if (isset($passwordReset)) {
            $user = $passwordReset->user;
            $current = Carbon::now();
            $updated_at = $passwordReset->updated_at;
            $expired = ($current->diffInMinutes($updated_at) > $expired_time) ? true : false;

            $data = [
                'g-recaptcha-response' => $request->get('g-recaptcha-response'),
                'username' => $user->username,
                'password' => $request->get('password'),
                'confirm_password' => $request->get('confirm_password')
            ];
            // 驗證新的密碼是否符合規則
            $this->resetPasswordValidator($data)->validate();

            if ($passwordReset->token != $token) {
                // 若重設密碼的token與資料庫中的token不相符，則失敗
                // 必須以最新收到的重設密碼信為主
                $status = 0;
            } else if ($expired) {
                // 伺服器收到的token與user_id皆正確
                // 但是已經超過時間了
                $status = 1;
            } else {
                // 伺服器收到的token與user_id皆正確
                // 也沒有超過時間
                $status = 4;

                // 更改密碼，並寫入資料庫
                $user->update([
                    'password' => Hash::make($data['password']),
                    'remember_token' => null
                ]);

                // 從所有裝置登出
                app('db')->table('sessions')
                    ->where('user_id', $user->user_id)->delete();

                session([
                    'resetPassword_message' => '已經成功重新設定密碼',
                    'status' => $status,
                    'username' => $user->username,
                    'email' => $user->email
                ]);

                return response()->json(['redirect' => '/resetPassword']);
            }
        } else {
            // 沒有這個user
            return response()->json(['errors' => [
                'user_id' => trans('custom_validation.error_user_id_token')
            ]]);
        }

        session([
            'status' => $status,
            'username' => $user->username,
            'email' => $user->email
        ]);

        return response()->json(['redirect' => '/resetPassword']);
    }

    /**
     * 自定義一個驗證器來驗證表單資料格式是否正確
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function updatePasswordValidator(array $data)
    {
        return Validator::make($data, [
            'password' => ['required', 'different:username', 'different:old_password', 'regex:/^(?=.*\d)(?=.*[a-zA-Z]).{6,20}$/'],
            'confirm_password' => 'required | same:password',
        ], [
            'password.required' => trans('custom_validation.error_password_validation'),
            'password.different' => trans('custom_validation.error_new_password_same'),
            'password.regex' => trans('custom_validation.error_password_validation'),
            'confirm_password.*' => trans('custom_validation.error_password_confirm'),
        ]);
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        // 確認原密碼是否正確
        if (Hash::check($request->get('modal-old-password'), $user->getAuthPassword())) {
            $data = [
                'username' => Auth::user()->username,
                'old_password' => $request->get('modal-old-password'),
                'password' => $request->get('modal-password'),
                'confirm_password' => $request->get('modal-confirm-password')
            ];

            // 確認新密碼是否符合規則
            $this->updatePasswordValidator($data)->validate();
            // 若新密碼符合規則，便會寫入資料庫
            User::where('username', $user->username)
                ->update(['password' => Hash::make($request->get('modal-password'))]);

            // 從所有裝置登出
            app('db')->table('sessions')
                ->where('user_id', $user->user_id)->delete();

            session(['updatePassword_message' => '您的密碼修改成功，請重新登入'], '');

            return response()->json([
                'redirect' => '/signin',
            ]);
        } else {
            return response()->json([
                'errors' => [
                    'modal-old-password' => trans('custom_validation.error_old_password')
                ],
            ]);
        }
    }
}
