@extends('layouts/nav')

{{-- CSS --}}
@section('css')
<link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
<link rel="stylesheet" href="{{asset('css/home_style.css')}}">
<style>
    .navbar_pc {
        display: none !important;
    }
    .home_link_to_booking_btn{
        transition: 0.2s
    }
    .home_link_to_booking_btn:hover{
        text-decoration: none;
        color: #F1A200 ;
    }
</style>
@endsection

{{-- 內容 --}}
@section('content')
<!-- 固定 spring -->
<div class="home_springmountain">
    <span>←Spring Mountain</span>
</div>
<div class="all pt-5">

    <!-- banner & navbar -->
    <div class="home_banner_area">
        <div class="home_banner">
            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{asset('img/home/自然美妙天籟.jpg')}}" alt="" width="100%">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('img/home/油桐花4.jpg')}}" alt="">
                    </div>
                    <div class="swiper-slide"><img src="{{asset('img/home/金針花-1.jpg')}}" alt="" width="100%"></div>
                    <div class="swiper-slide"><img src="{{asset('img/home/白雪木.jpg')}}" alt="" width="100%"></div>
                </div>
                <!-- Add Pagination -->

            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="home_nav_right">
            <ul>
                <li><a href="/intro">園 區 介 紹</a></li>
                <li><a href="/flower">近 日 花 況</a></li>
                <li><a href="/activity">活 動 資 訊</a></li>
                <li><a href="/firefly_season">當 季 活 動</a></li>
                <li><a href="/booking">線 上 預 約</a></li>
                <li><a href="/traffic">交 通 指 引</a></li>
            </ul>
        </div>
    </div>

    <!-- banner 底下的 slogan -->
    <div class="home_slogan container">
        <div class="home_slogan_text font_24">
            <p>【炎炎夏日的涼風】</p>

            <span>位於山勢較高處的『沐心泉』，在炎炎的夏日即便是正午，依然可以吹到涼爽的山風，</span>
            <span>在炙陽下，沒有比吹到大自然的涼風更令人暢快的事，仲夏來吹吹風沐浴身體吧！</span>
        </div>
    </div>


    <!-- 過場 -->
    <div class="home_transitions"></div>

    <!-- 日出 -->
    <div class="home_sunrise container" data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine"
        data-aos-duration="900">
        <div class="home_sunrise_text font_24  col-12 col-sm-6 col-md-3  col-xl-5">
            <p>清晨日出曙光</p>
        </div>
        <div class="home_sunrise_img col-12 col-sm-6 col-md-9 col-xl-7">
        </div>

    </div>

    <!-- 森林 -->
    <div class="home_forest " data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine"
        data-aos-duration="900">
        <div class="home_forest_img">
        </div>

        <div class="container">

            <div class="home_forest_text font_24  col-12 col-md-12 col-xl-3">
                <p>翠綠原始林木</p>
            </div>
            <div class="home_forest_img_col col-12"></div>
        </div>

    </div>

    <!-- 自然 -->

    <div class="home_nature" data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine"
        data-aos-duration="900">

        <div class="container">
            <div class="home_nature_text font_24 col-12 col-xl-3">
                <p>自然美妙天籟</p>
            </div>
            <div class="home_nature_img_col col-12"></div>
        </div>

        <div class="home_nature_img"></div>

    </div>

    <!-- ig title -->
    <div class="home_ig_title ">
        <div class="container">
            <div class="home_ig_title_text col-4 col-sm-4 col-md-4 col-lg-3 col-xl-2 font_24">
                <div>花卉</div>
                <div>露營</div>
                <div>美食</div>
            </div>
        </div>
    </div>

    <!-- ig -->
    <div class="container ig_container" data-aos="fade-up" data-aos-duration="3000">
        <img src="{{asset('img/home/B6KRKnIpFNs.jpg')}}" alt="">
        <img src="{{asset('img/home/B6P9pnJgaZE.jpg')}}" alt="">
        <img src="{{asset('img/home/B8llMWnBhAt.jpg')}}" alt="">
        <img src="{{asset('img/home/Bm_E41nnhrP.jpg')}}" alt="">
    </div>


    <!-- welcome -->
    <div class="home_welcome container">
        <div class="home_welcome_text font_24">
            <p>洗滌您心靈的疲憊</p>
            <p>歡迎來到沐心泉</p>
            <a href="/booking" class="home_link_to_booking_btn mt-3" >-立即預約-</a>

        </div>
    </div>

</div>
@endsection

{{-- js --}}
@section('js')
<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        spaceBetween: 30,
        speed: 1200,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });

    let array = ["一月至三月/櫻花季", "四月至五月/油桐花季.螢火蟲季", "五月至八月/金針花季", "十二月/白雪木"]
    let button = document.querySelectorAll(".swiper-pagination-bullet");
    button.forEach((item, index) => {
        item.innerText = array[index];
    });

    $('.swiper-pagination-bullet').click(function () {
        // 要在新噌一個 remove 其他的 active
        $('.swiper-pagination-bullet').removeClass("active");
        $(this).addClass("active");
    });
    $(document).ready(function () {
        $(".ig_container").height($(".ig_container img").width());
    });
    $(window).resize(function () {
        $(".ig_container").height($(".ig_container img").width());
        // console.log($(".ig_container img").width());
    });



</script>
<script>
    $('.home_springmountain').click(function () {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    })
    $(function () {
        $(".swiper-pagination-bullet:nth-child(1) ").addClass('active');
    })
</script>
@endsection
