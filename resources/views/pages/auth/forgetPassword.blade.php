@extends('layouts.master', ['title' => '忘記密碼', 'current' => ''])

@push('styles')
    <link href="{{asset('css/forgetPassword.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 align-content-center">
                <h3 class="text-center mb-3">忘記密碼</h3>
                @if(Session::has('forgetPassword_message'))
                    <div class="d-flex flex-fill mb-3 justify-content-center indicator">
                        <i class="far fa-smile fa-2x success"></i>
                        <span class="mt-1 success">{{ Session::pull('forgetPassword_message')}}</span>
                    </div>
                @endif
                <p>請提供您的email，系統將會寄送一封含有重設密碼連結的信件給您</p>
                <p>您可以依照信件提示來重新設定密碼，若您超過 {{ env('EMAIL_EXPIRED_TIME') }} 分鐘沒有完成，
                    此次請求將會失效必須重新提出一次申請</p>
                <form id="form-forget" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-at"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="email"
                                   id="email" name="email">
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
                    <div class="form-inline mt-2 justify-content-center">
                        <button type="submit" class="btn btn-primary flex-fill flex-md-grow-0"
                                id="btn-submit">寄送重設密碼的信件
                        </button>
                    </div>
                </form>
                @include('layouts.function', ['all' => false, 'signup' => true, 'signin' => true])
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- load Google recaotcha service -->
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="{{ asset('js/forgetPassword.js') }}"></script>
@endpush
