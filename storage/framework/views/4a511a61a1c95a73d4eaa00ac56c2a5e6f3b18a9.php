<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ReportPDF</title>
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
            text-align: center;
        }

        @page  {
            margin: 5px;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table {
            width: 100%;
            content: center;
            text-align: center;
        }

        th {
            font-weight: bold;
            background-color: green;
            color: white;
        }
    </style>
</head>

<body>
    <?php if(Request::get('generate') == 'true'): ?>
        <div>
            <h2><?php echo app('translator')->get('label.ORDER_REPORT'); ?></h2>
            <p>From: <?php echo e(Request::get('from_date')); ?>, To: <?php echo e(Request::get('to_date')); ?></p>
        </div>
        <table border=1px; cellpadding=0; cellspacing=0;>
            <thead>
                <tr>
                    <th><?php echo app('translator')->get('label.ORDER_NO'); ?></th>
                    <th><?php echo app('translator')->get('label.DATE'); ?></th>
                    <th><?php echo app('translator')->get('label.CUSTOMER'); ?></th>
                    <th><?php echo app('translator')->get('label.PRODUCT'); ?></th>
                    <th><?php echo app('translator')->get('label.QTY'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($data)): ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderId => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td rowspan="<?php echo e(!empty($rowspanArr[$orderId]) ? $rowspanArr[$orderId] : 1); ?>">
                                <?php echo e($order['order_no'] ?? ''); ?></td>
                            <td rowspan="<?php echo e(!empty($rowspanArr[$orderId]) ? $rowspanArr[$orderId] : 1); ?>">
                                <?php echo e($order['created_at'] ?? ''); ?></td>
                            <td rowspan="<?php echo e(!empty($rowspanArr[$orderId]) ? $rowspanArr[$orderId] : 1); ?>">
                                <?php echo e($order['customer'] ?? ''); ?></td>
                            <?php if(!empty($order['purchase'])): ?>
                                <?php
                                    $i = 0;
                                ?>
                                <?php $__currentLoopData = $order['purchase']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productId => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($i > 0): ?>
                        <tr>
                    <?php endif; ?>
                    <td><?php echo e($product['product'] ?? ''); ?></td>
                    <td><?php echo e(!empty($product['qty']) ? ($product['qty'] > 1 ? $product['qty'] . '/Boxes' : $product['qty'] . '/Box') : '0.00'); ?>

                    </td>

                    

                    <?php if($i < $rowspanArr[$orderId] - 1): ?>
                        </tr>
                    <?php endif; ?>
                    <?php
                        $i++;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <tr>
        <td colspan="8">No data found</td>
    </tr>
    <?php endif; ?>
    </tbody>
    </table>
    <?php endif; ?>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            window.print();
        });
    </script>
</body>

</html>
<?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/orders/include/reportPDF.blade.php ENDPATH**/ ?>