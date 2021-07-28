<div class="header-bottom">
    <div class="container">
        <nav class="topmenu">

            <!-- Catalog menu - start -->
            <div class="topcatalog">
                <a class="topcatalog-btn" href="<?php echo site_url('/shop') ?>"><span>All</span> catalog</a>
                <ul class="topcatalog-list">
                    <?php $catModel= new \App\Models\CategoryModel();
                    $categories= $catModel->findAll();
                    ?>
                    <?php if ($categories): foreach ($categories as $category): ?>
                    <li>
                        <a id="catval"  href="<?php echo base_url('catalog/'.$category['id'])?>">
                            <?php echo $category['name']?>
                        </a>
                        <i class="fa fa-angle-right"></i>
                        <ul>
                            <?php
                            $catid=$category['id'];
                            $subCatModel= new \App\Models\SubCategoryModel();
                            $allSubcat= $subCatModel->where('cat_id',$catid)->findAll();
                            if ($allSubcat){
                                foreach ($allSubcat as $subcat){
                                    echo '<li>
                                            <a href="'.base_url("subcategory/".$subcat["id"]).'"> '.$subcat["name"].' </a>
                                         </li>';
                                }
                            }

                            ?>
                            

                        </ul>

                    <li>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- Catalog menu - end -->

            <!-- Main menu - start -->
            <button type="button" class="mainmenu-btn">Menu</button>

            <ul class="mainmenu">
                <li>
                    <a href="<?php echo base_url("/")?>" class="active">
                        Home
                    </a>
                </li>
                <li class="<?php echo basename(base_url(uri_string()),"/")  == 'shop'?'active':''?>">
                    <a href="<?php echo base_url('/shop')?>">Shop</a>
                </li>

                <li class="<?php echo basename(base_url(uri_string()),"/")  == 'blog'?'active':''?>">
                    <a href="<?php echo base_url('/blog')?>">
                        Blog
                    </a>
                </li>

                <li class="mainmenu-more">
                    <span>...</span>
                    <ul class="mainmenu-sub"></ul>
                </li>
            </ul>
            <!-- Main menu - end -->

            <!-- Search - start -->
            <div class="topsearch">
                <a id="topsearch-btn" class="topsearch-btn" href="index.html#"><i class="fa fa-search"></i></a>
                <form class="topsearch-form" action="<?php echo base_url('/search') ?>" method="get">
                    <input type="text" name="q" placeholder="Search products" value="<?php $value??'' ?>">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <!-- Search - end -->

        </nav>		</div>
</div>