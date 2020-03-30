@extends('layouts/nav')

{{-- CSS --}}
@section('css')
<link rel="stylesheet" href="{{asset('css/traffic_style.css')}}">
@endsection

{{-- 內容 --}}
@section('content')
<div class="traffic_all_container container">
    <div class="traffic_map col-12 mx-auto row">
        <div class="traffic_map_title col-12 d-flex justify-content-center my-3">
            <h2>Visit Us</h2>
        </div>
        <div class="col-2"></div>
        <div class="traffic_map_fig col-8 d-flex justify-content-center">
            <iframe class="traffic_map_iframe"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3640.635836399158!2d120.84537231373507!3d24.149423879335277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34691f0ae4e1df07%3A0x43b0ae38c6e68d30!2z5rKQ5b-D5rOJ5LyR6ZaS6L6y5aC0!5e0!3m2!1szh-TW!2stw!4v1585301246947!5m2!1szh-TW!2stw"
                frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>

    <!-- /*沐心泉休閒農場 */ -->
    <div class="traffic_adress">
        <!-- <div class="col-1"></div> -->
        <div class="traffic_adress_title col-8 mx-auto">
            <p><b>沐心泉休閒農場</b></p>
            <br>
            <p>426台中市新社區中和里中興街60號</p>
            <p>04-25931201</p>
            <br>
            <p>若您對於交通資訊有任何疑問，歡迎您來電諮詢，我們將會有專人為您服務。</p>
        </div>
    </div>
    <!-- /*大眾運輸前往 */ -->
    <div class="traffic_public_transport ">
        <div class="traffic_public_transport_title col-8 mx-auto">
            <p><b>大眾運輸前往</b></p>
        </div>
        <div class="section_north col-8 mx-auto">
            <div class="row ">
                <div class="block_left col-1">
                    <p>北下</p>
                </div>
                <div class="block_right col-9">
                    <p>&#8594&#8194搭乘客運火車到"豐原火車站"(站前往左前方步行到豐原客運</p>
                    <p>&#8594&#8194搭乘公車至"中興嶺"站(豐原客運91)</p>
                    <p>&#8594&#8194轉計程車或接駁車</p>
                </div>
            </div>
        </div>
        <div class="section_north col-8 mx-auto">
            <div class="row ">
                <div class="block_left col-1">
                    <p>南上</p>
                </div>
                <div class="block_right col-10">
                    <p>&#8594&#8194搭乘客運火車到"台中火車站"(步行到站前廣場)</p>
                    <p>&#8594&#8194搭乘公車至"中興嶺"站(豐原客運270、271、276、277；統聯客運31)</p>
                    <p>&#8594&#8194轉計程車或接駁車</p>
                </div>
            </div>
        </div>
        <div class="section_timetable col-8 mx-auto">
            <div class="row ">
                <div class="col-2"></div>
                <div class="block_left col-4">
                    <a href="http://www.fybus.com.tw/bus8.htm">
                        <img src="{{asset('img/traffic/bus_icon_F.svg')}}" alt="豐原客運時刻表" class="mb-4" width="70%">
                    </a>
                    <p>豐原客運時刻表</p>
                </div>
                <div class="block_right col-4">

                    <a href="http://www.ubus.com.tw/upload/citybusmap/taichung/map/31L.jpg">
                        <img src="{{asset('img/traffic/bus_icon_T.svg')}}" alt="統聯客運時刻表" class="mb-4" width="70%">
                    </a>
                    <p>統聯客運時刻表</p>

                </div>
            </div>
        </div>
        <!-- 中興嶺站轉乘接駁車 -->
        <div class="section_zhongxingling col-8 mx-auto">
            <div class="row ">
                <div class="col-2"></div>
                <div class="block_left col-2 col-4">
                    <img src="{{asset('img/traffic/small_bus_icon.svg')}}" alt="中興嶺站轉乘" width="60%">

                </div>
                <div class="block_right col-4 col-lg-5">
                    <p>接駁業者資訊</p>
                    <p>紫色故鄉.幸福小鎮 新社接駁車</p>
                    <p>聯絡人：小許</p>
                    <p>0911-88-5230</p>
                    <p>0910-956-339</p>
                    <a href="">
                        <img width="30" src="{{asset('img/traffic/FB_icon.svg')}}" alt="FB_icon" class="mr-2">
                    </a>
                    <a href="">
                        <img width="30" src="{{asset('img/traffic/mail_icon.svg')}}" alt="mail_icon">
                    </a>

                </div>
            </div>
        </div>
    </div>
    <!-- IG connect -->
    <div class="ig_connect mx-auto">
        <div class="ig_connect_title col-12 d-flex justify-content-center ">
            <h2>View</h2>
        </div>
        <div class="ig_connect_row row col-md-10 col-12 mx-auto ">
            <div class="ig_connect_fig col-md-2 col-4">
                <a href="https://www.instagram.com/p/B8llMWnBhAt/"><img src="{{asset('img/traffic/B8llMWnBhAt.jpg')}}" alt=""
                        class="img-fluid"></a>

            </div>
            <div class="ig_connect_fig col-md-2 col-4">
                <a href="https://www.instagram.com/p/B6DBmbZAN8l/"><img src="{{asset('img/traffic/B6DBmbZAN8l.jpg')}}" alt=""
                        class="img-fluid"></a>
            </div>
            <div class="ig_connect_fig col-md-2 col-4">
                <a href="https://www.instagram.com/p/BlFmJK-nZ9Q/"><img src="{{asset('img/traffic/BlFmJK-nZ9Q.jpg')}}" alt=""
                        class="img-fluid"></a>
            </div>
            <div class="ig_connect_fig col-2 d-none d-md-block">
                <a href="https://www.instagram.com/p/Bm_E41nnhrP/"><img src="{{asset('img/traffic/Bm_E41nnhrP.jpg')}}" alt=""
                        class="img-fluid"></a>
            </div>
            <div class="ig_connect_fig col-2 d-none d-md-block">
                <a href="https://www.instagram.com/p/B6KRKnIpFNs/"><img src="{{asset('img/traffic/B6KRKnIpFNs.jpg')}}" alt=""
                        class="img-fluid"></a>
            </div>
            <div class="ig_connect_fig col-2 d-none d-md-block">
                <a href="https://www.instagram.com/p/B5wLA4AHbIX/"><img src="{{asset('img/traffic/B5wLA4AHbIX.jpg')}}" alt=""
                        class="img-fluid"></a>
            </div>


        </div>

    </div>


</div>
@endsection

{{-- js --}}
@section('js')

@endsection
