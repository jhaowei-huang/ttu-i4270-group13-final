<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\Captcha;
use App\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

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
        $this->middleware('guest');
    }

    /**
     * 自定義一個驗證器來驗證表單資料格式是否正確
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'g-recaptcha-response' => [new Captcha()],
            'email' => ['required', 'email', 'exists:email'],
        ], [
            'email.required' => trans('custom_validation.error_email_empty'),
            'email.email' => trans('custom_validation.error_email_validation'),
            'email.exists' => trans('custom_validation.error_email')
        ]);
    }

    public function forgetPassword(Request $request)
    {
        $email = $request->get('email');

        $data = [
            'g-recaptcha-response' => $request->get('g-recaptcha-response'),
            'email' => $email
        ];

        $this->validator($data)->validate();

        $user = User::where('email', $email)->first();


//        $user->user_id;
//        $user->;
    }

    public function showResetPassword()
    {

    }
}
