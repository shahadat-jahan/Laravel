<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('/home')); ?>" class="brand-link">
        <img src="<?php echo e(asset('public/dist/img/s_logo.png')); ?>" alt="Brand Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Swapnoloke</span>
    </a>

    <!-- Sidebar -->
    <?php if(Auth::user()): ?>
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo e(asset('public/images/avatar5.png')); ?>" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo e(Auth::user()->name); ?></a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                    <li class="nav-item nav-item">
                        <a href="<?php echo e(route('customers.index')); ?>" class="nav-link ">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Customers
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('products.index')); ?>" class="nav-link ">
                            <i class="nav-icon fa-solid fa-box"></i>
                            <p>
                                Product
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa-solid fa-cart-shopping"></i>
                            <p>
                                Purchase
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">    
                            <li class="nav-item">
                                <a href="<?php echo e(route('productPurchases.index')); ?>" class="nav-link ">
                                    <i class="fa-solid fa-list nav-icon"></i>
                                    <p>Purchase list</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('orders.index')); ?>" class="nav-link ">
                                    <i class="fas fa-boxes nav-icon"></i>
                                    <p>Order list</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('gallery')); ?>" class="nav-link ">
                            <i class="nav-icon fa-regular fa-images"></i>
                            <p>
                                Gallery
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('about')); ?>" class="nav-link ">
                            <i class="nav-icon fa-solid fa-circle-info"></i>
                            <p>
                                About Us
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('contact')); ?>" class="nav-link ">
                            <i class="nav-icon fa-solid fa-paper-plane"></i>
                            <p>
                                Contact Us
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    <?php endif; ?>
</aside>
<script type="text/javascript">
    $(function() {
        $('a').each(function() {
            if ($(this).prop('href') == window.location.href) {
                $(this).addClass('active');
                $(this).parents().addClass('menu-open active');
            }
        });
    });
</script><?php /**PATH E:\Xampp\htdocs\shahadat_laravel\resources\views/layouts/side_nav.blade.php ENDPATH**/ ?>