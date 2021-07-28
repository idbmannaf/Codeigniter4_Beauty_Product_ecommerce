<?php echo view('admin/inc/header')?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">BLog</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                    </tr>
                    <?php if ($all_blog):foreach ($all_blog as $blog):?>
                        <tr>
                        <td><?php echo $blog['id']?></td>
                        <td><?php echo $blog['title'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php echo view('admin/inc/footer')?>

