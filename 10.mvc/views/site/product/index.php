<?php include("./views/site/elements/breakcrum.php"); ?>
<!--Product Section Start-->
<div class="section section-padding">
    <div class="container">
        <div class="row mbn-40">

            <!--Product Wrapper Start-->
            <div class="col-lg-9 col-12 order-lg-2 mb-40">

                <!--Shop Toolbar Start-->
                <div class="shop-toolbar">

                    <!--Product View Mode Start-->
                    <div class="product-view-mode">
                        <button class="active" data-mode="grid"><i class="fa fa-th"></i></button>
                        <button data-mode="list"><i class="fa fa-align-justify"></i></button>
                    </div>
                    <!--Product View Mode End-->

                    <!--Product Showing Start-->
                    <div class="product-showing mr-auto">
                        <p>Showing 9 of 72</p>
                    </div>
                    <!--Product Showing End-->

                    <!--Product Short Start-->
                    <div class="product-short">
                        <p>Short by</p>
                        <select class="nice-select">
                            <option value="trending">Trending items</option>
                            <option value="sales">Best sellers</option>
                            <option value="rating">Best rated</option>
                            <option value="date">Newest items</option>
                            <option value="price-asc">Price: low to high</option>
                            <option value="price-desc">Price: high to low</option>
                        </select>
                    </div>
                    <!--Product Short End-->

                </div>
                <!--Shop Toolbar End-->

                <div class="shop-product-wrap row mbn-35">
                    <?php
                        $xhtml = '';
                        if($this->data) {
                            foreach($this->data as $key => $obj) {
                                $image = BASE_PATH . 'uploads' . DS . $obj->image;
                                $url_detail = BASE_PATH . 'index.php?controller=product&action=detail&id='. $obj->id;
                                $xhtml .= '<div class="col-md-4 col-6 col-xxs-12 mb-35">
                                                <div class="product">
                                                    <div class="image-action">
                                                        <a class="image" href="'. $url_detail .'"><img src="'.$image.'" alt=""></a>
                                                        <div class="labels">
                                                            <span class="label new">New</span>
                                                            <span class="label sale">Sale</span>
                                                        </div>
                                                        <a href="#" class="wishlist-btn"><i class="icofont-heart"></i></a>
                                                        <div class="action">
                                                            <a href="'. $url_detail .'" class="action-btn action-quickview"><i class="icofont-search-1"></i></a>
                                                            <a href="'. BASE_PATH . 'index.php?controller=cart&action=add&id='. $obj->id.'" class="action-btn action-cart"><i class="icofont-shopping-cart"></i></a>
                                                            <a href="'. $url_detail .'" class="action-btn action-compare"><i class="icofont-refresh"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="title-price">
                                                            <h4 class="title"><a href="'. $url_detail .'">'.$obj->name.'</a></h4>
                                                            <span class="price">'.Helper::formatNumber($obj->price, 'admin').'</span>
                                                        </div>
                                                        <div class="ratting">
                                                            <div class="inner">
                                                                <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="desc">
                                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde perspiciatis quod numquam, sit fugiat, deserunt ipsa mollitia sunt quam corporis ullam rem, accusantium adipisci officia eaque.</p>
                                                        </div>
                                                        <div class="action">
                                                            <a href="#" class="action-btn action-quickview"><i class="icofont-search-1"></i></a>
                                                            <a href="#" class="action-btn action-cart"><i class="icofont-shopping-cart"></i></a>
                                                            <a href="#" class="action-btn action-compare"><i class="icofont-refresh"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                            }
                        }
                        echo $xhtml;
                    ?>

                    <div class="col-12 mb-35 mt-15">
                        <div class="page-pagination">
                            <ul>
                                <?php if($this->totalRows && $this->itemPerPage) { ?>
                                    <?php
                                        $totalPage = ceil($this->totalRows/$this->itemPerPage);
                                        for($i = 1; $i <= $totalPage; $i++) {
                                            $url_page = BASE_PATH . 'index.php?controller=product&action=index&page=' . $i;
                                            $classActive = $this->currentPage == $i ? 'active' : '';
                                    ?>       
                                        <?php if( $classActive) { ?>                               
                                            <li class="<?= $classActive ?>"><?= $i ?></li>
                                        <?php }else { ?>
                                            <li class="<?= $classActive ?>"><a href="<?= $url_page ?>"><?= $i ?></a></li>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
            <!--Product Wrapper End-->

            <!--Sidebar Wrapper Start-->
            <div class="col-lg-3 col-12 order-lg-1 mb-40">
                <div class="row mbn-35">

                    <!--Sidebar Start-->
                    <div class="col-12 mb-35">
                        <div class="widget">
                            <h4 class="widget-title">Search</h4>
                            <div class="widget-search">
                                <form action="#">
                                    <input type="search" placeholder="Search">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Sidebar End-->

                    <!--Sidebar Start-->
                    <div class="col-12 mb-35">
                        <div class="widget">
                            <h4 class="widget-title">Brand</h4>
                            <ul class="widget-link">
                                <li><a href="#">Nikkon</a></li>
                                <li><a href="#">Sumsang</a></li>
                                <li><a href="#">Phillips</a></li>
                                <li><a href="#">Zeon</a></li>
                                <li><a href="#">Panasonic</a></li>
                                <li><a href="#">Uawei</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--Sidebar End-->

                    <!--Sidebar Start-->
                    <div class="col-12 mb-35">
                        <div class="widget">
                            <h4 class="widget-title">Price</h4>
                            <div id="price-range" class="widget-price-range"></div>
                        </div>
                    </div>
                    <!--Sidebar End-->

                    <!--Sidebar Start-->
                    <div class="col-12 mb-35">
                        <div class="widget">
                            <div class="widget-banner banner">
                                <a href="#"><img src="<?= BASE_PATH ?>/public/site/assets/images/banner/banner-1.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!--Sidebar End-->

                    <!--Sidebar Start-->
                    <div class="col-12 mb-35">
                        <div class="widget">
                            <h4 class="widget-title">Tags</h4>
                            <div class="widget-tags">
                                <a href="#">Digital</a>
                                <a href="#">DSLR</a>
                                <a href="#">Red</a>
                                <a href="#">Retro</a>
                                <a href="#">Pro</a>
                                <a href="#">ProPlus</a>
                                <a href="#">Zoom</a>
                            </div>
                        </div>
                    </div>
                    <!--Sidebar End-->

                </div>
            </div>
            <!--Sidebar Wrapper End-->

        </div>
    </div>
</div>
<!--Product Section End-->