<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>

<div class="container">
    <div class="row" style="margin-top: 45px">
        <div class="col-md-4 offset-md-4">
            <h2>Sign In</h2>
            <hr>
            <form action="<?php echo site_url('auth/check') ?>" method="post">
                <?php echo csrf_field()?>
                <?php if (session()->getFlashdata('fail')): ?>
                    <div class="alert alert-danger"><?php echo session()->getFlashdata('fail')?></div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?php echo session()->getFlashdata('success')?></div>
                <?php endif; ?>
                <div class="form-group">
                    <lable for="email">Email</lable>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com" value="<?php echo set_value('email')?>">
                    <span class="text-danger"><?php echo isset($validation)? display_error($validation,'email'):''?></span>
                </div>
                <div class="form-group my-2">
                    <lable for="password">Password</lable>
                    <input type="password" class="form-control" id="password" name="password" placeholder="****">
                    <span class="text-danger"><?php echo isset($validation)?display_error($validation,'password'):''?></span>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary form-control" type="submit">Sign  in</button>
                </div>
                <br>
                <a href="<?php echo site_url('auth/register') ?>">Register here</a>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>