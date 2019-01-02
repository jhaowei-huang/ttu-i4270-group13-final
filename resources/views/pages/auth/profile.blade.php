@extends('layouts.master', ['title' => '個人檔案', 'current' => ''])

@push('styles')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4 pt-md-4">
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
                        <input type="text" class="form-control" placeholder="帳號" value="{{ Auth::user()->username }}"
                               disabled>
                    </div>
                </div>
                <div class="form-group mx-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key mx-auto"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="password" value="******" disabled>
                        <div class="input-group-append">
                            <button id="btn-editPassword" class="btn btn-sm btn-outline-danger input-group-text"><i
                                    class="fa fa-edit mr-1"></i>
                                修改
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group mx-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-at mx-auto"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="email" value="{{ Auth::user()->email }}"
                               disabled>
                        <div class="input-group-append">
                            @if(Auth::user()->email_verified == 1)
                                <btn class="btn btn-sm btn-outline-success input-group-text success"><i
                                        class="fas fa-check-circle mr-1"></i>
                                    已驗證
                                </btn>
                            @else
                                <btn class="btn btn-sm btn-outline-danger input-group-text error"><i
                                        class="fas fa-times-circle mr-1"></i>
                                    未驗證
                                </btn>
                            @endif
                        </div>
                        <div class="input-group-append">
                            <button id="btn-editEmail" class="btn btn-sm btn-outline-danger input-group-text"><i
                                    class="fa fa-edit mr-1"></i>
                                修改
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <form id="form-profile" method="POST">
                    <div class="form-group mx-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-font mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="姓名"
                                   id="name" name="name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="form-group mx-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-map-marked-alt mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="地址"
                                   id="address" name="address" value="{{ Auth::user()->address }}">
                        </div>
                    </div>
                    <div class="form-group mx-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="公司部門"
                                   id="department" name="department" value="{{ Auth::user()->department }}">
                        </div>
                    </div>
                    <div class="form-group mx-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-id-card mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="職稱"
                                   id="position" name="position" value="{{ Auth::user()->position }}">
                        </div>
                    </div>
                    <div class="form-group mx-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="電話"
                                   id="phone" name="phone" value="{{ Auth::user()->phone }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hashtag mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="電話分機"
                                   id="phone_ext" name="phone_ext" value="{{ Auth::user()->phone_ext }}">
                        </div>
                    </div>
                    <div class="form-group mx-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-fax mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="傳真"
                                   id="fax" name="fax" value="{{ Auth::user()->fax }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hashtag mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="傳真分機"
                                   id="fax_ext" name="fax_ext" value="{{ Auth::user()->fax_ext }}">
                        </div>
                    </div>
                    <div class="row mt-2 justify-content-center">
                        <div class="g-recaptcha"
                             data-sitekey="{{ config('app.google_recaptcha_key') }}"></div>
                    </div>
                    <div class="row mt-2 justify-content-center">
                        <img id="loading" src="{{ asset('images/loading.gif') }}" alt="..."/>
                        <div class="validation-area my-1 mt-md-2"></div>
                    </div>
                    <div class="row mt-1 mx-2 justify-content-center">
                        <button type="submit" class="btn btn-primary flex-fill flex-md-grow-0"
                                id="btn-submit">更新個人檔案
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true"
         id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close disableWhenSubmit" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <span class="mt-1" id="modal-text"></span>
                    <div class="justify-content-center mt-3">
                        <form id="form-modal" method="POST">
                            @csrf
                            <input id="force" name="force" value="true" hidden>
                            <div id="column-1" class="form-group mx-2">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i></i></span>
                                    </div>
                                    <input type="text" class="form-control modal-input" placeholder="">
                                </div>
                            </div>
                        </form>
                        <div class="row mb-2 justify-content-center">
                            <img id="modal-loading" src="{{ asset('images/loading.gif') }}" alt="..."/>
                            <div class="modal-validation-area mt-1 mt-md-2"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">取消
                    </button>
                    <button type="button" class="btn btn-success mx-auto" id="btn-submitModal">修改</button>
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
