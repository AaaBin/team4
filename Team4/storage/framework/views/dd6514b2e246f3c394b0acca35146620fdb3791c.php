<?php $__env->startSection('css'); ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Customer Info</h2>
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#create_collapse" role="button" aria-expanded="false"
            aria-controls="create_collapse">
            new customer data
        </a>
    </p>
    
    <div class="collapse" id="create_collapse">
        <div class="card card-body">

            <form method="POST" action="/admin/customer" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
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
            <?php $__currentLoopData = $all_customer_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="data_<?php echo e($item->id); ?>">
                <td><?php echo e($item->id); ?></td>
                <td><?php echo e($item->name); ?></td>
                <td><?php echo e($item->phone); ?></td>
                <td><?php echo e($item->email); ?></td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#order_detail<?php echo e($item->id); ?>">
                        order detail
                    </button>
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

    
    <?php $__currentLoopData = $all_customer_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="collapse py-5" id="edit_collapse<?php echo e($item->id); ?>">
        <div class="card card-body">
            <form method="POST" action="/admin/customer/<?php echo e($item->id); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <div class="form-row ">
                    <div class="form-group col">
                        <label for="name<?php echo e($item->id); ?>">Name</label>
                        <input type="text" class="form-control" id="name<?php echo e($item->id); ?>" name="name"
                            value="<?php echo e($item->name); ?>" required>
                    </div>
                    <div class="form-group col">
                        <label for="phone<?php echo e($item->id); ?>">Phone</label>
                        <input class="form-control" type="text" min="0" name="phone" id="phone<?php echo e($item->id); ?>"
                            value="<?php echo e($item->phone); ?>" required>
                    </div>
                    <div class="form-group col">
                        <label for="email<?php echo e($item->id); ?>">Email</label>
                        <input class="form-control" type="text" min="0" name="email" id="email<?php echo e($item->id); ?>"
                            value="<?php echo e($item->email); ?>" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" data-toggle="collapse" href="#edit_collapse<?php echo e($item->id); ?>">cancel</a>
            </form>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php $__currentLoopData = $all_customer_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- 彈出視窗 -->
<div class="modal fade" id="order_detail<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">訂單狀態:<?php echo e($item->name); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Camp:</h3>
                <?php if($item->camp == "[]"): ?>
                <p>this customer do not have any camping order</p>
                <?php else: ?>
                <?php $__currentLoopData = $item->camp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $camp_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card p-4 my-2 border-secondary">
                    <?php
                        $check_in_date = explode(' ',$camp_item->check_in_date)[0];
                        $striking_camp_date = explode(' ',$camp_item->striking_camp_date)[0];
                        ?>
                    <div class="row">
                        <p class="col">Camp Order ID:<?php echo e($camp_item->id); ?> </p>
                        <p class="col">Check in date:<?php echo e($check_in_date); ?></p>
                        <p class="col">Adult:<?php echo e($camp_item->adult); ?></p>

                    </div>
                    <div class="row">
                        <p class="col">Customer ID:<?php echo e($camp_item->customer_id); ?></p>
                        <p class="col">Striking camp date:<?php echo e($striking_camp_date); ?></p>
                        <p class="col">Child:<?php echo e($camp_item->child); ?></p>
                    </div>
                    <div class="row">
                        <p class="col">Name:<?php echo e($camp_item->customer->name); ?></p>
                        <p class="col">Campsite type:<?php echo e($camp_item->campsite_type); ?></p>
                        <p class="col"></p>
                    </div>
                    <div class="row">
                        <p class="col"></p>
                        <p class="col">Equipment need:<?php echo e($camp_item->equipment_need); ?></p>
                        <p class="col"></p>
                    </div>
                    <b>
                        <p>Payment condition:<?php echo e($camp_item->payment_condition); ?></p>
                    </b>
                    <p>Remark:
                        <span class="card p-2"><?php echo e($camp_item->remark); ?></span>
                    </p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <hr>
                <h3>Resrtautant:</h3>
                <?php if($item->restaurant == "[]"): ?>
                <p>this customer do not have any restaurant order</p>
                <?php else: ?>
                <?php $__currentLoopData = $item->restaurant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card p-4 my-2 border-secondary">
                    <?php
                        $restaurant_date = explode(' ',$restaurant_item->date)[0];
                        $restaurant_time = explode(' ',$restaurant_item->date)[1];
                        ?>
                    <div class="row">
                        <p class="col">Restautant Order ID:<?php echo e($restaurant_item->id); ?> </p>
                        <p class="col">Date:<?php echo e($restaurant_date); ?></p>
                        <p class="col">Total number:<?php echo e($restaurant_item->total_number); ?></p>

                    </div>

                    <div class="row">
                        <p class="col">Customer ID:<?php echo e($restaurant_item->customer_id); ?></p>
                        <p class="col">Time:<?php echo e($restaurant_time); ?></p>
                        <p class="col">Vegetarian number:<?php echo e($restaurant_item->vegetarian_number); ?></p>
                    </div>
                    <div class="row">
                        <p class="col-4">Name:<?php echo e($restaurant_item->customer->name); ?></p>
                        <p class="col-4">Time session:<?php echo e($restaurant_item->time_session); ?></p>
                    </div>
                    <b>
                        <p>Payment condition:<?php echo e($restaurant_item->payment_condition); ?></p>
                    </b>
                    <p>Remark:
                        <span class="card p-2"><?php echo e($restaurant_item->remark); ?></span>
                    </p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <hr>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [[ 0, "desc" ]]
            });
        });
</script>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\GitHub\team4\Team4\resources\views/admin/customer/index.blade.php ENDPATH**/ ?>