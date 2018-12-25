@extends('layouts.master', ['title' => '9/26 議程', 'current' => 'agenda'])

@push('styles')
    <link href="{{ asset('css/agenda.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row">
            <div class="col-md-11 offset-md-1">
                <h4>第一天 9/26 (三)</h4>
                <h5>時間標示：臺灣標準時間(UTC+8)</h5>
                <h5>地點：臺大醫院國際會議中心301會議室</h5>
                <ul class="timeline">
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>09:30 ~ 10:00</h5>
                            <p>報到及領取資料</p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>10:00 ~ 10:30</h5>
                            <p>開幕儀式/主席&貴賓致詞</p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>10:30 ~ 11:15</h5>
                            <p><strong class="topic_number">Topic 01 - </strong>Driving Outdoor Industry Progress Through
                                Collaboration</p>
                            <p><strong>by Mr. David Ekelund CEO, Icebug & Chairman of the board, Scandinavian Outdoor
                                    Group(瑞典)</strong></p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>11:15 ~ 12:00</h5>
                            <p><strong class="topic_number">Topic 02 - </strong>Biotechnology Routes to Advanced Fibers
                                in Textiles and Fabric Discovery in USA</p>
                            <p><strong>by Dr. Melik Demirel Full Professor, College of Engineering &Director, Center
                                    for Research on Advanced Fiber Technologies, Engineering Science and Mechanics,
                                    Pennsylvania State University (美國)</strong></p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>12:00 ~ 13:30</h5>
                            <p>開幕活動結束及午餐</p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>13:00 ~ 13:30</h5>
                            <p>研討會報到及領取資料</p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>13:30 ~ 14:15</h5>
                            <p><strong class="topic_number">Topic 03 - </strong>Building New Business Ecosystem Around
                                Textile Recycling</p>
                            <p><strong>by Dr. Pirjo Heikkilä Senior Scientist, VTT Technical Research Centre of Finland
                                    Ltd(芬蘭)</strong></p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>14:15 ~ 15:00</h5>
                            <p><strong class="topic_number">Topic 04 - </strong>Value Chain Transparency for Impact</p>
                            <p><strong>by Mr. Jason Kibbey CEO, Sustainable Apparel Coalition(美國)</strong></p>
                        </div>
                    </li>
                    <li>
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>15:00 ~ 15:20</h5>
                            <p>休息</p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>15:20 ~ 16:05</h5>
                            <p><strong class="topic_number">Topic 05 - </strong>Fibersort – Automated Sorting of Post
                                Consumer
                                Textiles for High Value
                                Recycling</p>
                            <p><strong>by Ms. Traci Kinden Project Manager of Textiles Programme, Circular
                                    Economy(荷蘭)</strong></p>
                        </div>
                    </li>
                    <li class="row">
                        <div class="block">
                            <h5><i class="fas fa-angle-down"></i>16:05 ~ 17:05</h5>
                            <p>論壇主題-循環經濟</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <a class="btn btn-lg btn-outline-secondary" href="{{ URL::to('/agenda0927') }}">
                查看第二天 9/27 (四)議程
            </a>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/agenda.js') }}"></script>
@endpush
