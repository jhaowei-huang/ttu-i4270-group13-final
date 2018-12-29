@extends('layouts.master', ['title' => '報名', 'current' => 'registration'])

@push('styles')
    <link href="{{asset('css/registration.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row">
            <div class="col-12 col-md-6">
                <h4>活動舉辦時間及地點：</h4>
                <p>01. 開幕典禮及專題演講</p>
                <p><i class="fas fa-caret-right"></i>時間：9/26 9:30 ~ 12:00</p>
                <p><i class="fas fa-caret-right"></i>地點：台大醫院國際會議中心301室</p>
                <p>02. 研討會及論壇：</p>
                <p><i class="fas fa-caret-right"></i>時間：9/26 13:30 ~ 17:05 ~ 9/27 9:00 ~ 17:05</p>
                <p><i class="fas fa-caret-right"></i>地點：台大醫院國際會議中心301室</p>
                <p>03. 研發成果展：</p>
                <p><i class="fas fa-caret-right"></i>時間：9/26 ~ 9/27</p>
                <p><i class="fas fa-caret-right"></i>地點：台大醫院國際會議中心3樓大廳</p>
            </div>

            <div class="col-12 col-md-6 mt-2 mt-md-0">
                <h4>備註：</h4>
                <p><i class="fas fa-caret-right"></i>演講語言均為英文；現場有同步翻譯且每場次提供耳機(數量有限)，依到場順序 借完為止，請攜帶身份證件以借用同步翻譯耳機。</p>
                <p><i class="fas fa-caret-right"></i>報名截止日期：2018/9/20 (星期四)</p>
                <h4 class="mt-3">報名註冊：</h4>
                @guest
                    @include('layouts.function')
                @endguest
                @auth
                    @include('layouts.function', ['all' => false, 'register' => true, 'inquire' => true, 'cancel' => true])
                @endauth
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
