<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
<h4>帳號信箱驗證</h4>
<p>{{ Auth::user()->name }} 您好</p>
<p>我們最近收到您註冊會員或是修改email的請求</p>
<p>請點擊下方連結進行驗證</p>
<a style="color: #e3342f;"
   href="{{ url('/verifyUserEmail/' . Auth::user()->user_id . '/' . Auth::user()->emailVerify->token) }}">點我進行驗證</a>
<p>為保護您的帳號安全，請勿將該信件轉寄、轉發或是洩漏給其他人</p>
<p>若您最近沒有進行註冊或修改email的行為</p>
<p>請勿理會此信件</p>
<br>
<a href="{{ route('index') }}">2018紡織科技國際論壇暨研發成果展</a>
<p>大同大學軟體服務設計的創新實務第13組 敬啟</p>
</body>

</html>
