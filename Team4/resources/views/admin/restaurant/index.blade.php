@extends('layouts.app')


@section('css')
{{-- data table --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
{{-- summernote --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<!-- fullcalendar -->
<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/core@4.4.0/main.min.css">
<!-- fullcalendar core -->
<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/core@4.4.0/main.min.css">
<!-- fullcalendar day grid -->
<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/daygrid@4.4.0/main.min.css">
{{-- time grid --}}
<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/timegrid@4.4.0/main.min.css">
{{-- timepicker --}}
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

<style>
    .fc-event-container{
        cursor: pointer;
    }
</style>
@endsection



@section('content')
<div class="container">
    <h2>用餐預約表單</h2>
</div>
<hr>





{{-- calendar --}}
<div class="container" style="padding:25px 50px">
    <div id="calendar"></div>
</div>


<div class="container">
    {{-- 摺疊，編輯區塊 --}}
    @foreach ($all_restaurant_datas as $item)

    <div class="collapse py-5" id="edit_collapse{{$item->id}}">
        <div class="card card-body">
            <b>
            <p>Order ID:{{$item->id}}</p>
            <p>Customer ID:{{$item->customer_id}}</p>
            <p>Name:</p>
            </b>
            <form method="POST" action="/admin/booking/restaurant/{{$item->id}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-row">
                    <div class="form-group col">
                        <label for="adult{{$item->total_number}}">Total Number</label>
                        <input type="number" min="0" class="form-control" id="total_number{{$item->id}}" name="total_number"
                            value="{{$item->total_number}}" required>
                    </div>
                    <div class="form-group col">
                        <label for="vegetarian_number{{$item->id}}">Vegetarian Number</label>
                        <input type="number" min="0" class="form-control" id="vegetarian_number{{$item->id}}" name="vegetarian_number"
                            value="{{$item->vegetarian_number}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="date{{$item->id}}">Date</label>
                        <input type="date" class="form-control" id="date{{$item->id}}" name="date"
                            value="{{$item->date}}" required>
                    </div>
                    <div class="form-group col">
                        <label for="time{{$item->time}}">Time</label>
                        <select id="time{{$item->id}}" class="form-control form-control-lg "
                            name="time">
                            @if ($item->time == "Breakfast")
                            <option selected>Breakfast</option>
                            <option>Lunch</option>
                            <option>Dinner</option>
                            @else

                            @if ($item->time == "Lunch")
                            <option selected>Lunch</option>
                            <option>Dinner</option>
                            <option>Breakfast</option>
                            @else
                            <option selected>Dinner</option>
                            <option>Lunch</option>
                            <option>Breakfast</option>
                            @endif

                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="payment_condition{{$item->id}}">Payment condition</label>
                    <input type="text" class="form-control" name="payment_condition" id="payment_condition{{$item->id}}"
                        value="{{$item->payment_condition}}" required>
                </div>
                <div class="form-group">
                    <label for="remark{{$item->id}}">Remark</label>
                    <textarea type="text" class="form-control" name="remark"
                        id="remark{{$item->id}}">{{$item->remark}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" data-toggle="collapse" href="#edit_collapse{{$item->id}}">cancel</a>
            </form>
        </div>
    </div>
    @endforeach

</div>

<hr>
<div class="table_section p-5">
    <table id="example" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
                <th>customer_id</th>
                <th>total_number</th>
                <th>vegetarian_number</th>
                <th>date</th>
                <th>time</th>
                <th>price</th>
                <th>payment_condition</th>
                <th>remark</th>
                <th style="width:100px">edit/delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($all_restaurant_datas as $item)

            <tr id="data_{{$item->id}}">
                <td>{{$item->customer_id}}</td>
                <td>{{$item->total_number}}</td>
                <td>{{$item->vegetarian_number}}</td>
                <td>{{$item->date}}</td>
                <td>{{$item->time}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->payment_condition}}</td>
                <td>{{$item->remark}}</td>
                <td>
                    {{-- 修改、刪除 --}}
                    <a id="edit_btn{{$item->id}}" class="btn col-12 btn-block btn-sm btn-primary" data-toggle="collapse"
                        href="#edit_collapse{{$item->id}}" role="button" onclick="move_to_edit({{$item->id}})">修改</a>
                    <a id="move_to_edit{{$item->id}}" class="d-none" href="#edit_collapse{{$item->id}}"></a>

                    {{-- 點擊連結→觸發js事件→中斷連結的事件進行，執行指定函式 --}}
                    <a href="#" class="btn col-12 btn-block btn-sm btn-danger"
                        onclick="event.preventDefault();show_confirm(`{{$item->id}}`)">刪除</a>
                </td>
            </tr>

            @endforeach

        </tbody>

    </table>
</div>



{{-- test --}}

@endsection
@section('js')
{{-- timepicker --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
{{-- tootip.js --}}
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>

{{-- 接入js，並初始化datatables --}}
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

{{-- calendar --}}
<!-- moment.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<!-- fullcalendar -->
<script src="https://unpkg.com/@fullcalendar/core@4.4.0/main.min.js"></script>
<!-- core -->
<script src="https://unpkg.com/@fullcalendar/core@4.4.0/main.min.js"></script>
<!-- interaction plugin -->
<script src="https://unpkg.com/@fullcalendar/interaction@4.4.0/main.min.js"></script>
<!-- day grid -->
<script src="https://unpkg.com/@fullcalendar/daygrid@4.4.0/main.min.js"></script>
{{-- time grid --}}
<script src="https://unpkg.com/@fullcalendar/timegrid@4.4.0/main.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [[ 3, "desc" ]]
            });
        });
</script>
{{-- axios --}}
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>
    // confirm函式，跳出視窗警告使用者正在進行刪除行為，若確認，則送出隱藏的表單，執行刪除
    function show_confirm(id){
            swal({
            title: "Delete data",
            text: "Once deleted, you will not be able to recover it. Make sure this video is not using",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                axios.delete(`/admin/booking/restaurant/${id}`)
                .then(function (response) {
                    $(`#data_${id}`).remove();

                    $.each($(`.Order_${id}`),function (i,val) {
                        val.remove();
                    })

                })
                swal("You delete the data.", {
                icon: "success",
                });
            } else {
                swal("You cancel the delete event.");
            }
            });

        }
</script>
{{-- 權重、刪除，及時更新 --}}
<script>
    // ajax csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    // 摺疊區塊不會同時開啟多個
    $('.collapse').on('show.bs.collapse', function () {
        $('*').collapse('hide');
    })
</script>
<script>
    // 點擊修改，畫面移至編輯區塊
    function move_to_edit(id){

        setTimeout(() => {
            $(`#move_to_edit${id}`)[0].click();
        }, 250);


    }
</script>


<script>

    // passing data in js
    // https://stackoverflow.com/questions/30074107/laravel-5-passing-variable-to-javascript
    var all_restaurant_datas = {!! json_encode($all_restaurant_datas,JSON_HEX_TAG) !!};

    all_restaurant_datas.forEach(element => {
        element.title = String(element.customer_id) + ":" + element.date + element.time;
        if (element.time_session == "Lunch") {
            element.start = element.date + "T" + element.time + ":00";
            element.backgroundColor = "#78B399";
        }
        if (element.time_session == "Dinner") {
            element.start = element.date + "T" + element.time + ":00";
            element.backgroundColor = "#FFE4AB";
        }
        if (element.time_session == "Breakfst") {
            element.start = element.date + "T" + element.time + ":00";
            element.backgroundColor = "#B8A783";
        }
        element.className ="Order_" + String(element.id);
        element.allDay = false;
        console.log(element.date + "T" + element.time + ":00");

    });

    // https://fullcalendar.io/docs/event-parsing
    // 添加事件進日曆
    $(document).ready(function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid', 'interaction','timeGrid'],
                // 讓日曆可被點選，單這一個只有顏色，沒有其他效果
                selectable: true,
                // 設定行事曆顯示模式，月份或是週、日等
                defaultView: 'timeGridWeek',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridWeek,timeGridDay'
                },
                eventLimit: true,
                eventRender: function(info) {
                    tippy(info.el, {
                        delay:[100,200],
                        arrow:true,
                        allowHTML:true,
                        content: `<b>customer</b> : ${info.event.extendedProps.customer_id} <br> <b>payment condition</b> : ${info.event.extendedProps.payment_condition}`,
                    });
                },
                events: all_restaurant_datas,
                eventClick:function(info){
                    let order_id = info.event.id;
                    $(`#edit_btn${order_id}`).click();
                }
            });

            calendar.render();

    })

</script>
<script>
    // test timepicker
    $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 15,
        minTime: '1',
        maxTime: '6:00pm',
        defaultTime: '1',
        startTime: '12:00',
        dynamic: true,
        dropdown: true,
        scrollbar: false
    });
</script>
@endsection
