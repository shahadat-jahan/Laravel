<?php if($districts): ?>
    <option value="0">-Please select district-</option>
    <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $districtId = $row['id'];
            $district = $row['name'];
        ?>
        <option value=<?php echo e($districtId); ?>><?php echo e($district); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <option value="0">-Please select district-</option>
<?php endif; ?>
<?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/customers/getDistrict.blade.php ENDPATH**/ ?>