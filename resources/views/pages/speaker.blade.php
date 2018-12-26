@extends('layouts.master', ['title' => '演講者', 'current' => 'speaker'])

@push('styles')
    <link href="{{asset('css/speaker.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/k1.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-name">David Ekelund</p>
                        <p class="card-job">CEO, Icebug & Chairman of the board, Scandinavian Outdoor Group
                            (瑞典)</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary card-btn">詳細</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/k2.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-name">Melik Demirel</p>
                        <p class="card-job">Director, Center for Research on Advanced Fiber Technologies,
                            Engineering Science and Mechanics, Pennsylvania State University (美國)</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary card-btn">詳細</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/a1.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-name">Pirjo Heikkilä</p>
                        <p class="card-job">Senior Scientist, VTT Technical Research Centre of Finland Ltd (芬蘭)</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary card-btn">詳細</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/a2.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-name">Jason Kibbey</p>
                        <p class="card-job">CEO, Sustainable Apparel Coalition (美國)</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary card-btn">詳細</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/a3.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-name">Traci Kinden</p>
                        <p class="card-job">Project Manager of Textiles Programme, Circular Economy (荷蘭)</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary card-btn">詳細</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/a4.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-name">Barbara Pause</p>
                        <p class="card-job">President of Textile Testing & Innovation, LLC (美國)</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary card-btn">詳細</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/a5.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-name">Joselito Razal</p>
                        <p class="card-job">Deputy Director of the Australian Research Council Research Hub for
                            Future Fibres and an Associate Professor at the Institute for Frontier Materials,
                            Deakin
                            University (澳洲)</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary card-btn">詳細</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/a6.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-name">Braz Costa</p>
                        <p class="card-job">CEO, Center for Nanotechnology and Smart Materials (葡萄牙)</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary card-btn">詳細</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/a7.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-name">Peter Kallai</p>
                        <p class="card-job">CEO, intelliFLEX (加拿大)</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary card-btn">詳細</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/a8.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-name">Ben Cooper</p>
                        <p class="card-job">Managing Director, IoClothes (美國)</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary card-btn">詳細</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/a9.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-name">Chris Jorgense</p>
                        <p class="card-job">Director of Technology Transfer, IPC-Association Connecting
                            Electronics
                            Industries (美國)</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary card-btn">詳細</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="speakerModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="speakerModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="speakerModalCenterTitle">Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <img class="col-md-4" id="speakerModalCenterAvatar" alt="Card image cap">
                            <div class="col-md-8" id="speakerModalCenterText">job and content</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/speaker.js') }}"></script>
@endpush
