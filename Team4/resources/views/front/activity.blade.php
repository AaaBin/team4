<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/activity.css">
</head>
<body>

    <!-- 電腦nav------------------------------------ -->

    <nav class="nav_pc">
        <nav class="nav_pc_content fixed-top pt-4 px-4 d-flex justify-content-between">
            <div class="logo_pc ml-2">
                <a href="#">
                    <img src="./img/logo_PC.svg" alt="logo"  style="width: 70%;">
                </a>
            </div>
    
            <div class="navbar_pc d-flex align-items-center">
                <ul>
                    <li class="mx-2"><a class="nav_about" href="">園區介紹</a></li>
                    <li class="mx-2"><a href="">近日花況</a></li>
                    <li class="mx-2"><a href="">活動資訊</a></li>
                    <li class="mx-2"><a href="">當季活動</a></li>
                    <li class="mx-2"><a href="">線上預約</a></li>
                    <li class="mx-2"><a href="">訂位紀錄</a></li>
                    <li class="mx-2"><a href="">交通指引</a></li>
                </ul>
    
                <div class="nav_fb ml-5 mr-2" >
                    <a href="https://www.facebook.com/springmountain0425931201/">
                        <img src="./img/logo_facebook.svg" alt="link_fb">
                    </a>
                </div>
            </div>
        
        </nav>
    </nav>
    

    <!-- 平板nav------------------------------------- -->
    <nav class="nav fixed-top">
        <div class="logo_small">
            <a href="#">
                <img src="./img/logo_small.svg" alt="logo">
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
                <a class="nav-item" href="">園區介紹</a>
                <a class="nav-item" href="">近日花況</a>
                <a class="nav-item" href="">活動資訊</a>
                <a class="nav-item" href="">當季活動</a>
                <a class="nav-item" href="">線上預約</a>
                <a class="nav-item" href="">訂位紀錄</a>
                <a class="nav-item" href="">交通指引</a>
            </nav>

        </div>
        

    </nav>

    <main class="container activity_container">

        <header class="activity_header d-flex justify-content-center" data-aos="fade-up"
        data-aos-duration="2000" >
            <h1>Seasons</h1>
        </header>

        <section class="activity_section row" data-aos="fade-up"
        data-aos-duration="2000" data-aos-delay="350">

            <div class="activity_card col-6 col-md-3 d-flex align-items-center flex-column mb-5 pb-2">
                <div class="activity_img d-flex justify-content-center align-items-center">
                    <img src="./img/seasons_CherryBlossom.svg" >
                    <div class="img_back"></div>
                </div>
                <h2>二至三月</h2>
                <span>春已在枝頭，1~3月是屬於浪漫的季節，嫣紅花姿怎能不令人心醉。<br><br>
                    櫻花開 春雨來<br>
                    櫻花開 幸福來</span>
            </div>
            <div class="activity_card col-6 col-md-3  d-flex align-items-center flex-column mb-5 pb-2">
                <div class="activity_img d-flex justify-content-center align-items-center">
                    <img src="./img/seasons_tung.svg">
                    <div class="img_back"></div>
                </div>
                <h2>四至五月</h2>
                <span>春夏交替之際，滿山遍野綻放，一朵朵白皙嬌柔的油桐花繽紛盛開在樹稍，為翠綠青山添上新裝；而當夜幕低垂，滿地的夏螢緩緩升起，與明月、繁星相互輝映，宛如地平線上的星光。</span>
            </div>
            <div class="activity_card col-6 col-md-3  d-flex align-items-center flex-column mb-5 pb-2">
                <div class="activity_img d-flex justify-content-center align-items-center">
                    <img src="./img/seasons_lily.svg">
                    <div class="img_back"></div>
                </div>
                
                <h2>五至八月</h2>
                <span>金色花海的悸動，遍地滿滿黃澄澄的忘憂。晴空萬里陽光明媚的好天氣，沿途步道點點黃花，和風輕舞下是如此的絢爛迷人，該是拋下煩惱、遠離都市紛擾，享受一趟悠活時光了。</span>
            </div>
            <div class="activity_card col-6 col-md-3  d-flex align-items-center flex-column mb-5 pb-2">
                <div class="activity_img d-flex justify-content-center align-items-center">
                    <img src="./img/seasons_snow.svg">
                    <div class="img_back"></div>
                </div>
                
                <h2>十二月</h2>
                <span>宛如耶誕初雪般，將山頭綠意染成夢幻雪地，讓秋冬花季迎接耶誕初雪，黃金楓也與白雪木同步綻放，金色與雪白雙色相互輝映，形成唯美浪漫的花海隧道，為秋冬季節增添色彩與活力。</span>
            </div>

        </section>      

    </main>

    <footer class="footer">
        <div class="container d-flex justify-content-center">
            <span>Team4 © for educational purposes only</span>
        </div>
        
    </footer>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
      </script>


</body>

</html>