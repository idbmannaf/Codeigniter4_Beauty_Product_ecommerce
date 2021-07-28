<?php echo $this->extend("front/layout/main") ?>
<?= $this->section('title') ?>
Search-<?php echo $value?>
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<ul class="b-crumbs">
    <li>
        <a href="<?php echo base_url("/") ?>">
            Home
        </a>
    </li>
    <li>
        serarch: <?php echo $value; ?>
    </li>

</ul>
<!-- Catalog Sidebar - start -->

</div>
<!-- Filter - end -->

</div>
<!-- Catalog Sidebar - end -->
<!-- Catalog Items | List V2 - start -->
<div class="section-cont">


    <!-- Catalog Topbar - end -->
    <div class="prod-items section-items">
        <?php if ($search_data): foreach ($search_data as $catProduct): ?>
            <div class="prod-i">
                <div class="prod-i-top">
                    <a href="<?php echo base_url('single-product/'.$catProduct['id']) ?>" class="prod-i-img">
                        <img src="<?php echo base_url('uploads/products/'.$catProduct['image']) ?>" alt="Adipisci aperiam commodi">
                    </a>
                    <p class="prod-i-info">
                        <a href="<?php echo base_url('wishlist/'.$catProduct['id'])?>" class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                        <a href="catalog-gallery.html#"  data-toggle="modal" data-target="#exampleModal" class="view-btn"><span>Quick View</span><i class="fa fa-search"></i></a>
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
<!--            --><?php //echo $pager->links('se,bs_full') ?>
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
