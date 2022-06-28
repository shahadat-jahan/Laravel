
<?php $__env->startSection('content'); ?>
    <div class="container-fluid content text-center">
        <h1>Gallery</h1>
        <div class="container">
            <form class="d-flex col-6 offset-3" action="<?php echo e(route('image')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input class="form-control" type="file" name="image">
                <button class="btn btn-success" type="submit" name="submit">Upload</button>
            </form>
            <a href="<?php echo e(asset('public/images/img_5terre.jpg')); ?>" data-lightbox="photos">
            <img class="img-fluid img-thumbnail m-2" src="<?php echo e(asset('public/images/img_5terre.jpg')); ?>" alt="Cinque Terre"
                width="300" height="200">
            </a>

            <img class="img-fluid img-thumbnail m-2" src="<?php echo e(asset('public/images/img_forest.jpg')); ?>" alt="Forest"
                width="300" height="200">

            <img class="img-fluid img-thumbnail m-2" src="<?php echo e(asset('public/images/img_lights.jpg')); ?>"
                alt="Northern Lights" width="300" height="200">

            <img class="img-fluid img-thumbnail m-2" src="<?php echo e(asset('public/images/img_mountains.jpg')); ?>" alt="Mountains"
                width="300" height="200">

            <img class="img-fluid img-thumbnail m-2" src="<?php echo e(asset('public/images/img_trulli.jpg')); ?>" alt="Truli"
                width="300" height="200">

            <img class="img-fluid img-thumbnail m-2" src="<?php echo e(asset('public/images/img_chania.jpg')); ?>" alt="Chania"
                width="300" height="200">

            <img class="img-fluid img-thumbnail m-2" src="<?php echo e(asset('public/images/img_paris.jpg')); ?>" alt="Paris"
                width="300" height="200">

            <img class="img-fluid img-thumbnail m-2" src="<?php echo e(asset('public/images/img_girl.jpg')); ?>" alt="Girl"
                width="300" height="200">
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/gallery.blade.php ENDPATH**/ ?>