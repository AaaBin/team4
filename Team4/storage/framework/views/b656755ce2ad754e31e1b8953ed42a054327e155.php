<?php $__env->startSection('css'); ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<!-- fullcalendar -->
<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/core@4.4.0/main.min.css">
<!-- fullcalendar core -->
<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/core@4.4.0/main.min.css">
<!-- fullcalendar day grid -->
<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/daygrid@4.4.0/main.min.css">

<link rel="stylesheet" href="https://unpkg.com/@fullcalendar/timegrid@4.4.0/main.min.css">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


<style>
    /* 針對fullcalendar上的事件改變滑鼠hover的游標 */
    .fc-event-container {
        cursor: pointer;
    }

    .ui-timepicker-container,
    .ui-corner-all {
        border-radius: 3px;
    }
</style>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>用餐預約表單</h2>

    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#create_collapse" role="button" aria-expanded="false"
            aria-controls="create_collapse">
            new restaurant booking list
        </a>
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
    </p>
    
    <div class="collapse my-3" id="create_collapse">
        <p>新增訂單前請先確認已經建立顧客資料，若無顧客資料則無法建立訂單</p>
        <div class="card card-body">
            <form method="POST" action="/admin/booking/restaurant" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="customer_id">Customer ID</label>
                        <input type="number" min="0" class="form-control" id="customer_id" name="customer_id" required>
                    </div>
                    <div class="form-group col">
                        <label for="total_number">Total Number</label>
                        <input type="number" min="0" class="form-control" id="total_number" name="total_number"
                            required>
                    </div>
                    <div class="form-group col">
                        <label for="vegetarian_number">Vegetarian Number</label>
                        <input type="number" min="0" class="form-control" id="vegetarian_number"
                            name="vegetarian_number">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-4">
                        <label for="date">Date</label>
                        <input type="text" class="form-control restaurant_date" id="date" name="date" required>
                    </div>
                    <div class="form-group col-4">
                        <label for="time">Time</label>
                        <input class="form-control timepicker" id="time" name="time" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="remark">Remark</label>
                    <textarea type="text" class="form-control" name="remark" id="remark"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="#create_collapse" data-toggle="collapse" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
<hr>







<div class="container">
    <div id="calendar"></div>
</div>


<div class="container">
    
    <?php $__currentLoopData = $all_restaurant_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="collapse py-5" id="edit_collapse<?php echo e($item->id); ?>">
        <div class="card card-body">
            <div class="card p-4 my-2">
                <?php
                $date = explode(' ',$item->date)[0];
                $time = explode(' ',$item->date)[1]
                ?>
                <div class="row">
                    <p class="col">Order ID:<?php echo e($item->id); ?> </p>
                    <p class="col">Date:<?php echo e($date); ?></p>
                    <p class="col">Total number:<?php echo e($item->total_number); ?></p>

                </div>
                <div class="row">
                    <p class="col">Customer ID:<?php echo e($item->customer_id); ?></p>
                    <p class="col">Time:<?php echo e($time); ?></p>
                    <p class="col">Vegetarian number:<?php echo e($item->vegetarian_number); ?></p>
                </div>
                <div class="row">
                    <p class="col-4">Name:<?php echo e($item->customer['name']); ?></p>
                    <p class="col-4">Time session:<?php echo e($item->time_session); ?></p>
                </div>
                <b>
                    <p>Payment condition:<?php echo e($item->payment_condition); ?></p>
                </b>
                <p>Remark:
                    <span class="card p-2"><?php echo e($item->remark); ?></span>
                </p>
            </div>
            <form method="POST" action="/admin/booking/restaurant/<?php echo e($item->id); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="customer_id<?php echo e($item->id); ?>">Customer ID</label>
                        <input type="number" min="0" class="form-control" id="customer_id<?php echo e($item->id); ?>"
                            name="customer_id" value="<?php echo e($item->customer_id); ?>" required>
                    </div>
                    <div class="form-group col">
                        <label for="total_number<?php echo e($item->id); ?>">Total Number</label>
                        <input type="number" min="0" class="form-control" id="total_number<?php echo e($item->id); ?>"
                            name="total_number" value="<?php echo e($item->total_number); ?>" required>
                    </div>
                    <div class="form-group col">
                        <label for="vegetarian_number<?php echo e($item->id); ?>">Vegetarian Number</label>
                        <input type="number" min="0" class="form-control" id="vegetarian_number<?php echo e($item->id); ?>"
                            value="<?php echo e($item->vegetarian_number); ?>" name="vegetarian_number">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-4">
                        <label for="date<?php echo e($item->id); ?>">Date</label>
                        <input type="date" class="form-control" id="date<?php echo e($item->id); ?>" name="date"
                            value="<?php echo e($date); ?>" required>
                    </div>
                    <div class="form-group col-4">
                        <label for="time<?php echo e($item->id); ?>">Time</label>
                        <input class="form-control timepicker" id="time<?php echo e($item->id); ?>" name="time"
                            value="<?php echo e($time); ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-4">
                        <label for="payment_condition<?php echo e($item->id); ?>">Payment condition</label>
                        <select id="payment_condition<?php echo e($item->id); ?>" class="form-control" name="payment_condition">
                            <?php if($item->payment_condition == "Ok"): ?>
                            <option selected>Ok</option>
                            <option>Not yet</option>
                            <?php else: ?>
                            <option selected>Not yet</option>
                            <option>Ok</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="remark<?php echo e($item->id); ?>">Remark</label>
                    <textarea type="text" class="form-control" name="remark" id="remark<?php echo e($item->id); ?>"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" data-toggle="collapse" href="#edit_collapse<?php echo e($item->id); ?>">cancel</a>
            </form>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                <th>time_session</th>
                <th>price</th>
                <th>payment_condition</th>
                <th>remark</th>
                <th style="width:100px">edit/delete</th>
            </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $all_restaurant_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr id="data_<?php echo e($item->id); ?>">
                <td><?php echo e($item->customer_id); ?></td>
                <td><?php echo e($item->total_number); ?></td>
                <td><?php echo e($item->vegetarian_number); ?></td>
                <td><?php echo e($item->date); ?></td>
                <td><?php echo e($item->time); ?></td>
                <td><?php echo e($item->time_session); ?></td>
                <td><?php echo e($item->price); ?></td>
                <td><?php echo e($item->payment_condition); ?></td>
                <td><?php echo e($item->remark); ?></td>
                <td>
                    
                    <a id="edit_btn<?php echo e($item->id); ?>" class="btn col-12 btn-block btn-sm btn-primary" data-toggle="collapse"
                        href="#edit_collapse<?php echo e($item->id); ?>" role="button" onclick="move_to_edit(<?php echo e($item->id); ?>)">修改</a>
                    <a id="move_to_edit<?php echo e($item->id); ?>" class="d-none" href="#edit_collapse<?php echo e($item->id); ?>"></a>

                    
                    <a href="#" class="btn col-12 btn-block btn-sm btn-danger"
                        onclick="event.preventDefault();show_confirm(`<?php echo e($item->id); ?>`)">刪除</a>
                </td>
            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>
</div>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>


<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


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

<script src="https://unpkg.com/@fullcalendar/timegrid@4.4.0/main.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [[ 3, "desc" ]]
            });
        });
</script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>
    // confirm函式，跳出視窗警告使用者正在進行刪除行為，若確認，則送出隱藏的表單，執行刪除
    function show_confirm(id){
            swal({
            title: "Delete data",
            text: "Once deleted, you will not be able to recover it. Make sure this restaurant order is not using",
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
        // 設定時間間個，讓摺疊區塊顯示後才移動畫面
        setTimeout(() => {
            $(`#move_to_edit${id}`)[0].click();
        }, 250);
    }
</script>

<script>
    // passing data in js
    // https://stackoverflow.com/questions/30074107/laravel-5-passing-variable-to-javascript
    var all_restaurant_datas = <?php echo json_encode($all_restaurant_datas,JSON_HEX_TAG); ?>;
    // 編輯陣列中的每一筆物件，加上可以讓fullcalendar閱讀的屬性
    all_restaurant_datas.forEach(element => {
        element.title = String(element.total_number) + "peolpe  at:" + element.time;
        // fullcalendar的時間格式為 YYYY-MM-DDTHH:mm:ss
        if (element.time_session == "Lunch") {
            element.start = element.date;
            element.borderColor = "#FFEA92";
            element.backgroundColor = "#FFEA92";
        }
        if (element.time_session == "Dinner") {
            element.start = element.date ;
            element.borderColor = "#F7ACA9";
            element.backgroundColor = "#F7ACA9";
        }
        if (element.time_session == "Breakfast") {
            element.start = element.date;
            element.borderColor = "#C5F9EC";
            element.backgroundColor = "#C5F9EC";
        }
        element.className ="Order_" + String(element.id);
        // 預設中沒有設定結束時間時，單一日的事件會被記載成全天的事件
        // 設定false，改成預設事件會延續一小時
        element.allDay = false;
    });

    // https://fullcalendar.io/docs/event-parsing
    // 添加事件進日曆
    $(document).ready(function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                // 選擇要匯入的插件(要先用cdn或其他方式裝進檔案)
                plugins: ['dayGrid', 'interaction','timeGrid'],
                // 讓日曆可被點選，單這一個只有顏色，沒有其他效果
                selectable: true,
                // 設定行事曆預設顯示模式，月份或是週、日等
                defaultView: 'timeGridWeek',
                // 行事曆的上方功能列設定
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridWeek,timeGridDay,dayGridMonth'
                },
                // 讓事件超過一定數量後摺疊，不會無限制的堆疊撐開欄位
                eventLimit: true,
                // calendar的title設定
                titleFormat: { // will produce something like "Tuesday, September 18, 2018"
                    month: 'long',
                    year: 'numeric',
                    day: '2-digit',
                    // weekday: 'long'
                },
                // Render時執行
                eventRender: function(info) {
                    // 用tippy套件讓滑鼠指倒物件時可以有資訊顯示
                    tippy(info.el, {
                        // 出現和消失的時間(ms)
                        delay:[100,200],
                        // 名符其實，箭頭
                        arrow:true,
                        // 讓content中可以寫入HTML語法
                        allowHTML:true,
                        // 內容區塊
                        content: `<b>Customer : </b> ${info.event.extendedProps.customer.name} <br> <b>Payment Condition : </b>  ${info.event.extendedProps.payment_condition} <br><b>Vegetarian Number : </b>${info.event.extendedProps.vegetarian_number} <br><b>Total Number:</b>${info.event.extendedProps.total_number} <br> <b>Vegetarian Number:</b>${info.event.extendedProps.vegetarian_number}`,
                    });
                },
                // 將JSON格式的資料餵進calender
                events: all_restaurant_datas,
                // 點擊事件時執行
                eventClick:function(info){

                    // 觸發連結，讓畫面移動到編輯區塊
                    let order_id = info.event.id;
                    $(`#edit_btn${order_id}`).click();
                }
            });
            // 將calendar選染出來
            calendar.render();
    })
</script>
<script>
    // timepicker
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
    // datepicker
    $(function () {
                $('.restaurant_date').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 1996,
                    maxYear: parseInt(moment().format('YYYY'), 10)
                }, function (start, end, label) {
                });
            });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Documents\GitHub\team4\Team4\resources\views/admin/restaurant/index.blade.php ENDPATH**/ ?>