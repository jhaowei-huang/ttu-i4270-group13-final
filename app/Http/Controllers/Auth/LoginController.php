<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\Captcha;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * 跳轉至首頁
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * 建構子
     *
     * @return void
     */
    public function __construct()
    {
        // 中介層將會忽略登出，直接進行動作
        // 其餘的動作將會受到guest的中介層保護
        $this->middleware('guest', ['except' => 'signout']);
    }

    /**
     * 回傳自定義的帳號欄位，預設為'email'
     *
     * @return string
     */
    public function username()
    {
        return 'username';
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
            'username' => ['required'],
            'password' => ['required'],
        ], [
            'username.required' => trans('custom_validation.error_username_empty'),
            'password.required' => trans('custom_validation.error_password_empty'),
        ]);
    }

    /**
     * 處理登入請求
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function signin(Request $request)
    {
        // 判斷輸入的是帳號還是email
        $field = filter_var($request->get('username'), FILTER_VALIDATE_EMAIL) ? 'email' : $this->username();
        // 將表單內容轉換成自訂的格式
        $data = [
            'g-recaptcha-response' => $request->get('g-recaptcha-response'),
            'username' => $request->get('username'),
            'password' => $request->get('password')
        ];
        // 驗證資料格式是否正確
        $this->validator($data)->validate();
        // 登入憑證，使用帳號或是email來登入
        $credentials = [
            $field => $request->get('username'),
            'password' => $request->get('password')
        ];
        // 是否有勾選'在此裝置記住我'
        $remember = $request->has('remember') ? true : false;
        // 嘗試登入
        if (Auth::attempt($credentials, $remember)) {
            // 登入成功
            if (Auth::user()->email_verified == 0) {
                // email還尚未驗證，要求跳轉至verifyUserEmail頁面
                return response()->json([
                    'redirect' => '/verifyUserEmail',
                    'errors' => []
                ]);
            } else {
                // email已經驗證，要求跳轉至首頁
                return response()->json([
                    'redirect' => '/',
                    'errors' => []
                ]);
            }
        } else {
            // 登入失敗，回報憑證錯誤
            return response()->json([
                'redirect' => '',
                'errors' => [
                    'username' => trans('custom_validation.error_username'),
                    'password' => trans('custom_validation.error_password')
                ]
            ]);
        }
    }

    /**
     * 登出
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function signout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect($this->redirectTo);
    }
}
