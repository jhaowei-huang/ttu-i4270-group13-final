@extends('layouts.master', ['title' => '登入會員', 'current' => ''])

@push('styles')
    <link href="{{asset('css/signin.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 align-content-center">
                <h3 class="text-center mb-3">登入會員</h3>
                @if(Session::has('updatePassword_message'))
                    <div class="d-flex flex-fill mb-3 justify-content-center success">
                        <i class="far fa-smile fa-2x"></i>
                        <span class="mt-1">{{ Session::pull('updatePassword_message')}}</span>
                    </div>
                @endif
                @if(Session::has('updateEmail_message'))
                    <div class="d-flex flex-fill mb-3 justify-content-center success">
                        <i class="far fa-smile fa-2x"></i>
                        <span class="mt-1">{{ Session::pull('updateEmail_message')}}</span>
                    </div>
                @endif
                <form id="form-signin" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="帳號或是email"
                                   id="username" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="密碼"
                                   id="password" name="password">
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
                    <div class="form-inline mt-2">
                        <div class="input-group my-2 mt-md-0 flex-fill">
                            <label class="switch mr-2">
                                <input type="checkbox" class="success" id="remember" name="remember">
                                <span class="slider round"></span>
                            </label>
                            <label id="remember-label" for="remember">在此裝置記住我</label>
                        </div>
                        <button type="submit" class="btn btn-primary flex-fill flex-md-grow-0"
                                id="btn-submit">登入
                        </button>
                    </div>
                </form>
                @include('layouts.function', ['all' => false, 'signup' => true, 'forget' => true])
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- load Google recaotcha service -->
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="{{ asset('js/signin.js') }}"></script>
@endpush
