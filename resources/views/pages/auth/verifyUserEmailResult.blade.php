@extends('layouts.master', ['title' => '帳號信箱驗證', 'current' => ''])

@push('styles')
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">驗證信</div>
                    <div class="card-body">
                        @if($status == 0)
                            <p>帳號: {{ $username }}</p>
                            <p>eamil: {{ $email }}</p>
                            <div
                                class="btn btn-sm col-6 d-flex flex-fill justify-content-center align-content-between indicator">
                                <i class="far fa-frown fa-2x"></i><span>驗證失敗，請確認點擊的連結是最新發送的</span>
                            </div>

                        @elseif($status == 1)
                            <p>帳號: {{ $username }}</p>
                            <p>eamil: {{ $email }}</p>
                            <div
                                class="btn btn-sm col-6 d-flex flex-fill justify-content-center align-content-between indicator">
                                <i class="far fa-smile fa-2x"></i><span>驗證成功</span>
                            </div>
                        @elseif($status == 2)
                            <p>帳號: {{ $username }}</p>
                            <p>eamil: {{ $email }}</p>
                            <div
                                class="btn btn-sm col-6 d-flex flex-fill justify-content-center align-content-between indicator">
                                <i class="far fa-smile fa-2x"></i><span>已經驗證成功，無須重複點擊</span>
                            </div>
                        @elseif($status == 3)
                            <div
                                class="btn btn-sm col-6 d-flex flex-fill justify-content-center align-content-between indicator">
                                <i class="far fa-frown fa-2x"></i><span>目前沒有該帳號</span>
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
