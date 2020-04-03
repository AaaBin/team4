<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>沐心泉</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Monsieur+La+Doulaise&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/firefly_season_style.css')}}">
</head>

<body>

    <!-- 電腦nav------------------------------------ -->

    <nav class="nav_pc top-fixed">
        <nav class="nav_pc_content fixed-top pt-4 px-4 d-flex justify-content-between">
            <div class="logo_pc ml-2">
                <a href="/home">
                    <img src="{{asset('img/firefly/logo_pc_april.svg')}}" alt="logo" style="width: 70%;">
                </a>
            </div>

            <div class="navbar_pc d-flex align-items-center">
                <ul>
                    <li class="mx-2"><a class="nav_about" href="/intro">園區介紹</a></li>
                    <li class="mx-2"><a href="/flower">近日花況</a></li>
                    <li class="mx-2"><a href="/activity">活動資訊</a></li>
                    <li class="mx-2"><a href="/firefly_season">當季活動</a></li>
                    <li class="mx-2"><a href="/booking">線上預約</a></li>
                    <li class="mx-2"><a href="/booking_record">訂位紀錄</a></li>
                    <li class="mx-2"><a href="/traffic">交通指引</a></li>
                </ul>

                <div class="nav_fb ml-5 mr-2">
                    <a href="https://www.facebook.com/springmountain0425931201/">
                        <img src="{{asset('img/firefly/logo_facebook.svg')}}" alt="link_fb">
                    </a>
                </div>
            </div>

        </nav>
    </nav>


    <!-- 平板nav------------------------------------- -->
    <nav class="nav fixed-top">
        <div class="logo_small">
            <a href="#">
                <img src="{{asset('img/firefly/logo_small_april.svg')}}" alt="logo" height="20px">
            </a>
        </div>

        <div class="nav_hamburger">

            <input id="toggle" type="checkbox">

            <label class="toggle-container" for="toggle">
                <!-- If menu is open, it will be the "X" icon, otherwise just a clickable area behind the hamburger menu icon -->
                <span class="button button-toggle"></span>
            </label>

            <!-- The nav menu -->
            <nav class="nav_menu_btn">
                <a class="nav-item" href="/intro">園區介紹</a>
                <a class="nav-item" href="/flower">近日花況</a>
                <a class="nav-item" href="/activity">活動資訊</a>
                <a class="nav-item" href="/firefly_season">當季活動</a>
                <a class="nav-item" href="/booking">線上預約</a>
                <a class="nav-item" href="/booking_record">訂位紀錄</a>
                <a class="nav-item" href="/traffic">交通指引</a>
            </nav>

        </div>

    </nav>

    <main>

        <!-- banner -->
        <div class="april_banner">

            <div class="april_banner_text d-flex justify-content-center align-items-center">
                <div class="april_banner_video">
                    <div class="april_banner_mask"></div>
                    <video autoplay muted loop id="myVideo">
                        <source src="{{asset('video/桐花.mp4')}}" type="video/mp4">
                    </video>
                </div>
                <div class="april_banner_text_subtitle">
                    <h2 data-aos="zoom-in" data-aos-duration="2500" data-aos-delay="800">Snow and Stars</h2>
                </div>
                <div class="april_banner_text_title container" data-aos="zoom-in" data-aos-duration="3000">
                    <h3>森林螢光微旅行</h3>
                </div>
            </div>


        </div>

        <div class="april_woods container">
            <div class="april_woods_middle col-lg-6 col-md-6 col-6 m-auto" data-aos="fade-up" data-aos-duration="2000">
            </div>
            <div class="april_woods_left col-lg-4 col-md-4 col-4" data-aos="fade-up" data-aos-duration="2000"
                data-aos-delay="400">
            </div>
            <div class="april_woods_square col-md-3 col-3" data-aos="fade-up" data-aos-duration="2000"
                data-aos-delay="400">
            </div>
            <div class="april_woods_right">
                <div class="april_woods_right_title" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <h2>INTO THE<br>WOODS</h2>
                </div>
                <div class="april_woods_right_content" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <p>聆聽森林、油桐花與螢光交織出的旅途協奏曲。</p>
                </div>
            </div>
        </div>

        <div class="april_2block_top d-flex">
            <div class="april_2block_top_left col-lg-6" data-aos="fade-left" data-aos-duration="2000">

            </div>
            <div class="april_2block_top_right col-lg-6" data-aos="fade-right" data-aos-duration="2000">

            </div>

        </div>

        <div class="april_700m d-flex justify-content-center align-items-center">
            <div class="april_700m_box container">
                <div class="april_700m_squareleft col-lg-9 col-md-4 col-4" data-aos="fade-right"
                    data-aos-duration="2000"></div>

                <div class="april_700m_mainimg">
                    <div class="april_700m_squarerighttop col-md-4 col-3" data-aos="fade-up" data-aos-duration="2000"
                        data-aos-delay="400"></div>
                    <div class="april_700m_squarerightbottomAleft col-md-4 col-md-3 col-2" data-aos="fade-up"
                        data-aos-duration="2000" data-aos-delay="400"></div>
                    <div class="april_700m_squarerightbottomBright col-md-3 col-2" data-aos="fade-up"
                        data-aos-duration="2000"></div>
                    <div class="april_700m_content ">
                        <div class="april_700m_content_title" data-aos="fade-up" data-aos-duration="2000"
                            data-aos-delay="200">
                            <h2>700m above</h2>
                        </div>
                        <div class="april_700m_content_down">
                            <h2 data-aos="fade-up" data-aos-duration="2000" data-aos-delay="200"> sea level</h2>
                            <p data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">走入海拔700公尺的生態環境，<br>
                                用感官感受多元富饒的生命力，<br>
                                在森林裡找一角，<br>
                                享受難得靜下來的無聲晚餐，<br>
                                寫一封明信片給未來的自己，<br>
                                紀念你暫時脫離匆匆忙忙的都市步伐。</p>
                        </div>
                    </div>


                </div>

            </div>
        </div>


        <div class="april_may container">
            <div class="april_may_title text-center" data-aos="fade-up" data-aos-duration="2000">
                <h2>APRIL to MAY</h2>
            </div>
            <div class="april_may_content">
                <div class="april_may_middle col-6 m-auto" data-aos="fade-up" data-aos-duration="2000"
                    data-aos-delay="400">
                </div>

                <div class="april_may_left col-lg-5" data-aos="fade-right" data-aos-duration="2000"
                    data-aos-delay="400">
                </div>
                <div class="april_may_left_content" data-aos="fade-right" data-aos-duration="2000" data-aos-delay="400">
                    <p>Spring Mountain</p>
                </div>

                <div class="april_may_right col-lg-4" data-aos="fade-left" data-aos-duration="2000"
                    data-aos-delay="400">
                </div>
                <div class="april_may_right_content" data-aos="fade-left" data-aos-duration="2000" data-aos-delay="400">
                    <p>春夏交替之際，<br>
                        每當微風輕揚，<br>
                        油桐花旋轉落下彷彿飛雪翩翩，<br>
                        翠綠山頭染成遍地雪白。</p>
                </div>
            </div>

        </div>



        <div class="april_2block_bottum d-flex">
            <div class="april_2block_bottum_left col-lg-6" data-aos="fade-left" data-aos-duration="2000">

            </div>
            <div class="april_2block_bottum_right col-lg-6" data-aos="fade-right" data-aos-duration="2000">

            </div>

        </div>

        <div class="april_stay d-flex justify-content-center align-items-center">
            <div class="april_stay_tile" data-aos="fade-down" data-aos-duration="2000">
                <h5>待夜幕低垂，滿天星子之下，點點螢光熠熠飛舞。</h5>
            </div>
        </div>

        <div class="april_party d-flex justify-content-center align-items-center">
            <div class="april_party_content">
                <h3>We invite you to join the spring party.</h3>
            </div>

        </div>

        <div class="april_snow">
            <div class="april_snow_content container col-10 d-flex justify-content-between align-items-center">
                <h4>從雪地走入星空，<br>
                    聽聽油桐花在台灣的身分轉變，<br>
                    聽聽螢火蟲的故事，<br>
                    享受最令人期待的螢河之旅。
                </h4>
                <div class="april_snow_button">
                    <a href="/booking">
                        線上預約
                        <img src="{{asset('img/firefly/arrow_right_white.svg')}}" alt="" width="19px">
                    </a>

                </div>
            </div>

        </div>
    </main>

    <div class="footer d-flex justify-content-center align-items-center">
        <div class="footer_content">Team4 © for educational purposes only</div>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

</body>

</html>
