<?php

namespace App\Http\Controllers\Auth;

use App\EmailVerify;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class VerifyEmailController extends Controller
{
    public function verifyUser($user_id, $token)
    {
        $status = 0;
        $username = '';
        $email = '';
        $emailVerify = EmailVerify::where('user_id', $user_id)->first();

        if (isset($emailVerify)) {
            $user = $emailVerify->user;
            $username = $user->username;
            $email = $user->email;

            if ($emailVerify->token != $token) {
                // 若驗證信的token與資料庫中的token不相符，則驗證失敗
                // 必須以最新收到的驗證信為主
                $status = 0;
            } else {
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

        return redirect('verifyUserEmailResult')->with([
            'status' => $status,
            'username' => $username,
            'email' => $email
        ]);
    }

    public function verifyUserEmailResult()
    {
        $status = Session::pull('status', '4');
        $username = Session::pull('username', '');
        $email = Session::pull('email', '');

        return view('pages.auth.verifyUserEmailResult')->with([
            'status' => $status,
            'username' => $username,
            'email' => $email
        ]);
    }
}
