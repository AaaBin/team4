@extends('layouts.app')


@section('css')
{{-- data table --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection



@section('content')
<div class="container">
    <h2>Customer Info</h2>
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#create_collapse" role="button" aria-expanded="false"
            aria-controls="create_collapse">
            new customer data
        </a>
    </p>
    {{-- 摺疊，新增區塊 --}}
    <div class="collapse" id="create_collapse">
        <div class="card card-body">

            <form method="POST" action="/admin/customer" enctype="multipart/form-data">
                @csrf
                <div class="form-row ">
                    <div class="form-group col">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group col">
                        <label for="phone">Phone</label>
                        <input class="form-control" type="text" min="0" name="phone" id="phone" required>
                    </div>
                    <div class="form-group col">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" min="0" name="email" id="email" required>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>

    <hr>
    <table id="example" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Order</th>
                <th style="width:200px;">edit/delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($all_customer_datas as $item)
            <tr id="data_{{$item->id}}">
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#order_detail{{$item->id}}">
                        order detail
                    </button>
                </td>
                <td>
                    {{-- 修改、刪除 --}}
                    <a class="btn col-12 btn-block btn-sm btn-primary" data-toggle="collapse"
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

    {{-- 摺疊，編輯區塊 --}}
    @foreach ($all_customer_datas as $item)
    <div class="collapse py-5" id="edit_collapse{{$item->id}}">
        <div class="card card-body">
            <form method="POST" action="/admin/customer/{{$item->id}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-row ">
                    <div class="form-group col">
                        <label for="name{{$item->id}}">Name</label>
                        <input type="text" class="form-control" id="name{{$item->id}}" name="name"
                            value="{{$item->name}}" required>
                    </div>
                    <div class="form-group col">
                        <label for="phone{{$item->id}}">Phone</label>
                        <input class="form-control" type="text" min="0" name="phone" id="phone{{$item->id}}"
                            value="{{$item->phone}}" required>
                    </div>
                    <div class="form-group col">
                        <label for="email{{$item->id}}">Email</label>
                        <input class="form-control" type="text" min="0" name="email" id="email{{$item->id}}"
                            value="{{$item->email}}" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" data-toggle="collapse" href="#edit_collapse{{$item->id}}">cancel</a>
            </form>
        </div>
    </div>
    @endforeach

</div>
@foreach ($all_customer_datas as $item)
<!-- 彈出視窗 -->
<div class="modal fade" id="order_detail{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">訂單狀態:{{$item->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Camp:</h3>
                @if ($item->camp == "[]")
                <p>this customer do not have any camping order</p>
                @else
                @foreach ($item->camp as $camp_item)
                <div class="card p-4 my-2 border-secondary">
                    <?php
                        $check_in_date = explode(' ',$camp_item->check_in_date)[0];
                        $striking_camp_date = explode(' ',$camp_item->striking_camp_date)[0];
                        ?>
                    <div class="row">
                        <p class="col">Camp Order ID:{{$camp_item->id}} </p>
                        <p class="col">Check in date:{{$check_in_date}}</p>
                        <p class="col">Adult:{{$camp_item->adult}}</p>

                    </div>
                    <div class="row">
                        <p class="col">Customer ID:{{$camp_item->customer_id}}</p>
                        <p class="col">Striking camp date:{{$striking_camp_date}}</p>
                        <p class="col">Child:{{$camp_item->child}}</p>
                    </div>
                    <div class="row">
                        <p class="col">Name:{{$camp_item->customer->name}}</p>
                        <p class="col">Campsite type:{{$camp_item->campsite_type}}</p>
                        <p class="col"></p>
                    </div>
                    <div class="row">
                        <p class="col"></p>
                        <p class="col">Equipment need:{{$camp_item->equipment_need}}</p>
                        <p class="col"></p>
                    </div>
                    <b>
                        <p>Payment condition:{{$camp_item->payment_condition}}</p>
                    </b>
                    <p>Remark:
                        <span class="card p-2">{{$camp_item->remark}}</span>
                    </p>
                </div>
                @endforeach
                @endif
                <hr>
                <h3>Resrtautant:</h3>
                @if ($item->restaurant == "[]")
                <p>this customer do not have any restaurant order</p>
                @else
                @foreach ($item->restaurant as $restaurant_item)
                <div class="card p-4 my-2 border-secondary">
                    <?php
                        $restaurant_date = explode(' ',$restaurant_item->date)[0];
                        $restaurant_time = explode(' ',$restaurant_item->date)[1];
                        ?>
                    <div class="row">
                        <p class="col">Restautant Order ID:{{$restaurant_item->id}} </p>
                        <p class="col">Date:{{$restaurant_date}}</p>
                        <p class="col">Total number:{{$restaurant_item->total_number}}</p>

                    </div>

                    <div class="row">
                        <p class="col">Customer ID:{{$restaurant_item->customer_id}}</p>
                        <p class="col">Time:{{$restaurant_time}}</p>
                        <p class="col">Vegetarian number:{{$restaurant_item->vegetarian_number}}</p>
                    </div>
                    <div class="row">
                        <p class="col-4">Name:{{$restaurant_item->customer->name}}</p>
                        <p class="col-4">Time session:{{$restaurant_item->time_session}}</p>
                    </div>
                    <b>
                        <p>Payment condition:{{$restaurant_item->payment_condition}}</p>
                    </b>
                    <p>Remark:
                        <span class="card p-2">{{$restaurant_item->remark}}</span>
                    </p>
                </div>
                @endforeach
                @endif
                <hr>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach



@endsection
@section('js')
{{-- 接入js，並初始化datatables --}}
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [[ 0, "desc" ]]
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
            text: "Once deleted, you will not be able to recover it. And the order of this customer will be delete too. Make sure this customer data is not using",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                axios.delete(`/admin/customer/${id}`)
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
        }, 500);
    }
</script>
@endsection
