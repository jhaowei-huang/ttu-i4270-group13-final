@extends('layouts.master', ['title' => '重新設定密碼', 'current' => ''])

@push('styles')
    <link href="{{ asset('css/resetPassword.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">重新設定密碼</div>
                    <div class="card-body">
                        <p>帳號： {{ $username }}</p>
                        <p>eamil： {{ $email }}</p>
                        @if($status == 0)
                            <div
                                class="btn btn-sm col-6 d-flex flex-fill justify-content-start indicator error">
                                <i class="far fa-frown fa-2x"></i><span>很抱歉，請確認點擊的信件連結是最新發送的</span>
                            </div>
                        @elseif($status == 1)
                            <div
                                class="btn btn-sm col-6 d-flex flex-fill justify-content-start indicator error">
                                <i class="far fa-frown fa-2x"></i><span>很抱歉，您的請求已經超過時效，請重新申請一次</span>
                            </div>
                        @elseif($status == 2)
                            <div class="row flex-fill">
                                <p class="mt-2 mx-2">以上是您的帳號相關資訊，請確認無誤，在下方輸入您的新密碼，設定完成後，下次登入時請使用新的密碼</p>
                            </div>
                            <div class="row flex-fill justify-content-center indicator">
                                <form id="form-resetPassword" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $token }}" name="token"/>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="新密碼"
                                                   id="password" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="再次輸入新密碼"
                                                   id="confirm_password" name="confirm_password">
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mt-3 mb-2">
                                        <div class="g-recaptcha"
                                             data-sitekey="{{ config('app.google_recaptcha_key') }}"></div>
                                    </div>
                                    <div class="row mb-2 justify-content-center">
                                        <img id="loading" src="{{ asset('images/loading.gif') }}" alt="..."/>
                                        <div class="validation-area mt-1 mt-md-2"></div>
                                    </div>
                                    <div class="form-inline mt-1 justify-content-center">
                                        <button type="submit" class="btn btn-primary flex-fill flex-md-grow-0"
                                                id="btn-submit">設定新的密碼
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @elseif($status == 3)
                            <div
                                class="btn btn-sm col-6 d-flex flex-fill justify-content-start indicator error">
                                <i class="far fa-frown fa-2x"></i><span>很抱歉，目前沒有該帳號，請確認您點的連結是正確的</span>
                            </div>
                        @elseif($status == 4)
                            <div
                                class="btn btn-sm col-6 d-flex flex-fill justify-content-start indicator success">
                                <i class="far fa-smile fa-2x"></i><span>{{ $resetPassword_message }}</span>
                            </div>
                        @else
                            <div
                                class="btn btn-sm col-6 d-flex flex-fill justify-content-start indicator error">
                                <i class="far fa-frown fa-2x"></i><span>很抱歉，請點擊您信箱收到的重設密碼信件連結</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- load Google recaotcha service -->
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src='{{ asset('js/resetPassword.js') }}'></script>
@endpush
