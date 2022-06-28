

<?php $__env->startSection('content'); ?>

    <div class="container-fluid content">
        <div class="container-fluid text-center">

            <h2>Divisions</h2>
            
            <div class="d-flex justify-content-end">
                <a class="btn btn-primary" href="<?php echo e(route('divisions.create')); ?>">Add Division</a>
            </div>
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-success table-striped table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($divisions): ?>
                            <?php
                                $i = 0;
                            ?>
                            <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$i); ?></td>
                                    <td><?php echo e($row->name); ?></td>
                                    <td>
                                        <a onclick="return ConfirmDelete();" href="<?php echo e(route('divisions.destroy', $row->id)); ?>">
                                            <i class="fa-solid fa-trash" style="color:red;"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8">No data found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <!--display the link of the pages in URL-->

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/divisions/index.blade.php ENDPATH**/ ?>