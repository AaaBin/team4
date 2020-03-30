@extends('layouts/nav')

{{-- CSS --}}
@section('css')
<link rel="stylesheet" href="{{asset('css/flower_style.css')}}">
<style>
    .flower_condition_recent_content{
        min-width: 100%;
    }
</style>
@endsection

{{-- 內容 --}}
@section('content')
<div class="flower">
    <section class="flower_weather mb-5">
        <div class="container d-flex flex-column align-items-center">
            <h2 class="flower_weather_title mb-xl-5">今日天氣</h2>
            <div class="flower_weather_today d-flex mb-3 d-xl-none">

            </div>
            <div class="flower_weather_bottom d-xl-block my-xl-5 position-relative">

            </div>

        </div>

    </section>
    <section class="flower_condition_recent mb-5">
        <div class="container d-flex flex-column align-items-center px-md-4 ">
            <h2 class="flower_condition_recent_title my-5 px-3 mb-md-0">
                近期花況
            </h2>
            <div class="flower_condition_recent_date_area position-relative mb-2">
                <div class="flower_condition_recent_date_area_m pr-4">03</div>
                <div class="flower_condition_recent_date_area_d pl-4">06</div>
            </div>
            <article class="flower_condition_recent_content">
                就是昨兒個下了場雨，然後櫻花，粉紅色的櫻花，粉紅色的富士櫻花，
                就這樣默默地下臺一鞠躬。
                <br>
                <br>
                花量大概剩下四成左右吧，您說說這樣的花況更新小編該如何說下去啊。好在，炸開的黃金風鈴木點綴著山間，一個山坡點綴著幾棵，耀眼但不張揚，小編想，這個時候毫無意外，就是爬山。
                <br>
                <br>
                反正就是走走路、聊聊天、流流汗、吹吹風，防疫期間，這個行程跟待在家裡面和家人聊天好像真的有一模沒有兩樣。所以真的在家憋不住了，再到山裡走走吧！
            </article>
        </div>

        @foreach ($flower_datas as $item)
        <div class="container d-flex flex-column align-items-center px-md-4 ">
            <h2 class="flower_condition_recent_title my-5 px-3 mb-md-0">
                近期花況
            </h2>
            <?php
            $dates = explode('-',$item->date);
            $date_m = $dates[1];
            $date_d = $dates[2];
            ?>
            <div class="flower_condition_recent_date_area position-relative mb-2">
                <div class="flower_condition_recent_date_area_m pr-4">{{$date_m}}</div>
                <div class="flower_condition_recent_date_area_d pl-4">{{$date_d}}</div>
            </div>
            <article class="flower_condition_recent_content">
                {!!$item->content!!}
            </article>
        </div>
        @if ($loop->first)
        @break
        @endif
        @endforeach



    </section>
    <section class="flower_view mb-5">
        <div class="container d-flex flex-column align-items-center">
            <h2 class="flower_view_title my-4 my-xl-5">View</h2>
            <div class="flower_view_imgs row justify-content-between">
                <div class="flower_view_img d-flex justify-content-center align-items-center ">
                    <img src="./03-img/ig_img_1.jpg" alt="">
                </div>
                <div class="flower_view_img d-flex justify-content-center align-items-center ">
                    <img src="./03-img/ig_img_2.jpg" alt="">
                </div>
                <div class="flower_view_img d-flex justify-content-center align-items-center ">
                    <img src="./03-img/ig_img_3.jpg" alt="">
                </div>
                <div class="flower_view_img d-md-flex justify-content-center align-items-center  d-none d-md-block">
                    <img src="./03-img/ig_img_4.jpg" alt="">
                </div>
                <div class="flower_view_img d-md-flex justify-content-center align-items-center  d-none d-md-block">
                    <img src="./03-img/ig_img_5.jpg" alt="">
                </div>
                <div class="flower_view_img d-md-flex justify-content-center align-items-center  d-none d-md-block">
                    <img src="./03-img/ig_img_6.jpg" alt="">
                </div>
            </div>
        </div>

    </section>
    <section class="flower_condition_old">

        @foreach ($flower_datas as $item)
        <?php
            $dates = explode('-',$item->date);
            $date_m = $dates[1];
            $date_d = $dates[2];
            ?>

        @if ($loop->first)
        {{-- do nothing --}}
        @else
        <div class="container d-flex flex-column align-items-center justify-content-center mb-5 px-3 px-md-4">
            <div class="flower_condition_old_date_area position-relative mb-2">
                <div class="flower_condition_old_date_area_m pr-4">{{$date_m}}</div>
                <div class="flower_condition_old_date_area_d pl-4">{{$date_d}}</div>
            </div>
            <article class="flower_condition_old_content">
                {!!$item->content!!}
            </article>
        </div>
        @endif


        @endforeach

        <div class="container d-flex flex-column align-items-center justify-content-center mb-5 px-3 px-md-4">
            <div class="flower_condition_old_date_area position-relative mb-2">
                <div class="flower_condition_old_date_area_m pr-4">02</div>
                <div class="flower_condition_old_date_area_d pl-4">27</div>
            </div>
            <article class="flower_condition_old_content">
                <b>
                    八重櫻－
                    <br>
                    &emsp;&emsp;桃紅色，路程3分鐘，剩下二成。
                    <br>
                    香水櫻－
                    <br>
                    &emsp;&emsp;粉桃色，路程50分鐘，約五成。
                    <br>
                    富士櫻－
                    <br>
                    &emsp;&emsp;粉紅色，路程25分鐘，開兩成。

                </b>
                所以看得出來，八重櫻和香水櫻在本週走一個四處開花四處稀稀落落的狀態，
                而富士櫻，才剛開始綻放，可能還要再十來天，也就是三月初才會漂漂亮亮，
                所以這一週，來山裡，就爬山吧。
            </article>
        </div>
        <div class="container d-flex flex-column align-items-center justify-content-center mb-5 px-3 px-md-4 ">
            <div class="flower_condition_old_date_area position-relative mb-2">
                <div class="flower_condition_old_date_area_m pr-4">02</div>
                <div class="flower_condition_old_date_area_d pl-4">21</div>
            </div>
            <article class="flower_condition_old_content">
                目前的櫻花花況來到了一個悲慘世界的狀態。
                為什麼呢？！
                <br>
                <b>
                    重瓣緋寒櫻(八重櫻) －正以迅雷不及掩耳的速度掉落中！
                </b>
                <br>
                大概就是樹上的花三成、葉兩成、地上的花三成、兩成不明！
                <br>
                但是大家不要緊張，因為<b>香水櫻正努力的開到了六~七成</b>，所以還是有櫻花看的！
                <br>
                但是香水櫻種植在園區的最最最上方，所以如果要看香水櫻，必須走路50分鐘，然
                後穿過很多很多掉落的重瓣緋寒櫻花樹下，然後會一直懷疑，櫻花都掉光了到底在
                爬什麼山，然後覺得自己被騙錢買了門票進來，然後會開始想網路上或者朋友傳來
                的照片是同一個地方嗎？然後可能還會留一些汗，可能小腿的肌肉還抽筋一下，然
                後就是在極度懷疑人生的狀態下，就會看到香水櫻了！
                然後香水櫻一片的粉紅，看起來非常的浪漫，但是發現要拍出好照片的角度實在是
                非常困難，然後會發現眼睛看到的好像比拍照出來的美一點，然後就會想說到底來
                幹嘛的？
                小編想，大家應該是來爬山的吧！
                總而言之，本週的目的性爬山是大於賞花的！

            </article>
        </div>
        <div class="container d-flex flex-column align-items-center justify-content-center mb-5 px-3 px-md-4 ">
            <div class="flower_condition_old_date_area position-relative mb-2">
                <div class="flower_condition_old_date_area_m pr-4">02</div>
                <div class="flower_condition_old_date_area_d pl-4">14</div>
            </div>
            <article class="flower_condition_old_content">
                河津櫻－花期過了。
                <br>
                垂櫻－花期過了。
                <br>
                福爾摩沙櫻－花期過了。
                <br>
                富士櫻－花期未到。
                <br>
                所以上列的櫻花我們先不討論。
                <br>
                我們把重點放在下面兩種櫻！！
                <br>
                <br>
                <b>
                    重瓣緋寒櫻－
                    <br>
                    &emsp;&emsp;俗稱的八重櫻，花色桃紅色，二成多掉落，花剩六成，一成多不明，從停車場步行5分鐘就可以看到。
                    <br>
                    香水櫻－
                    <br>
                    &emsp;&emsp;單瓣粉色花，花開五成多，四成多花苞，從停車場步行40分鐘才可以看到。
                </b>
                <br>
                <br>
                簡單的來說，這兩種櫻花來到了黃金交叉期，從今天起每晚一天來，香水櫻就會越來越多，從今天起每晚一天來，八重櫻就會越來越少，從今天起每晚一天來，看花就得要越爬越高。當然這個時間點，就是一半桃紅色一半粉紅色，花沒有多，但花也沒有少，看是一定看不過癮，
                <br>
                <br>
                所以只能夠當作是爬山的附加價值。

            </article>
        </div>
        <div class="container d-flex flex-column align-items-center justify-content-center mb-5 px-3 px-md-4 ">
            <div class="flower_condition_old_date_area position-relative mb-2">
                <div class="flower_condition_old_date_area_m pr-4">02</div>
                <div class="flower_condition_old_date_area_d pl-4">06</div>
            </div>
            <article class="flower_condition_old_content">
                河津櫻－
                <br>
                &emsp;&emsp;花期是一月初到一月底，是最早開的櫻花，所以也是最早凋謝的，現在整顆都是樹葉。
                <br>
                <br>
                福爾摩沙櫻－
                <br>
                &emsp;&emsp;白色，園區不到十顆，有特色，落花中。
                <br>
                <br>
                重瓣緋寒櫻－
                <br>
                &emsp;&emsp;俗稱的八重櫻，花色桃紅色，一成掉落，花開七成，兩成不明。
                <br>
                <br>
                香水櫻－
                <br>
                &emsp;&emsp;單瓣粉色花，花開三成，七成不明。
                <br>
                <br>
                富士櫻－
                <br>
                &emsp;&emsp;單瓣粉紅色，初花剛報到，開幾朵數得出來。
            </article>
        </div>
    </section>
</div>

@endsection

{{-- js --}}
@section('js')
<script>
    fetch('https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-075?Authorization=CWB-908DFEE0-69E2-43D0-8D23-6CD50BB2FCDE&locationName=%E6%96%B0%E7%A4%BE%E5%8D%80')
        .then(function (response) {
            return response.json();
        })

        //未來七天天氣
        .then(function (weather_data_sevendays_all) {
            // console.log(weather_data_sevendays_all);
            const weather = weather_data_sevendays_all.records.locations[0].location[0];
            console.log(weather);

            //七天降雨 都抓6:00-18:00
            //pop_1 今日
            const pop_1 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[0].time[0].elementValue[0].value;
            console.log(pop_1);
            //pop_2 明天 後續以此類推
            const pop_2 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[0].time[2].elementValue[0];
            console.log(pop_2);
            const pop_3 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[0].time[4].elementValue[0];
            const pop_4 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[0].time[6].elementValue[0];
            const pop_5 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[0].time[8].elementValue[0];
            const pop_6 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[0].time[10].elementValue[0];
            const pop_7 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[0].time[12].elementValue[0];

            //溫度
            const T_1 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[1].time[0].elementValue[0].value;

            const T_2 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[1].time[2].elementValue[0].value;
            const T_3 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[1].time[4].elementValue[0].value;
            const T_4 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[1].time[6].elementValue[0].value;
            const T_5 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[1].time[8].elementValue[0].value;
            const T_6 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[1].time[10].elementValue[0].value;
            const T_7 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[1].time[12].elementValue[0].value;
            console.log(T_7);

            //最高溫
            const Max_T = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[12].time[0].elementValue[0].value;
            console.log(Max_T);
            //最低溫
            const Min_T = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[8].time[0].elementValue[0].value;
            //這個來源沒有 CI舒適度 以Wx天氣現象代替
            const Wx = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[6].time[0].elementValue[0].value;
            console.log(Wx);

            //七天天氣代碼
            const Wx_code_1 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[6].time[0].elementValue[1].value;
            console.log(Wx_code_1);

            const Wx_code_2 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[6].time[2].elementValue[1].value;

            const Wx_code_3 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[6].time[4].elementValue[1].value;

            const Wx_code_4 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[6].time[6].elementValue[1].value;

            const Wx_code_5 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[6].time[8].elementValue[1].value;

            const Wx_code_6 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[6].time[10].elementValue[1].value;

            const Wx_code_7 = weather_data_sevendays_all.records.locations[0].location[0].weatherElement[6].time[12].elementValue[1].value;

            if (Wx_code_1 == '01'){
            var weather_icon_1 = '{{asset("img/flower/flower_weather_cloud_sunnny.png")}}'
        } else if(Wx_code_1 == '02'|| Wx_code_1 == '03' || Wx_code_1 == '04'){
            var weather_icon_1 = '{{asset("img/flower/flower_weather_cloud_sun.png")}}'
        }else if(Wx_code_1 == '05'|| Wx_code_1 == '06' || Wx_code_1 == '07'){
            var weather_icon_1 = '{{asset("img/flower/flower_weather_cloudy.png")}}'
        }else{
            var weather_icon_1 = '{{asset("img/flower/flower_weather_rain.png")}}'
        };

        if (Wx_code_2 == '01'){
            var weather_icon_2 = '{{("img/flower/flower_weather_cloud_sunnny.png")}}'
        } else if(Wx_code_2 == '02'|| Wx_code_2 == '03' || Wx_code_2 == '04'){
            var weather_icon_2 = '{{asset("img/flower/flower_weather_cloud_sun.png")}}'
        }else if(Wx_code_2 == '05'|| Wx_code_2 == '06' || Wx_code_2 == '07'){
            var weather_icon_2 = '{{asset("img/flower/flower_weather_cloudy.png")}}'
        }else{
            var weather_icon_2 = '{{asset("img/flower/flower_weather_rain.png")}}'
        };


        if (Wx_code_3 == '01'){
            var weather_icon_3 = '{{("img/flower/flower_weather_cloud_sunnny.png")}}'
        } else if(Wx_code_3 == '02'|| Wx_code_3 == '03' || Wx_code_3 == '04'){
            var weather_icon_3 = '{{asset("img/flower/flower_weather_cloud_sun.png")}}'
        }else if(Wx_code_3 == '05'|| Wx_code_3 == '06' || Wx_code_3 == '07'){
            var weather_icon_3 = '{{asset("img/flower/flower_weather_cloudy.png")}}'
        }else{
            var weather_icon_3 = '{{asset("img/flower/flower_weather_rain.png")}}'
        };

        if (Wx_code_4 == '01'){
            var weather_icon_4 = '{{("img/flower/flower_weather_cloud_sunnny.png")}}'
        } else if(Wx_code_4 == '02'|| Wx_code_4 == '03' || Wx_code_4 == '04'){
            var weather_icon_4 = '{{asset("img/flower/flower_weather_cloud_sun.png")}}'
        }else if(Wx_code_4 == '05'|| Wx_code_4 == '06' || Wx_code_4 == '07'){
            var weather_icon_4 = '{{asset("img/flower/flower_weather_cloudy.png")}}'
        }else{
            var weather_icon_4 = '{{asset("img/flower/flower_weather_rain.png")}}'
        };


        if (Wx_code_5 == '01'){
            var weather_icon_5 = '{{("img/flower/flower_weather_cloud_sunnny.png")}}'
        } else if(Wx_code_5 == '02'|| Wx_code_5 == '03' || Wx_code_5 == '04'){
            var weather_icon_5 = '{{asset("img/flower/flower_weather_cloud_sun.png")}}'
        }else if(Wx_code_5 == '05'|| Wx_code_5 == '06' || Wx_code_5 == '07'){
            var weather_icon_5 = '{{asset("img/flower/flower_weather_cloudy.png")}}'
        }else{
            var weather_icon_5 = '{{asset("img/flower/flower_weather_rain.png")}}'
        };


        if (Wx_code_6 == '01'){
            var weather_icon_6 = '{{("img/flower/flower_weather_cloud_sunnny.png")}}'
        } else if(Wx_code_6 == '02'|| Wx_code_6 == '03' || Wx_code_6 == '04'){
            var weather_icon_6 = '{{asset("img/flower/flower_weather_cloud_sun.png")}}'
        }else if(Wx_code_6 == '05'|| Wx_code_6 == '06' || Wx_code_6 == '07'){
            var weather_icon_6 = '{{asset("img/flower/flower_weather_cloudy.png")}}'
        }else{
            var weather_icon_6 = '{{asset("img/flower/flower_weather_rain.png")}}'
        };

        if (Wx_code_7 == '01'){
            var weather_icon_7 = '{{("img/flower/flower_weather_cloud_sunnny.png")}}'
        } else if(Wx_code_7 == '02'|| Wx_code_7 == '03' || Wx_code_7 == '04'){
            var weather_icon_7 = '{{asset("img/flower/flower_weather_cloud_sun.png")}}'
        }else if(Wx_code_7 == '05'|| Wx_code_7 == '06' || Wx_code_7 == '07'){
            var weather_icon_7 = '{{asset("img/flower/flower_weather_cloudy.png")}}'
        }else{
            var weather_icon_7 = '{{asset("img/flower/flower_weather_rain.png")}}'
        };

            var weather_7_day = document.querySelector('.flower_weather_bottom')
            weather_7_day.innerHTML += `
            <p class="flower_weather_today_current_temp position-absolute d-none d-xl-block">${T_1}&deg;C</p>
                <div class="flower_weather_bottom_text_area">
                    <div class="flower_weather_today_date">
                        <span class="flower_weather_today_date_md mr-3 d-none d-xl-inline">03.19</span>
                        <span class="flower_weather_today_date_w d-none d-xl-inline ">星期一&emsp;&emsp;TODAY</span>
                    </div>
                    <div class="flower_weather_today_max_min_temp d-none d-xl-flex">
                        <span class="flower_weather_today_max_temp">${Max_T}&deg;C-</span>
                        <span class="flower_weather_today_min_temp mr-3">${Min_T}&deg;C</span>
                        <p class="flower_weather_today_rain_chance d-none d-xl-block mb-xl-1">降雨機率 ${pop_1}%</p>
                    </div>

                    <p class="flower_weather_today_comfort d-none d-xl-block">${Wx}</p>
                </div>
                <div class="flower_weather_weeks d-flex justify-content-between my-5 mb-xl-2 ">
                    <div class="flower_weather_today_icon d-none d-xl-block mx-5">
                        <img src="${weather_icon_1}" alt="">
                    </div>
                    <div
                        class="flower_weather_week_1 flower_weather_week mx-2 position-relative d-flex flex-column align-items-center">
                        <p class="flower_weather_week_dayofweek">MON</p>
                        <p class="flower_weather_week_temp">${T_1}&deg;C</p>
                        <div class="flower_weather_week_icon">
                            <img src="${weather_icon_1}" alt="" style="width:25px ; height:21px;">
                        </div>
                    </div>
                    <div
                        class="flower_weather_week_1 flower_weather_week mx-2 position-relative d-flex flex-column align-items-center">
                        <p class="flower_weather_week_dayofweek">TUE</p>
                        <p class="flower_weather_week_temp">${T_2}&deg;C</p>
                        <div class="flower_weather_week_icon">
                            <img src="${weather_icon_2}" alt="" style="width:25px ; height:21px;">
                        </div>
                    </div>
                    <div
                        class="flower_weather_week_1 flower_weather_week mx-2 position-relative d-flex flex-column align-items-center">
                        <p class="flower_weather_week_dayofweek">WED</p>
                        <p class="flower_weather_week_temp">${T_3}&deg;C</p>
                        <div class="flower_weather_week_icon">
                            <img src="${weather_icon_3}" alt="" style="width:25px ; height:21px;">
                        </div>
                    </div>
                    <div
                        class="flower_weather_week_1 flower_weather_week mx-2 position-relative d-flex flex-column align-items-center">
                        <p class="flower_weather_week_dayofweek">THU</p>
                        <p class="flower_weather_week_temp">${T_4}&deg;C</p>
                        <div class="flower_weather_week_icon">
                            <img src="${weather_icon_4}" alt="" style="width:25px ; height:21px;">
                        </div>
                    </div>
                    <div
                        class="flower_weather_week_1 flower_weather_week mx-2 position-relative d-flex flex-column align-items-center">
                        <p class="flower_weather_week_dayofweek">FRI</p>
                        <p class="flower_weather_week_temp">${T_5}&deg;C</p>
                        <div class="flower_weather_week_icon">
                            <img src="${weather_icon_5}" alt="" style="width:25px ; height:21px;">
                        </div>
                    </div>
                    <div
                        class="flower_weather_week_1 flower_weather_week mx-2 position-relative d-flex flex-column align-items-center">
                        <p class="flower_weather_week_dayofweek">SAT</p>
                        <p class="flower_weather_week_temp">${T_6}&deg;C</p>
                        <div class="flower_weather_week_icon">
                            <img src="${weather_icon_6}" alt="" style="width:25px ; height:21px;">
                        </div>
                    </div>
                    <div
                        class="flower_weather_week_1 flower_weather_week mx-2 position-relative d-flex flex-column align-items-center">
                        <p class="flower_weather_week_dayofweek">SUN</p>
                        <p class="flower_weather_week_temp">${T_7}&deg;C</p>
                        <div class="flower_weather_week_icon">
                            <img src="${weather_icon_7}" alt="" style="width:25px ; height:21px;">
                        </div>
                    </div>


            `
        });
</script>
<!-- <script>
    fetch('https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0003-001?Authorization=CWB-908DFEE0-69E2-43D0-8D23-6CD50BB2FCDE&locationName=%E8%87%BA%E4%B8%AD')
        .then(function (response) {
            return response.json();
        })
        .then(function (weather_data_today_all) {
            console.log(weather_data_today_all);
            const today_weather = weather_data_today_all.records.location[0];

            const today_date = weather_data_today_all.records.location[0].time;
            console.log(today_date);


            const today_MaxT = weather_data_today_all.records.location[0].time.weatherElement;


        });
</script> -->
<script>
    fetch('https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-075?Authorization=CWB-908DFEE0-69E2-43D0-8D23-6CD50BB2FCDE&locationName=%E6%96%B0%E7%A4%BE%E5%8D%80')
    .then(function (response) {
        return response.json();
    })
    .then(function (weather_data_today_all) {
        const today_weather = weather_data_today_all.records.locations[0].location[0];
        console.log(today_weather);
        //平均溫度
        const today_T = weather_data_today_all.records.locations[0].location[0].weatherElement[1].time[0].elementValue[0].value;
        console.log(today_T);

        //最高溫
        const today_MaxT = weather_data_today_all.records.locations[0].location[0].weatherElement[12].time[0].elementValue[0].value;
        console.log(today_MaxT);

        //最低溫
        const today_MinT = weather_data_today_all.records.locations[0].location[0].weatherElement[8].time[0].elementValue[0].value;
        console.log(today_MinT);

        //降雨機率
        const today_pop = weather_data_today_all.records.locations[0].location[0].weatherElement[0].time[0].elementValue[0].value;
        console.log(today_pop);

        const today_Wx = weather_data_today_all.records.locations[0].location[0].weatherElement[6].time[0].elementValue[0].value;
        console.log(today_Wx);


        //天氣代碼
        const today_Wx_code = weather_data_today_all.records.locations[0].location[0].weatherElement[6].time[0].elementValue[1].value;
        console.log(today_Wx_code);

        if (today_Wx_code == '01'){
            var weather_icon = './03-img/flower_weather_cloud_sunnny.png'
        } else if(today_Wx_code == '02'|| today_Wx_code == '03' || today_Wx_code == '04'){
            var weather_icon = './03-img/flower_weather_cloud_sun.png'
        }else if(today_Wx_code == '05'|| today_Wx_code == '06' || today_Wx_code == '07'){
            var weather_icon = './03-img/flower_weather_cloudy.png'
        }else{
            var weather_icon = './03-img/flower_weather_rain.png'
        };


        var weather_today = document.querySelector('.flower_weather_today')
            weather_today.innerHTML += `
            <div class="flower_weather_today d-flex mb-3 d-xl-none">
                <div class="flower_weather_today_left ">
                    <img src="${weather_icon}" alt="">
                </div>
                <div class="flower_weather_today_right ">
                    <p class="flower_weather_today_current_temp">${today_T}&deg;C</p>
                    <div class="flower_weather_today_date mb-2 d-xl-flex">
                        <span class="flower_weather_today_date_md">03.19</span>
                        <span class="flower_weather_today_date_w">星期一</span>
                    </div>
                    <div class="flower_weather_today_max_min_temp mb-2">
                        <span class="flower_weather_today_max_temp">${today_MaxT}&deg;C</span>
                        <span class="flower_weather_today_min_temp">${today_MinT}&deg;C</span>
                    </div>
                    <p class="flower_weather_today_rain_chance mb-2">降雨機率 ${today_pop}%</p>
                    <p class="flower_weather_today_comfort">${today_Wx}</p>
                </div>
            </div>
            `

    });
</script>

@endsection
