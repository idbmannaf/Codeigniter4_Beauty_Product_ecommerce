<!-- Logo, Shop-menu - start -->
<?php //echo get_cookie('generated_cart_id')?>
<div class="header-middle">
    <div class="container header-middle-cont">
        <div class="toplogo">
            <a href="<?php echo base_url("/")?>">
                <img src="<?php echo base_url('front/')?>/img/logo.png" alt="Beauty Products - Multiple Beauty Product">
            </a>
        </div>
        <div class="shop-menu">
            <ul>

                <li>
                    <a href="<?php echo base_url('/wishlist')?>">
                        <i class="fa fa-heart"></i>
                        <span class="shop-menu-ttl">Wishlist</span>
                        (<span id="topbar-favorites">
                            <?php
                            $wislist_model = new \App\Models\WishlistModel();
                            echo count($wislist_model->where('user_id',session()->get('userid'))->findAll());
                            ?>
                        </span>)
                    </a>
                </li>

                <li>
                    <a href="compare.html">
                        <i class="fa fa-bar-chart"></i>
                        <span class="shop-menu-ttl">Compare</span> (5)
                    </a>
                </li>


                <?php if (session()->get('userid')): ?>
                    <li class="topauth">
                        <a href="<?php echo base_url('/profile')?>">
                            <i class="fa fa-user"></i>
                            <span class="shop-menu-ttl">My Profile</span>
                        </a><a href="<?php echo site_url('auth/logout')?>">
                            <i class="fa fa-sign-out"></i>
                            <span class="shop-menu-ttl">Log Out</span>
                        </a>

                    </li>
                <?php else: ?>
                    <li class="topauth">
                        <a href="<?php echo base_url('auth/register')?>">
                            <i class="fa fa-lock"></i>
                            <span class="shop-menu-ttl">Registration</span>
                        </a>
                        <a href="<?php echo base_url('/auth')?>">
                            <span class="shop-menu-ttl">Login</span>
                        </a>
                    </li>
                <?php endif; ?>


                <li>
                    <div class="h-cart">
                        <a href="<?php echo base_url('/cart')?>">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="shop-menu-ttl">Cart</span>
                            (<b class="text-danger"><?php
                                $cartItem= new \App\Models\CartModel();

                                if (isset($_COOKIE["generated_cart_id"])) {
                                    $c= $cartItem->where('generated_cart_id',$_COOKIE["generated_cart_id"])->findAll();
                                    echo count($c);
                                } else {
                                    echo 0;
                                }


//
                            ?></b>)
                        </a>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- Logo, Shop-menu - end -->