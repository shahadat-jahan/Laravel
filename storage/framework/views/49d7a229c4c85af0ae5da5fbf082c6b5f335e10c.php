<?php if($thanas): ?>
    <option value="0">-Please select thana-</option>
    <?php $__currentLoopData = $thanas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $thanaId = $row['id'];
            $thana = $row['name'];
        ?>
        <option value=<?php echo e($thanaId); ?>><?php echo e($thana); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <option value="0">-Please select thana-</option>
<?php endif; ?>
<?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/customers/getThana.blade.php ENDPATH**/ ?>