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
            <div class="panel-heading"><h3 class="text-center">My Orders</h3></div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Order ID</th>
                        <th>Product Details</th>
                        <th>Billing Details</th>
                        <th>Total</th>
                        <th>Discount</th>
                        <th>Subtotal</th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $order_model = new \App\Models\OrderModel();
                    $order_list = $order_model->where('user_id',session()->get('userid'))->findAll();

                    ?>
                    <?php if ($order_list): foreach ($order_list as $order):?>
                        <?php
//                        $product_model = new \App\Models\ProductModel();
//                        $product= $product_model->where('id',$wishlist_item['product_id'])->get()->getRow();
                        ?>
                        <tr>
                            <td><?php echo $order['id'] ?></td>
                            <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal<?php echo $order['id'];?>">
                                    Details
                                </button></td>
                            <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal-bill<?php echo $order['id'];?>">
                                    Billing Details
                                </button></td></td>
                            <td><?php echo $order['total'] ?></td>
                            <td><?php echo $order['discount'] ?></td>
                            <td><?php echo $order['subtotal'] ?></td>
                            <td><?php
                                if ($order['payment_status'] == 2){
                                    echo '<span class="text-success"><span title="Case On Delivery"><b>COD</b></span></span>';
                                }else{
                                    echo '<span class="text-blue"><span title="Online Delivery">Online</span></span>';
                                }
                                ?></td>
                            <td><?php
                                if ($order['order_status'] == 1){
                                    echo '<span class="text-warning"><b>Pending</b></span>';
                                }elseif ($order['order_status'] == 2){
                                    echo '<span class="text-info">Processing</span>';
                                }elseif ($order['order_status'] == 3){
                                    echo '<span class="text-success">Delivered</span>';
                                }else{
                                    echo '<span class="text-danger">Returned</span>';
                                }

                                ?></td>
                            <td>
                                <?php if ($order['invoice_id'] != NULL):?>
                                    <a id="pdf" class="btn btn-info" data-pdf="<?php echo $order['id']?>" href="#"><i class="fa fa-download" aria-hidden="true"></i>Download</a>
                                <?php endif; ?>
                            <?php if ($order['order_status'] == 1){
                                echo '<a id="order_id" data-order="'.$order['id'].'" href="#" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i></a>';
                            } ?>
                            </td>
                        </tr>
                        <?php
                        $order_details= new \App\Models\OrderDetails();
                        $all_orders_products= $order_details->where('order_id',$order['id'])->findAll();
                        ?>
                        <?php
                        $user_model= new \App\Models\UserModel();
                        $user_name= $user_model->find($order['user_id']);
                        ?>
                        <!--                                Modal For Order Details-->
                        <div class="modal fade" id="exampleModal<?php echo $order['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ordered ID: <?php echo $order['id']?> </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php if ($all_orders_products): foreach ($all_orders_products as $product_item): ?>
                                            <?php $productModel= new \App\Models\ProductModel();
                                            $product_id = $productModel->where('title',$product_item['product_name'])->get()->getRow()->id;
                                            ?>
                                            <p><b>Product Name: </b> <a target="_blank" href="<?php echo base_url('product/view/'.$product_id)?>"><?php echo $product_item['product_name']?></a></p>
                                            <p><b>Product Price: </b><?php echo $product_item['product_price']?></p>
                                            <p><b>Product Quantity: </b><?php echo $product_item['product_quantity']?></p>
                                            <hr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--                                Modal For Order Billing Details-->
                        <div class="modal fade" id="exampleModal-bill<?php echo $order['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ordered ID: <?php echo $order['id']?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $order_bill_Model= new \App\Models\OrderBillingDetails();
                                        $order_bill_row= $order_bill_Model->where('order_id',$order['id'])->get()->getRow();
                                        $country_model= new \App\Models\CountryModel();
                                        $country_Name= $country_model->where('id',$order_bill_row->country_id)->get()->getRow()->name;
                                        $state_model= new \App\Models\StateModel();
                                        $state_name= $state_model->where('id',$order_bill_row->state_id)->get()->getRow()->name;
                                        $city_model = new \App\Models\CityModel();
                                        $city_name= $city_model->where('id',$order_bill_row->city_id)->get()->getRow()->name;
                                        ?>
                                        <p><b>Name: </b><?php echo $order_bill_row->name;?></p>
                                        <p><b>Email: </b><?php echo $order_bill_row->email;?></p>
                                        <p><b>Phone: </b><?php echo $order_bill_row->phone;?></p>
                                        <p><b>Company: </b><?php echo $order_bill_row->company;?></p>
                                        <p><b>Country: </b><?php echo $country_Name;?></p>
                                        <p><b>State: </b><?php echo $state_name;?></p>
                                        <p><b>City: </b><?php echo $city_name;?></p>
                                        <p><b>Address: </b><?php echo $order_bill_row->address;?></p>
                                        <p><b>PostCode: </b><?php echo $order_bill_row->postcode;?></p>
                                        <p><b>Massage: </b><?php echo $order_bill_row->massage;?></p>
                                        <p><b>Created Date: </b><?php echo $order_bill_row->created_at;?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>

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
        $('td a#order_id').on('click',function (event){
            event.preventDefault();
            var order_id= $(this).attr('data-order');
            $.ajax({
                type:'POST',
                url:'my-order/delete',
                data:{'id':order_id},
                success:function (response){
                    console.log(response);
                    toastr["error"](response);
                    setTimeout(function(){
                        location.reload();
                    }, 2000)

                }
            });
        });
        $('td a#pdf').on('click',function (event){
            event.preventDefault();
            var order_id= $(this).attr('data-pdf');
            $.ajax({
                type:'POST',
                url:'download/invoice',
                data:{'id':order_id},
                success:function (response){
                    console.log(response);
                    // toastr["error"](response);
                    // setTimeout(function(){
                    //     location.reload();
                    // }, 2000)

                }
            });
        });
    });
</script>
<?= $this->endSection() ?>
