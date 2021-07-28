<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
<!--    <title>--><?php // echo $title??'Beauty Products - Multiple Beauty Product' ?><!--</title>-->
    <title>Beauty Products - <?php echo $this->renderSection('title') ?></title>

    <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700,700ii%7CRoboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('front/')?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('front/')?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('front/')?>/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="<?php echo base_url('front/')?>/css/ion.rangeSlider.skinFlat.css">
    <link rel="stylesheet" href="<?php echo base_url('front/')?>/css/jquery.bxslider.css">
    <link rel="stylesheet" href="<?php echo base_url('front/')?>/css/jquery.fancybox.css">
    <link rel="stylesheet" href="<?php echo base_url('front/')?>/css/flexslider.css">
    <link rel="stylesheet" href="<?php echo base_url('front/')?>/css/swiper.css">
    <link rel="stylesheet" href="<?php echo base_url('front/')?>/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url('front/')?>/css/media.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/')?>/css/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php echo $this->renderSection('style') ?>

</head>
<body>
<!-- Header - start -->
<header class="header">

    <!-- Topbar - start -->
    <div class="header_top">
        <div class="container">
            <ul class="contactinfo nav nav-pills">
                <li>
                    <i class='fa fa-phone'></i> +88 01744508287
                </li>
                <li>
                    <i class="fa fa-envelope"></i> idbmannaf@gmail.com
                </li>
            </ul>
            <!-- Social links -->
            <ul class="social-icons nav navbar-nav">
                <li>
                    <a href="http://facebook.com/abde.mannaf" rel="nofollow" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="https://bd.linkedin.com/in/idbmannaf" rel="nofollow" target="_blank">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="https://github.com/idbmannaf" rel="nofollow" target="_blank">
                        <i class="fa fa-github" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="http://twitter.com" rel="nofollow" target="_blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="http://vk.com" rel="nofollow" target="_blank">
                        <i class="fa fa-vk"></i>
                    </a>
                </li>
                <li>
                    <a href="http://instagram.com" rel="nofollow" target="_blank">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>
            </ul>		</div>
    </div>
    <!-- Topbar - end -->

<?php echo view('front/lib/midlenav')?>

    <!-- Topmenu - start -->
<?php echo view('front/lib/nav')?>
    <!-- Topmenu - end -->

</header>
<!-- Header - end -->
