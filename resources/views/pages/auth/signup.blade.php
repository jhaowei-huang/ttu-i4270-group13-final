@extends('layouts.master', ['title' => '註冊', 'current' => ''])

@push('styles')
    <link href="{{asset('css/signup.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row justify-content-around">
            <div class="col-12 col-md-6 align-content-center">
                <h3 class="text-center mb-3">註冊</h3>
                <form method="POST" action="{{ route('signup') }}">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="form-group mr-md-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="帳號">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-at"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="email">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group mr-md-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="密碼" id="password"
                                       name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="再輸入一次密碼" id="confirm-password"
                                       name="confirm-password">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group mr-md-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-font"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="姓名" id="name" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="地址" id="address" name="address">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group mr-md-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="電話" id="phone" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="電話分機" id="phone_ext"
                                       name="phone_ext">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group mr-md-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-fax"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="傳真" id="fax" name="fax">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-fax"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="傳真分機" id="fax_ext" name="fax_ext">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="g-recaptcha"
                             data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
                    </div>
                    <div class="validation-area my-2"></div>
                    <div class="row justify-content-center my-2">
                        <button type="submit" class="btn btn-primary mx-3 mx-md-0 flex-fill flex-md-grow-0">註冊</button>
                    </div>
                </form>
                @include('layouts.function', ['all' => false, 'signin' => true])
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- load Google recaotcha service -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endpush
