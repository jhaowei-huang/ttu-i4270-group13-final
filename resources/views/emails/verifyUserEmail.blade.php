<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">帳號信箱驗證</div>
                <div class="card-body">
                    <p>{{ Auth::user()->name }} 您好</p>
                    <p>我們最近收到您註冊會員的請求</p>
                    <p>為了啟動帳號，請點擊下方連結</p>
                    <div class="row justify-content-center">
                        <a class="btn btn-sm btn-outline-primary col-6"
                           href="{{ url('/verifyUserEmail/' . Auth::user()->user_id . '/' . Auth::user()->emailVerify->token) }}">點我進行驗證</a>
                    </div>
                    <p>為保護您的帳號安全，請勿將該信件轉寄、轉發給其他人</p>
                    <p>若您最近沒有註冊為本站會員</p>
                    <p>請勿理會此信件</p>
                    <br>
                    <p>大同大學軟體服務設計的創新實務第13組 敬啟</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
