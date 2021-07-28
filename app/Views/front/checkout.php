<?php echo $this->extend("front/layout/main") ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-8">
        <div class="checkout-form form-style">
            <h3 class="checkout-head">Billing Details</h3>
            <form action="<?php echo base_url('/order') ?>" method="post">
                <?php echo csrf_field()?>
                <div class="row">
                    <div class="col-12 mb">
                        <p>Name *</p>
                        <input type="text" name="name" value="<?php echo set_value('name')?>">
                        <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'name'):'' ?></span>
                    </div>
                    <div class="col-sm-6 col-12 mb">
                        <p>Email Address *</p>
                        <input name="email" type="email" value="<?php echo set_value('email')?>">
                        <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'email'):'' ?></span>
                    </div>
                    <div class="col-sm-6 col-12 mb">
                        <p>Phone No. *</p>
                        <input type="text" name="phone" value="<?php echo set_value('phone')?>">
                        <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'phone'):'' ?></span>
                    </div>
                    <div class="col-12 mb">
                        <p>Compani Name</p>
                        <input type="text" name="company" value="<?php echo set_value('company')?>">
                        <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'company'):'' ?></span>
                    </div>
                    <div class="col-md-4 col-12 mb">
                        <p>Country *</p>
                        <select name="country_id" id="country">
                            <option value="">Select Country</option>
                            <?php if ($countries):foreach ($countries as $country): ?>
                                <option value="<?php echo $country['id']?>"><?php echo $country['name']?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'country_id'):'' ?></span>
                    </div>
                    <div class="col-md-4 col-12 mb">
                        <p>State *</p>
                       <select name="state_id" id="state"></select>
                        <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'state_id'):'' ?></span>
                    </div>
                    <div class="col-md-4 col-12 mb">
                        <p>Town/City *</p>
                        <select name="city_id" id="city"></select>
                        <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'city_id'):'' ?></span>
                    </div>
                    <div class="col-12 mb">
                        <p>Your Address *</p>
                        <input type="text" name="address" value="<?php echo set_value('address')?>">
                        <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'address'):'' ?></span>
                    </div>
                    <div class="col-sm-2 col-12 mb">
                        <p>Postcode/ZIP</p>
                        <input type="text" name="postcode" value="<?php echo set_value('postcode')?>">
                        <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'postcode'):'' ?></span>
                    </div>
                    <div class="col-sm-10 col-12">
                        <p>Order Notes </p>
                        <textarea name="massage" placeholder="Notes about Your Order, e.g.Special Note for Delivery"><?php echo set_value('massage')?></textarea>
                        <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'massage'):'' ?></span>
                    </div>
                </div>

        </div>
    </div>
    <div class="col-lg-4">
        <div class="order-area">
            <h3 class="checkout-head">Your Order</h3>
            <ul class="total-cost">
                <?php  $session = \Config\Services::session(); ?>
                <li>Total<span class="pull-right"><?php echo $session->get('total'); ?></span></li>
                <li>Discount<span class="pull-right">-<?php echo $session->get('discount') ?></span></li>
                <li>Subtotal <span class="pull-right"><strong><?php echo $session->get('subtotal') ?></strong></span></li>
<!--                <li>Shipping <span class="pull-right">Free</span></li>-->

            </ul>
            <ul class="payment-method">
<!--                <li>-->
<!--                    <input id="bank" type="checkbox">-->
<!--                    <label for="bank">Direct Bank Transfer</label>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <input id="paypal" type="checkbox">-->
<!--                    <label for="paypal">Paypal</label>-->
<!--                </li>-->
                <li>
                    <input type="radio" value="1" name="payment_method">
                    <label for="online">Online Payment</label>
                </li>
                <li>
                    <input type="radio" value="2" name="payment_method">
                    <label for="delivery">Cash on Delivery</label>
                </li>
                <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'payment_method'):'' ?></span>
            </ul>
            <button type="submit">Place Order</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function (){
        $("#country").on('change',function (){
           var country= $(this).val();
            $.ajax({
                type:'POST',
                url:'/cuontry-to-state',
                data:{'country_id':country},
                success:function (response){
                    // location.reload();
                    // console.log(response);
                    $("select#state").html(response);

                }
            });
        });

        $('#state').on('change',function (){
            var state_id= $(this).val();
            $.ajax({
                type:'POST',
                url:'/state-to-city',
                data:{'state_id':state_id},
                success:function (response){
                    // location.reload();
                    console.log(response);
                    $("select#city").html(response);

                }
            });
        });
        $('#country').select2();
        $('#state').select2();
        $('#city').select2();
    });
</script>
<?= $this->endSection() ?>
