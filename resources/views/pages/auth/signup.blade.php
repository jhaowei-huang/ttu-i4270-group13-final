@extends('layouts.master', ['title' => '註冊會員', 'current' => ''])

@push('styles')
    <link href="{{asset('css/signup.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row justify-content-around">
            <div class="col-12 col-md-6 align-content-center">
                <h3 class="text-center mb-3">註冊會員</h3>
                <form class="mx-4 mx-md-0" id="form-signup" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="form-group mr-md-1 flex-grow-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user mx-auto"></i></span>
                                </div>
                                <input type="text" class="form-control input-signup" placeholder="帳號"
                                       id="username" name="username">
                            </div>
                        </div>
                        <div class="form-group flex-grow-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-at mx-auto"></i></span>
                                </div>
                                <input type="email" class="form-control input-signup" placeholder="email" id="email"
                                       name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group mr-md-1 flex-grow-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key mx-auto"></i></span>
                                </div>
                                <input type="password" class="form-control input-signup" placeholder="密碼" id="password"
                                       name="password">
                            </div>
                        </div>
                        <div class="form-group flex-grow-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key mx-auto"></i></span>
                                </div>
                                <input type="password" class="form-control input-signup" placeholder="再輸入一次密碼"
                                       id="confirm_password"
                                       name="confirm_password">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group mr-md-1 flex-grow-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-font mx-auto"></i></span>
                                </div>
                                <input type="text" class="form-control input-signup" placeholder="姓名" id="name"
                                       name="name">
                            </div>
                        </div>
                        <div class="form-group flex-grow-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marked-alt mx-auto"></i></span>
                                </div>
                                <input type="text" class="form-control input-signup" placeholder="地址" id="address"
                                       name="address">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group mr-md-1 flex-grow-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-building mx-auto"></i></span>
                                </div>
                                <input type="text" class="form-control input-signup" placeholder="公司/部門" id="department"
                                       name="department">
                            </div>
                        </div>
                        <div class="form-group flex-grow-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-id-card mx-auto"></i></span>
                                </div>
                                <input type="text" class="form-control input-signup" placeholder="職稱" id="position"
                                       name="position">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group mr-md-1 flex-grow-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone mx-auto"></i></span>
                                </div>
                                <input type="text" class="form-control input-signup" placeholder="電話" id="phone"
                                       name="phone">
                            </div>
                        </div>
                        <div class="form-group flex-grow-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone mx-auto"></i></span>
                                </div>
                                <input type="text" class="form-control input-signup" placeholder="電話分機" id="phone_ext"
                                       name="phone_ext">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group mr-md-1 flex-grow-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-fax mx-auto"></i></span>
                                </div>
                                <input type="text" class="form-control input-signup" placeholder="傳真" id="fax"
                                       name="fax">
                            </div>
                        </div>
                        <div class="form-group flex-grow-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-fax mx-auto"></i></span>
                                </div>
                                <input type="text" class="form-control input-signup" placeholder="傳真分機" id="fax_ext"
                                       name="fax_ext">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="g-recaptcha"
                             data-sitekey="{{ config('app.google_recaptcha_key') }}"></div>
                    </div>
                    <div class="row mb-2 justify-content-center">
                        <img id="loading" src="{{ asset('images/loading.gif') }}" alt="..."/>
                        <div class="validation-area mt-1 mt-md-2"></div>
                    </div>
                    <div class="row justify-content-center my-0 my-md-2">
                        <button type="submit" class="btn btn-primary mx-3 mx-md-0 flex-fill flex-md-grow-0"
                                id="btn-submit" name="btn-submit">註冊
                        </button>
                    </div>
                </form>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6">
                        @include('layouts.function', ['align' => 'justify-content-center', 'all' => false, 'signin' => true])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- load Google recaotcha service -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src='{{ asset('js/signup.js') }}'></script>
@endpush
