
<?php $__env->startSection('content'); ?>
    <div class="container-fluid content">
        <div class="container-fluid text-center">
            <h2><?php echo app('translator')->get('label.ORDER_REPORT'); ?></h2>
            
            <?php echo Form::open(['route' => ['orders.showReport'], 'method' => 'POST', 'class' => 'form my-3']); ?>

            <?php echo Form::token(); ?>

            <div class="row">
                <div class="col-1">
                    <label><?php echo app('translator')->get('label.FROM'); ?></label>
                </div>
                <div class="col-2">
                    <?php echo Form::date('from_date', Request::get('from_date'), ['class' => 'form-control']); ?>

                    <span><?php echo e($errors->first('from_date')); ?></span>
                </div>
                <div class="col-1">
                    <label><?php echo app('translator')->get('label.TO'); ?></label>
                </div>
                <div class="col-2">
                    <?php echo Form::date('to_date', Request::get('to_date'), ['class' => 'form-control']); ?>

                    <span><?php echo e($errors->first('to_date')); ?></span>
                </div>
                
                <div class="col-2">
                    <?php echo Form::select('customer_id', $customers, Request::get('customer_id'), ['class' => 'form-select', 'placeholder' => __('label.SELECT_CUSTOMER')]); ?>

                </div>
                <div class="col-4 d-flex justify-content-end">
                    <?php echo Form::submit(__('label.REPORT'), ['class' => 'btn btn-outline-success ml-1', 'name' => 'search']); ?>

                    <?php if(Request::get('generate') == 'true' && !empty($data)): ?>
                        
                        <a href="<?php echo e(URL::full() . '&download=pdf'); ?>" class="btn btn-outline-success ml-1" type="button">
                            <?php echo app('translator')->get('label.PDF'); ?>
                        </a>
                        <a href="<?php echo e(URL::full() . '&export=exel'); ?>" class="btn btn-outline-success  ml-1" type="button">
                            <?php echo app('translator')->get('label.Exel'); ?>
                        </a>
                        <a href="<?php echo e(URL::full() . '&view=print'); ?>" id="print" class="btn btn-outline-success  ml-1" type="button">
                            <?php echo app('translator')->get('label.PRINT'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php echo Form::close(); ?>

            <?php if(Request::get('generate') == 'true'): ?>
                <div class="table-responsive ">
                    <table class="table align-middle table-bordered table-success text-center">
                        <thead class="table-dark">
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
                                        <td class="align-middle"
                                            rowspan="<?php echo e(!empty($rowspanArr[$orderId]) ? $rowspanArr[$orderId] : 1); ?>">
                                            <?php echo e($order['order_no'] ?? ''); ?></td>
                                        <td class="align-middle"
                                            rowspan="<?php echo e(!empty($rowspanArr[$orderId]) ? $rowspanArr[$orderId] : 1); ?>">
                                            <?php echo e($order['created_at'] ?? ''); ?></td>
                                        <td class="align-middle"
                                            rowspan="<?php echo e(!empty($rowspanArr[$orderId]) ? $rowspanArr[$orderId] : 1); ?>">
                                            <?php echo e($order['customer'] ?? ''); ?></td>
                                        <?php if(!empty($order['purchase'])): ?>
                                            <?php
                                                $i = 0;
                                            ?>
                                            <?php $__currentLoopData = $order['purchase']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productId => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($i > 0): ?>
                                    <tr>
                                <?php endif; ?>
                                <td class="align-middle"><?php echo e($product['product'] ?? ''); ?></td>
                                <td class="align-middle">
                                    <?php echo e(!empty($product['qty']) ? ($product['qty'] > 1 ? $product['qty'] . '/Boxes' : $product['qty'] . '/Box') : '0.00'); ?>

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
                <td class="align-middle" colspan="8">No data found</td>
            </tr>
            <?php endif; ?>

            </tbody>
            </table>
        </div>
        <?php endif; ?>
        <!--display the link of the pages in URL-->
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/orders/report.blade.php ENDPATH**/ ?>