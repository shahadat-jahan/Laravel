
<?php $__env->startSection('content'); ?>
    <div class="container-fluid content">
        <div class="container-fluid text-center col-10">
            <h2>Add district</h2>
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
                <?php echo Form::open(['route' => 'districts.store', 'class' => 'shadow-lg p-5 bg-light m-5']); ?>

                <?php echo Form::token(); ?>

                <?php echo Form::label('division_id', 'Division', ['class' => 'input-group']); ?>

                <?php echo Form::select('division_id', $divisions, null, ['placeholder' => 'Select division', 'class' => 'form-control']); ?>

                <?php echo Form::label('name', 'District', ['class' => 'input-group']); ?>

                <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

                <?php echo Form::submit('Submit', ['class' => 'btn btn-success']); ?>

                <a class="btn btn-primary" href="<?php echo e(route('districts.index')); ?>">Back</a>
                <?php echo Form::close(); ?>

            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/districts/create.blade.php ENDPATH**/ ?>