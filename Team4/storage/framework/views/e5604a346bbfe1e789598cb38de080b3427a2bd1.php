<?php $__env->startSection('css'); ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>花況消息</h2>
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#create_collapse" role="button" aria-expanded="false"
            aria-controls="create_collapse">
            new flower condition
        </a>
    </p>
    
    <div class="collapse" id="create_collapse">
        <div class="card card-body">
            <form method="POST" action="/admin/flower" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required style="width:200px">
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" name="title" id="title" cols="30" rows="10" required>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control summernote" name="content" id="content" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <hr>
    <table id="example" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
                <th>date_y</th>
                <th>date_m</th>
                <th>date_d</th>
                <th>title</th>
                <th>content</th>
                <th style="width:100px">edit/delete</th>
            </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $all_flower_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $date_data = $item->date;
            $date_y = explode('-',$date_data)[0];
            $date_m = explode('-',$date_data)[1];
            $date_d = explode('-',$date_data)[2];

            ?>
            <tr id="data_<?php echo e($item->id); ?>">
                <td><?php echo e($date_y); ?></td>
                <td><?php echo e($date_m); ?></td>
                <td><?php echo e($date_d); ?></td>
                <td><?php echo e($item->title); ?></td>
                <td><?php echo $item->content; ?></td>
                <td>
                    
                    <a class="btn col-12 btn-block btn-sm btn-primary" data-toggle="collapse"
                        href="#edit_collapse<?php echo e($item->id); ?>" role="button" onclick="move_to_edit(<?php echo e($item->id); ?>)">修改</a>
                    <a id="move_to_edit<?php echo e($item->id); ?>" class="d-none" href="#edit_collapse<?php echo e($item->id); ?>"></a>

                    
                    <a href="#" class="btn col-12 btn-block btn-sm btn-danger"
                        onclick="event.preventDefault();show_confirm(`<?php echo e($item->id); ?>`)">刪除</a>
                    <form id="delete_form<?php echo e($item->id); ?>" action="/admin/image_home/<?php echo e($item->id); ?>" method="POST"
                        style="display: none;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                    </form>
                </td>
            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>

    
    <?php $__currentLoopData = $all_flower_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="collapse py-5" id="edit_collapse<?php echo e($item->id); ?>">
        <div class="card card-body">
            <form method="POST" action="/admin/flower/<?php echo e($item->id); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <div class="form-group">
                    <label for="date_<?php echo e($item->id); ?>">Date</label>
                    <input type="date" class="form-control" id="date_<?php echo e($item->id); ?>" name="date_d"
                        value="<?php echo e($item->date); ?>" required>
                </div>
                <div class="form-group">
                    <label for="title<?php echo e($item->id); ?>">Title</label>
                    <input class="form-control" name="title" id="title<?php echo e($item->id); ?>" cols="30" rows="10"
                        value="<?php echo e($item->title); ?>" required>
                </div>
                <div class="form-group">
                    <label for="content<?php echo e($item->id); ?>">Content</label>
                    <textarea id="content<?php echo e($item->id); ?>" class="form-control summernote" name="content" required>
                        <?php echo e($item->content); ?>

                    </textarea>
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

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

<script src="<?php echo e(asset('js/summernote-zh-TW.js')); ?>"></script>
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


<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [[ 0, "desc" ],[1,"desc"],[2,"desc"]]
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
                axios.delete(`/admin/flower/${id}`)
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

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\GitHub\team4\Team4\resources\views/admin/flower/index.blade.php ENDPATH**/ ?>