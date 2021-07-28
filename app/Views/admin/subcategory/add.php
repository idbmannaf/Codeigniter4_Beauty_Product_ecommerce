<?php echo view('admin/inc/header')?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Subcategory</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">Subcategory</li>
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
                            <p class="login-box-msg">Add Subcategory</p>
                            <form action="<?php echo base_url('sub-category/save') ?>" method="post">
                                <?php echo csrf_field() ?>
                                <?php if (session()->getFlashdata('fail')): ?>
                                    <div class="alert alert-danger"><?php echo session()->getFlashdata('fail')?></div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('success')): ?>
                                    <div class="alert alert-success"><?php echo session()->getFlashdata('success')?></div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <lable for="name">Sub-Category Name</lable>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" value="">
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'name'):'' ?></span>
                                </div>
                                <div class="form-group">
                                    <lable for="category">Category</lable>
                                    <select name="category" id="category" class="form-control">
                                        <?php if ($category):foreach ($category as $cat): ?>
                                            <option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <lable for="details">Details</lable>
                                    <textarea name="details" id="details" cols="60" class="form-control" ></textarea>
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'details'):'' ?>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-info form-control" type="submit">Add Subcategory</button>
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
<?= $this->section('script') ?>
<!--<script>-->
<!--    $(document).ready(function (){-->
<!--        $( "#category" ).change(function() {-->
<!--            var val= $("#category").val();-->
<!--            $data={-->
<!--                'id':val-->
<!--            }-->
<!--                $.ajax({-->
<!--                   type:"POST",-->
<!--                   url:"/sub-category/ajaxrequest",-->
<!--                   data:$data,-->
<!--                   success:function (response){-->
<!--                        console.log(response);-->
<!--                        $("#subcat").html(response);-->
<!--                   }-->
<!--                });-->
<!--        });-->
<!---->
<!--    });-->
<!---->
<!--</script>-->
<?= $this->endSection() ?>
<?php echo view('admin/inc/footer')?>

