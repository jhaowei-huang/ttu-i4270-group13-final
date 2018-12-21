<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">2018 TIFE - {{ $title }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
        <ul class="navbar-nav">
            <li class="nav-item @php if($current == 'index') echo 'active mr-auto' @endphp">
                <a class="nav-link" href="{{ URL::to('/') }}">首頁</a>
            </li>
            <li class="nav-item @php if($current == 'agenda') echo 'active mr-auto' @endphp">
                <a class="nav-link dropdown-toggle-split" id="agendaDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">議程</a>
                <div class="dropdown-menu float-left border-0" aria-labelledby="agendaDropdownMenuLink">
                    <a class="dropdown-item" href="{{ URL::to('/agenda0926') }}">Day 01: 9/26 (Wed.)</a>
                    <a class="dropdown-item" href="{{ URL::to('/agenda0927') }}">Day 02: 9/27 (Thr.)</a>
                </div>
            </li>
            <li class="nav-item @php if($current == 'map') echo 'active mr-auto' @endphp">
                <a class="nav-link" href="{{ URL::to('/map') }}">交通資訊</a>
            </li>
            <li class="nav-item @php if($current == 'speaker') echo 'active mr-auto' @endphp">
                <a class="nav-link" href="{{ URL::to('/speaker') }}">演講者</a>
            </li>
            <li class="nav-item @php if($current == 'registration') echo 'active mr-auto' @endphp">
                <a class="nav-link" href="{{ URL::to('/registration') }}">報名</a>
            </li>
            <li class="nav-item @php if($current == 'contact') echo 'active mr-auto' @endphp">
                <a class="nav-link" href="{{ URL::to('/contact') }}">聯絡我們</a>
            </li>
            @guest
                <li class="nav-item">
                    <button class="btn btn-link ml-sm-0 nav-link-auth account-login">[ 登入 / 註冊 ]</button>
                </li>
            @endguest
            @auth
                {{--<li class="nav-item">--}}
                {{--<a class="btn btn-link ml-sm-0 nav-link-auth" href="{{ URL::to('logout') }}">[ 登出 ]</a>--}}
                {{--</li>--}}

                <li class="nav-item">
                    <a class="nav-link dropdown-toggle nav-link-auth" id="agendaDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"
                       style="right: auto; left: 0;">[ {{ Auth::user()->name }} ]</a>
                    <div class="dropdown-menu dropdown-menu-right border-0"
                         aria-labelledby="agendaDropdownMenuLink">
                        <a class="dropdown-item" href="{{ URL::to('/profile') }}">個人檔案</a>
                        <a class="dropdown-item" href="{{ URL::to('/registration/agenda') }}">報名議程</a>
                        <a class="dropdown-item" href="{{ URL::to('/registration/inquire') }}">查詢報名</a>
                        <a class="dropdown-item" href="{{ URL::to('/registration/cancel') }}">取消報名</a>
                        <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item btn btn-link mx-auto disableWhenSubmit"
                                    name="btnLogin"
                                    id="btnLogin"> 登出
                            </button>
                        </form>

                    </div>
                </li>
            @endauth
        </ul>
    </div>
</nav>
