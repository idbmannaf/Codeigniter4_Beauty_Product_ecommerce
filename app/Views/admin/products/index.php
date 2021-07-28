<?php echo view('admin/inc/header') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
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
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title"><a class="btn btn-info" href="<?php  echo base_url('product/add') ?>">Add Product</a></h3>
                            <p class="card-title">All Products</p>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="#myTable" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quanity</th>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Added By</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($products)) : foreach ($products as $product) : ?>
                                    <tr>
                                        <td><?php echo $product['id']; ?></td>
                                        <td><img width="40px" height="40px" src="<?php echo base_url('uploads/products/'.$product['image']) ?>" alt=""></td>

                                        <td><?php echo $product['title']; ?></td>
                                        <td><?php echo $product['price']; ?></td>
                                        <td><?php echo $product['quantity']; ?></td>
                                        <td><?php
                                            $cat= new \App\Models\CategoryModel();
                                           $catName= $cat->find($product['cat_id']);
                                           echo $catName['name'];
                                        ?></td>
                                        <td><?php
                                            $sub= new App\Models\SubCategoryModel();
                                            $subCategory= $sub->find($product['sub_cat_id']);
                                            echo $subCategory['name'];

                                            ?></td>
                                        <td><?php
                                            $added= new \App\Models\UserModel();
                                            $added_by= $added->find($product['added_by']);
                                            echo $added_by['name'];
                                            ?></td>
                                        <td>
                                            <?php

                                            if ($product['status'] == 0){
                                                echo '<span class="text-success">Published</span>';
                                            }elseif ($product['status']==1){
                                                echo '<span class="text-warning">Private</span>';
                                            }elseif ($product['status']==2){
                                                echo '<span class="text-danger">Deleted</span>';
                                            }
                                            ?>
                                           </td>
                                        <td width="10%">
                                            <?php echo anchor('product/view/' . $product['id'] . '', '<i class="fas fa-eye"></i>', ['class' => 'text-success']) ?>
                                            <?php echo anchor('product/edit/delete/thumb/' . $product['id'] . '', '<i class="fas fa-edit"></i>', ['class' => 'text-warning']) ?>
                                            <?php echo anchor('product/delete/' . $product['id'] . '', '<i class="fas fa-trash-alt"></i>', ['class' => 'text-danger', 'onclick' => "confirm('Are You Sure')"]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <!--                                    <th>Details</th>-->
                                    <th>Price</th>
                                    <th>Quanity</th>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Added By</th>
                                    <th>Upload Thumbnail</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
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
<?echo $this->section('content') ?>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
<?echo $this->endSection() ?>

<?php echo view('admin/inc/footer') ?>
