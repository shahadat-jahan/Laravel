
<?php $__env->startSection('content'); ?>
    <div class="container-fluid content">
        <div class="container-fluid text-center col-10">
            <h2>Edit product</h2>
            <div class="input-group justify-content-center">
                <form class="shadow-lg p-5 bg-light m-5" method="POST" action="<?php echo e(route('products.update')); ?>"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($product->id ?? ''); ?>">
                    <div class="row">
                        <div class="col">
                            <label class="input-group"><?php echo app('translator')->get('label.name.n'); ?></label>
                            <input class="form-control" type="text" name="name" value="<?php echo e($product->name ?? ''); ?>">
                        </div>
                        <div class="col">
                            <label class="input-group"><?php echo app('translator')->get('label.code'); ?></label>
                            <input class="form-control" type="text" name="code" value="<?php echo e($product->code ?? ''); ?>">
                        </div>
                    </div>
                    <br />
                    <textarea class="form-control" name="des" rows="5" cols="50" placeholder="Write your address..."><?php echo e($product->des ?? ''); ?></textarea>
                    <br />
                    <label class="input-group"><?php echo app('translator')->get('label.status'); ?></label>
                    <select class="form-select" name="status">
                        <option <?php
                        if (isset($product->status) && $product->status == '1') {
                            echo 'selected';
                        }
                        ?> value="1">Active</option>
                        <option <?php
                        if (isset($product->status) && $product->status == '0') {
                            echo 'selected';
                        }
                        ?> value="0">Inactive</option>
                    </select>
                    <br />
                    <button class="btn btn-success" type="submit" name="submit">Update</button>
                    <a class="btn btn-primary" href="<?php echo e(route('products.index')); ?>">Back</a>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/products/edit.blade.php ENDPATH**/ ?>