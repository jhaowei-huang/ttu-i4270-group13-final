@php
    $enable = ((isset($all) ? $all : true) == true) ? [true, true, true, true, true, true] :
    [false, false, false, false, false, false];

    $enable[0] = isset($register) ? $register : $enable[0];
    $enable[1] = isset($inquire) ? $inquire : $enable[1];
    $enable[2] = isset($cancel) ? $cancel : $enable[2];
    $enable[3] = isset($signin) ? $signin : $enable[3];
    $enable[4] = isset($signup) ? $signup : $enable[4];
    $enable[5] = isset($forget) ? $forget : $enable[5];
@endphp

<link href="{{ asset('css/function.css') }}" rel="stylesheet">

<div class="row justify-content-around mt-2 mx-1">
    @if($enable[0])
        <div id="btn-register"
                class="btn btn-sm col-6 d-flex flex-fill justify-content-center align-content-between indicator">
            <i class="fas fa-calendar-plus fa-2x"></i><span>線上報名</span>
        </div>
    @endif
    @if($enable[1])
        <div id="btn-inquire"
                class="btn btn-sm col-6 d-flex flex-fill justify-content-center align-content-between indicator">
            <i class="fas fa-search fa-2x"></i><span>查詢報名</span>
        </div>
    @endif
    @if($enable[2])
        <div id="btn-cancel"
                class="btn btn-sm col-6 d-flex flex-fill justify-content-center align-content-between indicator">
            <i class="fas fa-calendar-minus fa-2x"></i><span>取消報名</span>
        </div>
    @endif
    @if($enable[3])
        <div id="btn-signin"
                class="btn btn-sm col-6 d-flex flex-fill justify-content-center align-content-between indicator">
            <i class="fas fa-sign-in-alt fa-2x"></i><span>登入會員</span>
        </div>
    @endif
    @if($enable[4])
        <div id="btn-signup"
                class="btn btn-sm col-6 d-flex flex-fill justify-content-center align-content-between indicator">
            <i class="fas fa-user-plus fa-2x"></i><span>註冊會員</span>
        </div>
    @endif
    @if($enable[5])
        <div id="btn-forget"
                class="btn btn-sm col-6 d-flex justify-content-center align-content-between indicator">
            <i class="fas fa-question fa-2x"></i></i><span>忘記密碼</span>
        </div>
    @endif
</div>
