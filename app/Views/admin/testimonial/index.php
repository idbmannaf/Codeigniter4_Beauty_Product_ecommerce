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
                            <li class="breadcrumb-item active">Testimonial</li>
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
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>About</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($testimonial_data)) : foreach ($testimonial_data as $testmonial) : ?>
                                    <tr>
                                        <td><?php echo $testmonial['id']; ?></td>
                                        <td><?php echo $testmonial['image']; ?></td>
                                        <td><?php echo $testmonial['name']; ?></td>
                                        <td><?php echo $testmonial['title']; ?></td>
                                        <td><?php echo $testmonial['details'] ?></td>
                                        <td>
                                            <?php echo anchor('users/view/' . $testmonial['id'] . '', '<i class="fas fa-eye"></i>', ['class' => 'text-success']) ?>
                                            <?php echo anchor('users/edit/' . $testmonial['id'] . '', '<i class="fas fa-edit"></i>', ['class' => 'text-warning']) ?>
                                            <?php echo anchor('users/delete/' . $testmonial['id'] . '', '<i class="fas fa-trash-alt"></i>', ['class' => 'text-danger', 'onclick' => "confirm('Are You Sure')"]) ?>
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

<?php //echo session()->get('username')
?>