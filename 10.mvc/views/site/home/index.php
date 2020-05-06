        
<!-- // 6/5/2020 -> thứ trong tuần 4->6/5  00::00:00 4/5/2020 -> 23:59:59 10/5/2020  -->


        <!--Hero Slider Section Start-->
        <div class="section section-wide">
            <div class="container-fluid">

                <!--hero Slider Start-->
                <div class="hero-slider">

                    <div class="hero-item hero-bg-1">
                        <div class="hero-content">
                            <h2 class="title">Capture your <br>Beautiful moments</h2>
                                <a href="#" class="btn">Buy Now</a>
                        </div>
                    </div>

                    <div class="hero-item hero-bg-2">
                        <div class="hero-content">
                            <h2 class="title">Capture your <br>Beautiful moments</h2>
                                <a href="#" class="btn">Buy Now</a>
                        </div>
                    </div>

                </div>
                <!--hero Slider End-->

            </div>
        </div>
        <!--Hero Slider Section End-->

        <!--Banner Section Start-->
        <div class="section section-wide section-padding">
            <div class="container-fluid">
                <div class="row mbn-30">

                    <!--Banner Start-->
                    <div class="col-sm-3 col-6 mb-30">
                        <div class="banner">
                            <a href="#"><img src="<?= BASE_PATH ?>/public/site/assets/images/banner/banner-1.jpg" alt="Banner"></a>
                        </div>
                    </div>
                    <!--Banner End-->

                    <!--Banner Start-->
                    <div class="col-sm-3 col-6 order-sm-3 mb-30">
                        <div class="banner">
                            <a href="#"><img src="<?= BASE_PATH ?>/public/site/assets/images/banner/banner-3.jpg" alt="Banner"></a>
                        </div>
                    </div>
                    <!--Banner End-->

                    <!--Banner Start-->
                    <div class="col-sm-6 col-12 mb-30">
                        <div class="banner">
                            <a href="#"><img src="<?= BASE_PATH ?>/public/site/assets/images/banner/banner-2.jpg" alt="Banner"></a>
                        </div>
                    </div>
                    <!--Banner End-->

                </div>
            </div>
        </div>
        <!--Banner Section End-->

        <!--Propular Products Section Start-->
        <div class="section section-wide section-padding pt-0">
            <div class="container-fluid">
                <div class="row mbn-40">

                    <!--Section Title Start-->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-9 col-12 ml-auto">
                                <div class="section-title">
                                    <h2 class="title">Popular in this week</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Section Title End-->

                    <!--Product Wrapper Start-->
                    <div class="col-lg-9 col-12 order-lg-3 mb-40">
                        <div class="row mbn-35">
                            <?php
                                $xhtml = '';
                                if($this->list_product_popular) {
                                    foreach($this->list_product_popular as $key => $obj) {
                                        $image = BASE_PATH . 'uploads' . DS . $obj->image;
                                        $url_detail = BASE_PATH . 'index.php?controller=product&action=detail&id='. $obj->id;
                                        $xhtml .= '<div class="col-xl-3 col-md-4 col-6 col-xxs-12 mb-35">
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

                        </div>
                    </div>
                    <!--Product Wrapper End-->

                    <!--Banner Wrapper Start-->
                    <div class="col-lg-3 col-12 order-lg-2 mb-40">
                        <div class="row mbn-35">

                            <!--Banner Start-->
                            <div class="col-lg-12 col-6 mb-35">
                                <div class="banner">
                                    <a href="#"><img src="<?= BASE_PATH ?>/public/site/assets/images/banner/banner-4.jpg" alt="Banner"></a>
                                </div>
                            </div>
                            <!--Banner End-->

                            <!--Banner Start-->
                            <div class="col-lg-12 col-6 mb-35">
                                <div class="banner">
                                    <a href="#"><img src="<?= BASE_PATH ?>/public/site/assets/images/banner/banner-5.jpg" alt="Banner"></a>
                                </div>
                            </div>
                            <!--Banner End-->

                        </div>
                    </div>
                    <!--Banner Wrapper End-->

                </div>
            </div>
        </div>
        <!--Propular Products Section End-->

        <!--Banner Section Start-->
        <div class="section section-wide section-padding pt-0">
            <div class="container-fluid">
                <div class="row mbn-30">

                    <!--Banner Start-->
                    <div class="col-sm-6 col-12 mb-30">
                        <div class="banner">
                            <a href="#"><img src="<?= BASE_PATH ?>/public/site/assets/images/banner/banner-6.jpg" alt="Banner"></a>
                        </div>
                    </div>
                    <!--Banner End-->

                    <!--Banner Start-->
                    <div class="col-sm-6 col-12 mb-30">
                        <div class="banner">
                            <a href="#"><img src="<?= BASE_PATH ?>/public/site/assets/images/banner/banner-7.jpg" alt="Banner"></a>
                        </div>
                    </div>
                    <!--Banner End-->

                </div>
            </div>
        </div>
        <!--Banner Section End-->

        <!--Featured Products Section Start-->
        <div class="section section-wide section-padding pt-0">
            <div class="container-fluid">
                <div class="row mbn-40">

                    <!--Section Title Start-->
                    <div class="col-12">
                        <div class="section-title">
                            <h2 class="title">Featured Products</h2>
                        </div>
                    </div>
                    <!--Section Title End-->

                    <!--Product Wrapper Start-->
                    <div class="col-lg-9 col-12 mb-40">
                        <div class="row mbn-35">
                            <?php
                                $xhtml = '';
                                if($this->list_product_featured) {
                                    foreach($this->list_product_featured as $key => $obj) {
                                        $image = BASE_PATH . 'uploads' . DS . $obj->image;
                                        $url_detail = BASE_PATH . 'index.php?controller=product&action=detail&id='. $obj->id;
                                        $xhtml .= '<div class="col-xl-3 col-md-4 col-6 col-xxs-12 mb-35">
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
                        </div>
                    </div>
                    <!--Banner Wrapper Start-->
                    <div class="col-lg-3 col-12 mb-40">
                        <div class="row mbn-35">

                            <!--Banner Start-->
                            <div class="col-lg-12 col-6 mb-35">
                                <div class="banner">
                                    <a href="#"><img src="<?= BASE_PATH ?>/public/site/assets/images/banner/banner-8.jpg" alt="Banner"></a>
                                </div>
                            </div>
                            <!--Banner End-->

                            <!--Banner Start-->
                            <div class="col-lg-12 col-6 mb-35">
                                <div class="banner">
                                    <a href="#"><img src="<?= BASE_PATH ?>/public/site/assets/images/banner/banner-9.jpg" alt="Banner"></a>
                                </div>
                            </div>
                            <!--Banner End-->

                        </div>
                    </div>
                    <!--Banner Wrapper End-->

                </div>
            </div>
        </div>
        <!--Featured Products Section End-->

        <!--Subscribe Section Start-->
        <div class="section section-wide">
            <div class="container-fluid">
                <div class="subscribe-section section">

                    <!--Subscribe Content Start-->
                    <div class="subscribe-content">
                        <h2 class="title">Subscribe our Newsletter<span>Get update for news, offers</span></h2>

                        <form id="mc-form" class="mc-form subscribe-form">
                            <input id="mc-email" type="email" autocomplete="off" placeholder="Enter your email here" name="EMAIL">
                            <button id="mc-submit"><i class="fa fa-paper-plane-o"></i></button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div><!-- mailchimp-alerts end -->

                    </div>
                    <!--Subscribe Content End-->

                </div>
            </div>
        </div>
        <!--Subscribe Section End-->

        <!--Service/Feature Section Start-->
        <div class="section section-wide section-padding">
            <div class="container-fluid">
                <div class="row mbn-30">

                    <div class="service col-xl-3 col-md-6 col-12 mb-30">
                        <div class="icon"></div>
                        <div class="content">
                            <h3>Free home delivery</h3>
                            <p>Provide free home delivery for the all product over $100</p>
                        </div>
                    </div>

                    <div class="service col-xl-3 col-md-6 col-12 mb-30">
                        <div class="icon"></div>
                        <div class="content">
                            <h3>Quality Products</h3>
                            <p>We ensure the product quality that is our main goal</p>
                        </div>
                    </div>

                    <div class="service col-xl-3 col-md-6 col-12 mb-30">
                        <div class="icon"></div>
                        <div class="content">
                            <h3>3 Days Return</h3>
                            <p>Our Return Policy is very simple and easy for all</p>
                        </div>
                    </div>

                    <div class="service col-xl-3 col-md-6 col-12 mb-30">
                        <div class="icon"></div>
                        <div class="content">
                            <h3>Online Support</h3>
                            <p>Provide 24/7 online support for any information</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--Service/Feature Section End-->