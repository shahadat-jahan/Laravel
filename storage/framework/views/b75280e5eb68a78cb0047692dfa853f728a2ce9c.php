
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
                <form class="shadow-lg p-5 bg-light my-5" action="<?php echo e(route('productPurchases.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row p-1">
                        <div class="col">
                            <label class="input-group">Order No.</label>
                            <input class="form-control" type="text" name="order_no">
                        </div>
                        <div class="col">
                            <label class="input-group">Customer</label>
                            <?php echo Form::select('customer_id', $customers, null, ['class' => 'form-select', 'placeholder' => 'Select customer']); ?>

                        </div>
                    </div>
                    <div class="row p-1">
                        <?php
                        $key = uniqid();
                        $i = 0;
                        ?>
                        <div class="col-1">
                            <label>Sl.</label>
                            <p><strong class="serial"><?php echo e(++$i); ?></strong></p>
                        </div>
                        <div class="col-5">
                            <label class="input-group">Product</label>
                            <?php echo Form::select('product[<?php echo e($key); ?>][product_id]', $products, null, ['class' => 'products form-select', 'placeholder' => 'Select product']); ?>

                        </div>
                        <div class="col-3">
                            <label class="input-group">Quantity</label>
                            <input class="form-control" type="number" id="quantity"
                                name="product[<?php echo e($key); ?>][qty]" min="1" max="10">
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
                    <a class="btn btn-primary" href="<?php echo e(route('orders.index')); ?>">Back</a>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            
            function serial() {
                var count = 1;
                $('.serial').each( function(){
                    // console.log('serial',count);
                    $(this).text(count++);
                });
            }

            $(document).on('change', '.products', function() {
                $('.products option').prop('disabled', false);
                $('.products').each(function() {
                    var val = this.value;
                    $('.products').not(this).find('option').filter(
                        function() {
                            return this.value === val;
                        }).prop('disabled', true);
                });
            });

            $(document).on('click', '.addRow', function() {
                $.ajax({
                    url: "<?php echo e(url('/product-purchases/row')); ?>",
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(res) {
                        $('.newRow').append(res.html);
                        $('.products option').prop('disabled', false);
                        serial();
                        $('.products').each(function() {
                            var val = this.value;
                            $('.products').not(this).find('option').filter(
                                function() {
                                    return this.value === val;
                                }).prop('disabled', true);
                        });
                        
                    }
                });
            });

            $(document).on('click', '.delRow', function() {
                var element = $(this).parent().parent();
                element.remove();
                serial();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/productPurchases/create.blade.php ENDPATH**/ ?>