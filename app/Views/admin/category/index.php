<?php echo view('admin/inc/header')?>
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
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard')?>">Home</a></li>
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
                <?php if (session()->getFlashdata('fail')): ?>
                    <div class="alert alert-danger"><?php echo session()->getFlashdata('fail')?></div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?php echo session()->getFlashdata('success')?></div>
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
                                <th>Details</th>
                                <th>Added By</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($categories)):foreach ($categories as $cat): ?>
                                <tr>
                                    <td><?php echo $cat['id']; ?></td>
                                    <td>

                                        <img width="80px" height="80px" src="<?php echo $cat['image'] != null ? base_url()."/uploads/category/".$cat['image'] : base_url()."/uploads/cat-not-found.png"; ?>" alt=""></td>
                                    <td><?php echo $cat['name']; ?></td>
                                    <td><?php echo $cat['details']; ?></td>
                                    <td><?php
                                        $UserModel =new \App\Models\UserModel();
                                        $query= $UserModel->find($cat['adde_by']);
                                        echo $query['name']."(".$cat['adde_by'].")";
                                         ?></td>
                                    <td>
                                        <?php  echo anchor('admin/category/edit/'.$cat['id'].'','<i class="fas fa-edit"></i>',['class'=>'text-warning']) ?>
                                        <?php echo anchor('admin/category/delete/'.$cat['id'].'','<i class="fas fa-trash-alt"></i>',['class'=>'text-danger','onclick'=>"confirm('Are You Sure')"]) ?>
                                        <!--                                    <a class="text-success" href="#"><i class="fas fa-eye"></i></a>-->
                                                                            <a class="text-warning" href="<?php echo base_url('category/edit/'.$cat['id'])?>"><i class="fas fa-edit"></i></a>
                                        <!--                                    <a onclick="confirm('Are You Sure')" class="text-danger" href="--><?php //echo site_url('users/delete/'.$user['id']) ?><!--"><i class="fas fa-trash-alt"></i></a>-->
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
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

<?php echo view('admin/inc/footer')?>

<?php //echo session()->get('username')?>
