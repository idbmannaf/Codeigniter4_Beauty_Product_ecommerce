<?php echo view('admin/inc/header') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <!--                Message show Start-->
                    <?php if (session()->getFlashdata('fail')) : ?>
                        <div class="alert alert-danger"><?php echo session()->getFlashdata('fail') ?></div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success"><?php echo session()->getFlashdata('success') ?></div>
                    <?php endif; ?>
                    <!--                Message show End-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Total</th>
                                    <th>Discount</th>
                                    <th>Subtotal</th>
                                    <th>User</th>
                                    <th>Order Details</th>
                                    <th>billing</th>
                                    <th>Create Invoice</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Update order</th>
                                    <th>Created</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($orders)) : foreach ($orders as $order) : ?>
                                    <tr>
                                        <td><?php echo $order['id']; ?></td>
                                        <td><?php echo $order['total']; ?></td>
                                        <td><?php echo $order['discount']; ?></td>
                                        <td><?php echo $order['subtotal'];?></td>
                                        <td> <a target="_blank" href="<?php echo base_url('users/view/'.$order['user_id'])?>"><?php echo $order['user_id']?></a> </td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal<?php echo $order['id'];?>">
                                                Details
                                            </button>
                                        </td>

                                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal-bill<?php echo $order['id'];?>">
                                                Billing
                                            </button></td>
                                        <td>
                                            <?php if ($order['invoice_id']==NULL): ?>
                                                <a id="invoice" data-order-id="<?php echo $order['id']?>" class="btn btn-info" href="#"><i class="fa fa-plus" aria-hidden="true"></i> </a>
                                            <?php endif; ?>
                                            <?php if ($order['invoice_id'] !=NULL): ?>
                                                <a data-toggle="modal" data-target="#order-invoice<?php echo $order['id']?>" class="btn btn-info" href="#"><i class="fa fa-check" aria-hidden="true"></i> </a>
                                            <?php endif; ?>
                                        </td>
                                        <td>


                                            <?php
                                            if ($order['payment_status'] == 2){
                                                echo '<span class="text-success">COD</span>';
                                            }else{
                                                echo '<span class="text-success">Online</span>';
                                            }
                                             ?>
                                        </td>
                                        <form action="<?php echo base_url('all-order/update')?>" method="post">
                                            <?php echo csrf_field() ?>
                                            <input type="hidden" name="order_id" value="<?php echo $order['id']?>">
                                        <td>
                                            <select name="order_status" id="order_status">
                                                <option <?php echo $order['order_status'] == 1 ? 'selected':'';?> value="1">Pending</option>
                                                <option <?php echo $order['order_status'] == 2 ? 'selected':'';?> value="2">Processing</option>
                                                <option <?php echo $order['order_status'] == 3 ? 'selected':'';?> value="3">Delivered</option>
                                                <option <?php echo $order['order_status'] == 4 ? 'selected':'';?> value="4">Return</option>
                                            </select>
                                        </td>
                                            <td><button id="update" class="btn btn-info" type="submit">Update </button></td>
                                        </form>
                                        <td title="<?php echo $order['created_at'] ?>"><?php echo \Carbon\Carbon::parse($order['created_at'])->format('Y-m-d');?></td>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Ordered ID: <?php echo $order['id']?> & Ordered By
                                                        <a target="_blank" href="<?php echo base_url('users/view/'.$order['user_id'])?>"><?php echo $user_name['name']?></a> </h5>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Ordered ID: <?php echo $order['id']?> & Ordered By
                                                        <a target="_blank" href="<?php echo base_url('users/view/'.$order['user_id'])?>"><?php echo $user_name['name']?></a> </h5>
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
                                    <!--                                Modal For Invoice Id -->
                                    <div class="modal fade" id="order-invoice<?php echo $order['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ordered ID: <?php echo $order['id']?> & Ordered By
                                                        <a target="_blank" href="<?php echo base_url('users/view/'.$order['user_id'])?>"><?php echo $user_name['name']?></a> </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php echo $order['invoice_id']?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                            <?= $pager->links('group1', 'bs_full'); ?>

                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?= $this->section('script') ?>
<script>
    $('td a#invoice').on('click',function (event){
        event.preventDefault();
        var order_id= $(this).attr('data-order-id');
        $.ajax({
            type:'POST',
            url:'create/invoice',
            data:{'id':order_id},
            success:function (response){
                console.log(response);
                toastr["success"](response);
                setTimeout(function(){
                    location.reload();
                }, 2000)

            }
        });
    });
</script>
<?= $this->endSection() ?>
<?php echo view('admin/inc/footer') ?>


