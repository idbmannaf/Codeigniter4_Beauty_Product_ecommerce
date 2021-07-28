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
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">All Users</h3>
                        <a class="btn btn-info" href="<?php echo base_url('coupons/add')?>">Add Coupon</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Coupons Code</th>
                                <th>Amount of Percent %</th>
                                <th>Coupons Validity Till</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($coupons_list)):foreach ($coupons_list as $coupons): ?>
                                <tr>
                                    <td><?php echo $coupons['id']; ?></td>
                                    <td><?php echo $coupons['coupons']; ?></td>
                                    <td><?php echo $coupons['discount']; ?></td>
                                    <td><?php echo  \Carbon\Carbon::parse($coupons['validity'])->diffForHumans(); ?></td>
                                    <td>
                                        <?php  echo anchor('coupons/edit/'.$coupons['id'].'','<i class="fas fa-edit"></i>',['class'=>'text-warning']) ?>
                                        <?php echo anchor('coupons/delete/'.$coupons['id'].'','<i class="fas fa-trash-alt"></i>',['class'=>'text-danger','onclick'=>"confirm('Are You Sure')"]) ?>
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
