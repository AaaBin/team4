@extends('layouts/nav')

{{-- CSS --}}
@section('css')
<link rel="stylesheet" href="{{asset('css/activity_style.css')}}">
@endsection

{{-- 內容 --}}
@section('content')
<main class="container activity_container">

    <header class="activity_header d-flex justify-content-center" data-aos="fade-up" data-aos-duration="2000">
        <h1>Seasons</h1>
    </header>

    <section class="activity_section row" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="350">

        <div class="activity_card col-6 col-md-3 d-flex align-items-center flex-column mb-5 pb-2">
            <div class="activity_img d-flex justify-content-center align-items-center">
                <img src="{{asset('img/activity/seasons_CherryBlossom.svg')}}">
                <div class="img_back"></div>
            </div>
            <h2>二至三月</h2>
            <span>春已在枝頭，1~3月是屬於浪漫的季節，嫣紅花姿怎能不令人心醉。<br><br>
                櫻花開 春雨來<br>
                櫻花開 幸福來</span>
        </div>
        <div class="activity_card col-6 col-md-3  d-flex align-items-center flex-column mb-5 pb-2">
            <div class="activity_img d-flex justify-content-center align-items-center">
                <img src="{{asset('img/activity/seasons_tung.svg')}}">
                <div class="img_back"></div>
            </div>
            <h2>四至五月</h2>
            <span>春夏交替之際，滿山遍野綻放，一朵朵白皙嬌柔的油桐花繽紛盛開在樹稍，為翠綠青山添上新裝；而當夜幕低垂，滿地的夏螢緩緩升起，與明月、繁星相互輝映，宛如地平線上的星光。</span>
        </div>
        <div class="activity_card col-6 col-md-3  d-flex align-items-center flex-column mb-5 pb-2">
            <div class="activity_img d-flex justify-content-center align-items-center">
                <img src="{{asset('img/activity/seasons_lily.svg')}}">
                <div class="img_back"></div>
            </div>

            <h2>五至八月</h2>
            <span>金色花海的悸動，遍地滿滿黃澄澄的忘憂。晴空萬里陽光明媚的好天氣，沿途步道點點黃花，和風輕舞下是如此的絢爛迷人，該是拋下煩惱、遠離都市紛擾，享受一趟悠活時光了。</span>
        </div>
        <div class="activity_card col-6 col-md-3  d-flex align-items-center flex-column mb-5 pb-2">
            <div class="activity_img d-flex justify-content-center align-items-center">
                <img src="{{asset('img/activity/seasons_snow.svg')}}">
                <div class="img_back"></div>
            </div>

            <h2>十二月</h2>
            <span>宛如耶誕初雪般，將山頭綠意染成夢幻雪地，讓秋冬花季迎接耶誕初雪，黃金楓也與白雪木同步綻放，金色與雪白雙色相互輝映，形成唯美浪漫的花海隧道，為秋冬季節增添色彩與活力。</span>
        </div>

    </section>

</main>
@endsection

{{-- js --}}
@section('js')

@endsection
