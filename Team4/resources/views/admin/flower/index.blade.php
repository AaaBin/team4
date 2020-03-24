@extends('layouts.app')


@section('css')
{{-- data table --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection



@section('content')
<div class="container">
    <h2>形象首頁</h2>
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#create_collapse" role="button" aria-expanded="false"
            aria-controls="create_collapse">
            new image vedio
        </a>
    </p>
    {{-- 摺疊，新增區塊 --}}
    <div class="collapse" id="create_collapse">
        <div class="card card-body">
            <form method="POST" action="/admin/image_home" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="date_m">Month</label>
                    <input type="text" class="form-control" id="date_m" name="date_m" required>
                </div>
                <div class="form-group">
                    <label for="date_d">Date</label>
                    <input type="text" class="form-control" id="date_d" name="date_d" required>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" name="title" id="title" cols="30" rows="10" required >
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input class="form-control" name="content" id="content" cols="30" rows="10" required >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <hr>
    <table id="example" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
                <th>date_m</th>
                <th>date_d</th>
                <th>title</th>
                <th>content</th>
                <th>edit/delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($all_flower_datas as $item)

            <tr id="data_{{$item->id}}">
                <td>{{$item->date_m}}</td>
                <td>{{$item->date_d}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->content}}</td>
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

    {{-- 摺疊，編輯區塊 --}}
    @foreach ($all_flower_datas as $item)
    <div class="collapse py-5" id="edit_collapse{{$item->id}}">
        <div class="card card-body">
            <form method="POST" action="/admin/image_home/{{$item->id}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="youtube_url{{$item->id}}">Youtube URL</label>
                    <input class="form-control" id="youtube_url{{$item->id}}" name="youtube_url"
                        value="{{$item->youtube_url}}">
                </div>
                <div class="form-group">
                    <label for="video_title_edit{{$item->id}}">Video Title</label>
                    <input type="text" class="form-control" id="video_title_edit{{$item->id}}" name="video_title"
                        value="{{$item->video_title}}">
                </div>
                <div class="form-group">
                    <label for="sort_edit">Sort</label>
                    <input class="form-control" type="number" min="0" value="{{$item->sort}}" name="sort" id="sort_edit"
                        required style="width:100px">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-info" data-toggle="collapse" href="#edit_collapse{{$item->id}}">cancel</a>
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
            "order": [[ 2, "desc" ]]
            });
        });
</script>
{{-- axios --}}
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>
    // confirm函式，跳出視窗警告使用者正在進行刪除行為，若確認，則送出隱藏的表單，執行刪除
        function show_confirm(id){
            let r = confirm("你即將刪除這筆最新消息!");
            if (r == true){
                // document.querySelector(`#delete_form${id}`).submit();
                 // axios delete
                axios.delete(`/admin/image_home/${id}`)
                .then(function (response) {
                    $(`#data_${id}`).remove();
                })
            }
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
<script>

</script>
@endsection
