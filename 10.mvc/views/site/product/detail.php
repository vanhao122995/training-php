<?php include("./views/site/elements/breakcrum.php"); ?>
<!--Single Product Section Start-->
<div class="section section-padding pb-0">
    <div class="container">

        <!--Single Product Wrapper Start-->
        <div class="row mbn-20">

            <!--Single Product Images Start-->
            <div class="col-lg-6 col-12 mb-20">
                <div class="single-product-images">

                    <!--Single Product Image Start-->
                    <div class="single-product-image">
                        <img src="<?=  BASE_PATH . 'uploads' . DS . $this->data->image ?>" alt="">
                    </div>
                    <!--Single Product Image End-->

                    <!--Single Product Thumb Start-->
                    <div class="single-product-thumb">
                        <img src="<?=  BASE_PATH . 'uploads' . DS . $this->data->image ?>" alt="">
                    </div>
                    <!--Single Product Thumb End-->

                </div>
            </div>
            <!--Single Product Image End-->

            <!--Single Product Content Start-->
            <div class="col-lg-6 col-12 mb-20">
                <div class="single-product-content">

                    <!--Title & Price Start-->
                    <div class="title-price">

                        <h2 class="title"><?=  $this->data->name ?></h2>

                        <span class="price"><?=  Helper::formatNumber($this->data->price, 'admin') ?></span>

                    </div>
                    <!--Title & Price End-->

                    <!--Ratting Start-->
                    <div class="ratting">
                        <div class="inner">
                            <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
                        </div>
                    </div>
                    <!--Ratting End-->

                    <!--Description Start-->
                    <div class="desc">
                        <?=  $this->data->decription ?>
                    </div>
                    <!--Description End-->
                    <form action="<?= BASE_PATH . 'index.php?controller=cart&action=add' ?>" method="GET">
                    <!--Quantity Start-->
                    <div class="quantity">
                        <h5>Quantity:</h5>
                        <div class="pro-qty">
                            <input type="text" name="qty" value="1">
                            <input type="hidden" name="id" value="<?=  $this->data->id ?>">
                            <input type="hidden" name="controller" value="cart">
                            <input type="hidden" name="action" value="add">
                        </div>
                    </div>
                    <!--Quantity End-->

                    <!--Action Start-->
                    <div class="action">
                        <button type="submit" href="#" class="action-btn action-cart"><i class="icofont-shopping-cart"></i></button>
                        <a href="#" class="action-btn action-wishlist"><i class="icofont-heart"></i></a>
                        <a href="#" class="action-btn action-compare"><i class="icofont-refresh"></i></a>
                    </div>
                    <!--Action End-->
                    </form>
                    <!--Share Start-->
                    <div class="share">
                        <h5>Share:</h5>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <!--Share End-->

                </div>
            </div>
            <!--Single Product Content End-->


            <!--Single Product Description, Specifications & Reviews Start-->
            <div class="col-12 mt-30 mb-20">

                <ul class="single-product-tab-list nav">
                    <li><a href="#product-description" class="active" data-toggle="tab">Detail</a></li>
                    <li><a href="#product-reviews" data-toggle="tab" class="">reviews</a></li>
                </ul>

                <div class="single-product-tab-content tab-content">
                    <div class="tab-pane fade active show" id="product-description">

                        <div class="row">
                            <div class="single-product-description-content col-lg-8 col-12">
                                <?=  $this->data->detail ?>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="product-reviews">

                        <!--Product Rating Form Wrapper Start-->
                        <div class="product-ratting-wrap">

                            <!--Average Rating Start-->
                            <div class="pro-avg-ratting">
                                <h4>4.5 <span>(Overall)</span></h4>
                                <span>Based on 9 Comments</span>
                            </div>
                            <!--Average Rating End-->

                            <!--Rating List Start-->
                            <div class="ratting-list">
                                <div class="sin-list">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="sin-list">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(3)</span>
                                </div>
                                <div class="sin-list">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(1)</span>
                                </div>
                                <div class="sin-list">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(0)</span>
                                </div>
                                <div class="sin-list">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(0)</span>
                                </div>
                            </div>
                            <!--Rating List End-->

                            <!--Rating Wrapper Start-->
                            <div class="rattings-wrapper">

                                <!--Single Rating Start-->
                                <div class="sin-rattings">
                                    <div class="ratting-author">
                                        <h4>Cristopher Lee</h4>
                                        <div class="ratting-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <span>(5)</span>
                                        </div>
                                    </div>
                                    <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                </div>
                                <!--Single Rating End-->

                                <!--Single Rating Start-->
                                <div class="sin-rattings">
                                    <div class="ratting-author">
                                        <h4>Nirob Khan</h4>
                                        <div class="ratting-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <span>(5)</span>
                                        </div>
                                    </div>
                                    <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                </div>
                                <!--Single Rating End-->

                                <!--Single Rating Start-->
                                <div class="sin-rattings">
                                    <div class="ratting-author">
                                        <h4>Zenaul Islam</h4>
                                        <div class="ratting-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <span>(5)</span>
                                        </div>
                                    </div>
                                    <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                </div>
                                <!--Single Rating End-->

                            </div>
                            <!--Rating Wrapper End-->

                            <!--Rating Form Wrapper Start-->
                            <div class="ratting-form-wrapper">
                                <h4>Add your Comments</h4>
                                <form action="#">
                                    <div class="ratting-form row">
                                        <div class="col-12 mb-15">
                                            <h5>Rating:</h5>
                                            <div class="ratting-star">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label for="name">Name:</label>
                                            <input id="name" placeholder="Name" type="text">
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label for="email">Email:</label>
                                            <input id="email" placeholder="Email" type="text">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label for="your-review">Your Review:</label>
                                            <textarea name="review" id="your-review" placeholder="Write a review"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <input value="add review" type="submit" class="btn">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--Rating Form Wrapper End-->

                        </div>
                        <!--Product Rating Form Wrapper End-->

                    </div>
                </div>

            </div>
            <!--Single Product Description, Specifications & Reviews End-->

        </div>
        <!--Single Product Wrapper End-->

    </div>
</div>
<!--Single Product Section End-->

<!--Related Product Section Start-->
<div class="section section-padding">
    <div class="container">
        <div class="row">

            <!--Section Title Start-->
            <div class="col-12">
                <div class="section-title">
                    <h2 class="title">Related Products</h2>
                </div>
            </div>
            <!--Section Title End-->

            <!--Related Product Slider Start-->
            <div class="related-product-slider w-100">

                <?php
                        $xhtml = '';
                        if($this->related) {
                            foreach($this->related as $key => $obj) {
                                $image = BASE_PATH . 'uploads' . DS . $obj->image;
                                $xhtml .= '<div class="col-12">
                                                <div class="product">
                                                    <div class="image-action">
                                                        <a class="image" href="single-product.html"><img src="'.$image.'" alt=""></a>
                                                        <div class="labels">
                                                            <span class="label new">New</span>
                                                            <span class="label sale">Sale</span>
                                                        </div>
                                                        <a href="#" class="wishlist-btn"><i class="icofont-heart"></i></a>
                                                        <div class="action">
                                                            <a href="'. BASE_PATH . 'index.php?controller=product&action=detail&id='. $obj->id .'" class="action-btn action-quickview"><i class="icofont-search-1"></i></a>
                                                            <a href="#" class="action-btn action-cart"><i class="icofont-shopping-cart"></i></a>
                                                            <a href="#" class="action-btn action-compare"><i class="icofont-refresh"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="title-price">
                                                            <h4 class="title"><a href="single-product.html">'.$obj->name.'</a></h4>
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
            <!--Related Product Slider End-->

        </div>
    </div>
</div>
<!--Related Product Section End-->