<?php echo $this->extend("front/layout/main") ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-2">
        <ul>
            <li class="<?php echo basename(base_url(uri_string()))=="my-order"? 'active-nav':''?>"><a href="<?php echo base_url('/my-order')?>">My Order</a></li>
            <li class="<?php echo basename(base_url(uri_string()))=="wishlist"? 'active-nav':''?>"><a href="<?php echo base_url('/wishlist')?>">My Wishlist</a></li>
            <li class="<?php echo basename(base_url(uri_string()))=="edit-profile"? 'active-nav':''?>" ><a href="<?php echo base_url('/edit-profile')?>">Edit Profile</a></li>
        </ul>
    </div>
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="text-center">My Wishlist</h3></div>
            <div class="panel-body">
            <table class="table table-bordered">
    <tr>
        <th>Product image</th>
        <th>Product Name</th>
        <th>Product price</th>
        <th>Action</th>
    </tr>
    <?php
    $wishlist_model = new \App\Models\WishlistModel();
    $wishlist_items = $wishlist_model->where('user_id',session()->get('userid'))->findAll();

    ?>
    <?php if ($wishlist_items): foreach ($wishlist_items as $wishlist_item):?>
    <?php
    $product_model = new \App\Models\ProductModel();
    $product= $product_model->where('id',$wishlist_item['product_id'])->get()->getRow();
    ?>
    <tr>
        <td> <a href="<?php echo base_url('single-product/'.$product->id)?>" class="prod-i-img"><img width="100px" height="100px" src="<?php echo base_url('uploads/products/'.$product->image)?>" alt="<?php echo $product->title?>"></a></td>
        <td><a href="<?php echo base_url('single-product/'.$product->id)?>" class="prod-i-img"><?php echo $product->title?></a></td>
        <td><?php echo $product->price?></td>
        <td><a id="wishlist" href="#" class="btn btn-danger" data-wishlist-id="<?php echo $wishlist_item['id'] ?>">Delete</a></td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>

</table>

            </div>

        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    $('document').ready(function(){
        $('td a#wishlist').on('click',function (event){
            event.preventDefault();
            var wishlist= $(this).attr('data-wishlist-id');
                $.ajax({
                    type:'POST',
                    url:'/delete-wishlist-item',
                    data:{'id':wishlist},
                    success:function (response){
                        location.reload();
                        console.log(response);
                        toastr["success"](response);

                    }
                });
        });
    });
</script>
<?= $this->endSection() ?>
