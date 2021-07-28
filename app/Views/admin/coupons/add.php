<?php echo view('admin/inc/header')?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Coupons</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">Coupons</li>
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
                        <h3 class="card-title">Add Coupons</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?php echo base_url('coupons/save') ?>" method="post">
                            <?php echo csrf_field() ?>
                            <div class="form-group">
                                <lable for="coupons">Coupons Name</lable>
                                <input type="coupons" class="form-control" id="coupons" name="coupons" placeholder="Enter Coupons Code" value="<?php echo set_value('coupons')?>">
                                <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'coupons'):'' ?></span>
                            </div>
                            <div class="form-group">
                                <lable for="discount">Discounts % </lable>
                                <input type="discount" class="form-control" id="discount" name="discount"  value="<?php echo set_value('discount')?>">
                                <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'discount'):'' ?>
                            </div>
                            <div class="form-group">
                                <lable for="validity">Coupons Validity</lable>
                                <input type="date" id="validity" class="form-control" name="validity" value="<?php echo set_value('validity')?>">
                                <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'validity'):'' ?>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info form-control" type="submit">Add Coupons</button>
                            </div>

                        </form>
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
