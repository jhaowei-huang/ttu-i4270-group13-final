@extends('layouts.master', ['title' => '帳號信箱驗證', 'current' => ''])

@push('styles')
    <link href="{{ asset('css/verifyUserEmailResult.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">驗證結果</div>
                    <div class="card-body">
                        <p>帳號： {{ $username }}</p>
                        <p>eamil： {{ $email }}</p>
                        @if($status == 0)
                            <div
                                class="btn btn-sm col-6 d-flex flex-fill justify-content-start error">
                                <i class="far fa-frown fa-2x"></i><span>驗證失敗，請確認點擊的連結是最新發送的</span>
                            </div>
                        @elseif($status == 1)
                            <div
                                class="btn btn-sm col-6 d-flex flex-fill justify-content-start success">
                                <i class="far fa-smile fa-2x"></i><span>驗證成功</span>
                            </div>
                        @elseif($status == 2)
                            <div
                                class="btn btn-sm col-6 d-flex flex-fill justify-content-start success">
                                <i class="far fa-smile fa-2x success"></i><span>已經驗證成功，無須重複點擊</span>
                            </div>
                        @elseif($status == 3)
                            <div
                                class="btn btn-sm col-6 d-flex flex-fill justify-content-start error">
                                <i class="far fa-frown fa-2x"></i><span>目前沒有該帳號</span>
                            </div>
                        @else
                            <div
                                class="btn btn-sm col-6 d-flex flex-fill justify-content-start error">
                                <i class="far fa-frown fa-2x"></i><span>請透過您信箱的連結來驗證</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
