@extends('layouts/nav')

@section('css')
<link rel="stylesheet" href="{{asset('css/booking_record_style.css')}}">
@endsection

@section('content')


<div class="all pt-5">
    <div class="nav"></div>


    <div class="bookingrecord_userdata container  ">
        <div class="bookingrecord_userdata_inner col-xl-6 col-md-12 col-12">
            <div class="bookingrecord_userdata_inner_text ">
                <div class="bookingrecord_userdata_inner_text_R">
                    <h2>訂 位</h2>
                    <h2>紀 錄</h2>
                </div>
                <div class="bookingrecord_userdata_inner_text_L">
                    <p>姓 名 / 姓名姓名</p>
                    <p>電 話 / 電話電話</p>
                    <p>E-mail / 123456@gmail.com</p>
                </div>
            </div>

        </div>
    </div>

    <div class="bookingrecord_data ">
        <div class="container d-flex justify-content-around">
            <div class="bookingrecord_data_inner  d-flex col-12 col-md-6 col-xl-5 ">
                <div class="inner_L d-flex">
                    <img src="{{asset('img/booking_record/booking_terrace.svg')}}" alt="">
                </div>
                <div class="inner_Mid d-flex">
                    <div class="inner_Mid_line"></div>
                </div>
                <div class="inner_R d-flex">
                    <div class="inner_R_top">
                        <span>營區類型</span>
                        <p>小涼亭 400元/日</p>
                    </div>
                    <div class="inner_R_mid d-flex">
                        <div class="inner_R_mid_left">
                            <span>入住人數</span>
                            <p>大人2位<p>
                                    <p>小孩2位</p>
                        </div>
                        <div class="inner_R_mid_right">
                            <span>入住時間</span>
                            <p>4月1日入住<p>
                                    <p>4月3日拔營</p>
                        </div>
                    </div>
                    <div class="inner_R_btm d-flex">
                        <div>
                            <span>備註</span>
                        </div>
                        <p>租用露營器材</p>
                    </div>
                </div>
            </div>
            <div class="bookingrecord_data_inner d-flex col-xl-5 col-md-6 col-12">
                <div class="inner_L d-flex">
                    <img src="{{asset('img/booking_record/booking_dish.svg')}}" alt="">
                </div>
                <div class="inner_Mid d-flex">
                    <div class="inner_Mid_line"></div>
                </div>
                <div class="inner_R d-flex">
                    <div class="inner_R_top">
                        <span>用餐時間</span>
                        <p>4月2日12:00</p>
                    </div>
                    <div class="inner_R_mid d-flex">
                        <div class="inner_R_mid_left">
                            <span>用餐人數</span>
                            <p>4位<p>

                        </div>
                        <div class="inner_R_mid_right">
                            <span>茹素人數</span>
                            <p>2位</p>
                        </div>
                    </div>
                    <div class="inner_R_btm d-flex">
                        <div>
                            <span>備註</span>
                        </div>
                        <p>預約導覽</p>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>

@endsection

@section('js')

@endsection
