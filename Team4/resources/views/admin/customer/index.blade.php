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
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}" required>
                    </div>
                    <div class="form-group col">
                        <label for="phone">Phone</label>
                        <input class="form-control" type="text" min="0" name="phone" id="phone" value="{{$item->phone}}" required>
                    </div>
                    <div class="form-group col">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" min="0" name="email" id="email" value="{{$item->email}}" required>
                    </div>
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
            text: "Once deleted, you will not be able to recover it. Make sure this video is not using",
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
