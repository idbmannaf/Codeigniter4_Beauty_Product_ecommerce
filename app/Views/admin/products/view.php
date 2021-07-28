<?php echo view('admin/inc/header')?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a class="btn btn-info" href="<?php  echo base_url('product/add') ?>">Add Products</a>
                </div>
                <div class="col-sm-6">
                    <div class=" float-sm-right">
                        <a class="btn btn-info" href="<?php echo  base_url('/product') ?>">All Products</a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-10 m-auto">
                <div class="card">
                    <div class="card-body register-card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="text-dark"><?php echo $single_products['title']?></h2>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <img class="img-fluid" src="<?php echo base_url('uploads/products/'.$single_products['image']) ?>" alt="">
                            </div>
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                        <tr>
                                            <th>Price</th>
                                            <td><?php echo $single_products['price']?></td>
                                        </tr>

                                       <tr>
                                           <th>Quantity</th>
                                           <td><?php echo $single_products['quantity']?></td>
                                       </tr>

                                       <tr>
                                           <th>Category</th>
                                           <td><?php
                                                $cat= new \App\Models\CategoryModel();
                                                $catName= $cat->find($single_products['cat_id']);
                                                echo $catName['name'];
                                               ?></td>
                                       </tr>

                                        <tr>
                                            <th>Sub Category</th>
                                            <td><?php
                                                $sub= new App\Models\SubCategoryModel();
                                            $subCategory= $sub->find($single_products['sub_cat_id']);
                                            echo $subCategory['name'];
                                                ?></td>
                                        </tr>

                                        <tr>
                                            <th>Added By</th>
                                            <td><?php
                                                $added= new \App\Models\UserModel();
                                            $added_by= $added->find($single_products['added_by']);
                                            echo $added_by['name'];
                                                ?></td>
                                        </tr>
                                        <tr>
                                            <th>Created at</th>
                                            <td><?php echo $single_products['created_at']?></td>
                                        </tr>
                                       <tr>
                                           <th>Updated At</th>
                                           <td><?php echo $single_products['updated_at']?></td>
                                       </tr>

                                        <tr>
                                            <th>Status</th>
                                            <td><?php

                                                    if ($single_products['status'] == 0){
                                                        echo '<span class="text-success">Published</span>';
                                                    }elseif ($single_products['status']==1){
                                                        echo '<span class="text-warning">Private</span>';
                                                    }elseif ($single_products['status']==2){
                                                        echo '<span class="text-danger">Deleted</span>';
                                                    }
                                                ?></td>
                                        </tr>

                                </table>
                            </div>
                            <div class="descriptin">
                                <b>Product Details:</b> <br><?php echo $single_products['details']?>

                            </div>
                        </div>
                    </div>
                    <!-- /.form-box -->
                </div><!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php echo view('admin/inc/footer')?>

