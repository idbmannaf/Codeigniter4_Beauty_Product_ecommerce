<?php echo $this->extend("front/layout/main") ?>
<?= $this->section('title') ?>
Blog
<?= $this->endsection() ?>
<?= $this->section('content') ?>
        <ul class="b-crumbs">
            <li>
                <a href="index.html">
                    Home
                </a>
            </li>
            <li>
                <span>Blog</span>
            </li>
        </ul>
        <h1 class="main-ttl main-ttl-categs"><span>Blog</span></h1>
        <!-- Blog Categories -->
<!--        <ul class="blog-categs">-->
<!--            <li class="active"><a href="blog.html">All</a></li>-->
<!--            <li><a href="blog.html">News</a></li>-->
<!--            <li><a href="blog.html">Reviews</a></li>-->
<!--            <li><a href="blog.html">Articles</a></li>-->
<!--        </ul>-->

        <!-- Blog Posts - start -->
<div class="posts-list blog-page">
<?php if ($blogs):foreach ($blogs as $blog): ?>
            <div class="cf-sm-6 cf-lg-4 col-xs-6 col-sm-6 col-md-4 posts2-i">
                <a class="posts-i-img" href="<?php echo base_url('blog/'.$blog['id'])?>"><span style="background: url(<?php echo base_url('uploads/blog/'.$blog['image'])?>)"></span></a>
                <time class="posts-i-date" datetime="<?php echo $blog['created_at']?>"><span><?php echo Carbon\Carbon::parse($blog['created_at'])->format('d')?></span> <?php echo Carbon\Carbon::parse($blog['created_at'])->format('M')?></time>
                <h3 class="posts-i-ttl"><a href="<?php echo base_url('blog/'.$blog['id'])?>"><?php echo $blog['title']?></a></h3>
                <p><?php echo substr($blog['excerpt'],0,154)?></p>
                <a href="<?php echo base_url('blog/'.$blog['id'])?>" class="posts-i-more">Read more...</a>
            </div>
<?php endforeach; ?>
<?php endif; ?>
</div>
        <!-- Blog Posts - end -->

        <!-- Pagination - start -->
<!--        <ul class="pagi">-->
<!--            <li class="active"><span>1</span></li>-->
<!--            <li><a href="blog-2.html#">2</a></li>-->
<!--            <li><a href="blog-2.html#">3</a></li>-->
<!--            <li><a href="blog-2.html#">4</a></li>-->
<!--            <li class="pagi-next"><a href="blog-2.html#"><i class="fa fa-angle-double-right"></i></a></li>-->
<!--        </ul>-->
        <!-- Pagination - end -->

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>
