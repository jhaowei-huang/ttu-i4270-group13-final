@extends('layouts.master', ['title' => '首頁', 'current' => 'index'])

@push('styles')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="bg mt-5">
        <div class="bg-cover">
            <div class="content">
                <div class="col-12 mt-5 pt-5 text-center">
                    <h2>關於 2018 TIFE</h2>
                    <p>紡織科技國際論壇暨研發成果展(Textile International Forum and Exhibition，簡稱TIFE)</p>
                    <p>是由經濟部技術處於民國90年委託相關法人研究機構共同承辦</p>
                    <p>除了展示紡織科技重要研發成果外，亦舉辦論壇及邀請國內外知名企業經營者、專家及學者</p>
                    <p>2018年TIFE活動於9月26日(三)至27日(四)假台大醫院國際會議中心舉辦</p>
                    <p>由紡織產業綜合研究所執行，大會主題定調為「智慧機能與領航創新」</p>
                    <p>期望能透過活動之舉辦，帶動國內紡織產業能更具創新及永續發展之能力</p>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <div class="row ml-md-5 mr-md-5 ml-3 mr-3">
        <div class="col-md-9">
            <h2><a href="https://www.moea.gov.tw/MNS/doit/home/Home2.aspx" target="_blank">主辦：經濟部技術處</a></h2><br>
            <p class="lead">經濟部技術處於民國90年委託相關法人研究機構共同承辦「紡織科技國際論壇暨研發成果展
                (Textile International Forum and Exhibition，簡稱TIFE)」。</p>
            <p class="lead">歷年來該活動除展示紡織科技重要研發成果外，亦舉辦論壇及邀請國內外知名企業經營者、專家及學者等，分別就紡織產業之技術、檢驗及管理等議題進行專題演講。</p>
            <p class="lead">2018年紡織科技國際論壇暨研發成果展於9月26日至27日假臺大醫院國際會議中心舉辦。</p>
            <p class="lead">大會主題定調為智慧機能與領航創新(Smart Function and Innovation
                Navigation)，期望透過活動持續的舉辦，帶動國內紡織產業能更具創新及永續發展之能力。</p>
        </div>
        <div class="col-md-3 col-12 m-auto">
            <img class="img-fluid mx-auto" src="{{ asset('images/organizer01.png') }}"
                 alt="Generic placeholder image">
        </div>
    </div>

    <hr class="my-5">

    <div class="row ml-md-5 mr-md-5 ml-3 mr-3">
        <div class="col-md-3 col-sm-12 my-md-auto mb-4">
            <img class="img-fluid m-auto" src="{{ asset('images/organizer02.png') }}"
                 alt="Generic placeholder image">
        </div>

        <div class="col-md-9 col-12">
            <h2><a href="https://www.ttri.org.tw/" target="_blank">執行：<br>紡織產業綜合研究所</a></h2><br>
            <p class="lead">紡織產業綜合研究所，溯始於民國四十八年十二月的「台灣紡織品試驗中心」</p>
            <p class="lead">早期以執行我國紡織品之外銷檢驗及維護產品品質為主</p>
            <p class="lead">民國六十年六月起更名為「中國紡織工業研究中心」，期間配合紡織產業的快速發展需求，任務由紡織相關廠商品管 / 分等 / 追查轉型為科技研發</p>
            <p class="lead">民國九十三年九月起更名為「紡織產業綜合研究所」，開創研發及服務業務營運的多元化及擴大國際化</p>
            <h3 class="my-4">紡綜所目標</h3>
            <p class="lead">以「篩選重點技術研發」來建構對內核心技術能量</p>
            <p class="lead">以「加強創新前瞻研發」來持續提昇國內紡織產業競爭力</p>
            <p class="lead">以「強化智慧資產佈局」來建立領導性創新產業</p>
            <p class="lead">以「推動國際科技合作」來運籌全球創新資源</p>
            <p class="lead">以「協助產業技術整合」來開創產業聯盟新價值,秉持「合作、誠信、務實、創新」的文化</p>
            <p class="lead">向「科技尖峰」挑戰與淬勵成長，並與所有的產研夥伴攜手共創台灣紡織的良好未來</p>
        </div>
    </div>

    <hr class="my-5">

    <div class="row mb-3 ml-md-5 mr-md-5 ml-0 mr-0">
        <div class="col-12">
            <h2 class="text-center">支持單位</h2>
        </div>
    </div>
    <div class="flex-row ml-md-5 mr-md-5 ml-5 mr-5" id="support">
        <a class="truncate btn btn-lg btn-outline-primary mb-3" href="https://www.centi.pt/" target="_blank">Center for
            Nanotechnology and Smart
            Materials</a>
        <a class="btn btn-lg btn-outline-danger mb-3" href="https://www.circle-economy.com/" target="_blank">Circulr
            Economy</a>
        <a class="btn btn-lg btn-outline-success mb-3" href="http://www.deakin.edu.au/" target="_blank">Deakin
            University</a>
        <a class="btn btn-lg btn-outline-secondary mb-3" href="https://icebug.com/" target="_blank">Ice bug</a>
        <a class="btn btn-lg btn-outline-dark mb-3" href="https://www.ioclothes.com/" target="_blank">IoClothes</a>
        <a class="btn btn-lg btn-outline-danger mb-3" href="http://www.ipc.org/" target="_blank">IPC-Association
            Connecting Electronics
            Industries</a>
        <a class="btn btn-lg btn-outline-primary mb-3" href="https://www.psu.edu/" target="_blank">Pennsylvania State
            University</a>
        <a class="btn btn-lg btn-outline-primary mb-3" href="https://www.scandinavianoutdoorgroup.com/" target="_blank">Scandinavian
            Outdoor
            Group</a>
        <a class="btn btn-lg btn-outline-secondary mb-3" href="https://apparelcoalition.org/" target="_blank">Sustainable
            Apparel Coalition</a>
        <a class="btn btn-lg btn-outline-dark mb-3" href="http://www.textile-testing.com/" target="_blank">Textile
            Testing and Innovation,
            LLE</a>
        <a class="btn btn-lg btn-outline-success mb-3" href="https://www.vttresearch.com/" target="_blank">VTT Technical
            Research Center of
            Finland Ltd.</a>
    </div>
@endsection

@push('scripts')
@endpush
