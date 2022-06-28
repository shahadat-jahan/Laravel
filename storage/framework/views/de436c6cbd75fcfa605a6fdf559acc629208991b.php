 <nav class="main-header navbar navbar-expand navbar-dark">
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
         <span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <!-- Left Side Of Navbar -->
         <?php if(Auth::user()): ?>
             <ul class="navbar-nav mr-auto">
                 <li class="nav-item">
                     <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                             class="fas fa-bars"></i></a>
                 </li>
                 <li class="nav-item d-none d-sm-inline-block">
                     <a href="<?php echo e(route('home')); ?>" class="nav-link">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="<?php echo e(route('divisions.index')); ?>"><?php echo e(__('Divisions')); ?></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="<?php echo e(route('districts.index')); ?>"><?php echo e(__('Districts')); ?></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="<?php echo e(route('thanas.index')); ?>"><?php echo e(__('Thanas')); ?></a>
                 </li>

             </ul>
         <?php endif; ?>

         <!-- Right Side Of Navbar -->
         <ul class="navbar-nav ml-auto">
             <!-- Authentication Links -->
             <?php if(auth()->guard()->guest()): ?>
                 <li class=" nav-item">
                     <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                 </li>
                 <?php if(Route::has('register')): ?>
                     <li class="nav-item">
                         <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                     </li>
                 <?php endif; ?>
             <?php else: ?>
                 <!-- Navbar Search -->
                 <li class="nav-item">
                     <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                         <i class="fas fa-search"></i>
                     </a>
                     <div class="navbar-search-block">
                         <form class="form-inline">
                             <div class="input-group input-group-sm">
                                 <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                     aria-label="Search">
                                 <div class="input-group-append">
                                     <button class="btn btn-navbar" type="submit">
                                         <i class="fas fa-search"></i>
                                     </button>
                                     <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                         <i class="fas fa-times"></i>
                                     </button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </li>
                 <li class="nav-item dropdown">
                     <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                         <?php echo e(Auth::user()->name); ?>

                     </a>

                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                         <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                             onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                             <?php echo e(__('Logout')); ?>

                         </a>

                         <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                             <?php echo csrf_field(); ?>
                         </form>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                         <i class="fas fa-expand-arrows-alt"></i>
                     </a>
                 </li>
             <?php endif; ?>
         </ul>
     </div>
 </nav>
 <script type="text/javascript">
     $(function() {
         $('a').each(function() {
             if ($(this).prop('href') == window.location.href) {
                 $(this).addClass('active');
                 $(this).parents().addClass('active');
             }
         });
     });
 </script>
<?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/layouts/nav.blade.php ENDPATH**/ ?>