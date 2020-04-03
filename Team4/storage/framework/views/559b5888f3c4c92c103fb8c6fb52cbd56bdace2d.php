<!DOCTYPE html>
<html>

<head>
    <title>沐心泉-預約成功通知</title>
</head>

<body>
    <p>您於我們沐心泉網站寫了預約表單，內容如下:</p>
    <table >
        <tr>
            <td>
                <?php if($request_data['camp'] != ''): ?>
                <p>營區預約:</p>
                <p>入住時間:<?php echo e($request_data['camp']->check_in_date); ?></p>
                <p>拔營時間:<?php echo e($request_data['camp']->striking_camp_date); ?></p>
                <p>大人:<?php echo e($request_data['camp']->adult); ?>位</p>
                <p>小孩:<?php echo e($request_data['camp']->child); ?>位</p>
                <p>營位類型:<?php echo e($request_data['camp']->campsite_type); ?></p>
                <p>是否租用器材:<?php echo e($request_data['camp']->equipment_need); ?></p>
                <p>金額:<?php echo e($request_data['camp']->price); ?>元</p>
                <p>備註事項:<?php echo e($request_data['camp']->remark); ?></p>
                <?php endif; ?>
            </td>
            <td>
                <?php if($request_data['restaurant'] != ''): ?>
                <p>餐廳預約:</p>
                <p>用餐日期:<?php echo e($request_data['restaurant']->date); ?></p>
                <p>時間:<?php echo e($request_data['restaurant']->time); ?></p>
                <p>總人數:<?php echo e($request_data['restaurant']->total_number); ?>位</p>
                <p>素食者人數:<?php echo e($request_data['restaurant']->vegetarian_number); ?>位</p>
                <p>是否預約用餐贈送的園區導覽行程:<?php echo e($request_data['restaurant']->guide_need); ?></p>
                <p>備註事項:<?php echo e($request_data['restaurant']->remark); ?></p>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            若有任何的疑問或需要更改的地方，歡迎來電或來信通知
        </tr>
        <tr>
            電子郵件:spring_mountain@gmail.com
        </tr>
        <tr>
            電話:0911223345
        </tr>
    </table>




</body>

</html>
<?php /**PATH C:\Users\user\Documents\GitHub\team4\Team4\resources\views/mails/send_to_customer.blade.php ENDPATH**/ ?>