@extends('layouts/nav')

{{-- CSS --}}
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- timepicker -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<link rel="stylesheet" href="{{asset('css/booking_style.css')}}">
@endsection

{{-- 內容 --}}
@section('content')
<div class="container_all " style="padding-top:240px;">

    <!-- Campsite & Restaurant         -->
    <div class="booking_first">
        <div class="booking_first_container col-12 col-md-10 mx-auto container_limit">
            <div class="booking_first_title col-12 col-md-10 mx-auto d-flex justify-content-center">
                Campsite & Restaurant
            </div>
            <div class="booking_first_fig col-12 col-md-10 mx-auto d-flex justify-content-center " data-aos="fade-up"
                data-aos-duration="2000">
            <img width="100%" src="{{asset('img/booking/白雪木-1.jpg')}}" alt="">
            </div>
        </div>
    </div>
    <!-- 露營 -->
    <div class="booking_camping">
        <div class="booking_camping_container col-12 mx-auto container_limit">
            <div class="booking_camping_row col-12 row ">
                <div class="block_left col-12 col-xl-3">
                    <div class="block_left_container">
                        <div class="block_left_title">
                            <b>露 營</b>
                        </div>
                        <div class="block_left_color"></div>
                    </div>
                </div>
                <div class="block_right col-12 col-xl-8  offset-col-xl-1">
                    <div class="block_right_content col-11 col-md-10 mx-auto">
                        <p>天然美景，山嵐飄渺、壯麗雲海、迷醉的夕陽景色，彷彿置身魔幻仙境。</p>
                        <br>
                        <p>營地分有涼亭營位與草地營位，分別位於餐廳下方平台與半山腰處，共可容納約30帳，營位配備完善，備有水電、浴廁數間，車可停在營地旁。</p>
                        <br>
                        <p>* 露營採預約制，不接受臨時客。每年5月~8月不開放露營區。</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="booking_camping_box">
            <div class="booking_camping_fig ">
            </div>
        </div>


    </div>
    <!-- 餐廳 -->
    <div class="booking_restaurant">
        <div class="booking_restaurant_container col-12 mx-auto container_limit">
            <div class="booking_restaurant_row col-12 row">

                <div class="block_left col-12 col-xl-3">
                    <div class="block_left_container">
                        <div class="block_left_title">
                            <b>餐 廳</b>
                        </div>
                        <div class="block_left_color"></div>
                    </div>

                </div>

                <div class="block_right  col-11 col-md-10 col-xl-8 offset-col-xl-1 mx-auto">
                    <p>絕佳的景色與氣氛，訴求在群山環花包圍下用餐；在您品嘗廚房師傅精心烹調的菜式同時，將新社的山、新社的水，新社最美的景色呈現在您眼前。</p>
                    <br>
                    <p>新社美食遠近馳名，其中又以新社沐心泉休閒農場附設餐廳部最為知名。</p>
                    <br>
                    <p>若您捨不得離開這座優美的山林，就留在這個山林裡用餐吧！餐廳裡主人為您預備了精心烹飪的餐點，新鮮的食材，在山林之中和著鳥叫聲的清脆，更是一種不同的用餐感受。</p>
                </div>

            </div>
        </div>
        <div class="booking_restaurant_box">
            <div class="booking_restaurant_fig ">
            </div>
        </div>
    </div>
    <!-- 立即預約 -->
    <div class="booking_rightnow ">
        <div class="booking_rightnow_title col-10 mx-auto d-flex justify-content-center">
            立即預約&#8195;&#8594;
        </div>
        <!-- background -->
        <div class="booking_rightnow_box">
            <!-- <div class="booking_rightnow_fig ">
            </div> -->

            <!-- Major content -->
            <div class="booking_rightnow_container mx-auto ">
                <div class="booking_rightnow_content_all col-12 col-md-12 d-flex mx-auto flex-column flex-md-row">
                    <div class="booking_rightnow_content_user col-12 col-md-4 d-flex flex-row flex-md-column p-3">
                        <div class="booking_rightnow_content_user_block1 ">
                            <div>
                                <p>預約營地及餐廳</p>
                            </div>

                        </div>
                        <div class="booking_rightnow_content_user_block2 ">
                            <form class="form-horizontal" role="form">

                                <div class="form-group">
                                    <!-- <p>姓名</p> -->
                                    <input type="text" class="form-control" id="firstname" placeholder="請輸入姓名"
                                        style="border-radius:5px">
                                </div>
                                <div class="form-group">
                                    <!-- <p>電話</p> -->
                                    <input type="tel" class="form-control" id="firstname" placeholder="請輸入電話"
                                        maxlength="10" style="border-radius:5px">
                                </div>
                                <div class="form-group">
                                    <!-- <p>E-mail</p> -->
                                    <input type="text" class="form-control" id="firstname" placeholder="請輸入E-mail"
                                        style="border-radius:5px">
                                </div>
                            </form>

                        </div>


                    </div>

                    <div class="booking_rightnow_content row d-flex col-12 col-md-8 flex-column flex-md-row">
                        <div class="booking_rightnow_content_tag flex-row flex-md-column flex-wrap">
                            <div class="list-group flex-column tag_v" id="list-tab" role="tablist">
                                <a class="list-group-item   active" id="list-camping-list" data-toggle="list"
                                    href="#list-camping" role="tab" aria-controls="camping"
                                    style="text-decoration:none;">
                                    營地預約
                                </a>
                                <a class="list-group-item  " id="list-restaurant-list" data-toggle="list"
                                    href="#list-restaurant" role="tab" aria-controls="restaurant"
                                    style="text-decoration:none;">餐廳預約</a>

                            </div>

                        </div>

                        <div class="booking_rightnow_content_major ">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-camping" role="tabpanel"
                                    aria-labelledby="list-camping-list">
                                    <form role="form">
                                        <div class="form-group check_in">
                                            <label for="name">入住時間(13-18點入住，11點前拔營)</label>
                                            <input type="text" name="daterange" value="04/01/2020 - 04/03/2020"
                                                style="width:300px;border-radius:5px ;border:solid 1px #F2A300" />
                                        </div>

                                        <div class="form-group">
                                            <label for="name">入住人數</label>
                                            <br>大人 <input type="number" min="0"
                                                style="width:100px;border-radius:5px ;border:solid 1px #F2A300">
                                            小孩 <input type="number" min="0"
                                                style="width:100px;border-radius:5px ;border:solid 1px #F2A300">
                                        </div>


                                        <label for="name">營區類型</label>
                                        <select class="form-control ">
                                            <option>草地 300元/日</option>
                                            <option>涼亭-小 500元/日</option>
                                            <option>涼亭-大 700元/日</option>
                                        </select>
                                        <div class="form-group">
                                            <label for="name">備註</label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="equipment_need">
                                            <label class="form-check-label"
                                                for="equipment_need">租用露營器材(專人將與您聯繫細節)</label>
                                        </div>
                                        <button class="camp_form_btn d-none"></button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="list-restaurant" role="tabpanel"
                                    aria-labelledby="list-restaurant-list">
                                    <form role="form">
                                        <div class="form-group">
                                            <label for="name">用餐時間</label>
                                            <div class="time col-12 d-flex px-0 justify-content-start">
                                                <input class="col-5 form-control mr-2" type="text" name="birthday"
                                                    value="4/01/2020"
                                                    style="border-radius:5px ;border:solid 1px #F2A300">
                                                <input type="text" class="timepicker form-control col-5"
                                                    style="border-radius:5px ;border:solid 1px #F2A300">
                                            </div>


                                            <div class="form-group">
                                                <label for="name">用餐人數</label> <br>
                                                <input type="number" class="form-control" min="0"
                                                    style="width:100px;border-radius:5px ;border:solid 1px #F2A300">
                                            </div>

                                            <div class="form-group">
                                                <label for="name">茹素人數</label> <br>
                                                <input type="number" class="form-control" min="0"
                                                    style="width:100px;border-radius:5px ;border:solid 1px #F2A300">
                                            </div>

                                            <div class="form-group">
                                                <label for="name">備註</label>
                                                <textarea class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="guide_need">
                                            <label class="form-check-label" for="guide_need">預約導覽</label>
                                        </div>
                                        <button class="restaurant_form_btn d-none"></button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- replace end -->



                </div>

                <div class="booking_rightnow_total_price d-flex col-12 col-md-12 my-3">
                    <div class="price_all col-12 col-md-10 col-md-4 d-flex">
                        <div class="price_block1 d-flex">
                            <div class="price_block1_content col-12 col-md-12">
                                <p>合計 <span>600</span> 元</p>
                            </div>
                            <div class="price_block1_color col-12 col-md-12"></div>
                        </div>

                        <div class="price_block2 d-flex">
                            確定送出&#8195;&#8594;
                        </div>
                    </div>


                </div>

            </div>
            <!-- end of major -->
        </div>
        <!-- end of booking_rightnow_box -->

    </div>
    <!-- end of booking_rightnow -->
    <!-- IG start -->
    <!-- IG connect -->
    <div class="ig_connect  mx-auto container_limit">
        <div class="ig_connect_title col-10 d-flex justify-content-center mx-auto ">
            View
        </div>
        <div class="ig_connect_row row col-xl-12 col-md-12 col-12 mx-auto  ">
            <div class="ig_connect_fig col-xl-2 col-md-4 col-4 my-2">
                <a href="https://www.instagram.com/p/B8llMWnBhAt/"><img src="{{asset('img/booking/B8llMWnBhAt.jpg')}}" alt=""
                        class="img-fluid"></a>

            </div>
            <div class="ig_connect_fig col-xl-2 col-md-4 col-4 my-2">
                <a href="https://www.instagram.com/p/B6DBmbZAN8l/"><img src="{{asset('img/booking/B6DBmbZAN8l.jpg')}}" alt=""
                        class="img-fluid"></a>
            </div>
            <div class="ig_connect_fig col-xl-2 col-md-4 col-4 my-2">
                <a href="https://www.instagram.com/p/BlFmJK-nZ9Q/"><img src="{{asset('img/booking/BlFmJK-nZ9Q.jpg')}}" alt=""
                        class="img-fluid"></a>
            </div>
            <div class="ig_connect_fig col-xl-2 col-md-4 col-4 my-2">
                <a href="https://www.instagram.com/p/Bm_E41nnhrP/"><img src="{{asset('img/booking/Bm_E41nnhrP.jpg')}}" alt=""
                        class="img-fluid"></a>
            </div>
            <div class="ig_connect_fig col-xl-2 col-md-4 col-4 my-2">
                <a href="https://www.instagram.com/p/B6KRKnIpFNs/"><img src="{{asset('img/booking/B6KRKnIpFNs.jpg')}}" alt=""
                        class="img-fluid"></a>
            </div>
            <div class="ig_connect_fig col-xl-2 col-md-4 col-4 my-2">
                <a href="https://www.instagram.com/p/B5wLA4AHbIX/"><img src="{{asset('img/booking/B5wLA4AHbIX.jpg')}}" alt=""
                        class="img-fluid"></a>
            </div>
            <!-- col-2 d-none d-md-block -->

        </div>

    </div>
    @endsection

    {{-- js --}}
    @section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!-- timepicker -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>


    <script>
        $('#myList a').on('click', function (e) {
                e.preventDefault()
                $(this).tab('show')
            })
    </script>

    <script>
        $(function () {
                $('input[name="daterange"]').daterangepicker({
                    opens: 'left'
                }, function (start, end, label) {
                    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                });
            });
    </script>
    <script>
        $(function () {
                $('input[name="birthday"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 1996,
                    maxYear: parseInt(moment().format('YYYY'), 10)
                }, function (start, end, label) {
                    var years = moment().diff(start, 'years');
                });
            });
    </script>
    <script>
        // test timepicker
            $('.timepicker').timepicker({
                //24小時，沒有AM PM
                timeFormat: 'HH:mm',
                // 每一選項的間格為30min
                interval: 30,
                // 可選的最小的時間(可單寫時，或是像maxTime寫完整)
                minTime: '06:30',
                // 可選的最大時間
                maxTime: '6:00pm',
                // 預設顯示現在時間
                // defaultTime: '12:00',
                // 選單的開始時間，跟最小時間相互影響，設同樣的最好理解
                startTime: '06:30',
                dynamic: true,
                dropdown: true,
                scrollbar: false
            });
    </script>
    @endsection
