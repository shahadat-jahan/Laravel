
<?php $__env->startSection('content'); ?>
    <div class="container-fluid content">
        <div class="container-fluid text-center col-10">
            <h2>Order</h2>
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
                <form class="shadow-lg p-5 bg-light m-5" action="<?php echo e(route('productPurchases.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row p-2">
                        <div class="col">
                            <label class="input-group">Order No.</label>
                            <input class="form-control" type="text" name="order_no">
                        </div>
                        <div class="col">
                            <label class="input-group">Customer</label>
                            <select class="form-select" name="customer_id">
                                <option value="">Select customer</option>
                                <?php
                                //get customer
                                if ($customers) {
                                    foreach ($customers as $row) {
                                        $customerId = $row['id'];
                                        $customer = $row['fname'] . ' ' . $row['lname'];
                                        echo '<option value="' . $customerId . '">' . $customer . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <?php
                        $key = uniqid();
                        ?>
                        <div class="col">
                            <label class="input-group">Product</label>
                            <select class="select form-select" name="product[<?php echo e($key); ?>][product_id]">
                                <option value="">Select product</option>
                                <?php
                                //get product
                                if ($products) {
                                    $productId = '';
                                    foreach ($products as $row) {
                                        $productId = $row['id'];
                                        $product = $row['name'];
                                        echo '<option value="' . $productId . '">' . $product . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="input-group">Quantity</label>
                            <input class="form-control" type="number" id="quantity" name="product[<?php echo e($key); ?>][qty]" min="1" max="10">
                        </div>
                        <div class="col-3">
                            <label>Add row</label>
                            <button type="button" data-id="" class="addRow btn btn-info"><i
                                    class="fa fa-add"></i></button>
                        </div>

                    </div>
                    <div class="newRow">
						
                    </div>
                    <br />
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    <a class="btn btn-primary" href="<?php echo e(route('productPurchases.index')); ?>">Back</a>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".select").on('change', function() {
                var id = $(this).val();
                // window.alert(id);
                $.ajax({
                    url: "<?php echo e(url('')); ?>",
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "id": id
                    },
                    success: function(res) {
                        $('').html(res.html);
                    }
                });
            });

            $(document).on('click', '.addRow', function() {
                // window.alert("Do you want add new row?");
                $.ajax({
                    url: "<?php echo e(url('/product-purchases/row')); ?>",
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "id": "ok"
                    },
                    success: function(res) {
                        $('.newRow').append(res.html);
                    }
                });
            });

            $(document).on('click', '.delRow', function() {
                // window.alert("Do you want delete row?");
                $('.newRow .row').last().remove();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/productPurchases/order.blade.php ENDPATH**/ ?>