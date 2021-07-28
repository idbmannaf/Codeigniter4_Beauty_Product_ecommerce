<?php echo $this->extend("front/layout/main") ?>

<?= $this->section('content') ?>
<!-- Main Content - start -->
<main>
    <section class="container stylization maincont">

        <ul class="b-crumbs">
            <li>
                <a href="<?php echo base_url('/')?>">
                    Home
                </a>
            </li>
            <li>
                <span>Cart</span>
            </li>
        </ul>
        <h1 class="main-ttl"><span>Cart</span></h1>
        <div class="cart-messege"></div>
        <?php if (session()->getFlashdata('fail')): ?>
            <div class="alert alert-danger"><?php echo session()->getFlashdata('fail')?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?php echo session()->getFlashdata('success')?></div>
        <?php endif; ?>
        <!-- Cart Items - start -->


                <div class="cart-items-wrap">
                    <table class="cart-items">
                        <thead>
                        <tr>
                            <td class="cart-image">Photo</td>
                            <td class="cart-ttl">Products</td>
                            <td class="cart-price">Price</td>
                            <td class="cart-quantity">Quantity</td>
                            <td class="cart-summ">Summ</td>
                            <td class="cart-del">&nbsp;</td>
                        </tr>
                        </thead>
                        <tbody>
                        <form action="<?php echo base_url('update/cart')?>" method="post">
                            <?php echo csrf_field()?>

                        <?php if ($cart_items): $subtotal=0; $checkout_button_status=true;foreach ($cart_items as $item): ?>
                            <?php

                            $productModel= new \App\Models\ProductModel();
                            $productItem= $productModel->find($item['product_id']);
                            ?>
                            <tr>
                                <td class="cart-image">
                                    <a href="<?php echo base_url('single-product/'.$item['product_id'])?>">
                                        <img src="<?php echo base_url('uploads/products/'.$productItem['image'])?>" alt="Similique delectus totam">
                                    </a>
                                </td>
                                <td class="cart-ttl">
                                    <a href="<?php echo base_url('single-product/'.$item['product_id'])?>"><?php echo $productItem['title']; ?></a>
                                    <?php if ($productItem['quantity'] < $item['quantity']): ?>
                                        <span class="badge badge-danger">Out of Stock</span>
                                        <span><?php echo $productItem['quantity']?> item left</span>
                                        <?php $checkout_button_status=false ?>
                                    <?php endif; ?>
                                    <a href="#"class="badge badge-danger"></a>
                                </td>
                                <td class="cart-price">
                                    <b><?php echo $productItem['price'] ?></b>
                                </td>

                                <td class="quantity cart-plus-minus">
                                    <input name="quantity[<?php echo $item['id']?>]" value="<?php echo $item['quantity'];?>" type="text">
                                </td>
<!--                                <td class="cart-quantity">-->
<!--                                    <p class="cart-qnt">-->
<!--                                        <input name="quantity[--><?php //echo $item['id']?><!--]" value="--><?php //echo $item['quantity'];?><!--" type="text">-->
<!--                                        <a href="cart.html#" class="cart-plus"><i class="fa fa-angle-up"></i></a>-->
<!--                                        <a href="cart.html#" class="cart-minus"><i class="fa fa-angle-down"></i></a>-->
<!--                                    </p>-->
<!--                                </td>-->
                                <td class="cart-summ">
                                    <b><?php echo $total= $item['quantity'] * $productItem['price'] ?></b>
                                </td>
                                <td class="cart-del">
                                    <a href="#" class="cart-remove" title="<?php echo $item['id'];?>" data-id="<?php echo $item['id'];?>"></a>
                                </td>
                            </tr>
                            <?php  $subtotal +=$total;?>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" ><h1 class="text-center text-danger">No Product Found in Cart</h1>
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row ">
                        <div class="col-md-9 ">
                            <div class="cart-submit">
                                <div class="update-cart d-inline-block">
                                    <button type="submit" style="background-color: black; color: white; display:inline-block;" >Update</button>
<!--                                    <a class="btn btn-infor" style="background-color: black; color: white" href="#">Update</a>-->
                                    <a class="btn btn-infor" style="background-color: black; color: white" href="#">Continue Shoping</a>
                                    </form>

                                </div>
                                <div class="cart-coupon">
                                    <h3>Coupons</h3>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <input placeholder="Enter Coupon Code" type="text" id="code" value="<?php echo $coupone_name?>">
                                                <?php
                                                $session = \Config\Services::session();
                                                if ($session->getFlashdata('error')){
                                                    echo '<span class="text-danger">'.$session->getFlashdata('error').'</span>';
                                                }elseif ($session->getFlashdata('invalid')){
                                                    echo '<span class="text-danger">'.$session->getFlashdata('invalid').'</span>';
                                                }elseif ($session->getFlashdata('added')){
                                                    echo '<span class="text-success">'.$session->getFlashdata('added').'</span>';
                                                }
                                                ?>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" value="Apply" id="submitCoupons">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="calculation">
                                <div class=" d-block float-end">
                                    <table>
                                        <tr>
                                            <th>TOTAL:</th>
                                            <td><?php if (isset($subtotal)){ echo $subtotal;} ?></td>
                                        </tr>
                                        <tr>
                                            <th>Discount (<?php echo $discount_amount?>%):</th>
                                            <td><?php  $totalDiscount= ($discount_amount / 100)*$subtotal; echo $totalDiscount;?></td>
                                        </tr>
                                        <tr>
                                            <th>Subtotal:</th>
                                            <td><?php echo $totalAmount= $subtotal-($discount_amount / 100)*$subtotal?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="m-auto">
                                                <?php if ($checkout_button_status){
                                                    echo '<a ="" href="'.base_url('/checkout').'" class=" btn btn-info text-white" style="background-color: black; color: white">Checkout</a>';
                                                }else{
                                                    echo '<p class="text-danger">Check Stockout Products</p> ';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $session->set('total',$subtotal);
                                        $session->set('discount',($discount_amount / 100)*$subtotal);
                                        $session->set('subtotal',$subtotal-($discount_amount / 100)*$subtotal);
                                        ?>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
        <!-- Cart Items - end -->

    </section>
</main>
<!-- Main Content - end -->
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function (){
        $("a.cart-remove").on('click',function (event){
            event.preventDefault();
           var cart_id= $(this).attr('title');
            // alert(cart_id);
            $.ajax({
                type:'POST',
                url:'/delete-from-cart',
                data:{'id':cart_id},
                success:function (response){
                    location.reload();
                    if (response== 'done'){
                        $('.cart-messege').html('<div class="alert alert-success">Product Removed from Cart</div>')
                    }
                    // console.log(response);
                }

            });
        });
        $('#submitCoupons').click(function (){
            var codeI= $('#code').val();
            var baseurl= "<?php echo base_url('cart/')?>/"+codeI;
            window.location= baseurl;
        });
        $('.qtybutton').click(function (){
           $(".update-cart button").css('background-color','red');
        });

    });
</script>
<?= $this->endSection() ?>
