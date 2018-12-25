@extends('layouts.master', ['title' => '9/26 議程', 'current' => 'agenda'])

@push('styles')
    <link href="{{ asset('css/agenda.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row">
            <div class="col-md-11 offset-md-1">
                <h4>第二天 9/27 (四)</h4>
                <h5>時間標示：臺灣標準時間(UTC+8)</h5>
                <h5>地點：臺大醫院國際會議中心301會議室</h5>
                <ul class="timeline">
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>08:30 ~ 09:00</h5>
                            <p>報到及領取資料</p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>09:00 ~ 09:45</h5>
                            <p><strong class="topic_number">Topic 06 - </strong>Intelligent Functional Textiles Created
                                by the Application of Macro-encapsulated Phase Change Material</p>
                            <p><strong>by Dr. Barbara Pause President of Textile Testing & Innovation, LLC (美國)</strong>
                            </p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>09:45 ~ 10:30</h5>
                            <p><strong class="topic_number">Topic 07 - </strong>The Role of Conductive Fibres in
                                Accelerating
                                the Transformation of the Functional
                                Fibre Industry</p>
                            <p><strong>by Dr. Joselito Razal Deputy Director of the Australian Research Council
                                    Research Hub for Future Fibres and an Associate Professor at the Institute for
                                    Frontier Materials, Deakin University (澳洲)</strong></p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>10:30 ~ 10:45</h5>
                            <p>休息</p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>10:45 ~ 11:30</h5>
                            <p><strong class="topic_number">Topic 08 - </strong>Nanotechnology, a Key Enabling Technology
                                to Functional and Smart Textiles</p>
                            <p><strong>by Mr. Braz Costa CEO, Center for Nanotechnology and Smart Materials
                                    (葡萄牙)</strong></p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>11:30 ~ 12:30</h5>
                            <p>論壇主題-機能性紡織品</p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>12:30 ~ 13:30</h5>
                            <p>午餐</p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>13:30 ~ 14:15</h5>
                            <p><strong class="topic_number">Topic 09 - </strong>Canada’s Wearables Industry: Challenges
                                and Opportunities</p>
                            <p><strong>by Mr. Peter Kallai CEO, intelliFLEX (加拿大)</strong></p>
                        </div>
                    </li>
                    <li>
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>14:15 ~ 15:00</h5>
                            <p><strong class="topic_number">Topic 10 - </strong>Smart Textiles: Disrupting the Textiles
                                Industry and Beyond</p>
                            <p><strong>by Mr. Ben Cooper Managing Director, IoClothes (美國)</strong></p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>15:00 ~ 15:20</h5>
                            <p>休息</p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>15:20 ~ 16:05</h5>
                            <p><strong class="topic_number">Topic 11 - </strong>Taking E-Textiles From Concept to Mass
                                Production – How IPC International Standards
                                for E-Textiles Will Reduce Costs, Accelerate Innovation and Improve Reliability</p>
                            <p><strong>by Mr. Chris Jorgensen Director of Technology Transfer, IPC-Association
                                    Connecting Electronics Industries (美國)</strong></p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>16:05 ~ 17:05</h5>
                            <p>論壇主題-智慧型紡織品</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <a class="btn btn-lg btn-outline-secondary" href="{{ URL::to('/agenda0926') }}">
                查看第一天 9/26 (三)議程
            </a>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/agenda.js') }}"></script>
@endpush
