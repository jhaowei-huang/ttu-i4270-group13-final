<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::group(['middleware' => ['web']], function () {
    // 靜態網頁
    Route::get('/', function () {
        return view('pages.index');
    })->name('index');

    Route::get('/agenda', function () {
        return redirect('/agenda0926');
    });

    Route::get('/agenda0926', function () {
        return view('pages.agenda0926');
    });

    Route::get('/agenda0927', function () {
        return view('pages.agenda0927');
    });

    Route::get('/map', function () {
        return view('pages.map');
    });

    Route::get('/speaker', function () {
        return view('pages.speaker');
    });

    Route::get('/registration', function () {
        return view('pages.registration');
    });

    // 登入相關路由
    // 登入會員的畫面
    Route::get('/signin', function () {
        return view('pages.auth.signin');
    })->middleware('guest');
    // 登入
    Route::post('/signin', 'Auth\LoginController@signin')->name('signin');
    // 登出
    Route::post('/signout', 'Auth\LoginController@signout')->name('signout');

    // 註冊相關路由
    // 註冊會員的畫面
    Route::get('/signup', function () {
        return view('pages.auth.signup');
    })->middleware('guest');
    // 註冊
    Route::post('/signup', 'Auth\RegisterController@signup')->name('signup');

    // 驗證信箱相關
    // 等待驗證畫面
    Route::get('/verifyUserEmail', function () {
        return view('pages.auth.verifyUserEmail');
    })->name('verifyUserEmail');
    // 點擊驗證信的連結
    Route::get('/verifyUserEmail/{user_id}/{token}', 'Auth\VerifyEmailController@verifyUser');
    // 驗證信箱結果
    Route::get('/verifyUserEmailResult', 'Auth\VerifyEmailController@verifyUserEmailResult')->name('verifyUserEmailResult');
    // 重設email並重新寄送驗證信
    Route::post('/updateEmail', 'Auth\UserProfileController@updateEmail');

    // 忘記密碼相關
    // 忘記密碼畫面
    Route::get('/forgetPassword', function () {
        return view('pages.auth.forgetPassword');
    })->middleware('guest');
    // 忘記密碼，並寄送含有重設密碼連結的信
    Route::post('/forgetPassword', 'Auth\PasswordController@forgetPassword');
    // 點擊重設密碼信的連結
    Route::get('/resetPassword', 'Auth\PasswordController@showResetPassword')->name('resetPassword');
    Route::get('/resetPassword/{user_id}/{token}', 'Auth\PasswordController@verifyResetPassword');
    Route::post('/resetPassword/', 'Auth\PasswordController@resetPassword');

    // 個人檔案相關
    Route::get('/profile', function () {
        $profile_message = Session::get('profile_message', '');
        return view('pages.auth.profile')->with(['profile_message' => $profile_message]);
    })->middleware('auth');
    Route::post('/profile', 'Auth\UserProfileController@updateProfile');
});
