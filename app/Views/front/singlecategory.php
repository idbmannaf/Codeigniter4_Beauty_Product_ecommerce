<?php echo $this->extend("front/layout/main") ?>
<?= $this->section('title') ?>
<?php echo $category['name']?>
<?= $this->endsection() ?>
<?= $this->section('content') ?>
    <ul class="b-crumbs">
        <li>
            <a href="<?php echo base_url("/") ?>">
                Home
            </a>
        </li>
        <li>
            <a href="<?php echo base_url("/catalog") ?>">
                Catalog
            </a>
        </li>
        <li>
            <span><?php echo $category['name']; ?></span>
        </li>
    </ul>
        <?php if (session()->getFlashdata('fail')): ?>
            <div class="alert alert-danger"><?php echo session()->getFlashdata('fail')?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?php echo session()->getFlashdata('success')?></div>
        <?php endif; ?>
    <h1 class="main-ttl"><span><?php echo $category['name']; ?></span></h1>
    <!-- Catalog Sidebar - start -->

    <div class="section-sb">
        <!-- Catalog Categories - start -->
        <div class="section-sb-current">
            <h3><a href="#"><?php echo $category['name']; ?> <span id="section-sb-toggle" class="section-sb-toggle"><span class="section-sb-ico"></span></span></a></h3>
            <ul class="section-sb-list" id="section-sb-list">
                <?php
                $subcatModel= new \App\Models\SubCategoryModel();
                $subcategorylist= $subcatModel->where('cat_id',$category['id'])->findAll();
                ?>
                <?php if ($subcategorylist):foreach ($subcategorylist as $subcat): ?>
                <li class="categ-1 <?php echo basename(base_url(uri_string()))== $subcat['id']? 'active-nav':''?>">
                    <a id="subcatalog" href="<?php echo base_url('subcategory/'.$subcat['id'])?>">
                        <span class="categ-1-label"><?php echo $subcat['name'] ?></span>
                    </a>
                </li>
                    <?php endforeach; ?>
                    <?php endif; ?>
            </ul>
        </div>
        <!-- Catalog Categories - end -->

        <!-- Filter - start -->

            <div class="section-filter-cont">
                <h3>Shorting</h3>
                <select name="filter" id="filter" class="form-control">
                    <option value="">default sorting</option>
                    <option value="low_to_high">Low Price To High</option>
                    <option value="high_to_low">High Price To Low</option>
                    <option value="a_and_z">ZtoZ</option>
                    <option value="z_and_a">ZtoA</option>
                </select>
            </div>
            </div>
        </div>
        <!-- Filter - end -->

    </div>
    <!-- Catalog Sidebar - end -->
    <!-- Catalog Items | List V2 - start -->
    <div class="section-cont">

        <!-- Catalog Topbar - start -->
        <div class="section-top">
            <?php
            $uri = new \CodeIgniter\HTTP\URI(current_url());
            $segments= $uri->getSegments();
            ?>


            <!-- Sorting -->
            <div class="section-sortby">
                <p>default sorting</p>
                <ul>
                    <li>
                        <a href="catalog-list-2.html#">sort by popularity</a>
                    </li>
                    <li>
                        <a href="catalog-list-2.html#">low price to high</a>
                    </li>
                    <li>
                        <a href="catalog-list-2.html#">high price to low</a>
                    </li>
                    <li>
                        <a href="catalog-list-2.html#">by title A <i class="fa fa-angle-right"></i> Z</a>
                    </li>
                    <li>
                        <a href="catalog-list-2.html#">by title Z <i class="fa fa-angle-right"></i> A</a>
                    </li>
                    <li>
                        <a href="catalog-list-2.html#">default sorting</a>
                    </li>
                </ul>
            </div>

        </div>
        <!-- Catalog Topbar - end -->
        <div class="prod-items section-items">
            <?php if ($catWaise_grid_Product): foreach ($catWaise_grid_Product as $catProduct): ?>
                <div class="prod-i">
                    <div class="prod-i-top">
                        <a href="<?php echo base_url('single-product/'.$catProduct['id']) ?>" class="prod-i-img">
                            <img src="<?php echo base_url('uploads/products/'.$catProduct['image']) ?>" alt="Adipisci aperiam commodi">
                        </a>
                        <p class="prod-i-info">
                            <a href="<?php echo base_url('wishlist/'.$catProduct['id'])?>" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                            <a href="catalog-gallery.html#" class="qview-btn prod-i-qview"><span>Quick View</span><i class="fa fa-search"></i></a>
                            <a class="prod-i-compare" href="catalog-gallery.html#"><span>Compare</span><i class="fa fa-bar-chart"></i></a>
                        </p>
                        <a href="#" id="addtocart" data-product-id="<?php echo $catProduct['id']?>" data-quantity="1" class="prod-i-buy">Add to cart</a>
                        <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>

                        <div class="prod-i-properties">
                            <dl>
                                <dt>Exterior</dt>
                                <dd>Silt Pocket<br></dd>
                                <dt>Material</dt>
                                <dd>PU<br></dd>
                                <dt>Occasion</dt>
                                <dd>Versatile<br></dd>
                                <dt>Shape</dt>
                                <dd>Casual Tote<br></dd>
                                <dt>Pattern Type</dt>
                                <dd>Solid<br></dd>
                                <dt>Style</dt>
                                <dd>American Style<br></dd>
                                <dt>Hardness</dt>
                                <dd>Soft<br></dd>
                                <dt>Decoration</dt>
                                <dd>None<br></dd>
                                <dt>Closure Type</dt>
                                <dd>Zipper<br></dd>
                            </dl>
                        </div>
                    </div>
                    <h3>
                        <a href="<?php echo base_url('single-product/'.$catProduct['id']) ?>"><?php echo $catProduct['title']?></a>
                    </h3>
                    <p class="prod-i-price">
                        <b>$<?php echo $catProduct['price']?></b>
                    </p>
                </div>
            <?php endforeach; ?>
            <?php endif; ?>

        </div>
        <!-- Pagination - start -->
<div class="mt-5">
<!--    --><?php //echo $pager->links('category,bs_full') ?>
</div>
        <ul class="pagi">
            <li class="active"><span>1</span></li>
            <li><a href="catalog-list-2.html#">2</a></li>
            <li><a href="catalog-list-2.html#">3</a></li>
            <li><a href="catalog-list-2.html#">4</a></li>
            <li class="pagi-next"><a href="catalog-list-2.html#"><i class="fa fa-angle-double-right"></i></a></li>
        </ul>
        <!-- Pagination - end -->
    </div>
    <!-- Catalog Items | List V2 - end -->

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
                            <a data-slide-index="0" href="catalog-list-2.html#">
                                <img src="img/popup/1.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-slide-index="1" href="catalog-list-2.html#">
                                <img src="img/popup/2.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-slide-index="2" href="catalog-list-2.html#">
                                <img src="img/popup/3.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-slide-index="3" href="catalog-list-2.html#">
                                <img src="img/popup/4.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-slide-index="4" href="catalog-list-2.html#">
                                <img src="img/popup/5.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-slide-index="5" href="catalog-list-2.html#">
                                <img src="img/popup/6.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-slide-index="6" href="catalog-list-2.html#">
                                <img src="img/popup/7.jpg" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="prod-cont">
                <p class="prod-actions">
                    <a href="catalog-list-2.html#" class="prod-favorites"><i class="fa fa-heart"></i> Add to Wishlist</a>
                    <a href="catalog-list-2.html#" class="prod-compare"><i class="fa fa-bar-chart"></i> Compare</a>
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
                            <li><a href="catalog-list-2.html#">XS</a></li>
                            <li><a href="catalog-list-2.html#">S</a></li>
                            <li><a href="catalog-list-2.html#">M</a></li>
                            <li class="active"><a href="catalog-list-2.html#">XL</a></li>
                            <li><a href="catalog-list-2.html#">L</a></li>
                            <li><a href="catalog-list-2.html#">4XL</a></li>
                            <li><a href="catalog-list-2.html#">XXL</a></li>
                        </ul>
                    </div>
                </div>
                <div class="prod-info">
                    <p class="prod-price">
                        <b class="item_current_price">$238</b>
                    </p>
                    <p class="prod-qnt">
                        <input type="text" value="1">
                        <a href="catalog-list-2.html#" class="prod-plus"><i class="fa fa-angle-up"></i></a>
                        <a href="catalog-list-2.html#" class="prod-minus"><i class="fa fa-angle-down"></i></a>
                    </p>
                    <p class="prod-addwrap">
                        <a href="catalog-list-2.html#" class="prod-add">Add to cart</a>
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
                    <li><a href="catalog-list-2.html#" class="prod-showprops">All Features</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Quick View Product - end -->

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
                    // toastr["error"](response);
                    setTimeout(function(){
                        location.reload();
                    }, 2000)

                }
            });
        })
    });
</script>
<?= $this->endSection() ?>
