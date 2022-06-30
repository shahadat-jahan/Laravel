
<?php $__env->startSection('content'); ?>
    <div class="container-fluid content">
        <div class="container-fluid text-center col-10">
            <h2>Edit order</h2>
            <div class="input-group justify-content-center">

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form class="shadow-lg p-5 bg-light m-5" action="<?php echo e(route('productPurchases.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value=<?php echo e($order->id ?? ''); ?>>
                    <div class="row p-2">
                        <div class="col">
                            <label class="input-group">Order No.</label>
                            <input class="form-control" type="text" name="order_no" value=<?php echo e($order->order_no); ?>>
                        </div>
                        <div class="col">
                            <label class="input-group">Customer</label>
                            <select class="form-select" name="customer_id">
                                <?php
                                //get customer
                                if ($customers) {
                                    foreach ($customers as $row) {
                                        $customerId = $row['id'];
                                        $customer = $row['fname'] . ' ' . $row['lname'];
                                        if (isset($order->customer_id) && $order->customer_id === $customerId) {
                                            echo '<option value="' . $customerId . '" SELECTED>' . $customer . '</option>';
                                        } else {
                                            echo '<option value="' . $customerId . '">' . $customer . '</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <?php
                     $key = uniqid();
                     $i = 0;
                    foreach ($purchase as $item){
                        ?>
                    <div class="row p-2">
                        <div class="col">
                            <label class="input-group">Product</label>
                            <select class="select form-select" name="product[<?php echo e($key); ?>][product_id]">
                                <option value="">Select product</option>
                                <?php
                                //get product
                                if ($products) {
                                    $productId = '';
                                    $product = '';
                                    foreach ($products as $row) {
                                        $productId = $row['id'];
                                        $product = $row['name'];
                                        if (isset($item['product_id']) && $item['product_id'] === $productId) {
                                            echo '<option value="' . $productId . '" SELECTED>' . $product . '</option>';
                                        } else {
                                            echo '<option value="' . $productId . '">' . $product . '</option>';
                                        }
                                    }
                                }
                                    ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="input-group">Quantity</label>
                            <input class="form-control" type="number" id="quantity"
                                name="product[<?php echo e($key); ?>][qty]" min="1" max="10"
                                value=<?php echo e($item['qty']); ?>>
                        </div>
                        <div class="col-3">
                            <label>Add row</label>
                            <?php 
                                        $i++;
                                        if($i<2){
                                    ?>
                            <button type="button" data-id="" class="addRow btn btn-info"><i
                                    class="fa fa-add"></i></button>
                            <?php
                                     }else{
                                        ?>
                            <button type="button" data-id="" class="delRow btn btn-danger"><i
                                    class="fa fa-close"></i></button>
                            <?php
                                     }
                                    ?>
                        </div>
                    </div>
                    <?php  } ?>
                    <div class="newRow">
                        
                    </div>
                    <br />
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    <a class="btn btn-primary" href="<?php echo e(route('orders.index')); ?>">Back</a>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/productPurchases/edit.blade.php ENDPATH**/ ?>