@extends('layouts/nav')

@section('css')
<link rel="stylesheet" href="{{asset('css/booking_record_style.css')}}">
<style>
    .booking_record_search .container {
        max-width: 300px;
        padding: 150px 0 50px 0;
    }

    .booking_record_search input:focus {
        border-color: #F2A300;
        box-shadow: 0 0 0 0.1rem #F2A300;
    }

    .booking_record_search .container form button {
        background-color: #F2A300;
    }

    .booking_record_search .container form button:focus {
        box-shadow: 0 0 0 0.1rem #F2A300;
    }
    .bookingrecord_userdata_inner {
        margin: auto;
    }
</style>
@endsection

@section('content')

<div class="booking_record_search">
    <div class="container">
        <h3>查詢訂單</h3>
        <form action="/booking_record_search" method="POST">
            @csrf
            <div class="form-group">
                <label for="search_email">輸入Email:</label>
                <input type="email" class="form-control" id="search_email" name="search_email">
            </div>
            <button type="submit" class="btn">Submit</button>
            @error('search_email')
            <span class="d-block my-2" role="alert">
                <strong>查詢不到此Email帳號有預約資訊，請確認輸入內容是否正確。</strong>
            </span>
            @enderror
        </form>
    </div>
</div>

<div class="all pt-5">

    @if (session('customer'))
    <div class="bookingrecord_userdata container  ">
        <div class="bookingrecord_userdata_inner col-xl-6 col-md-12 col-12">
            <div class="bookingrecord_userdata_inner_text ">
                <div class="bookingrecord_userdata_inner_text_R">
                    <h2>訂 位</h2>
                    <h2>紀 錄</h2>
                </div>

                <div class="bookingrecord_userdata_inner_text_L">
                    <p>姓 名 / {{session('customer')->name}}</p>
                    <p>電 話 / {{session('customer')->phone}}</p>
                    <p>E-mail / {{session('customer')->email}}</p>
                </div>
            </div>

        </div>
    </div>
    @endif


    <div class="bookingrecord_data ">
        <div class="container d-flex justify-content-around">
            @if (session('camp') != null)

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
                        <p>{{session('camp')->campsite_type}}</p>
                    </div>
                    <div class="inner_R_mid d-flex">
                        <div class="inner_R_mid_left">
                            <span>入住人數</span>
                            <p>大人{{session('camp')->adult}}位<p>
                                    <p>小孩{{session('camp')->child}}位</p>
                        </div>
                        <div class="inner_R_mid_right">
                            <span>入住時間</span>
                            <?php
                            $check_in_date_table = explode(' ',session('camp')->check_in_date)[0];
                            $striking_camp_date_table = explode(' ',session('camp')->striking_camp_date)[0];
                            ?>
                            <p>{{$check_in_date_table}}入住<p>
                                    <p>{{$striking_camp_date_table}}拔營</p>
                        </div>
                    </div>
                    <div class="inner_R_btm">
                        <div>
                            <span>備註:{{session('camp')->remark}}</span>
                        </div>
                        <div>
                        <span>租用露營器材:{{session('camp')->equipment_need}}</span>
                        </div>
                    </div>
                </div>
            </div>

            @endif
            @if (session('restaurant') != null)
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
                        <p>{{session('restaurant')->date}}</p>
                        <p>{{session('restaurant')->time}}</p>
                    </div>
                    <div class="inner_R_mid d-flex">
                        <div class="inner_R_mid_left">
                            <span>用餐人數</span>
                            <span>{{session('restaurant')->total_number}}位<span>
                        </div>
                        <div class="inner_R_mid_right">
                            <span>茹素人數</span>
                            <span>{{session('restaurant')->vegetarian_number}}位</span>
                        </div>
                    </div>
                    <div class="inner_R_btm ">
                        <div>
                            <span>備註:{{session('restaurant')->remark}}</span>
                        </div>
                        <div>
                            <span>預約導覽:{{session('restaurant')->guide_need}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>

    </div>


</div>



@endsection

@section('js')

@endsection
