<?php $__env->startSection('css'); ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>IG 圖片</h2>
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#create_collapse" role="button" aria-expanded="false"
            aria-controls="create_collapse">
            new IG img
        </a>
    </p>
    
    <div class="collapse" id="create_collapse">
        <div class="card card-body">
            <form method="POST" action="/admin/ig_img" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="img_url">IMG URL</label>
                    <input type="text" class="form-control" id="img_url" name="img_url" required>
                </div>
                <div class="form-group">
                    <label for="sort">Sort</label>
                    <input class="form-control" type="number" min="0" name="sort" id="sort" required
                        style="width:100px">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <hr>
    <table id="example" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
                <th>IMG URL</th>
                <th>sort</th>
                <th  style="width:200px;">sort up/down</th>
                <th  style="width:200px;">edit/delete</th>
            </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $all_Ig_img_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr id="data_<?php echo e($item->id); ?>">
                <td class="vedio_area" style="width:200px;">
                    <img src="<?php echo e($item->img_url); ?>" alt="" style="width:100%;">
                </td>
                <td data-sort_id='<?php echo e($item->id); ?>'><?php echo e($item->sort); ?></td>
                <td>
                    
                    <a href="#"  class="btn btn-outline-info btn-sm col-12 btn-block" onclick="sort_up(<?php echo e($item->sort); ?>,<?php echo e($item->id); ?>)">Up</a>
                    <a data-btn_id="<?php echo e($item->id); ?>" href="#" class="btn btn-outline-info btn-sm col-12 btn-block"
                        onclick="too_small(<?php echo e($item->sort); ?>,<?php echo e($item->id); ?>);">Down</a>
                </td>
                <td>
                    
                    <a class="btn col-12 btn-block btn-sm btn-primary" data-toggle="collapse"
                        href="#edit_collapse<?php echo e($item->id); ?>" role="button" onclick="move_to_edit(<?php echo e($item->id); ?>)">修改</a>
                    <a id="move_to_edit<?php echo e($item->id); ?>" class="d-none" href="#edit_collapse<?php echo e($item->id); ?>"></a>

                    
                    <a href="#" class="btn col-12 btn-block btn-sm btn-danger"
                        onclick="event.preventDefault();show_confirm(`<?php echo e($item->id); ?>`)">刪除</a>
                </td>
            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>

    
    <?php $__currentLoopData = $all_Ig_img_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="collapse py-5" id="edit_collapse<?php echo e($item->id); ?>">
        <div class="card card-body">
            <form method="POST" action="/admin/ig_img/<?php echo e($item->id); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <p>OLD IMG: </p>
                <div class="card justify-content-center align-items-center p-3">
                    <img class="rounded" src="<?php echo e($item->img_url); ?>" alt="" style="width:500px">
                </div>
                <div class="form-group">
                    <label for="img_url">IMG URL</label>
                    <input type="text" class="form-control" id="img_url" name="img_url" value="<?php echo e($item->img_url); ?>" required>
                </div>
                <div class="form-group">
                    <label for="sort">Sort</label>
                    <input class="form-control" type="number" min="0" name="sort" id="sort" value="<?php echo e($item->sort); ?>" required style="width:100px">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" data-toggle="collapse" href="#edit_collapse<?php echo e($item->id); ?>">cancel</a>
            </form>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [[ 1, "desc" ]]
            });
        });
</script>

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
                axios.delete(`/admin/ig_img/${id}`)
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

<script>
    // ajax csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    // 在index頁更改sort時，及時更新畫面排序
    function too_small(i,k){
        let sort_value_now = $(`td[data-sort_id=${k}]`)[0].innerHTML;
        console.log(sort_value_now);
        // onclick時，傳來現有索引值跟動作物件的id，判斷若索引值小於1，則跳出警告，不進行更改
        if (sort_value_now < 1) {
            alert("the min. sort value is 0,cann't be smaller");
        } else {
            // 若索引值大於1，以ajax送出資料(post)
            $.ajax({
            type:"POST",
            url:`/admin/ig_img/sort_down`,
            // 送出的值為點擊到的這筆資料的id
            data:{data_id:k},
            success:function(result){
                console.log(result);
                // 那麼就只需要抓到被點擊到的資料是哪一筆，並以innerHTML的方法更改「網頁中」sort欄位的值
                let on_change_sort = $(`td[data-sort_id=${k}]`)[0];
                on_change_sort.innerHTML = result[0];
                // 若有第三筆，則是代表這次的動作是兩筆資料的索引值互換，第三筆資料為互換對象的id
                // 所以要抓到互換索引值的對象，並同樣以innerHTML的方法更改「網頁中」sort欄位的值
                if (result.length == 3){
                    let target_id = result[2];
                    let on_change_sort2 = $(`td[data-sort_id=${target_id}]`)[0];
                    on_change_sort2.innerHTML = result[1];
                }

                // 最後重新將datatable初始化，以達成即時重新排序的目的
                $('#example').DataTable({
                "order": [[ 1, "desc" ]],
                // 初始化須加上destroy:true，讓datatable將資料刪除重來
                destroy:true,
                });
            }
            });
        }
    }
    function sort_up(i,k){
            // 若索引值大於1，以ajax送出資料(post)
            $.ajax({
            type:"POST",
            url:`/admin/ig_img/sort_up`,
            // 送出的值為id
            data:{data_id:k},
            success:function(result){
                console.log("success",result);
                let on_change_sort = $(`td[data-sort_id=${k}]`)[0];
                on_change_sort.innerHTML = result[0];
                let target_id = result[2];

                if (result.length == 3){
                    let on_change_sort2 = $(`td[data-sort_id=${target_id}]`)[0];
                    on_change_sort2.innerHTML = result[1];
                }


                $('#example').DataTable({
                "order": [[ 1, "desc" ]],
                destroy:true,
                });
            }
            });
    }
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\GitHub\team4\Team4\resources\views/admin/ig_img/index.blade.php ENDPATH**/ ?>