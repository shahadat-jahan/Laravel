
<?php $__env->startSection('content'); ?>
    <div class="container-fluid content">
        <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search']) && $_POST['search'] == 'Go'): ?>
            <?php $keyword = $_POST['keyword']; ?>
        <?php else: ?>
            <?php $keyword = ''; ?>
        <?php endif; ?>
        <div class="container-fluid text-center">
            <h2>Customers</h2>
            <div class="row">
                <form class="d-flex col-4" name="search" method="POST" action="<?php echo e(route('customers.search', $keyword)); ?>">
                    <?php echo csrf_field(); ?>
                    <input class="form-control" type="text" placeholder="Keyword..." name="keyword"
                        value="<?php echo e(Request::get('search')); ?>">
                    <button class="btn btn-outline-success" type="submit" value="Go" name="search">GO</button>
                </form>
                <div class="col d-flex justify-content-end">
                    <a class="btn btn-primary" href="<?php echo e(route('customers.create')); ?>">Add customer</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-success table-striped table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!$customers->isEmpty()): ?>
                            <?php
                                $i = 0;
                                $page = 1;
                                $limit = session('paginateCount');
                                !empty($_GET['page']) ? ($page = $_GET['page']) : $page;
                                $i = ($page - 1) * $limit;
                            ?>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($row->status == 1): ?>
                                    <?php $status = 'Active'; ?>
                                <?php else: ?>
                                    <?php $status = 'Inactive'; ?>
                                <?php endif; ?>
                                <?php if(!empty($row->image)): ?>
                                    <?php $image = $row->image; ?>
                                <?php else: ?>
                                    <?php $image ='unknown.jpg'; ?>
                                <?php endif; ?>
                                <tr>
                                    <td><?php echo e(++$i); ?></td>
                                    <td>
                                        <div class="user-panel d-flex">
                                            <div class="image">
                                                <img src="<?php echo e(asset('public/images/' . $image)); ?>"
                                                    class="img-circle elevation-2" alt="Customer Image">
                                            </div>
                                            <div class="info">
                                                <a class="text-decoration-none text-dark"
                                                    href="<?php echo e(route('customers.edit', $row->id)); ?>"><?php echo e($row->fname . ' ' . $row->lname); ?></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo e($row->username); ?></td>
                                    <td id='changeStatus<?php echo e($row->id); ?>'>
                                        <?php echo e($row->status == '1' ? 'Active' : 'Inactive'); ?></td>
                                    <td>
                                        <button id='changeStatusBtn<?php echo e($row->id); ?>'
                                            class="status btn btn-sm btn-warning" data-status="<?php echo e($row->status); ?>"
                                            data-id="<?php echo e($row->id); ?>">
                                            <?php echo e($row->status == '1' ? 'Inactive' : 'Active'); ?>

                                        </button>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="save-data btn btn-sm " data-bs-toggle="modal"
                                            data-bs-target="#myModal" data-id=<?php echo e($row->id); ?>>
                                            <i class="fa-solid fa-address-card"></i>
                                        </button>

                                        <a href="<?php echo e(route('customers.edit', $row->id)); ?>">
                                            <i class="fa-solid fa-pen-to-square" style="color:green;"></i></a>

                                        <a onclick="return ConfirmDelete();"
                                            href="<?php echo e(route('customers.destroy', $row->id)); ?>">
                                            <i class="fa-solid fa-trash" style="color:red;"></i></a>
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
                    <?php echo e($customers->links()); ?>

                </div>
                <div class="col-2">
                    <form class="d-flex" action="<?php echo e(route('customers.limit')); ?>" method="POST">
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
    <!-- The Modal -->
    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Customer detail</h4>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal"></button>-->
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <p id="modalBody"></p>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.status', function() {
                var id = $(this).attr('data-id');
                var status = $(this).attr('data-status');
                window.alert("Do you want change status!");
                $.ajax({
                    url: "<?php echo e(URL::to('customers/chng-status')); ?>",
                    type: "POST",
                    data: {
                        "id": id,
                        "status": status
                    },
                    dataType: 'json',
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        if (status == 1) {
                            console.log('Active');
                            $('#changeStatus' + id).text("Inactive");
                            $('#changeStatusBtn' + id).addClass('btn btn-sm btn-warning');
                            $('#changeStatusBtn' + id).text('Active');
                            $('#changeStatusBtn' + id).data('status', 0);
                        }
                        if (status == 0) {
                            console.log('Inactive');
                            $('#changeStatus' + id).text("Active");
                            $('#changeStatusBtn' + id).addClass('btn btn-sm btn-warning');
                            $('#changeStatusBtn' + id).text('Inactive');
                            $('#changeStatusBtn' + id).data('status', 1);
                        }
                    }

                });
            });
            $(document).on('click', '.save-data', function() {
                var id = $(this).attr('data-id');
                //   window.alert(id);    
                $.ajax({
                    url: "<?php echo e(url('/customers/modal')); ?>",
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
                        $('#modalBody').html(res.html);
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/customers/index.blade.php ENDPATH**/ ?>