@extends('layouts.master', ['title' => '帳號信箱驗證', 'current' => ''])

@push('styles')
    <link href="{{ asset('css/verifyUserEmail.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @auth
                        <div class="card-header">帳號信箱驗證</div>
                        <div class="card-body">
                            @if(Auth::user()->email_verified == false)
                                @if(Session::has('verifyUserEmail_message'))
                                    <div class="d-flex flex-fill mb-3 justify-content-center success">
                                        <i class="far fa-smile fa-2x"></i>
                                        <span class="mt-1">{{ Session::pull('verifyUserEmail_message')}}</span>
                                    </div>
                                @endif
                                <p>{{ Auth::user()->name }} 您好</p>
                                    <p>系統已經在 <strong style="color: #c51f1a">{{ \App\EmailVerify::where('user_id', Auth::user()->user_id)->first()->updated_at }}</strong>
                                        寄送一封認證信至 <strong style="color: #c51f1a">{{ Auth::user()->email }}</strong></p>
                                <p>大約數分鐘內就會收到，也請留意是否不小心被分類為垃圾信件</p>
                                <p>您必須要認證email才能進行後續動作</p>
                                <br>
                                <p>若您的email填寫錯誤或是遲遲沒有收到，請在下方重新輸入email</p>
                                <p>系統將會重新寄送</p>
                                <form id="form-resendVerifyEmail" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-at"></i></span>
                                            </div>
                                            <input type="email" class="form-control" placeholder="email"
                                                   id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="row mb-2 justify-content-center">
                                        <img id="loading" src="{{ asset('images/loading.gif') }}" alt="..."/>
                                        <div class="validation-area mt-1 mt-md-2"></div>
                                    </div>
                                    <div class="row justify-content-center my-2">
                                        <button type="submit"
                                                class="btn btn-primary mx-3 mx-md-0 flex-fill flex-md-grow-0"
                                                id="btn-submit" name="btn-submit">重新發送
                                        </button>
                                    </div>
                                </form>
                            @else
                                <p>{{ Auth::user()->name }} 您好</p>
                                <p>您的email： <strong style="color: #c51f1a">{{ Auth::user()->email }}</strong></p>
                                <div class="d-flex flex-fill mb-3 justify-content-start success">
                                    <i class="far fa-smile fa-2x"></i>
                                    <span class="mt-1">已經驗證完成</span>
                                </div>
                                @include('layouts.function', ['all'=>false, 'register'=>true, 'inquire'=>true, 'cancel'=>true])
                            @endif
                        </div>
                    @endauth
                    @guest
                        <div class="card-header">很抱歉，目前沒有登入喔</div>
                        <div class="card-body">
                            <p>您可以執行下列動作：</p>
                            @include('layouts.function', ['all'=>false, 'signup'=>true, 'signin'=>true])
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src='{{ asset('js/verifyUserEmail.js') }}'></script>
@endpush
