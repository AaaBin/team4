<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spring Mountain</title>
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
            .video_area .logo{
                height: 40%;
                width: 40%;
            }
          }

        #myvideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100vw;
            min-height: 100%;
        }
    </style>
</head>

<body>
    <div>

        <div class="video_area">

            <video muted loop="true" autoplay="autoplay" height="100vh" class="video_area" id="myvideo">
                <source type="video/mp4" src="{{asset('video/首頁-Firefly.mp4')}}">
            </video>

            <div class="logo">
                <img src="{{asset('img/image_home/logo-index.svg')}}" alt="" width="100%">
            </div>
        </div>







    </div>


</body>

</html>