
<?php $__env->startSection('content'); ?>
    <div class="container-fluid content text-center">
        <h1>Contact Us</h1>
        <div class="container px-5">
            <form method="POST" action="">
                <textarea class="from-control" name="message" rows="10" cols="60" placeholder="Write your message..."></textarea>
                <br/>
                <button class="btn btn-primary" type="submit">Send</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/contact.blade.php ENDPATH**/ ?>