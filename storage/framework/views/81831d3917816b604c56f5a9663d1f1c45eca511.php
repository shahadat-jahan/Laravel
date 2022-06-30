
<?php $__env->startSection('content'); ?>
    <div class="container-fluid content">
        <div class="container-fluid text-center">
            <h2>Report</h2>
            <form class="form my-3" name="report" method="POST" action="<?php echo e(route('orders.showReport')); ?>">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-1">
                        <label>From</label>
                    </div>
                    <div class="col-2">
                        <input class="form-control" type="date" name="from_date" value="<?php echo e(Request::get('f_date')); ?>">
                    </div>
                    <div class="col-1">
                        <label>To</label>
                    </div>
                    <div class="col-2">
                        <input class="form-control" type="date" name="to_date" value="<?php echo e(Request::get('t_date')); ?>">
                    </div>
                    <div class="col-2">
                        <select class="form-select" name="customer_id">
                            <option value="">Select customer</option>
                            
                            
                            <?php if($customers): ?> 
                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <option value="<?php echo e($row->id); ?>" 
                                    <?php echo e((Request::get('customer_id')==$row->id ) ? 'selected' : ''); ?>>
                                    <?php echo e($row->fname.' '.$row->lname); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            
                        </select>
                    </div>
                    <div class="col-4 d-flex justify-content-end">
                        <button class="btn btn-outline-success mr-1" type="submit" name="search">
                            Generate report
                        </button>
                        <a href="<?php echo e(route('orders.report',['download'=>'pdf'])); ?>" class="btn btn-outline-success" type="button" name="search">
                            Generate PDF
                        </a>
                    </div>
                </div>
            </form>
            <?php echo $__env->make('orders.include.reportPDF', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--display the link of the pages in URL-->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/orders/report.blade.php ENDPATH**/ ?>