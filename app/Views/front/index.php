<?php echo $this->extend("front/layout/main") ?>


<?= $this->section('content') ?>
<!-- Slider -->
<div class="fr-slider-wrap">
    <div class="fr-slider">
        <ul class="slides">
            <li>
                <img src="<?php echo base_url('front/') ?>/img/front/slider/slide1.jpg" alt="">
                <div class="fr-slider-cont">
                    <h3>MEGA SALE -30%</h3>
                    <p>Winter collection for women's. <br>We all have choices for you. Check it out!</p>
                    <p class="fr-slider-more-wrap">
                        <a class="fr-slider-more" href="<?php echo base_url('/shop') ?>">View collection</a>
                    </p>
                </div>
            </li>
            <li>
                <img src="<?php echo base_url('front/') ?>/img/front/slider/slide2.jpg" alt="">
                <div class="fr-slider-cont">
                    <h3>NEW COLLECTION</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>Aliquam consequuntur dolorem doloribus fuga harum</p>
                    <p class="fr-slider-more-wrap">
                        <a class="fr-slider-more" href="<?php echo base_url('/shop') ?>">Shopping now</a>
                    </p>
                </div>
            </li>
            <li>
                <img src="<?php echo base_url('front/') ?>/img/front/slider/slide3.jpg" alt="">
                <div class="fr-slider-cont">
                    <h3>SUMMER TRENDS</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>Aliquam consequuntur dolorem doloribus fuga harum</p>
                    <p class="fr-slider-more-wrap">
                        <a class="fr-slider-more" href="<?php echo base_url('/shop') ?>">Start shopping</a>
                    </p>
                </div>
            </li>
        </ul>
    </div>
</div>


<!-- Popular Products -->
<div class="fr-pop-wrap">

    <h3 class="component-ttl"><span>Popular products</span></h3>

    <ul class="fr-pop-tabs sections-show">
        <li><a data-frpoptab-num="1" data-frpoptab="#frpoptab-tab-1" href="index.html#" class="active">All Categories</a></li>
        <li><a data-frpoptab-num="2" data-frpoptab="#frpoptab-tab-2" href="index.html#">Face</a></li>
        <li><a data-frpoptab-num="3" data-frpoptab="#frpoptab-tab-3" href="index.html#">Hair</a></li>
        <li><a data-frpoptab-num="4" data-frpoptab="#frpoptab-tab-4" href="index.html#">Make Up</a></li>
        <li><a data-frpoptab-num="5" data-frpoptab="#frpoptab-tab-5" href="index.html#">Body</a></li>
    </ul>

    <div class="fr-pop-tab-cont">

        <p data-frpoptab-num="1" class="fr-pop-tab-mob active" data-frpoptab="#frpoptab-tab-1">All Categories</p>
        <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-1">

            <ul class="slides">

                <?php if ($products) : foreach ($products as $product) : ?>
                        <li class="prod-i">
                            <div class="prod-i-top">
                                <a href="<?php echo base_url('single-product/' . $product['id']) ?>" class="prod-i-img"><img src="<?php echo base_url('uploads/products/' . $product['image']) ?>" alt="<?php echo $product['title'] ?>"></a>
                                <p class="prod-i-info">
                                    <a href="<?php echo base_url('wishlist/' . $product['id']) ?>" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                                    <a href="index.html#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                                    <a class="prod-i-compare" href="index.html#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                                </p>
                                <p class="prod-i-addwrap">
                                    <a href="<?php echo base_url('single-product/' . $product['id']) ?>" class="prod-i-add">Go to detail</a>
                                </p>
                            </div>
                            <h3>
                                <a href="<?php echo base_url('single-product/' . $product['id']) ?>"><?php echo $product['title'] ?></a>
                            </h3>
                            <p class="prod-i-price">
                                <b><?php echo $product['price'] ?></b>
                            </p>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>

        </div>

        <p data-frpoptab-num="1" class="fr-pop-tab-mob" data-frpoptab="#frpoptab-tab-1">Face</p>
        <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-2">

            <ul class="slides">
                <?php
                $id = 15;
                $ProductModel = new \App\Models\ProductModel();
                $Catproducts = $ProductModel->where('cat_id', $id)->orderBy('id', 'DESC')->findAll();
                ?>
                <?php if ($Catproducts) : foreach ($Catproducts as $product) : ?>
                        <li class="prod-i">
                            <div class="prod-i-top">
                                <a href="<?php echo base_url('single-product/' . $product['id']) ?>" class="prod-i-img"><img src="<?php echo base_url('uploads/products/' . $product['image']) ?>" alt="<?php echo $product['title'] ?>"></a>
                                <p class="prod-i-info">
                                    <a href="<?php echo base_url('wishlist/' . $product['id']) ?>" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                                    <a href="index.html#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                                    <a class="prod-i-compare" href="index.html#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                                </p>
                                <p class="prod-i-addwrap">
                                    <a href="<?php echo base_url('single-product/' . $product['id']) ?>" class="prod-i-add">Go to detail</a>
                                </p>
                            </div>
                            <h3>
                                <a href="<?php echo base_url('single-product/' . $product['id']) ?>"><?php echo $product['title'] ?></a>
                            </h3>
                            <p class="prod-i-price">
                                <b><?php echo $product['price'] ?></b>
                            </p>
                        </li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <h2 class="text-danger">No Product Found</h2>
                <?php endif; ?>
            </ul>

        </div>
        <p data-frpoptab-num="1" class="fr-pop-tab-mob" data-frpoptab="#frpoptab-tab-1">Hair</p>
        <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-3">

            <ul class="slides">
                <?php
                $id = 17;
                $ProductModel = new \App\Models\ProductModel();
                $Catproducts = $ProductModel->where('cat_id', $id)->orderBy('id', 'DESC')->findAll();
                ?>
                <?php if ($Catproducts) : foreach ($Catproducts as $product) : ?>
                        <li class="prod-i">
                            <div class="prod-i-top">
                                <a href="<?php echo base_url('single-product/' . $product['id']) ?>" class="prod-i-img"><img src="<?php echo base_url('uploads/products/' . $product['image']) ?>" alt="<?php echo $product['title'] ?>"></a>
                                <p class="prod-i-info">
                                    <a href="<?php echo base_url('wishlist/' . $product['id']) ?>" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                                    <a href="index.html#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                                    <a class="prod-i-compare" href="index.html#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                                </p>
                                <p class="prod-i-addwrap">
                                    <a href="<?php echo base_url('single-product/' . $product['id']) ?>" class="prod-i-add">Go to detail</a>
                                </p>
                            </div>
                            <h3>
                                <a href="<?php echo base_url('single-product/' . $product['id']) ?>"><?php echo $product['title'] ?></a>
                            </h3>
                            <p class="prod-i-price">
                                <b><?php echo $product['price'] ?></b>
                            </p>
                        </li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <h2 class="text-danger">No Product Found</h2>
                <?php endif; ?>
            </ul>

        </div>
        <p data-frpoptab-num="1" class="fr-pop-tab-mob" data-frpoptab="#frpoptab-tab-1">Make Up</p>
        <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-4">

            <ul class="slides">
                <?php
                $id = 18;
                $ProductModel = new \App\Models\ProductModel();
                $Catproducts = $ProductModel->where('cat_id', $id)->orderBy('id', 'DESC')->findAll();
                ?>
                <?php if ($Catproducts) : foreach ($Catproducts as $product) : ?>
                        <li class="prod-i">
                            <div class="prod-i-top">
                                <a href="<?php echo base_url('single-product/' . $product['id']) ?>" class="prod-i-img"><img src="<?php echo base_url('uploads/products/' . $product['image']) ?>" alt="<?php echo $product['title'] ?>"></a>
                                <p class="prod-i-info">
                                    <a href="<?php echo base_url('wishlist/' . $product['id']) ?>" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                                    <a href="index.html#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                                    <a class="prod-i-compare" href="index.html#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                                </p>
                                <p class="prod-i-addwrap">
                                    <a href="<?php echo base_url('single-product/' . $product['id']) ?>" class="prod-i-add">Go to detail</a>
                                </p>
                            </div>
                            <h3>
                                <a href="<?php echo base_url('single-product/' . $product['id']) ?>"><?php echo $product['title'] ?></a>
                            </h3>
                            <p class="prod-i-price">
                                <b><?php echo $product['price'] ?></b>
                            </p>
                        </li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <h2 class="text-danger">No Product Found</h2>
                <?php endif; ?>
            </ul>

        </div>
        <p data-frpoptab-num="1" class="fr-pop-tab-mob" data-frpoptab="#frpoptab-tab-1">Body</p>
        <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-5">

            <ul class="slides">
                <?php
                $id = 22;
                $ProductModel = new \App\Models\ProductModel();
                $Catproducts = $ProductModel->where('cat_id', $id)->orderBy('id', 'DESC')->findAll();
                ?>
                <?php if ($Catproducts) : foreach ($Catproducts as $product) : ?>
                        <li class="prod-i">
                            <div class="prod-i-top">
                                <a href="<?php echo base_url('single-product/' . $product['id']) ?>" class="prod-i-img"><img src="<?php echo base_url('uploads/products/' . $product['image']) ?>" alt="<?php echo $product['title'] ?>"></a>
                                <p class="prod-i-info">
                                    <a href="<?php echo base_url('wishlist/' . $product['id']) ?>" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                                    <a href="index.html#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                                    <a class="prod-i-compare" href="index.html#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                                </p>
                                <p class="prod-i-addwrap">
                                    <a href="<?php echo base_url('single-product/' . $product['id']) ?>" class="prod-i-add">Go to detail</a>
                                </p>
                            </div>
                            <h3>
                                <a href="<?php echo base_url('single-product/' . $product['id']) ?>"><?php echo $product['title'] ?></a>
                            </h3>
                            <p class="prod-i-price">
                                <b><?php echo $product['price'] ?></b>
                            </p>
                        </li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <h2 class="text-danger">No Product Found</h2>
                <?php endif; ?>
            </ul>

        </div>
    </div><!-- .fr-pop-tab-cont -->
</div><!-- .fr-pop-wrap -->


<!-- Banners -->
<div class="banners-wrap">
    <div class="banners-list">
        <div class="banner-i style_11">
            <span class="banner-i-bg" style="background: url(<?php echo base_url('front/') ?>/img/front/banners/1.jpg);"></span>
            <div class="banner-i-cont">
                <p class="banner-i-subttl">NEW COLLECTION</p>
                <h3 class="banner-i-ttl">MEN'S<br>CLOTHING</h3>
                <p class="banner-i-link"><a href="<?php echo base_url('/shop') ?>">View More</a></p>
            </div>
        </div>
        <div class="banner-i style_22">
            <span class="banner-i-bg" style="background: url(<?php echo base_url('front/') ?>/img/front/banners/2.jpg);"></span>
            <div class="banner-i-cont">
                <p class="banner-i-subttl">GREAT COLLECTION</p>
                <h3 class="banner-i-ttl">CLOTHING<br>ACCESSORIES</h3>
                <p class="banner-i-link"><a href="<?php echo base_url('/shop') ?>">Show more</a></p>
            </div>
        </div>
        <div class="banner-i style_21">
            <span class="banner-i-bg" style="background: url(<?php echo base_url('front/') ?>/img/front/banners/3.jpg);"></span>
            <div class="banner-i-cont">
                <h3 class="banner-i-ttl">SPORT<br>CLOTHES</h3>
                <p class="banner-i-link"><a href="<?php echo base_url('/shop') ?>">Go to catalog</a></p>
            </div>
        </div>
        <div class="banner-i style_21">
            <span class="banner-i-bg" style="background: url(<?php echo base_url('front/') ?>/img/front/banners/4.jpg);"></span>
            <div class="banner-i-cont">
                <h3 class="banner-i-ttl">MEN AND <br>WOMEN SHOES</h3>
                <p class="banner-i-link"><a href="<?php echo base_url('/shop') ?>">View More</a></p>
            </div>
        </div>
        <div class="banner-i style_22">
            <span class="banner-i-bg" style="background: url(<?php echo base_url('front/') ?>/img/front/banners/5.jpg);"></span>
            <div class="banner-i-cont">
                <p class="banner-i-subttl">DISCOUNT -20%</p>
                <h3 class="banner-i-ttl">HATS<br>COLLECTION</h3>
                <p class="banner-i-link"><a href="<?php echo base_url('/shop') ?>">Shop now</a></p>
            </div>
        </div>
        <div class="banner-i style_12">
            <span class="banner-i-bg" style="background: url(<?php echo base_url('front/') ?>/img/front/banners/6.jpg);"></span>
            <div class="banner-i-cont">
                <p class="banner-i-subttl">STYLISH CLOTHES</p>
                <h3 class="banner-i-ttl">WOMEN'S COLLECTION</h3>
                <p>A great selection of dresses, <br>blouses and women's suits</p>
                <p class="banner-i-link"><a href="<?php echo base_url('/shop') ?>">View More</a></p>
            </div>
        </div>
    </div>
</div>


<!-- Special offer -->
<div class="discounts-wrap">
    <h3 class="component-ttl"><span>Special offer</span></h3>
    <div class="flexslider discounts-list">
        <ul class="slides">
            <?php
            $ProductModel = new \App\Models\ProductModel();
            $offerProduct = $ProductModel->orderBy('id', 'DESC')->limit(20)->findAll();
            ?>
            <?php if ($offerProduct) : foreach ($offerProduct as $offers) : ?>
                    <li class="discounts-i">
                        <a href="product.html" class="discounts-i-img">
                            <img src="<?php echo base_url('uploads/products/' . $offers['image']) ?>" alt="<?php echo $offers['title'] ?>">
                        </a>
                        <h3 class="discounts-i-ttl">
                            <a href="<?php echo base_url('single-product/' . $offers['id']) ?>"><?php echo $offers['title'] ?></a>
                        </h3>
                        <p class="discounts-i-price">
                            <b><?php echo $offers['price'] - 100; ?></b> <del><?php echo $offers['price'] ?></del>
                        </p>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>


        </ul>
    </div>
    <div class="discounts-info">
        <p>Special offer!<br>Limited time only</p>
        <a href="catalog-list.html">Shop now</a>
    </div>
</div>


<!-- Latest news -->
<div class="posts-wrap">
    <div class="posts-list">
        <?php
        $blog_model = new \App\Models\BlogModel();
        $all_blog_lists = $blog_model->orderBy('id', 'DESC')->findAll();
        if ($all_blog_lists) : foreach ($all_blog_lists as $blog) :
        ?>
                <div class="posts-i">
                    <a class="posts-i-img" href="<?php echo base_url('blog/' . $blog['id']) ?>"><span style="background: url(<?php echo base_url('uploads/blog/' . $blog['image']) ?>)"></span></a>
                    <time class="posts-i-date" datetime="<?php echo $blog['created_at'] ?>"><span><?php echo Carbon\Carbon::parse($blog['created_at'])->format('d') ?></span> <?php echo Carbon\Carbon::parse($blog['created_at'])->format('M') ?></time>
                    <div class="posts-i-info">
                        <h3 class="posts-i-ttl"><a href="<?php echo base_url('blog/' . $blog['id']) ?>"><?php echo $blog['title'] ?></a></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>


<!-- Testimonials -->
<div class="reviews-wrap">
    <div class="reviewscar-wrap">
        <div class="swiper-container reviewscar">
            <div class="swiper-wrapper">

                <?php
                if ($testimonials) : foreach ($testimonials as $testimonial_details) : ?>
                        <div class="swiper-slide">
                            <p><?php echo $testimonial_details['details'] ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="swiper-container reviewscar-thumbs">
            <div class="swiper-wrapper">
                <?php if ($testimonials) : foreach ($testimonials as $testi) : ?>
                        <div class="swiper-slide">
                            <img src="<?php echo base_url('front') ?>/img/reviews/1.jpg" alt="Aureole Jayde">
                            <h3 class="reviewscar-ttl"><a href="#"><?php echo $testi['name']  ?></a></h3>
                            <p class="reviewscar-post"><?php echo $testi['title'] ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>


            </div>
        </div>
    </div>
</div>

<!-- Subscribe Form -->
<div class="newsletter">
    <h3>Subscribe to us</h3>
    <p>Enter your email if you want to receive our news</p>
    <form action="index.html#">
        <input placeholder="Your e-mail" type="text">
        <input name="OK" value="Subscribe" type="submit">
    </form>
</div>

<!-- Quick View Product - start -->
<div class="qview-modal">
    <div class="prod-wrap">
        <a href="product.html">
            <h1 class="main-ttl">
                <span>Reprehenderit adipisci</span>
            </h1>
        </a>
        <div class="prod-slider-wrap">
            <div class="prod-slider">
                <ul class="prod-slider-car">
                    <li>
                        <a data-fancybox-group="popup-product" class="fancy-img" href="img/popup/1.jpg">
                            <img src="img/popup/1.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-fancybox-group="popup-product" class="fancy-img" href="img/popup/2.jpg">
                            <img src="img/popup/2.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-fancybox-group="popup-product" class="fancy-img" href="img/popup/3.jpg">
                            <img src="img/popup/3.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-fancybox-group="popup-product" class="fancy-img" href="img/popup/4.jpg">
                            <img src="img/popup/4.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-fancybox-group="popup-product" class="fancy-img" href="img/popup/5.jpg">
                            <img src="img/popup/5.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-fancybox-group="popup-product" class="fancy-img" href="img/popup/6.jpg">
                            <img src="img/popup/6.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-fancybox-group="popup-product" class="fancy-img" href="img/popup/7.jpg">
                            <img src="img/popup/7.jpg" alt="">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="prod-thumbs">
                <ul class="prod-thumbs-car">
                    <li>
                        <a data-slide-index="0" href="index.html#">
                            <img src="img/popup/1.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-slide-index="1" href="index.html#">
                            <img src="img/popup/2.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-slide-index="2" href="index.html#">
                            <img src="img/popup/3.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-slide-index="3" href="index.html#">
                            <img src="img/popup/4.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-slide-index="4" href="index.html#">
                            <img src="img/popup/5.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-slide-index="5" href="index.html#">
                            <img src="img/popup/6.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-slide-index="6" href="index.html#">
                            <img src="img/popup/7.jpg" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="prod-cont">
            <p class="prod-actions">
                <a href="index.html#" class="prod-favorites"><i class="fa fa-heart"></i> Add to Wishlist</a>
                <a href="index.html#" class="prod-compare"><i class="fa fa-bar-chart"></i> Compare</a>
            </p>
            <div class="prod-skuwrap">
                <p class="prod-skuttl">Color</p>
                <ul class="prod-skucolor">
                    <li class="active">
                        <img src="img/color/blue.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/color/red.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/color/green.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/color/yellow.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/color/purple.jpg" alt="">
                    </li>
                </ul>
                <p class="prod-skuttl">Sizes</p>
                <div class="offer-props-select">
                    <p>XL</p>
                    <ul>
                        <li><a href="index.html#">XS</a></li>
                        <li><a href="index.html#">S</a></li>
                        <li><a href="index.html#">M</a></li>
                        <li class="active"><a href="index.html#">XL</a></li>
                        <li><a href="index.html#">L</a></li>
                        <li><a href="index.html#">4XL</a></li>
                        <li><a href="index.html#">XXL</a></li>
                    </ul>
                </div>
            </div>
            <div class="prod-info">
                <p class="prod-price">
                    <b class="item_current_price">$238</b>
                </p>
                <p class="prod-qnt">
                    <input type="text" value="1">
                    <a href="index.html#" class="prod-plus"><i class="fa fa-angle-up"></i></a>
                    <a href="index.html#" class="prod-minus"><i class="fa fa-angle-down"></i></a>
                </p>
                <p class="prod-addwrap">
                    <a href="index.html#" class="prod-add">Add to cart</a>
                </p>
            </div>
            <ul class="prod-i-props">
                <li>
                    <b>SKU</b> 05464207
                </li>
                <li>
                    <b>Manufacturer</b> Mayoral
                </li>
                <li>
                    <b>Material</b> Cotton
                </li>
                <li>
                    <b>Pattern Type</b> Print
                </li>
                <li>
                    <b>Wash</b> Colored
                </li>
                <li>
                    <b>Style</b> Cute
                </li>
                <li>
                    <b>Color</b> Blue, Red
                </li>
                <li><a href="index.html#" class="prod-showprops">All Features</a></li>
            </ul>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>