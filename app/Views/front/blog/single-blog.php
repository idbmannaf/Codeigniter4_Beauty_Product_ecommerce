<?php echo $this->extend("front/layout/main") ?>
<?= $this->section('title') ?>
<?php echo $single_post->title;?>
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<section class="container">


    <ul class="b-crumbs">
        <li>
            <a href="<?php echo base_url('/')?>">
                Home
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('/blog')?>">
                Blog
            </a>
        </li>
        <li>
            <span><?php echo $single_post->title;?></span>
        </li>
    </ul>
    <h1 class="main-ttl"><span><?php echo $single_post->title;?></span></h1>
    <!-- Blog Post - start -->
    <div class="post-wrap stylization">
        <img class="post-img" src="<?php echo base_url('uploads/blog/'.$single_post->image)?>" alt="">
        <?php echo html_entity_decode($single_post->content) ?>
        <!-- Slider -->
        <div class="flexslider post-slider" id="post-slider-car">
            <ul class="slides">
                <li>
                    <a data-fancybox-group="fancy-img" class="fancy-img" href="img/post/post1.jpg"><img src="img/post/post1.jpg" alt=""></a>
                </li>
                <li>
                    <a data-fancybox-group="fancy-img" class="fancy-img" href="img/post/post2.jpg"><img src="img/post/post2.jpg" alt=""></a>
                </li>
                <li>
                    <a data-fancybox-group="fancy-img" class="fancy-img" href="img/post/post3.jpg"><img src="img/post/post3.jpg" alt=""></a>
                </li>
            </ul>
        </div>

        <!-- Share Links -->
        <div class="post-share-wrap">
            <ul class="post-share">
                <li>
                    <a onclick="window.open('https://www.facebook.com/sharer.php?s=100&amp;p[url]=<?php echo current_url()?>','sharer', 'toolbar=0,status=0,width=620,height=280');" data-toggle="tooltip" title="Share on Facebook" href="javascript:">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a onclick="popUp=window.open('http://twitter.com/home?status=Post with Shortcodes <?php echo current_url()?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" data-toggle="tooltip" title="Share on Twitter" href="javascript:;">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a onclick="popUp=window.open('http://vk.com/share.php?url=<?php echo current_url()?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" data-toggle="tooltip" title="Share on VK" href="javascript:;">
                        <i class="fa fa-vk"></i>
                    </a>
                </li>
                <li>
                    <a data-toggle="tooltip" title="Share on Pinterest" onclick="popUp=window.open('http://pinterest.com/pin/create/button/?url=<?php echo current_url()?>&amp;description=<?php echo $single_post->title?>&amp;media=<?php echo base_url('uploads/blog/'.$single_post->image)?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
                        <i class="fa fa-pinterest"></i>
                    </a>
                </li>
                <li>
                    <a data-toggle="tooltip" title="Share on Linkedin" onclick="popUp=window.open('http://linkedin.com/shareArticle?mini=true&amp;url=<?php echo current_url()?>&amp;title=<?php echo $single_post->title?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </li>
                <li>
                    <a data-toggle="tooltip" title="Share on Tumblr" onclick="popUp=window.open('http://www.tumblr.com/share/link?url=<?php echo current_url()?>&amp;name=<?php echo $single_post->title?>&amp;description=Aliquam%2C+consequuntur+laboriosam+minima+neque+nesciunt+quod+repudiandae+rerum+sint.+Accusantium+adipisci+aliquid+architecto+blanditiis+dolorum+excepturi+harum+ipsa%2C+ipsam%2C...','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
                        <i class="fa fa-tumblr"></i>
                    </a>
                </li>
            </ul>
            <ul class="post-info">
                <li><time datetime="<?php echo $single_post->created_at?>"> <?php echo \Carbon\Carbon::parse($single_post->created_at)->format('d M, Y')?></time></li>
                <li>Comments: <a href="post.html#">3</a></li>
            </ul>
        </div>

        <!-- Related Posts -->
        <div class="flexslider post-rel-wrap" id="post-rel-car">
            <ul class="slides">
                <?php if ($reletade_posts):foreach ($reletade_posts as $reletade_post): ?>
                <li class="posts-i">
                    <a class="posts-i-img" href="<?php echo base_url('blog/'.$reletade_post['id'])?>"><span style="background: url(<?php echo base_url('uploads/blog/'.$reletade_post['image'])?>)"></span></a>
                    <time class="posts-i-date" datetime="<?php echo $reletade_post['created_at']?>"><span><?php echo Carbon\Carbon::parse($reletade_post['created_at'])->format('d')?></span> <?php echo \Carbon\Carbon::parse($reletade_post['created_at'])->format('M')?></time>
                    <div class="posts-i-info">
                        <h3 class="posts-i-ttl"><a href="<?php echo base_url('blog/'.$reletade_post['id'])?>"><?php echo $reletade_post['title']?></a></h3>
                    </div>
                </li>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>

    </div>
    <!-- Blog Post - end -->

    <!-- Related Products - start -->
    <!-- Related Products - end -->

    <!-- Comments - start -->
    <ul class="reviews-list">
        <?php if ($comment_list): foreach ($comment_list as $comment):?>
        <li class="reviews-i existimg">
            <div class="reviews-i-img">
                <?php
                $user_model = new App\Models\UserDetailsModel();
                $comment_user_image= $user_model->where('user_id',$comment['user_id'])->get()->getRow()->image;
                ?>
                <img id="round-image" src="<?php if ($comment_user_image) {
                    echo base_url('uploads/profile_pic/' . $comment_user_image);
                }else{
                    echo base_url('uploads/profile_pic/demo.png');
                }
                ?>" alt="Jeni Margie">
                <div class="reviews-i-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <time datetime="<?php echo \Carbon\Carbon::parse($comment['created_at']);?>" class="reviews-i-date"><?php echo \Carbon\Carbon::parse($comment['created_at'])->format('d M, Y');?></time>
            </div>
            <div class="reviews-i-cont">
                <p><?php echo $comment['massage']?></p>
                <span class="reviews-i-margin"></span>
                <h3 class="reviews-i-ttl"><?php echo $comment['name'];?></h3>
            </div>
        </li>
        <?php endforeach; ?>
        <?php endif; ?>
    </ul>
    <!-- Comments - end -->

    <!-- Comment Form - start -->
    <?php if (session()->get('userid')): ?>
    <div class="prod-comment-form post-form">
        <h3>Add your comment</h3>
        <form method="POST" action="<?php echo base_url('/addcomment')?>">
            <?php echo csrf_field();?>
            <input type="text" placeholder="Name" name="name" id="name" required>
            <input type="email" placeholder="E-mail" name="email" required id="email">
            <textarea placeholder="Your comment" name="massage" required id="massage"></textarea>
            <div class="prod-comment-submit">
                <input type="hidden" name="post_id" value="<?php echo $single_post->id; ?>">
                <input type="submit" value="Submit">
                <div class="prod-rating">
                    <i class="a fa fa-star-o" title="5"></i>
                    <i class="b fa fa-star-o" title="4"></i>
                    <i class="c fa fa-star-o" title="3"></i>
                    <i class="d fa fa-star-o" title="2"></i>
                    <i class="e fa fa-star-o" title="1"></i>
                </div>
            </div>

        </form>
    </div>
    <?php else: ?>
    <div class="prod-comment-form post-form">
        <h3>Add Your Comment</h3>
        <p class="text-danger">You are not able to comment if you want to comment then please <a class="text-success" href="<?php echo base_url('/auth')?>">login here</a></p>
    </div>
    <?php endif; ?>
    <!-- Comment Form - end -->

</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    // $(document).ready(function (){
    //    $(".prod-rating i.a").click(function (){
    //       var val= $(this).attr('title');
    //       alert(vla);
    //    });
    // });
</script>
<?= $this->endSection() ?>
