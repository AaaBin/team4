<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo e(asset("/css/index_style.css")); ?>">

</head>

<body>
    <div class="all">
        <!-- header -->
        <div class="home_header">
            <div class="home_header_logo">
                <img src="<?php echo e(asset('img/index/logo.svg')); ?>" alt=''>
                <div class="small_logo">
                    <img src="<?php echo e(asset('img/index/logo-1.svg')); ?>" alt='' >
                </div>
            </div>
            <div class="home_header_social">
                <div class="home_header_social_fb"></div>
            </div>
            <div class="home_header_hamburger"></div>
        </div>

        <!-- 固定 spring -->
        <div class="home_springmountain">
            <span>Spring Mountain</span>
        </div>
        <!-- banner & navbar -->
        <div class="home_banner_area">
            <div class="home_banner">
                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="<?php echo e(asset('img/index/自然美妙天籟.jpg')); ?>" alt='' width="100%">
                        </div>
                        <div class="swiper-slide">
                            <img src="<?php echo e(asset('img/index/自然美妙天籟.jpg')); ?>" alt=''>
                        </div>
                        <div class="swiper-slide"><img src="<?php echo e(asset('img/index/自然美妙天籟.jpg')); ?>" alt='' width="100%"></div>
                        <div class="swiper-slide"><img src="<?php echo e(asset('img/index/自然美妙天籟.jpg')); ?>" alt='' width="100%"></div>
                    </div>
                    <!-- Add Pagination -->

                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="home_nav_right">
                <ul>
                    <li><a href=''>園 區 介 紹</a></li>
                    <li><a href=''>近 日 花 況</a></li>
                    <li><a href=''>活 動 資 訊</a></li>
                    <li><a href=''>當 季 活 動</a></li>
                    <li><a href=''>線 上 預 約</a></li>
                    <li><a href=''>交 通 指 引</a></li>
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
        <div class="home_sunrise container">
            <div class="home_sunrise_text font_24  col-12 col-sm-6 col-md-3  col-xl-5">
                <p>清晨日出曙光</p>
            </div>
            <div class="home_sunrise_img col-12 col-sm-6 col-md-9 col-xl-7">
            </div>

        </div>

        <!-- 森林 -->
        <div class="home_forest ">
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

        <div class="home_nature">

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
        <div class="container ig_container">
            <img src="<?php echo e(asset('img/index/日出曙光1.jpg')); ?>" alt=''>
            <img src="<?php echo e(asset('img/index/日出曙光1.jpg')); ?>" alt=''>
            <img src="<?php echo e(asset('img/index/日出曙光1.jpg')); ?>" alt=''>
            <img src="<?php echo e(asset('img/index/日出曙光1.jpg')); ?>" alt=''>
        </div>


        <!-- welcome -->
        <div class="home_welcome container">
            <div class="home_welcome_text font_24">
                <p>洗滌您心靈的疲憊</p>
                <p>歡迎來到沐心泉</p>

            </div>
        </div>

        <!-- footer -->
        <div class="home_footer font_24">
            <a class="home_footer_booking" href=''>線上預約</a>
            <div class="home_footer_copyright">
                <p>Team4 © for educational purposes only</p>
            </div>

        </div>
    </div>















    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <script>
        var swiper = new Swiper('.swiper-container', {
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });

        let array=["一月至三月/櫻花季","四月至五月/油桐花季.螢火蟲季","五月至八月/金針花季","十二月/白雪木"]
        let button = document.querySelectorAll(".swiper-pagination-bullet");
        button.forEach((item,index)=>{
            item.innerText=array[index];
        });

        $('.swiper-pagination-bullet').click(function(){
                // 要在新噌一個 remove 其他的 active
                $('.swiper-pagination-bullet').removeClass("active");
                $(this).addClass("active");
        });
        $(document).ready(function(){
            $(".ig_container").height($(".ig_container img").width());
        });
        $(window).resize(function(){
            $(".ig_container").height($(".ig_container img").width());
            // console.log($(".ig_container img").width());
        });



    </script>
</body>

</html>
<?php /**PATH C:\Users\user\Documents\GitHub\team4\Team4\resources\views//front/index.blade.php ENDPATH**/ ?>