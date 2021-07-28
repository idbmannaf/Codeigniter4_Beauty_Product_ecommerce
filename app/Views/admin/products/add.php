<?php echo view('admin/inc/header')?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
                </div>


                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">add Product</li>
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
                            <p class="login-box-msg">Add Product</p>
                            <form action="<?php echo base_url('product/save') ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field() ?>
                                <?php if (session()->getFlashdata('fail')): ?>
                                    <div class="alert alert-danger"><?php echo session()->getFlashdata('fail')?></div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('success')): ?>
                                    <div class="alert alert-success"><?php echo session()->getFlashdata('success')?></div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <lable for="title">Product Name</lable>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter product name" value="<?php echo set_value('title') ?>">
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'title'):'' ?></span>
                                </div>
                                <div class="form-group">
                                    <lable for="price">Price</lable>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter product Price" value="<?php echo set_value('price') ?>">
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'price'):'' ?></span>
                                </div>
                                <div class="form-group">
                                    <lable for="quantity">Product Quantity</lable>
                                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter product Quantity" value="<?php echo set_value('quantity') ?>">
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'quantity'):'' ?></span>
                                </div>
                                <div class="form-group">
                                    <lable for="cat_id">Category</lable>
                                    <select class="form-control" name="cat_id" id="cat_id">
                                        <option value="">Select category</option>
                                        <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'cat_id'):'' ?></span>
                                </div>
                                <div class="form-group">
                                    <lable for="sub_cat_id">Sub Category</lable>
                                    <select class="form-control" name="sub_cat_id" id="sub_cat_id">

                                    </select>
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'sub_cat_id'):'' ?></span>
                                </div>
                                <div class="form-group">
                                    <lable for="image">Product Image</lable>
                                    <input type="file" class="form-control-file" name="image" id="image">
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'image'):'' ?>
                                </div>
                                <div class="form-group">
                                    <lable for="thumbnail">Product thumbnail</lable>
                                    <input type="file" class="form-control-file" name="thumbnail[]" id="thumbnail" multiple>
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'thumbnail'):'' ?>
                                </div>
                                <div class="form-group">
                                    <lable for="details">Details</lable>
                                    <textarea name="details" id="details" cols="60" class="form-control" ><?php echo set_value('details') ?></textarea>
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'details'):'' ?>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info form-control" type="submit">Add Product</button>
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
<?php echo $this->section('script') ?>
<script>
       $(document).ready(function (){
           $( "#cat_id" ).change(function() {
               var val= $("#cat_id").val();
               $data={
                   'id':val
               }
                   $.ajax({
                      type:"POST",
                      url:"/product/productajax",
                      data:$data,
                      success:function (response){
                           console.log(response);
                           $('#sub_cat_id').html(response);

                      }
                   });
           });

       });


</script>
<?php echo $this->endSection() ?>
<?php echo view('admin/inc/footer')?>


