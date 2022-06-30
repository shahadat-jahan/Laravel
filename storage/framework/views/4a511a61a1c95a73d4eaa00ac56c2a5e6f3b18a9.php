<div class="table-responsive ">
    <table class="table align-middle table-bordered table-success text-center">
        <thead class="table-dark">
            <tr>
                <th>Customer name</th>
                <th>Order No.</th>
                <th>Product name</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if(!empty($data) && count($data)>0){                   
                foreach ($data as $customerId => $customerInfo) {
            ?>
            <tr>
                <td class="align-middle" rowspan="<?php echo e(!empty($rowspanArr['customer'][$customerId]) ? $rowspanArr['customer'][$customerId] : 1); ?>">
                    <?php echo e($customerInfo['customer_name']); ?>

                </td>
                <?php
                if(!empty($customerInfo['order'])){
                    $i = 0;
                    foreach ($customerInfo['order'] as $orderId => $orderInfo) {
                        if($i>0){ ?>
            <tr>
                    <?php } ?>
                <td class="align-middle" rowspan="<?php echo e(!empty($rowspanArr['order'][$customerId][$orderId]) ? $rowspanArr['order'][$customerId][$orderId] : 1); ?>">
                    <?php echo e($orderInfo['order_no']); ?>

                </td>
                <?php
                if(!empty($orderInfo['product'])){
                    $j=0;
                    foreach ($orderInfo['product'] as $productId => $productInfo) {
                        if ($j > 0) { ?>
            <tr>
                    <?php } ?>
                <td class="align-middle" rowspan="<?php echo e(!empty( $rowspanArr['product'][$customerId][$orderId][$productId]) ?  $rowspanArr['product'][$customerId][$orderId][$productId] : 1); ?>">
                    <?php echo e($productInfo['product_name']); ?>

                </td>
                    <?php 
                        if ($j < $rowspanArr['order'][$customerId][$orderId] - 1){ 
                    ?>
            </tr>
                    <?php 
                        }
                    $j++;
                    }
                }
                if( $i < $rowspanArr['customer'][$customerId] - 1){ 
                    ?>
            </tr>
                    <?php
                        }
                    $i++;
                    }
                }
                    ?>
            </tr>
            <?php
                }
            }
            else{
            ?>
            <tr>
                <td class="align-middle" colspan="8">No data found</td>
            </tr>
            <?php 
            } 
            ?>
        </tbody>
    </table>
</div><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/orders/include/reportPDF.blade.php ENDPATH**/ ?>