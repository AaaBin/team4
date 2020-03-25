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
@endsection



@section('content')
<div class="container">
    <h2>營區預約表單</h2>
    {{-- <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#create_collapse" role="button" aria-expanded="false"
            aria-controls="create_collapse">
            new camp booking list
        </a>
    </p> --}}
</div>



{{-- calendar --}}
<div class="container">
    <div id="calendar"></div>
</div>


{{-- 摺疊，新增區塊 --}}
{{-- <div class="collapse" id="create_collapse">
        <div class="card card-body">
            <form method="POST" action="/admin/flower" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="customer_id">Customer id</label>
                    <input type="text" class="form-control" id="customer_id" name="customer_id" required>
                </div>
                <div class="form-group">
                    <label for="adult">Adult</label>
                    <input type="number" min="0" class="form-control" id="adult" name="adult" required>
                </div>
                <div class="form-group">
                    <label for="child">Child</label>
                    <input type="number" min="0" class="form-control" id="child" name="child" required>
                </div>
                <div class="form-group">
                    <label for="check_in_date">Check in date</label>
                    <input type="date" class="form-control" name="check_in_date" id="check_in_date" required>
                </div>
                <div class="form-group">
                    <label for="striking_camp_date">Striking camp date</label>
                    <input type="date" class="form-control" name="striking_camp_date" id="striking_camp_date" required>
                </div>
                <div class="form-group">
                    <label for="campsite_type">Campsite type</label>
                    <select class="form-control form-control-lg">
                        <option>Grass</option>
                        <option>Pavilion</option>
                    </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="equipment_need">
                    <label class="form-check-label" for="equipment_need">
                        Equipment need
                    </label>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div> --}}

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
                <td>{{$item->check_in_date}}</td>
                <td>{{$item->striking_camp_date}}</td>
                <td>{{$item->campsite_type}}</td>
                <td>{{$item->equipment_need}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->payment_condition}}</td>
                <td>{{$item->remark}}</td>
                <td>
                    {{-- 修改、刪除 --}}
                    <a class="btn col-12 btn-block btn-sm btn-primary" data-toggle="collapse"
                        href="#edit_collapse{{$item->id}}" role="button" onclick="move_to_edit({{$item->id}})">修改</a>
                    <a id="move_to_edit{{$item->id}}" class="d-none" href="#edit_collapse{{$item->id}}"></a>

                    {{-- 點擊連結→觸發js事件→中斷連結的事件進行，執行指定函式 --}}
                    <a href="#" class="btn col-12 btn-block btn-sm btn-danger"
                        onclick="event.preventDefault();show_confirm(`{{$item->id}}`)">刪除</a>
                    <form id="delete_form{{$item->id}}" action="/admin/image_home/{{$item->id}}" method="POST"
                        style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </td>
            </tr>

            @endforeach

        </tbody>

    </table>
</div>

<div class="container">
    {{-- 摺疊，編輯區塊 --}}
    @foreach ($all_camp_datas as $item)
    <div class="collapse py-5" id="edit_collapse{{$item->id}}">
        <div class="card card-body">
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
                            value="{{$item->check_in_date}}" required>
                    </div>
                    <div class="form-group col">
                        <label for="striking_camp_date{{$item->id}}">Striking camp date</label>
                        <input type="date" class="form-control" name="striking_camp_date"
                            id="striking_camp_date{{$item->id}}" value="{{$item->striking_camp_date}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="campsite_type{{$item->id}}">Campsite type</label>
                        <select id="campsite_type{{$item->id}}" class="form-control form-control-lg "
                            name="campsite_type">
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
                        <select id="equipment_need{{$item->id}}"
                            class="form-control form-control-lg equipment_need_select" name="equipment_need">
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

                <div class="form-group">
                    <label for="payment_condition{{$item->id}}">Payment condition</label>
                    <input type="text" class="form-control" name="payment_condition" id="payment_condition{{$item->id}}"
                        value="{{$item->payment_condition}}" required>
                </div>
                <div class="form-group">
                    <label for="remark{{$item->id}}">Remark</label>
                    <textarea type="text" class="form-control" name="remark" id="remark{{$item->id}}">{{$item->remark}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" data-toggle="collapse" href="#edit_collapse{{$item->id}}">cancel</a>
            </form>
        </div>
    </div>
    @endforeach

</div>


@endsection
@section('js')
{{-- summernote --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
{{-- summernote語言包 --}}
<script src="{{asset('js/summernote-zh-TW.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            minHeight:300,
            lang: 'zh-TW', //更改語言
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
            ],
        });
    })
</script>

{{-- 接入js，並初始化datatables --}}
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
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
            text: "Once deleted, you will not be able to recover it. Make sure this video is not using",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                axios.delete(`/admin/booking/camp/${id}`)
                .then(function (response) {
                    $(`#data_${id}`).remove();
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
<script>
    

    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['dayGrid', 'interaction'],
            // 讓日曆可被點選，單這一個只有顏色，沒有其他效果
            selectable: true,
            // 設定行事曆顯示模式，月份或是週、日等
            // defaultView: 'dayGridWeek',
            // 添加事件進日曆
            events: [
                { // this object will be "parsed" into an Event Object
                    title: 'The Title', // a property!
                    start: '2020-03-24', // a property!
                    end: '2020-03-27' ,// a property! ** see important note below about 'end' **
                    className:"hello",
                }
            ],
            dateClick: function (info) {
                alert('Clicked on: ' + info.dateStr);
                // change the day's background color just for fun
                info.dayEl.style.backgroundColor = 'green';
            }
        });

        calendar.render();
    });


</script>
@endsection
