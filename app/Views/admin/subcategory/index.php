<?php echo view('admin/inc/header') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Subcategories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Subcategories</li>
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
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title"><a class="btn btn-info" href="<?php  echo base_url('sub-category/add') ?>">Add Subcategory</a></h3>
                                <p class="card-title">All Subcategory</p>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Sub Category</th>
                                    <th>Category</th>
                                    <th>Added By</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($sub_categories)) : foreach ($sub_categories as $sub_category) : ?>
                                    <tr>
                                        <td><?php echo $sub_category['id']; ?></td>
                                        <td> <?php echo $sub_category['name']?></td>
                                        <td><?php
                                            $cat= new \App\Models\CategoryModel();
                                            $c= $cat->find($sub_category['cat_id']);
                                            echo ($c['name']);
                                            ?></td>
                                        <td><?php
                                            $UserModel =new \App\Models\UserModel();
                                            $query= $UserModel->find($sub_category['adde_by']);
                                            echo $query['name']."(".$sub_category['adde_by'].")";
                                            ?></td>
                                        <td>
<!--                                            --><?php //echo anchor('sub-category/view/'.$sub_category['id'] . '', '<i class="fas fa-eye"></i>', ['class' => 'text-success']) ?>
                                            <?php echo anchor('sub-category/edit/' .$sub_category['id'] . '', '<i class="fas fa-edit"></i>', ['class' => 'text-warning']) ?>
                                            <?php echo anchor('sub-category/delete/'. $sub_category['id'] . '', '<i class="fas fa-trash-alt"></i>', ['class' => 'text-danger', 'onclick' => "confirm('Are You Sure')"]) ?>
                                          </td>
                                    </tr>
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

<?php echo view('admin/inc/footer') ?>

?>