
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
                        <input class="form-control" type="date" name="from_date" value="">
                    </div>
                    <div class="col-1">
                        <label>To</label>
                    </div>
                    <div class="col-2">
                        <input class="form-control" type="date" name="to_date" value="">
                    </div>
                    <div class="col-2 offset-1">
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
                    <div class="col-3 d-flex justify-content-end">
                        <button class="btn btn-outline-success" type="submit" name="search">
                            Generate report
                        </button>
                    </div>
                </div>
            </form>
            <div class="table-responsive ">
                <table class="table align-middle table-bordered table-success table-striped table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Order No.</th>
                            <th>Customer name</th>
                            <th>Product name</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                        </tr>
                        

                    </tbody>
                </table>
            </div>
            <!--display the link of the pages in URL-->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/orders/report.blade.php ENDPATH**/ ?>