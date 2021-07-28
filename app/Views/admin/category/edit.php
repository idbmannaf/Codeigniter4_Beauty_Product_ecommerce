<?php echo view('admin/inc/header')?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">Update Category</li>
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
                            <form action="<?php echo base_url('category/update') ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field() ?>
                                <input type="hidden" name="id" value="<?php echo $single_cat['id']; ?>">
                                <?php if (session()->getFlashdata('fail')): ?>
                                    <div class="alert alert-danger"><?php echo session()->getFlashdata('fail')?></div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('success')): ?>
                                    <div class="alert alert-success"><?php echo session()->getFlashdata('success')?></div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <lable for="name">Name</lable>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" value="<?php echo $single_cat['name']?>">
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'name'):'' ?></span>
                                </div>
                                <div class="form-group">
                                    <lable for="details">Details</lable>
                                    <textarea name="details" id="details" cols="60" class="form-control" ><?php echo $single_cat['details']?></textarea>
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'details'):'' ?>
                                </div>
                                <div class="form-group">
                                    <lable for="image">Details</lable>
                                    <input type="file" class="form-control-file" name="image" id="image">
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'image'):'' ?>
                                         <img width="80px" height="80px" src="<?php echo $single_cat['image'] != null ? base_url()."/uploads/category/".$single_cat['image'] : base_url()."/uploads/cat-not-found.png"; ?>" alt="">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info form-control" type="submit">Update</button>
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

