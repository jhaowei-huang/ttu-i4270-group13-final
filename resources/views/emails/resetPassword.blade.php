<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
<h4>重新設定密碼</h4>
<p>{{ $name }} 您好</p>
<p>我們最近收到您想要重新設定密碼的請求</p>
<p>您的帳號：{{ $username }}</p>
<p>您的信箱：{{ $email }}</p>
<p>請點擊下方連結進行重新設定</p>
<a style="color: #e3342f;"
   href="{{ url('/resetPassword/' . $user_id . '/' . $token) }}">點我重新設定密碼</a>
<p>為保護您的帳號安全，請勿將該信件轉寄、轉發或是洩漏給其他人</p>
<p>若您最近沒有進行重新設定密碼的行為</p>
<p>請勿理會此信件</p>
<br>
<a href="{{ route('index') }}">2018紡織科技國際論壇暨研發成果展</a>
<p>大同大學軟體服務設計的創新實務第13組 敬啟</p>
</body>

</html>
