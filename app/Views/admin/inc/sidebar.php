<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('/dashboard')?>" class="brand-link">
        <img src="<?php echo base_url('admin')?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin MF</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('admin')?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo session()->get('username');?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="<?php echo site_url('/dashboard')?>" class="nav-link <?php echo basename(base_url(uri_string()),"/") == 'dashboard'?'active':'' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link <?php echo basename(base_url(uri_string()),"/") == 'users'?'active':'' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="<?php echo site_url('/users') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <?php echo anchor('users/add', '<i class="far fa-circle nav-icon"></i> <p>Add Users</p>', 'class="nav-link"');?>
<!--                            <a href="" class="nav-link">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Add Users</p>-->
<!--                            </a>-->
                        </li>
<!--                        <li class="nav-item">-->
<!--                            <a href="pages/charts/inline.html" class="nav-link">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Deleted Users</p>-->
<!--                            </a>-->
<!--                        </li>-->
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link <?php echo basename(base_url(uri_string()),"/") == 'product'?'active':'' ?>">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="<?php echo base_url('/product')?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('product/add')?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Products</p>
                            </a>
                        </li>
<!--                        <li class="nav-item">-->
<!--                            <a href="pages/charts/inline.html" class="nav-link">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Deleted Products</p>-->
<!--                            </a>-->
<!--                        </li>-->
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link <?php echo basename(base_url(uri_string()),"/") == 'category'?'active':'' ?>">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="<?php echo site_url('/category')?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('category/add')?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Categories</p>
                            </a>
                        </li>
<!--                        <li class="nav-item">-->
<!--                            <a href="--><?php //echo site_url('sub-category')?><!--" class="nav-link">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Sub Categories</p>-->
<!--                            </a>-->
<!--                        </li>-->
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link <?php echo basename(base_url(uri_string()),"/") == 'sub-category'?'active':'' ?>">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Sub Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="<?php echo site_url('/sub-category')?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Sub Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('sub-category/add')?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Sub Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link <?php echo basename(base_url(uri_string()),"/") == 'coupons'?'active':'' ?>">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Coupons
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="<?php echo site_url('/coupons')?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Coupons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('coupons/add')?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Coupons</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?php echo base_url('/testimonial')?>" class="nav-link <?php echo basename(base_url(uri_string()),"/") == 'testimonial'?'active':'' ?>">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                         Testimonial
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link <?php echo basename(base_url(uri_string()),"/") == 'all-order'?'active':'' ?>">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Orders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="<?php echo site_url('/all-order')?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Orders</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link <?php echo basename(base_url(uri_string()),"/") == 'blog'?'active':'' ?>">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Blog
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="<?php echo site_url('admin/blog/add')?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('blog/view')?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Blog</p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>