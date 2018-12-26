@extends('layouts.master', ['title' => '登入', 'current' => ''])

@push('styles')
    <link href="{{asset('css/signin.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 align-content-center">
                <h3 class="text-center mb-3">登入</h3>
                <form method="POST" action="{{ route('signin') }}">
                    @csrf
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="帳號或是email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="密碼">
                        </div>
                    </div>
                    <div class="row justify-content-center my-3">
                        <div class="g-recaptcha"
                             data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
                    </div>
                    <div class="validation-area my-2"></div>
                    <div class="form-inline mt-2">
                        <div class="input-group my-2 mt-md-0 flex-fill">
                            <label class="switch mr-2">
                                <input type="checkbox" class="success" name="remember" id="remember" hidden>
                                <span class="slider round"></span>
                            </label>
                            <label id="remember-label" for="remember">在此裝置記住我</label>
                        </div>
                        <button type="submit" class="btn btn-primary flex-fill flex-md-grow-0">登入</button>
                    </div>
                </form>
                @include('layouts.function', ['all' => false, 'signup' => true, 'forget' => true])
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- load Google recaotcha service -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endpush
