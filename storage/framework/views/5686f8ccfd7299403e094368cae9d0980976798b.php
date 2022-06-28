<?php if($modal): ?>
    
        <?php
            $name = $modal['fname'] . ' ' . $modal['lname'];
            $username = $modal['username'];
        ?>
        <?php if($modal['gender'] == 1): ?>
            <?php
                $gender = 'Male';
            ?>
        <?php else: ?>
            <?php
                $gender = 'Female';
            ?>
        <?php endif; ?>
        <?php
            $address = $modal['address'];
        ?>
        
        <?php if($modal['division_id'] == 0): ?>
            <?php
                $division = '--Division not selected--';
            ?>
        <?php else: ?>
            <?php
                $division = $modal->division->name;
            ?>
        <?php endif; ?>

        
        <?php if($modal['district_id'] == 0): ?>
            <?php
                $district = '--District not selected--';
            ?>
        <?php else: ?>
            <?php
                $district = $modal->district->name;
            ?>
        <?php endif; ?>

        
        <?php if($modal['thana_id'] == 0): ?>
            <?php
                $thana = '--Thana not selected--';
            ?>
        <?php else: ?>
            <?php
                $thana = $modal->thana->name;
            ?>
        <?php endif; ?>
        <?php
            echo 'Name: ' . $name . '<br />Username: ' . $username . '<br />Gender: ' . $gender . '<br />Address: ' . $address . ', ' . $thana . ', ' . $district . ', ' . $division;
        ?>
    
<?php else: ?>
    <?php
        echo 'No modal found.';
    ?>
<?php endif; ?>
<?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/customers/getDetail.blade.php ENDPATH**/ ?>