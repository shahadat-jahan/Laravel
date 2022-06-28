

<?php $__env->startSection('content'); ?>
    <div class="container-fluid content">

        <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search']) && $_POST['search'] == 'Go'): ?>
            <?php $keyword = $_POST['keyword']; ?>
        <?php else: ?>
            <?php $keyword = ''; ?>
        <?php endif; ?>

        <div class="container-fluid text-center">

            <h2>Product purchases</h2>

            <div class="row">
                <form class="d-flex col-4" name="search" method="POST"
                    action="<?php echo e(route('productPurchases.search', $keyword)); ?>">
                    <?php echo csrf_field(); ?>
                    <input class="form-control" type="text" placeholder="Keyword..." name="keyword"
                        value="<?php echo e(Request::get('search')); ?>">
                    <button class="btn btn-outline-success" type="submit" value="Go" name="search">GO</button>
                </form>
                <div class="col d-flex justify-content-end">
                    <a class="btn btn-primary" href="<?php echo e(route('productPurchases.create')); ?>">Create order</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-success table-striped table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Sl.</th>
                            <th>Order no.</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if(!$purchases->isEmpty()): ?>
                            <?php
                                //  echo "<pre>";
                                //                  print_r($purchases);exit;
                                $i = 0;
                                $page = 1;
                                $limit = session('paginateCount');
                                !empty($_GET['page']) ? ($page = $_GET['page']) : $page;
                                $i = ($page - 1) * $limit;
                            ?>

                            <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($row->status == 1): ?>
                                    <?php $status = 'Active'; ?>
                                <?php else: ?>
                                    <?php $status = 'Inactive'; ?>
                                <?php endif; ?>
                                <tr>
                                    <td><?php echo e(++$i); ?></td>
                                    <td>
                                        <a class="text-decoration-none text-dark" href="<?php echo e(route('orders.index')); ?>">
                                        <?php echo e($row->order->order_no); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <?php echo e($row->product->name); ?>

                                    </td>
                                    <td>
                                        <?php echo e($row->qty > 1 ? $row->qty . '/Boxes' : $row->qty . '/Box'); ?>

                                    </td>
                                    <td>
                                        <a onclick="return ConfirmDelete();"
                                            href="<?php echo e(route('productPurchases.destroy', $row->id)); ?>">
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
            <div class="row">
                <div class="d-flex col">`
                    <?php echo e($purchases->links()); ?>

                </div>
                <div class="col-2">
                    <form class="d-flex" action="<?php echo e(route('productPurchases.limit')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <select class="form-select" name="limit">
                            <option <?php
                            if (isset($limit) && $limit == 2) {
                                echo 'selected';
                            }
                            ?> value="2">2
                            </option>
                            <option <?php
                            if (isset($limit) && $limit == 5) {
                                echo 'selected';
                            }
                            ?> value="5">5</option>
                            <option <?php
                            if (isset($limit) && $limit == 10) {
                                echo 'selected';
                            }
                            ?> value="10">10</option>
                        </select>
                        <input class="btn-outline-primary" type="submit" name="submit" value="Set limit">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/productPurchases/index.blade.php ENDPATH**/ ?>