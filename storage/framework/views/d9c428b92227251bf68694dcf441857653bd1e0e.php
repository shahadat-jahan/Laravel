
<?php $__env->startSection('content'); ?>
    <div class="container-fluid content">
        <div class="container-fluid text-center col-10">
            <h2>Add customer</h2>
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
                <form class="shadow-lg p-5 bg-light m-5" method="post" action="<?php echo e(route('customers.store')); ?>"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col">
                            <label class="input-group"><?php echo app('translator')->get('label.name.f'); ?></label>
                            <input class="form-control" type="text" name="fname" value="">
                        </div>
                        <div class="col">
                            <label class="input-group"><?php echo app('translator')->get('label.name.l'); ?></label>
                            <input class="form-control" type="text" name="lname" value="">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col">
                            <label class="input-group"><?php echo app('translator')->get('label.name.u'); ?></label>
                            <input class="form-control" type="text" name="username" value="">
                        </div>
                        <div class="col">
                            <label class="input-group"><?php echo app('translator')->get('label.pass'); ?></label>
                            <input class="form-control" type="password" name="password" value="">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-4">
                            <label class="input-group"><?php echo app('translator')->get('label.gender'); ?></label>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="gender" value="1">Male
                        </div>
                        <div class="col-2">
                            <input class="form-check-input" type="radio" name="gender" value="2">Female
                        </div>
                    </div>
                    <br />
                    <br />
                    <label class="input-group"><?php echo app('translator')->get('label.add'); ?></label>
                    <div id="division-container">
                        <select class="form-select my-2" id="division" name="division_id"">
                            <option value="">-Please select division-</option>
                            
                            <?php if($divisions): ?>
                                <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $divisionId = $row['id'];
                                        $division = $row['name'];
                                    ?>
                                    <option value=<?php echo e($divisionId); ?>><?php echo e($division); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div id="district-container">
                        <select class="form-select my-2" id="district" name="district_id">
                            <option value="">-Please select district-</option>
                        </select>
                    </div>
                    <div id="thana-container">
                        <select class="form-select my-2" id="thana" name="thana_id">
                            <option value="">-Please select thana-</option>
                        </select>
                    </div>
                    <div id="address-container">
                        <textarea class="form-control my-2" name="address" rows="5" cols="50" placeholder="Write your address..."></textarea>
                    </div>
                    <br />
                    <label class="input-group"><?php echo app('translator')->get('label.status'); ?></label>
                    <select class="form-select" name="status">
                        <option value="1">Active</option>
                        <option value="0" selected>Inactive</option>
                    </select>
                    <br />
                    <label class="input-group"><?php echo app('translator')->get('label.photo'); ?></label>
                    <input class="form-control" type="file" name="image">
                    <br />
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    <a class="btn btn-primary" href="<?php echo e(route('customers.index')); ?>">Back</a>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#division").on('change', function() {
                var id = $(this).val();
                // window.alert(id);
                $.ajax({
                    url: "<?php echo e(url('/customers/get-district')); ?>",
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
                        $('#district').html(res.html);
                    }
                });
            });
        });

        $(document).ready(function() {
            $("#district").on('change', function() {
                var id = $(this).val();
                // window.alert(id);
                $.ajax({
                    url: "<?php echo e(url('/customers/get-thana')); ?>",
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
                        $('#thana').html(res.html);
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/customers/create.blade.php ENDPATH**/ ?>