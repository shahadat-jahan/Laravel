
<?php $__env->startSection('content'); ?>
    <div class="container-fluid content">
        <div class="container-fluid text-center col-10">
            <h2>Add product</h2>
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
                <form class="shadow-lg p-5 bg-light m-5" method="post" action="<?php echo e(route('products.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col">
                            <label class="input-group"><?php echo app('translator')->get('label.name.n'); ?></label>
                            <input class="form-control" type="text" name="name" value="">
                            
                        </div>
                        <div class="col">
                            <label class="input-group"><?php echo app('translator')->get('label.code'); ?></label>
                            <input class="form-control" type="text" name="code" value="">
                        </div>
                    </div>
                    <br />
                    <label class="input-group"><?php echo app('translator')->get('label.des'); ?></label>
                    <textarea class="form-control" name="des" rows="5" cols="50" placeholder="Write product description..."></textarea>
                    <br />
                    <label class="input-group"><?php echo app('translator')->get('label.status'); ?></label>
                    <select class="form-select" name="status">
                        <option value="1">Active</option>
                        <option value="0" selected>Inactive</option>
                    </select>
                    <br />
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    <a class="btn btn-primary" href="<?php echo e(route('products.index')); ?>">Back</a>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/products/create.blade.php ENDPATH**/ ?>