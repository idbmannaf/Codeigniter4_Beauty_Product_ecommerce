<?php echo view('admin/inc/header')?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">Add User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="register-box col-md-6 m-auto">
                    <div class="card">
                        <div class="card-body register-card-body">
                            <p class="login-box-msg">Add a new user</p>

                            <form action="<?php echo site_url('Dashboard/save') ?>" method="post">
                                <?php echo csrf_field() ?>
                                <?php if (session()->getFlashdata('fail')): ?>
                                    <div class="alert alert-danger"><?php echo session()->getFlashdata('fail')?></div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('success')): ?>
                                    <div class="alert alert-success"><?php echo session()->getFlashdata('success')?></div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <lable for="name">Name</lable>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" value="<?php echo set_value('name') ?>">
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'name'):'' ?></span>
                                </div>
                                <div class="form-group">
                                    <lable for="email">Email</lable>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="example@example.com" value="<?php echo set_value('email') ?>">
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'email'):'' ?>
                                </div>
                                <div class="form-group my-2">
                                    <lable for="password">Password</lable>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" value="<?php echo set_value('password') ?>">
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'password'):'' ?>
                                </div>
                                <div class="form-group my-2">
                                    <lable for="cpassword">Confirmation Password</lable>
                                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter Confirmation Password" value="<?php echo set_value('cpassword') ?>">
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'cpassword'):'' ?>
                                </div>
                                <div class="form-group">
                                    <lable for="role">Role</lable>
                                    <select name="role" id="role">
                                        <option value="0">Customer</option>
                                        <option value="1">Administrator</option>
                                    </select>
                                 </div>
                                <div class="form-group">
                                    <button class="btn btn-info form-control" type="submit">Sign Up</button>
                                </div>

                            </form>
                        </div>
                        <!-- /.form-box -->
                    </div><!-- /.card -->
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

