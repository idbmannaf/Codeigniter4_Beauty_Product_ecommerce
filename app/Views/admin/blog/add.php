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
                <div class=" m-auto">
                    <div class="card">
                        <div class="card-body register-card-body">
                            <p class="login-box-msg">Add a new user</p>

                            <form action="<?php echo site_url('blog/save') ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field() ?>
                                <?php if (session()->getFlashdata('fail')): ?>
                                    <div class="alert alert-danger"><?php echo session()->getFlashdata('fail')?></div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('success')): ?>
                                    <div class="alert alert-success"><?php echo session()->getFlashdata('success')?></div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <lable for="title">Blog Title</lable>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter blog title" value="<?php echo set_value('title') ?>">
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'title'):'' ?></span>
                                </div>
                                <div class="form-group">
                                    <lable for="excerpt">Excerpt</lable>
                                    <textarea class="form-control" name="excerpt" id="excerpt" ></textarea>
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'excerpt'):'' ?>
                                </div>
                                <div class="form-group">
                                    <lable for="content">Content</lable>
                                    <textarea class="form-control" name="content" id="editor" ></textarea>
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'content'):'' ?>
                                </div>
                                <div class="form-group">
                                    <lable for="image">Image</lable>
                                    <input type="file" class="form-control" id="image" name="image" >
                                    <span class="text-danger"><?php echo isset($validation)?  display_error($validation,'image'):'' ?></span>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info form-control" type="submit">Add Post</button>
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
<?php $this->section('script') ?>
<script>
    tinymce.init({
        selector: "textarea#editor",
        skin: "bootstrap",
        plugins: "lists, link, image, media",
        toolbar:
            "h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help",
        menubar: false,
        setup: (editor) => {
            // Apply the focus effect
            editor.on("init", () => {
                editor.getContainer().style.transition =
                    "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out";
            });
            editor.on("focus", () => {
                (editor.getContainer().style.boxShadow =
                    "0 0 0 .2rem rgba(0, 123, 255, .25)"),
                    (editor.getContainer().style.borderColor = "#80bdff");
            });
            editor.on("blur", () => {
                (editor.getContainer().style.boxShadow = ""),
                    (editor.getContainer().style.borderColor = "");
            });
        },
    });
</script>
<?php $this->endsection() ?>
<?php echo view('admin/inc/footer')?>

