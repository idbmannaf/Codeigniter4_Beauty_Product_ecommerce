<?php echo $this->extend("front/layout/main") ?>
<?= $this->section('title') ?>
<?php echo $single_product['title']?>
<?= $this->endsection() ?>
<?= $this->section('content') ?>

    <ul class="b-crumbs">
        <li>
            <a href="<?php echo base_url("/")?>">
                Home
            </a>
        </li>
        <li>
            <a href="<?php echo base_url("catalog/".$single_cat_id) ?>">
                <?php echo $single_cat; ?>
            </a>
        </li>
        <li>
            <?php
            $subcat_model= new \App\Models\SubCategoryModel();
            $sub_cat_id= $subcat_model->where('name',$single_subcat)->get()->getRow()->id
            ?>
            <a href="<?php echo base_url("subcategory/".$sub_cat_id) ?>">
                <?php
               echo $single_subcat;
                ?>
            </a>
        </li>
    </ul>
    <h1 class="main-ttl"><span><?php echo $single_product['title']?></span></h1>
    <!-- Single Product - start -->
    <div class="prod-wrap">
        <!-- Product Images -->
        <div class="prod-slider-wrap">
            <div class="prod-slider">
                <ul class="prod-slider-car">
                    <?php if ($product_thumbnail): foreach ($product_thumbnail as $sp): ?>
                    <li>
                        <a data-fancybox-group="product" class="fancy-img" href="<?php echo base_url('uploads/products/thumbnail/'.$sp['image'])?>">
                            <img src="<?php echo base_url('uploads/products/thumbnail/'.$sp['image'])?>" alt="">
                        </a>
                    </li>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <li>
                            <a data-fancybox-group="product" class="fancy-img" href="img/product/1.j<?php echo base_url('uploads/products/cummingsoon.jpg/')?>pg">
                                <img src="<?php echo base_url('uploads/products/cummingsoon.jpg/')?>" alt="">
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
            <div class="prod-thumbs">
                <ul class="prod-thumbs-car">
                    <?php $sl=0; ?>
                    <?php if ($product_thumbnail): foreach ($product_thumbnail as $st): ?>
                    <li>
                        <a data-slide-index="<?php echo $sl++; ?>" href="product.html#">
                            <img src="<?php echo base_url('uploads/products/thumbnail/'.$st['image'])?>" alt="">
                        </a>
                    </li>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <li>
                            <a data-slide-index="0" class="fancy-img" href="img/product/1.jpg">
                                <img src="<?php echo base_url('uploads/products/cummingsoon.jpg/')?>" alt="">
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <!-- Product Description/Info -->
        <div class="prod-cont">
            <div class="prod-cont-txt">
                    <?php echo mb_substr($single_product['details'],0,200)?>
            </div>
            <p class="prod-actions">
                <a href="<?php echo base_url('wishlist/'.$single_product['id'])?>" class="prod-favorites"><i class="fa fa-heart"></i> Wishlist</a>
                <a href="product.html#" class="prod-compare"><i class="fa fa-bar-chart"></i> Compare</a>
            </p>
            <div class="prod-info">
                <p class="prod-price">
                    <b class="item_current_price"><?php echo $single_product['price']?></b>
                </p>
                <form action="<?php echo base_url('/add-to-cart') ?>" method="post">
                    <?php echo csrf_field()?>
                    <input type="hidden" name="product_id" value="<?php echo $single_product['id']?>">
                <p class="prod-qnt">
                    <input id="number" value="1" type="text" name="quantity">
                    <a href="#" class="prod-plus"><i class="fa fa-angle-up"></i></a>
                    <a href="#" class="prod-minus"><i class="fa fa-angle-down"></i></a>
                </p>
                <p class="prod-addwrap">
                    <input type="submit"  name="cart" value="Add to cart" class="prod-add">
<!--                    <a href="product.html#" class="prod-add" rel="nofollow">Add to cart</a>-->
                </p>
                </form>
            </div>
            <ul class="prod-i-props">
                <li>
                    <b>SKU</b> 05464207
                </li>
            </ul>
        </div>

        <!-- Product Tabs -->
        <div class="prod-tabs-wrap">
            <ul class="prod-tabs">
                <li><a data-prodtab-num="1" class="active" href="product.html#" data-prodtab="#prod-tab-1">Description</a></li>
                <li><a data-prodtab-num="2" id="prod-props" href="product.html#" data-prodtab="#prod-tab-2">Features</a></li>
                <li><a data-prodtab-num="3" href="product.html#" data-prodtab="#prod-tab-3">Video</a></li>
                <li><a data-prodtab-num="4" href="product.html#" data-prodtab="#prod-tab-4">Articles (6)</a></li>
                <li><a data-prodtab-num="5" href="product.html#" data-prodtab="#prod-tab-5">Reviews (3)</a></li>
            </ul>
            <div class="prod-tab-cont">

                <p data-prodtab-num="1" class="prod-tab-mob active" data-prodtab="#prod-tab-1">Description</p>
                <div class="prod-tab stylization" id="prod-tab-1">
                    <?php echo $single_product['details'] ?>
                </div>
                <p data-prodtab-num="3" class="prod-tab-mob" data-prodtab="#prod-tab-3">Video</p>
                <div class="prod-tab prod-tab-video" id="prod-tab-3">
                    <iframe width="853" height="480" src="https://www.youtube.com/embed/kaOVHSkDoPY?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                </div>
                <p data-prodtab-num="5" class="prod-tab-mob" data-prodtab="#prod-tab-5">Reviews (3)</p>
                <div class="prod-tab" id="prod-tab-5">
                    <ul class="reviews-list">
                        <li class="reviews-i existimg">
                            <div class="reviews-i-img">
                                <img src="img/reviews/1.jpg" alt="Averill Sidony">
                                <div class="reviews-i-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <time datetime="2017-12-21 12:19:46" class="reviews-i-date">21 May 2017</time>
                            </div>
                            <div class="reviews-i-cont">
                                <p>Numquam aliquam maiores ratione dolores ducimus, laborum hic similique delectus. Neque saepe nobis omnis laudantium itaque tempore voluptate harum error, illum nemo, reiciendis architecto, quam tenetur amet sit quisquam cum.<br>Pariatur cum tempore eius nulla impedit cumque odit quos porro iste a voluptas, optio alias voluptate minima distinctio facere aliquid quasi, vero illum tenetur sed temporibus eveniet obcaecati.</p>
                                <span class="reviews-i-margin"></span>
                                <h3 class="reviews-i-ttl">Averill Sidony</h3>
                                <p class="reviews-i-showanswer"><span data-open="Show answer" data-close="Hide answer">Show answer</span> <i class="fa fa-angle-down"></i></p>
                            </div>
                            <div class="reviews-i-answer">
                                <p>Thanks for your feedback!<br>
                                    Nostrum voluptate autem, eaque mollitia sed rem cum amet qui repudiandae libero quaerat veniam accusantium architecto minima impedit. Magni illo illum iure tempora vero explicabo, esse dolores rem at dolorum doloremque iusto laboriosam repellendus. <br>Numquam eius voluptatum sint modi nihil exercitationem dolorum asperiores maiores provident repellat magnam vitae, consequatur omnis expedita, accusantium voluptas odit id.</p>
                                <span class="reviews-i-margin"></span>
                            </div>
                        </li>
                        <li class="reviews-i existimg">
                            <div class="reviews-i-img">
                                <img src="img/reviews/3.jpg" alt="Araminta Kristeen">
                                <div class="reviews-i-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <time datetime="2017-12-21 12:19:46" class="reviews-i-date">14 February 2017</time>
                            </div>
                            <div class="reviews-i-cont">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                <span class="reviews-i-margin"></span>
                                <h3 class="reviews-i-ttl">Araminta Kristeen</h3>
                                <p class="reviews-i-showanswer"><span data-open="Show answer" data-close="Hide answer">Show answer</span> <i class="fa fa-angle-down"></i></p>
                            </div>
                            <div class="reviews-i-answer">
                                Benjy, hi!<br>
                                Officiis culpa quos, quae optio quia.<br>
                                Amet sunt dolorem tempora, pariatur earum quidem adipisci error voluptates tempore iure, nobis optio temporibus voluptatum delectus natus accusamus incidunt provident sapiente explicabo vero labore hic quo?
                                <span class="reviews-i-margin"></span>
                            </div>
                        </li>
                        <li class="reviews-i">
                            <div class="reviews-i-cont">
                                <time datetime="2017-12-21 12:19:46" class="reviews-i-date">21 May 2017</time>
                                <div class="reviews-i-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                <span class="reviews-i-margin"></span>
                                <h3 class="reviews-i-ttl">Jeni Margie</h3>
                                <p class="reviews-i-showanswer"><span data-open="Show answer" data-close="Hide answer">Show answer</span> <i class="fa fa-angle-down"></i></p>
                            </div>
                            <div class="reviews-i-answer">
                                Hello, Jeni Margie!<br>
                                Nostrum voluptate autem, eaque mollitia sed rem cum amet qui repudiandae libero quaerat veniam accusantium architecto minima impedit. Magni illo illum iure tempora vero explicabo, esse dolores rem at dolorum doloremque iusto laboriosam repellendus. <br>Numquam eius voluptatum sint modi nihil exercitationem dolorum asperiores maiores provident repellat magnam vitae, consequatur omnis expedita, accusantium voluptas odit id.
                                <span class="reviews-i-margin"></span>
                            </div>
                        </li>
                    </ul>
                    <div class="prod-comment-form">
                        <h3>Add your review</h3>
                        <form method="POST" action="product.html#">
                            <input type="text" placeholder="Name">
                            <input type="text" placeholder="E-mail">
                            <textarea placeholder="Your review"></textarea>
                            <div class="prod-comment-submit">
                                <input type="submit" value="Submit">
                                <div class="prod-rating">
                                    <i class="fa fa-star-o" title="5"></i><i class="fa fa-star-o" title="4"></i><i class="fa fa-star-o" title="3"></i><i class="fa fa-star-o" title="2"></i><i class="fa fa-star-o" title="1"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Single Product - end -->

    <!-- Related Products - start -->
    <div class="prod-related">
        <h2><span>Related products</span></h2>
        <ul>
            <?php if($related_product): foreach ($related_product as $rp): ?>
                <li class="prod-rel-wrap">
                    <div class="prod-rel">
                        <a href="product.html" class="prod-rel-img">
                            <img src="<?php echo base_url('uploads/products/'.$rp['image'])?>" alt="Adipisci aperiam commodi">
                        </a>
                        <div class="prod-rel-cont">
                            <h3><a href="<?php echo base_url('/single-product/'.$rp['id'])?>"><?php echo $rp['title']?></a></h3>
                            <p class="prod-rel-price">
                                <b><?php echo $rp['price']?></b>
                            </p>
                            <div class="prod-rel-actions">
<!--                                    <input type="hidden" name="product_id" id="productid" value="--><?php //echo $rp['id']?><!--">-->
<!--                                    <input type="hidden" name="quantity" id="quantity" value="1">-->
<!--                                    --><?php //echo csrf_field()?>
                                <a title="<?php echo $rp['title']?>" href="<?php echo base_url('wishlist/'.$rp['id'])?>" class="prod-rel-favorites"><i class="fa fa-heart"></i></a>
                                <a title="Compare" href="product.html#" class="prod-rel-compare"><i class="fa fa-bar-chart"></i></a>
                                <p class="prod-i-addwrap">
                                    <a title="Add to cart" data-product-id="<?php echo $rp['id']?>" data-quantity="1" href="#" id="addtocart" class="prod-i-add"><i class="fa fa-shopping-cart"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
            <?php endif; ?>
        </ul>

    </div>
    <!-- Related Products - end -->


<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function (){
        $("a#addtocart").on('click',function (event){
            event.preventDefault();
            var productid= $(this).attr('data-product-id');
            var quantity= $(this).attr('data-quantity');
            $.ajax({
                type:'POST',
                url:'/add-to-cart',
                data:{'product_id':productid,'quantity':quantity},
                success:function (response){
                    if (response){
                        toastr["success"]('Your product added to cart successfully!');
                    }
                    setTimeout(function(){
                        location.reload();
                    }, 2000)

                }
            });
        })
        $(".prod-plus").click(function (event){
            event.preventDefault()
           var id = $('#number').val();
            var z=  parseInt(id);
            var d = $('#number').val( z+1);

        });
        $(".prod-minus").click(function (event){
            event.preventDefault()
            var id = $('#number').val();
            var z=  parseInt(id);
            if (z == 1){
                $('#number').val(1);
            }else {
                $('#number').val( z-1);
            }

        });
    })
    // $('document').read(function (){
    //     $("p a#addtocart").click(function (){
    //         alert("hello");
    //     })
       // $('p.prod-i-addwrap a#addtocar').on('click',function (event){
       //     alert("Hello");
       //     event.preventDefault();
       //     var product_id= $('.prod-rel-actions input#product_id').attr('value');
       //     alert(product_id);
       //
       // }) ;
    // });
</script>
<?= $this->endSection() ?>
