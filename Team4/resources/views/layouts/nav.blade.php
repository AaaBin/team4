<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>沐心泉</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="icon" href="{{asset('img/nav/logo_PC.svg')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/nav_style.css')}}">

    @yield('css')
</head>

<body>

    <!-- 電腦nav------------------------------------ -->

    <nav class="nav_pc">
        <nav class="nav_pc_content fixed-top pt-2 px-4 d-flex justify-content-between">
            <div class="logo_pc ml-2">
                <a href="/home">
                    <img src="{{asset('img/nav/logo_PC.svg')}}" alt="logo" style="width: 70%;">
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
                        <img src="{{asset('img/nav/logo_facebook.svg')}}" alt="link_fb">
                    </a>
                </div>
            </div>

        </nav>
    </nav>


    <!-- 平板nav------------------------------------- -->
    <nav class="nav fixed-top">
        <div class="logo_small">
            <a href="#">
                <img src="{{asset('img/nav/logo_small.svg')}}" alt="logo">
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

@yield('content')
    <footer class="footer">
        <div class="container d-flex justify-content-center">
            <span>Team4 © for educational purposes only</span>
        </div>

    </footer>


    {{-- jq --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    {{-- bootstrap --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    {{-- AOS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- sweetalart --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        AOS.init();
    </script>

    @yield('js')


</body>

</html>
