<?php if(!($newCustomers)->isEmpty()): ?>
    <?php
     $i = 0;   
    ?>
    <?php $__currentLoopData = $newCustomers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $name = $row['fname'] . ' ' . $row['lname'];
            echo ++$i.' - '. $name . '<br />';
        ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <?php
        echo 'No new customer.';
    ?>
<?php endif; ?>
<?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/newCustomerModal.blade.php ENDPATH**/ ?>