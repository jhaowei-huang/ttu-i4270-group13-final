@extends('layouts.master', ['title' => '個人檔案', 'current' => ''])

@push('styles')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-3">
        <div class="row">
            <div class="col-12 col-md-6">
                @if(Session::get('profile_message') != '')
                    <div class="d-flex flex-fill mb-3 justify-content-center success">
                        <i class="far fa-smile fa-2x"></i>
                        <span class="mt-1">{{ Session::pull('profile_message')}}</span>
                    </div>
                @endif
                {{--http://tinygraphs.com/squares/12314awfadsf?theme=bythepool&numcolors=3&size=220&fmt=svg--}}
                <div class="row justify-content-center">
                    <img
                        src="http://tinygraphs.com/squares/{{ Auth::user()->username }}?theme=seascape&numcolors=4&size=200&fmt=svg"
                        alt="Avatar" class="avatar">
                </div>
                <div class="form-group mt-4 mx-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user mx-auto"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="帳號"
                               id="username" name="username" value="{{ Auth::user()->username }}" disabled>
                    </div>
                </div>
                <div class="form-group mt-3 mx-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key mx-auto"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="password"
                               id="password" name="password" value="******" disabled>
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger input-group-text"><i class="fa fa-edit mr-1"></i>
                                修改
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3 mx-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-at mx-auto"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="email"
                               id="email" name="email" value="{{ Auth::user()->email }}" disabled>
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger input-group-text"><i class="fa fa-edit mr-1"></i>
                                修改
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <form id="form-profile" method="POST">
                    <div class="mx-2 mt-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-font mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="姓名"
                                   id="name" name="name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="mx-2 mt-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-map-marked-alt mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="地址"
                                   id="address" name="address" value="{{ Auth::user()->address }}">
                        </div>
                    </div>
                    <div class="mx-2 mt-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="公司部門"
                                   id="department" name="department" value="{{ Auth::user()->department }}">
                        </div>
                    </div>
                    <div class="mx-2 mt-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-id-card mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="職稱"
                                   id="position" name="position" value="{{ Auth::user()->position }}">
                        </div>
                    </div>
                    <div class="mx-2 mt-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="電話"
                                   id="phone" name="phone" value="{{ Auth::user()->phone }}">
                        </div>
                    </div>
                    <div class="mx-2 mt-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="電話分機"
                                   id="phone_ext" name="phone_ext" value="{{ Auth::user()->phone_ext }}">
                        </div>
                    </div>
                    <div class="mx-2 mt-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-fax mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="傳真"
                                   id="fax" name="fax" value="{{ Auth::user()->fax }}">
                        </div>
                    </div>
                    <div class="mx-2 mt-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-fax mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="傳真分機"
                                   id="fax_ext" name="fax_ext" value="{{ Auth::user()->fax_ext }}">
                        </div>
                    </div>
                    <div class="row mt-2 justify-content-center">
                        <div class="g-recaptcha"
                             data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
                    </div>
                    <div class="row mt-2 justify-content-center">
                        <img id="loading" src="{{ asset('images/loading.gif') }}" alt="..."/>
                        <div class="validation-area mt-1 mt-md-2"></div>
                    </div>
                    <div class="row mt-1 justify-content-center">
                        <button type="submit" class="btn btn-primary flex-fill flex-md-grow-0"
                                id="btn-submit">更新個人檔案
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"
         id="confirm-modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">確認</h5>
                    <button type="button" class="close disableWhenSubmit" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center mt-5" id="modal-text"></p>
                    <div class="row mt-5">
                        <button type="button" class="btn btn-secondary mx-auto" id="btn-not-confirm">取消</button>
                        <button type="button" class="btn btn-success mx-auto" id="btn-confirm">確定</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <!-- load Google recaotcha service -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="{{ asset('js/profile.js') }}"></script>
@endpush
