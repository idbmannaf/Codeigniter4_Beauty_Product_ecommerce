<?php echo $this->extend("front/layout/main") ?>

<?= $this->section('title') ?>
<?php echo $subcategory['name']?>
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<ul class="b-crumbs">
    <li>
        <a href="<?php echo base_url("/") ?>">
            Home
        </a>
    </li>
    <li>
        <a href="<?php echo base_url("/catalog".$cat_id) ?>">
            <?php echo $category['name']?>
        </a>
    </li>
    <li>
        <span><?php echo $subcategory['name']; ?></span>
    </li>
</ul>
<?php if (session()->getFlashdata('fail')): ?>
    <div class="alert alert-danger"><?php echo session()->getFlashdata('fail')?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?php echo session()->getFlashdata('success')?></div>
<?php endif; ?>
<h1 class="main-ttl"><span><?php echo $category['name']; ?></span></h1>
<!-- Catalog Sidebar - start -->

<div class="section-sb">
    <!-- Catalog Categories - start -->
    <div class="section-sb-current">
        <h3><a href="#"><?php echo $category['name']; ?> <span id="section-sb-toggle" class="section-sb-toggle"><span class="section-sb-ico"></span></span></a></h3>
        <ul class="section-sb-list" id="section-sb-list">
            <?php
            $subcatModel= new \App\Models\SubCategoryModel();
            $subcategorylist= $subcatModel->where('cat_id',$category['id'])->findAll();
            ?>
            <?php if ($subcategorylist):foreach ($subcategorylist as $subcat): ?>
                <li class="categ-1 <?php echo basename(base_url(uri_string()))== $subcat['id']? 'active-nav':''?>">
                    <a id="subcatalog" href="<?php echo base_url('subcategory/'.$subcat['id'])?>">
                        <span class="categ-1-label"><?php echo $subcat['name'] ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <!-- Catalog Categories - end -->

    <!-- Filter - start -->
    <div class="section-filter">
        <button id="section-filter-toggle" class="section-filter-toggle" data-close="Hide Filter" data-open="Show Filter">
            <span>Show Filter</span> <i class="fa fa-angle-down"></i>
        </button>
        <div class="section-filter-cont">
            <div class="section-filter-price">
                <div class="range-slider section-filter-price" data-min="0" data-max="1000" data-from="200" data-to="800" data-prefix="$" data-grid="false"></div>
            </div>
            <div class="section-filter-item">
                <p class="section-filter-ttl">Style <i class="fa fa-angle-down"></i></p>
                <div class="section-filter-fields">
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox2-1" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox2-1">Work</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox2-2" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox2-2">Vintage</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox2-3" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox2-3">Cute</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox2-4" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox2-4">Novelty</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox2-5" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox2-5">Brief</label>
                    </p>
                </div>
            </div>
            <div class="section-filter-item opened">
                <p class="section-filter-ttl">Material <i class="fa fa-angle-down"></i></p>
                <div class="section-filter-fields">
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox3-1" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox3-1">Cotton</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox3-2" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox3-2">Spandex</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox3-3" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox3-3">Polyester</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox3-4" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox3-4">Acetate</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox3-5" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox3-5">Microfiber</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox3-6" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox3-6">Silk</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox3-7" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox3-7">Fur</label>
                    </p>
                </div>
            </div>
            <div class="section-filter-item opened">
                <p class="section-filter-ttl">Decoration <i class="fa fa-angle-down"></i></p>
                <div class="section-filter-fields">
                    <div class="section-filter-select">
                        <select data-placeholder="Decoration" class="chosen-select">
                            <option>Pattern</option>
                            <option>Pockets</option>
                            <option>Button</option>
                            <option>Beading</option>
                            <option>LOGO</option>
                            <option>Spliced</option>
                            <option>Letter</option>
                            <option>Pleated</option>
                            <option>Appliques</option>
                            <option>Bow</option>
                            <option>Criss-Cross</option>
                            <option>Crystal</option>
                            <option>Draped</option>
                            <option>Embroidery</option>
                            <option>Feathers</option>
                            <option>Fur</option>
                            <option>Flowers</option>
                            <option>Lace</option>
                            <option>Pearls</option>
                            <option>Ruched</option>
                            <option>Ruffles</option>
                            <option>Sashes</option>
                            <option>Ribbons</option>
                            <option>Sequined</option>
                            <option>Tassel</option>
                            <option>Rivet</option>
                            <option>Hole</option>
                            <option>Hollow Out</option>
                            <option>Embroidered Flares</option>
                            <option>Cuffs</option>
                            <option>Patches</option>
                            <option>Fake Zippers</option>
                            <option>Bleached</option>
                            <option>Ripped</option>
                            <option>Washed</option>
                            <option>Patchwork</option>
                            <option>Scratched</option>
                            <option>Side Stripe</option>
                            <option>None</option>
                            <option>Character</option>
                            <option>Other</option>
                            <option>Badge</option>
                            <option>Offset printing</option>
                            <option>Patch pocket</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="section-filter-item opened">
                <p class="section-filter-ttl">Manufacturer country <i class="fa fa-angle-down"></i></p>
                <div class="section-filter-fields">
                    <div class="section-filter-select">
                        <select data-placeholder="Manufacturer country" class="chosen-select" multiple>
                            <optgroup label="EUROPE">
                                <option>Albania</option>
                                <option>Andorra</option>
                                <option>Armenia</option>
                                <option>Austria</option>
                                <option>Azerbaijan</option>
                                <option>Belarus</option>
                                <option>Belgium</option>
                                <option>Bosnia and Herzegovina</option>
                                <option>Bulgaria</option>
                                <option>Croatia</option>
                                <option>Cyprus</option>
                                <option>Czech Republic</option>
                                <option>Denmark</option>
                                <option>Estonia</option>
                                <option>Finland</option>
                                <option>France</option>
                                <option>Georgia</option>
                                <option>Germany</option>
                                <option>Greece</option>
                                <option>Hungary</option>
                                <option>Iceland</option>
                                <option>Ireland</option>
                                <option>Italy</option>
                                <option>Latvia</option>
                                <option>Liechtenstein</option>
                                <option>Lithuania</option>
                                <option>Luxembourg</option>
                                <option>Macedonia</option>
                                <option>Malta</option>
                                <option>Moldova</option>
                                <option>Monaco</option>
                                <option>Montenegro</option>
                                <option>Netherlands</option>
                                <option>Norway</option>
                                <option>Poland</option>
                                <option>Portugal</option>
                                <option>Romania</option>
                                <option>San Marino</option>
                                <option>Serbia</option>
                                <option>Slovakia</option>
                                <option>Slovenia</option>
                                <option>Spain</option>
                                <option>Sweden</option>
                                <option>Switzerland</option>
                                <option>Ukraine</option>
                                <option>United Kingdom</option>
                                <option>Vatican City</option>
                            </optgroup>
                            <optgroup label="ASIA">
                                <option>Afghanistan</option>
                                <option>Bahrain</option>
                                <option>Bangladesh</option>
                                <option>Bhutan</option>
                                <option>Brunei</option>
                                <option>Burma (Myanmar)</option>
                                <option>Cambodia</option>
                                <option>China</option>
                                <option>East Timor</option>
                                <option>India</option>
                                <option>Indonesia</option>
                                <option>Iran</option>
                                <option>Iraq</option>
                                <option>Israel</option>
                                <option>Japan</option>
                                <option>Jordan</option>
                                <option>Kazakhstan</option>
                                <option>Korea, North</option>
                                <option>Korea, South</option>
                                <option>Kuwait</option>
                                <option>Kyrgyzstan</option>
                                <option>Laos</option>
                                <option>Lebanon</option>
                                <option>Malaysia</option>
                                <option>Maldives</option>
                                <option>Mongolia</option>
                                <option>Nepal</option>
                                <option>Oman</option>
                                <option>Pakistan</option>
                                <option>Philippines</option>
                                <option>Qatar</option>
                                <option>Russian Federation</option>
                                <option>Saudi Arabia</option>
                                <option>Singapore</option>
                                <option>Sri Lanka</option>
                                <option>Syria</option>
                                <option>Tajikistan</option>
                                <option>Thailand</option>
                                <option>Turkey</option>
                                <option>Turkmenistan</option>
                                <option>United Arab Emirates</option>
                                <option>Uzbekistan</option>
                                <option>Vietnam</option>
                                <option>Yemen</option>
                            </optgroup>
                            <optgroup label="N. AMERICA">
                                <option>Antigua and Barbuda</option>
                                <option>Bahamas</option>
                                <option>Barbados</option>
                                <option>Belize</option>
                                <option>Canada</option>
                                <option>Costa Rica</option>
                                <option>Cuba</option>
                                <option>Dominica</option>
                                <option>Dominican Republic</option>
                                <option>El Salvador</option>
                                <option>Grenada</option>
                                <option>Guatemala</option>
                                <option>Haiti</option>
                                <option>Honduras</option>
                                <option>Jamaica</option>
                                <option>Mexico</option>
                                <option>Nicaragua</option>
                                <option>Panama</option>
                                <option>Saint Kitts and Nevis</option>
                                <option>Saint Lucia</option>
                                <option>Saint Vincent and the Grenadines</option>
                                <option>Trinidad and Tobago</option>
                                <option>United States</option>
                            </optgroup>
                            <optgroup label="S. AMERICA">
                                <option>Argentina</option>
                                <option>Bolivia</option>
                                <option>Brazil</option>
                                <option>Chile</option>
                                <option>Colombia</option>
                                <option>Ecuador</option>
                                <option>Guyana</option>
                                <option>Paraguay</option>
                                <option>Peru</option>
                                <option>Suriname</option>
                                <option>Uruguay</option>
                                <option>Venezuela</option>
                            </optgroup>
                            <optgroup label="AFRICA">
                                <option>Algeria</option>
                                <option>Angola</option>
                                <option>Benin</option>
                                <option>Botswana</option>
                                <option>Burkina</option>
                                <option>Burundi</option>
                                <option>Cameroon</option>
                                <option>Cape Verde</option>
                                <option>Central African Republic</option>
                                <option>Chad</option>
                                <option>Comoros</option>
                                <option>Congo</option>
                                <option>Congo</option>
                                <option>Djibouti</option>
                                <option>Egypt</option>
                                <option>Equatorial Guinea</option>
                                <option>Eritrea</option>
                                <option>Ethiopia</option>
                                <option>Gabon</option>
                                <option>Gambia</option>
                                <option>Ghana</option>
                                <option>Guinea</option>
                                <option>Guinea-Bissau</option>
                                <option>Ivory Coast</option>
                                <option>Kenya</option>
                                <option>Lesotho</option>
                                <option>Liberia</option>
                                <option>Libya</option>
                                <option>Madagascar</option>
                                <option>Malawi</option>
                                <option>Mali</option>
                                <option>Mauritania</option>
                                <option>Mauritius</option>
                                <option>Morocco</option>
                                <option>Mozambique</option>
                                <option>Namibia</option>
                                <option>Niger</option>
                                <option>Nigeria</option>
                                <option>Rwanda</option>
                                <option>Sao Tome and Principe</option>
                                <option>Senegal</option>
                                <option>Seychelles</option>
                                <option>Sierra Leone</option>
                                <option>Somalia</option>
                                <option>South Africa</option>
                                <option>South Sudan</option>
                                <option>Sudan</option>
                                <option>Swaziland</option>
                                <option>Tanzania</option>
                                <option>Togo</option>
                                <option>Tunisia</option>
                                <option>Uganda</option>
                                <option>Zambia</option>
                                <option>Zimbabwe</option>
                            </optgroup>
                            <optgroup label="OCEANIA">
                                <option>Australia</option>
                                <option>Fiji</option>
                                <option>Kiribati</option>
                                <option>Marshall Islands</option>
                                <option>Micronesia</option>
                                <option>Nauru</option>
                                <option>New Zealand</option>
                                <option>Palau</option>
                                <option>Papua New Guinea</option>
                                <option>Samoa</option>
                                <option>Solomon Islands</option>
                                <option>Tonga</option>
                                <option>Tuvalu</option>
                                <option>Vanuatu</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>
            <div class="section-filter-item">
                <p class="section-filter-ttl">Pattern Type <i class="fa fa-angle-down"></i></p>
                <div class="section-filter-fields">
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox4-1" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox4-1">Solid</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox4-2" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox4-2">Patchwork</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox4-3" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox4-3">Dot</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox4-4" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox4-4">Print</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox4-5" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox4-5">Character</label>
                    </p>
                </div>
            </div>
            <div class="section-filter-item">
                <p class="section-filter-ttl">Fit Type <i class="fa fa-angle-down"></i></p>
                <div class="section-filter-fields">
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox5-1" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox5-1">Loose</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox5-2" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox5-2">Skinny</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox5-3" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox5-3">Regular</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox5-4" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox5-4">Straight</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox5-5" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox5-5">Boot Cut</label>
                    </p>
                </div>
            </div>
            <div class="section-filter-item opened">
                <p class="section-filter-ttl">Fabric Type <i class="fa fa-angle-down"></i></p>
                <div class="section-filter-fields">
                    <p class="section-filter-field">
                        <input id="section-filter-radio1-1" value="on" type="radio" name="section-filter-radio1">
                        <label class="section-filter-radio" for="section-filter-radio1-1">Velour</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-radio1-2" value="on" type="radio" name="section-filter-radio1">
                        <label class="section-filter-radio" for="section-filter-radio1-2">Batik</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-radio1-3" value="on" type="radio" name="section-filter-radio1">
                        <label class="section-filter-radio" for="section-filter-radio1-3">Chiffon</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-radio1-4" value="on" type="radio" name="section-filter-radio1">
                        <label class="section-filter-radio" for="section-filter-radio1-4">Broadcloth</label>
                    </p>
                </div>
            </div>
            <div class="section-filter-item">
                <p class="section-filter-ttl">Wash <i class="fa fa-angle-down"></i></p>
                <div class="section-filter-fields">
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox6-1" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox6-1">Colored</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox6-2" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox6-2">Light</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox6-3" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox6-3">Medium</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox6-4" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox6-4">Stonewashed</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox6-5" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox6-5">White</label>
                    </p>
                    <p class="section-filter-field">
                        <input id="section-filter-checkbox6-6" value="on" type="checkbox">
                        <label class="section-filter-checkbox" for="section-filter-checkbox6-6">Distrressed</label>
                    </p>
                </div>
            </div>
            <div class="section-filter-buttons">
                <input class="btn btn-themes" id="set_filter" name="set_filter" value="Apply filter" type="button">
                <input class="btn btn-link" id="del_filter" name="del_filter" value="Reset" type="button">
            </div>
        </div>
    </div>
    <!-- Filter - end -->

</div>
<!-- Catalog Sidebar - end -->
<!-- Catalog Items | List V2 - start -->
<div class="section-cont">

    <!-- Catalog Topbar - start -->
    <div class="section-top">

        <!-- View Mode -->
        <ul class="section-mode">
            <li class="section-mode-gallery"><a title="View mode: Gallery" href="catalog-gallery.html"></a></li>
            <li class="section-mode-list active"><a title="View mode: List" href="catalog-list.html"></a></li>
            <li class="section-mode-table"><a title="View mode: Table" href="catalog-table.html"></a></li>
        </ul>

        <!-- Sorting -->
        <div class="section-sortby">
            <p>default sorting</p>
            <ul>
                <li>
                    <a href="catalog-list-2.html#">sort by popularity</a>
                </li>
                <li>
                    <a href="catalog-list-2.html#">low price to high</a>
                </li>
                <li>
                    <a href="catalog-list-2.html#">high price to low</a>
                </li>
                <li>
                    <a href="catalog-list-2.html#">by title A <i class="fa fa-angle-right"></i> Z</a>
                </li>
                <li>
                    <a href="catalog-list-2.html#">by title Z <i class="fa fa-angle-right"></i> A</a>
                </li>
                <li>
                    <a href="catalog-list-2.html#">default sorting</a>
                </li>
            </ul>
        </div>

        <!-- Count per page -->
        <div class="section-count">
            <p>12</p>
            <ul>
                <li><a href="catalog-list-2.html#">12</a></li>
                <li><a href="catalog-list-2.html#">24</a></li>
                <li><a href="catalog-list-2.html#">48</a></li>
            </ul>
        </div>

    </div>
    <!-- Catalog Topbar - end -->
    <div class="prod-items section-items prod-list2">
        <?php if ($subcat_post): foreach ($subcat_post as $catProduct): ?>
            <div class="prodlist-i">
                <a class="list-img-carousel prodlist-i-img" href="<?php echo base_url('single-product/'.$catProduct['id']) ?>">
                    <?php
                    $tumb= new \App\Models\ThumbnailModel();
                    $tumb_image_list= $tumb->where('product_id',$catProduct['id'])->findAll();
                    ?>
                    <?php if ($tumb_image_list): foreach ($tumb_image_list as $thumimage): ?>
                        <img src="<?php echo base_url('uploads/products/thumbnail/'.$thumimage['image']) ?>" alt="<?php echo base_url('uploads/products/thumbnail/'.$catProduct['image']) ?> ?>">
                    <?php endforeach; ?>
                    <?php else: ?>
                        <img src="<?php  echo base_url('uploads/products/thumbnail/'.$catProduct['image']) ?>" alt="<?php echo base_url('uploads/products/thumbnail/'.$catProduct['image']) ?> ?>">
                    <?php endif; ?>
                </a>
                <div class="prodlist-i-cont">
                    <h3><a href="<?php echo base_url('single-product/'.$catProduct['id'])?> "><?php echo $catProduct['title']?></a></h3>
                    <p class="prodlist-i-info">
                        <a href="<?php echo base_url('wishlist/'.$catProduct['id'])?>" class="prodlist-i-favorites"><i class="fa fa-heart"></i> Add to wishlist</a>
                        <a href="catalog-list-2.html#" class="qview-btn prodlist-i-qview"><i class="fa fa-search"></i> Quick view</a>
                        <a class="prodlist-i-compare" href="catalog-list-2.html#"><i class="fa fa-bar-chart"></i> Compare</a>
                    </p>
                    <div class="prodlist-i-txt">
                        <?php echo mb_substr($catProduct['details'],0,130)?>
                    </div>
                    <div class="prodlist-i-action">
                        <span class="prodlist-i-price">
                            <b><?php echo $catProduct['price'] ?></b>
                        </span>
                        <form action="<?php echo base_url('/add-to-cart') ?>" method="post">
                            <?php echo csrf_field()?>
                            <input type="hidden" name="product_id" value="<?php echo $catProduct['id']?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="quantity cart-plus-minus">
                                        <input value="1" type="text" name="quantity">
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="prodlist-i-addwrap">
                                        <input type="submit" name="cart" value="Add to cart" class="prodlist-i-add">
                                        <!--                            <a href="catalog-list-2.html#" class="prodlist-i-add">Add to cart</a>-->
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
        <?php else: ?>
            <h1 class="text danger">Product Not Found</h1>
        <?php endif; ?>
    </div>

    <!-- Pagination - start -->
    <div class="mt-5">
        <!--    --><?php //echo $pager->links('category,bs_full') ?>
    </div>
    <ul class="pagi">
        <li class="active"><span>1</span></li>
        <li><a href="catalog-list-2.html#">2</a></li>
        <li><a href="catalog-list-2.html#">3</a></li>
        <li><a href="catalog-list-2.html#">4</a></li>
        <li class="pagi-next"><a href="catalog-list-2.html#"><i class="fa fa-angle-double-right"></i></a></li>
    </ul>
    <!-- Pagination - end -->
</div>
<!-- Catalog Items | List V2 - end -->

<!-- Quick View Product - start -->
<div class="qview-modal">
    <div class="prod-wrap">
        <a href="product.html">
            <h1 class="main-ttl">
                <span>Reprehenderit adipisci</span>
            </h1>
        </a>
        <div class="prod-slider-wrap">
            <div class="prod-slider">
                <ul class="prod-slider-car">
                    <li>
                        <a data-fancybox-group="popup-product" class="fancy-img" href="img/popup/1.jpg">
                            <img src="img/popup/1.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-fancybox-group="popup-product" class="fancy-img" href="img/popup/2.jpg">
                            <img src="img/popup/2.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-fancybox-group="popup-product" class="fancy-img" href="img/popup/3.jpg">
                            <img src="img/popup/3.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-fancybox-group="popup-product" class="fancy-img" href="img/popup/4.jpg">
                            <img src="img/popup/4.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-fancybox-group="popup-product" class="fancy-img" href="img/popup/5.jpg">
                            <img src="img/popup/5.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-fancybox-group="popup-product" class="fancy-img" href="img/popup/6.jpg">
                            <img src="img/popup/6.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-fancybox-group="popup-product" class="fancy-img" href="img/popup/7.jpg">
                            <img src="img/popup/7.jpg" alt="">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="prod-thumbs">
                <ul class="prod-thumbs-car">
                    <li>
                        <a data-slide-index="0" href="catalog-list-2.html#">
                            <img src="img/popup/1.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-slide-index="1" href="catalog-list-2.html#">
                            <img src="img/popup/2.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-slide-index="2" href="catalog-list-2.html#">
                            <img src="img/popup/3.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-slide-index="3" href="catalog-list-2.html#">
                            <img src="img/popup/4.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-slide-index="4" href="catalog-list-2.html#">
                            <img src="img/popup/5.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-slide-index="5" href="catalog-list-2.html#">
                            <img src="img/popup/6.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-slide-index="6" href="catalog-list-2.html#">
                            <img src="img/popup/7.jpg" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="prod-cont">
            <p class="prod-actions">
                <a href="catalog-list-2.html#" class="prod-favorites"><i class="fa fa-heart"></i> Add to Wishlist</a>
                <a href="catalog-list-2.html#" class="prod-compare"><i class="fa fa-bar-chart"></i> Compare</a>
            </p>
            <div class="prod-skuwrap">
                <p class="prod-skuttl">Color</p>
                <ul class="prod-skucolor">
                    <li class="active">
                        <img src="img/color/blue.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/color/red.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/color/green.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/color/yellow.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/color/purple.jpg" alt="">
                    </li>
                </ul>
                <p class="prod-skuttl">Sizes</p>
                <div class="offer-props-select">
                    <p>XL</p>
                    <ul>
                        <li><a href="catalog-list-2.html#">XS</a></li>
                        <li><a href="catalog-list-2.html#">S</a></li>
                        <li><a href="catalog-list-2.html#">M</a></li>
                        <li class="active"><a href="catalog-list-2.html#">XL</a></li>
                        <li><a href="catalog-list-2.html#">L</a></li>
                        <li><a href="catalog-list-2.html#">4XL</a></li>
                        <li><a href="catalog-list-2.html#">XXL</a></li>
                    </ul>
                </div>
            </div>
            <div class="prod-info">
                <p class="prod-price">
                    <b class="item_current_price">$238</b>
                </p>
                <p class="prod-qnt">
                    <input type="text" value="1">
                    <a href="catalog-list-2.html#" class="prod-plus"><i class="fa fa-angle-up"></i></a>
                    <a href="catalog-list-2.html#" class="prod-minus"><i class="fa fa-angle-down"></i></a>
                </p>
                <p class="prod-addwrap">
                    <a href="catalog-list-2.html#" class="prod-add">Add to cart</a>
                </p>
            </div>
            <ul class="prod-i-props">
                <li>
                    <b>SKU</b> 05464207
                </li>
                <li>
                    <b>Manufacturer</b> Mayoral
                </li>
                <li>
                    <b>Material</b> Cotton
                </li>
                <li>
                    <b>Pattern Type</b> Print
                </li>
                <li>
                    <b>Wash</b> Colored
                </li>
                <li>
                    <b>Style</b> Cute
                </li>
                <li>
                    <b>Color</b> Blue, Red
                </li>
                <li><a href="catalog-list-2.html#" class="prod-showprops">All Features</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Quick View Product - end -->

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>
