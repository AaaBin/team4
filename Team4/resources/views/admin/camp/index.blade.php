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
{{-- date range picker --}}
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />



<style>
    .fc-event-container {
        cursor: pointer;
    }
</style>
@endsection



@section('content')
<div class="container">
    <h2>營區預約表單</h2>
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#create_collapse" role="button" aria-expanded="false"
            aria-controls="create_collapse">
            new camp booking list
        </a>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </p>
    {{-- 摺疊，新增區塊 --}}
    <div class="collapse" id="create_collapse">
        <p>新增訂單前請先確認已經建立顧客資料，若無顧客資料則無法建立訂單</p>
        <div class="card card-body">
            <form method="POST" action="/admin/booking/camp" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col">
                        <label for="customer_id">Customer id</label>
                        <input type="text" class="form-control" id="customer_id" name="customer_id" required>
                    </div>
                    <div class="form-group col">
                        <label for="adult">Adult</label>
                        <input type="number" min="0" class="form-control" id="adult" name="adult" required>
                    </div>
                    <div class="form-group col">
                        <label for="child">Child</label>
                        <input type="number" min="0" class="form-control" id="child" name="child" value="0" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <label for="camp_date">Check in date</label>
                        <input type="text" class="form-control camp_date_picker" name="camp_date" id="camp_date" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="campsite_type">Campsite type</label>
                        <select class="form-control" name="campsite_type">
                            <option>Grass</option>
                            <option>Small Pavilion</option>
                            <option>Big Pavilion</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="equipment_need">Equipment Need</label>
                        <select class="form-control" name="equipment_need">
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="remark">Remark</label>
                    <textarea class="form-control" name="remark" id="remark" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" data-toggle="collapse">Submit</button>
                <a class="btn btn-secondary" data-toggle="collapse" href="#create_collapse" role="button">Cancel</a>
            </form>
        </div>
    </div>
</div>
<hr>




{{-- calendar --}}
<div class="container my-5">
    <div id="calendar"></div>
</div>


<div class="container">
    {{-- 摺疊，編輯區塊 --}}
    @foreach ($all_camp_datas as $item)

    <div class="collapse py-5" id="edit_collapse{{$item->id}}">
        <div class="card card-body">
            <div class="card p-4 my-2">
                <div class="row">
                    <p class="col">Order ID:{{$item->id}} </p>
                    <?php
                    $check_in_date = explode(' ',$item->check_in_date)[0]
                    ?>
                    <p class="col">Check in date:{{$check_in_date}}</p>
                    <p class="col">Adult:{{$item->adult}}</p>

                </div>
                <div class="row">
                    <p class="col">Customer ID:{{$item->customer_id}}</p>
                    <?php
                    $striking_camp_date = explode(' ',$item->striking_camp_date)[0]
                    ?>
                    <p class="col">Striking camp date:{{$striking_camp_date}}</p>
                    <p class="col">Child:{{$item->child}}</p>
                </div>
                <div class="row">
                    <p class="col">Name:{{$item->customer->name}}</p>
                    <p class="col">Campsite type:{{$item->campsite_type}}</p>
                    <p class="col"></p>
                </div>
                <div class="row">
                    <p class="col"></p>
                    <p class="col">Equipment need:{{$item->equipment_need}}</p>
                    <p class="col"></p>
                </div>
                <b>
                    <p>Payment condition:{{$item->payment_condition}}</p>
                </b>
                <p>Remark:
                    <span class="card p-2">{{$item->remark}}</span>
                </p>
            </div>
            <form method="POST" action="/admin/booking/camp/{{$item->id}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                {{-- <div class="form-group">
                    <label for="customer_id">Customer id</label>
                    <input type="text" class="form-control" id="customer_id" name="customer_id" required>
                </div> --}}
                <div class="form-row">
                    <div class="form-group col">
                        <label for="adult{{$item->id}}">Adult</label>
                        <input type="number" min="0" class="form-control" id="adult{{$item->id}}" name="adult"
                            value="{{$item->adult}}" required>
                    </div>
                    <div class="form-group col">
                        <label for="child{{$item->id}}">Child</label>
                        <input type="number" min="0" class="form-control" id="child{{$item->id}}" name="child"
                            value="{{$item->child}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="check_in_date{{$item->id}}">Check in date</label>
                        <input type="date" class="form-control" id="check_in_date{{$item->id}}" name="check_in_date"
                            value="{{$check_in_date}}" required>
                    </div>
                    <div class="form-group col">
                        <label for="striking_camp_date{{$item->id}}">Striking camp date</label>
                        <input type="date" class="form-control" name="striking_camp_date"
                            id="striking_camp_date{{$item->id}}" value="{{$striking_camp_date}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="campsite_type{{$item->id}}">Campsite type</label>
                        <select id="campsite_type{{$item->id}}" class="form-control  " name="campsite_type">
                            @if ($item->campsite_type == "Grass")
                            <option selected>Grass</option>
                            <option>Small Pavilion</option>
                            <option>Big Pavilion</option>
                            @else

                            @if ($item->campsite_type == "Small Pavilion")
                            <option selected>Small Pavilion</option>
                            <option>Big Pavilion</option>
                            <option>Grass</option>
                            @else
                            <option selected>Big Pavilion</option>
                            <option>Small Pavilion</option>
                            <option>Grass</option>
                            @endif

                            @endif
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="equipment_need{{$item->id}}">Equipment need</label>
                        <select id="equipment_need{{$item->id}}" class="form-control  equipment_need_select"
                            name="equipment_need">
                            @if ($item->equipment_need == "Yes")
                            <option selected>Yes</option>
                            <option>No</option>
                            @else
                            <option selected>No</option>
                            <option>Yes</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="payment_condition{{$item->id}}">Payment condition</label>
                        <select id="payment_condition{{$item->id}}" class="form-control" name="payment_condition">
                            @if ($item->payment_condition == "Ok")
                            <option selected>Ok</option>
                            <option>Not yet</option>
                            @else
                            <option selected>Not yet</option>
                            <option>Ok</option>
                            @endif
                        </select>
                    </div>
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
                <th>adult</th>
                <th>child</th>
                <th>check_in_date</th>
                <th>striking_camp_date</th>
                <th>campsite_type</th>
                <th>equipment_need</th>
                <th>price</th>
                <th>payment_condition</th>
                <th>remark</th>
                <th style="width:100px">edit/delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($all_camp_datas as $item)

            <tr id="data_{{$item->id}}">
                <td>{{$item->customer_id}}</td>
                <td>{{$item->adult}}</td>
                <td>{{$item->child}}</td>
                <?php
                $check_in_date_table = explode(' ',$item->check_in_date)[0];
                $striking_camp_date_table = explode(' ',$item->striking_camp_date)[0];
                ?>

                <td>{{$check_in_date_table}}</td>
                <td>{{$striking_camp_date_table}}</td>

                <td>{{$item->campsite_type}}</td>
                <td>{{$item->equipment_need}}</td>
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


@endsection
@section('js')
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
{{-- date range picker --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [[ 4, "desc" ]]
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
            text: "Once deleted, you will not be able to recover it. Make sure this camp order is not using",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                axios.delete(`/admin/booking/camp/${id}`)
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
    var all_camp_datas = {!! json_encode($all_camp_datas,JSON_HEX_TAG) !!};

    all_camp_datas.forEach(element => {
        element.title = element.customer.name + ":" + element.campsite_type ;
        element.start = element.check_in_date;
        element.end = element.striking_camp_date;
        if (element.campsite_type == "Grass") {
            element.borderColor = "#BEEF9E";
            element.backgroundColor = "#BEEF9E";
        }
        if (element.campsite_type == "Small Pavilion") {
            element.borderColor = "#F4E8D9";
            element.backgroundColor = "#F4E8D9";
        }
        if (element.campsite_type == "Big Pavilion") {
            element.borderColor = "#CCC2B8";
            element.backgroundColor = "#CCC2B8";
        }
        element.className ="Order_" + String(element.id);

    });

    // https://fullcalendar.io/docs/event-parsing
    // 添加事件進日曆
    $(document).ready(function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid', 'interaction'],
                // 讓日曆可被點選，單這一個只有顏色，沒有其他效果
                selectable: true,
                // 設定行事曆顯示模式，月份或是週、日等
                // defaultView: 'dayGridWeek',
                eventLimit: true,
                eventRender: function(info) {
                    tippy(info.el, {
                        delay:[100,200],
                        arrow:true,
                        allowHTML:true,
                        content: `<b>Customer : </b>  ${info.event.extendedProps.customer.name} <br> <b>Payment Condition : </b> ${info.event.extendedProps.payment_condition} <br><b>Equipment Need : </b>${info.event.extendedProps.equipment_need} <br> <b>Adult: </b> ${info.event.extendedProps.adult} <br> <b>Child : </b> ${info.event.extendedProps.child}`,
                    });
                },
                events: all_camp_datas,
                eventClick:function(info){
                    let order_id = info.event.id;
                    $(`#edit_btn${order_id}`).click();
                }
            });

            calendar.render();

    })

</script>
<script>
    $(function () {
        $('.camp_date_picker').daterangepicker({
            opens: 'center'
        }, function (start, end, label) {
            check_in_date = start.format('YYYY-MM-DD');
            striking_camp_date = end.format('YYYY-MM-DD');
            camp_datepicker_code = 1;
        });
    });
</script>
@endsection
