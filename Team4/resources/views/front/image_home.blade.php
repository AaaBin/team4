<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spring Mountain</title>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="icon" href="{{asset('img/nav/logo_PC.svg')}}">
    <link href="https://fonts.googleapis.com/css?family=Monsieur+La+Doulaise&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;

            background-color: black;

        }

        .video_area {
            position: relative;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .video_area .logo {
            position: absolute;

        }

        @media (max-width: 576px) {
            .video_area .logo {
                height: 40%;
                width: 40%;
            }

            .enter_btn {
                font-size: 21px;
            }
        }

        #myvideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100vw;
            min-height: 120%;
        }

        .enter_btn {
            font-size: 36px;
            background-color: transparent;
            text-decoration: none;
            outline: 0;
            border: 0;
            color: rgb(255, 255, 255);
            position: absolute;
            bottom: 150px;
            font-family: 'Monsieur La Doulaise', cursive;

        }

        @media (max-width: 576px) {
            .video_area .logo {
                height: 40%;
                width: 40%;
            }

            .enter_btn {
                font-size: 21px;
            }
        }
        .not_admin_message{
            position: absolute;
            bottom: 125px;
            z-index:1;
            color: white;
            font-family: 微軟正黑體;
        }
    </style>
</head>

<body>
    <a href="/firefly_season">
        <div>

            <div class="video_area">

                <video loop="true" muted autoplay="autoplay" height="100vh" class="video_area" id="myvideo">
                    <source type="video/mp4" src="{{asset('video/首頁-Firefly.mp4')}}">
                </video>

                <div class="logo">
                    <img src="{{asset('img/image_home/logo-index.svg')}}" alt="" width="100%">
                </div>
                <div class="enter_btn">Enter Spring Mountain</div>
                @if (session('message'))
                <span class="not_admin_message" role="alert">
                    <strong>您不是管理者</strong>
                </span>
                @endif

            </div>








        </div>
    </a>

</body>

</html>
