        <!-- Header Section Start -->
        <div class="header-section section section-wide header-sticky">
            <div class="container">
                <div class="row justify-content-between align-items-center">

                    <!-- Header Logo Start -->
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="index.html"><img src="<?= BASE_PATH ?>/public/site/assets/images/logo/logo_1.png" alt="Logo"></a>
                        </div>
                    </div><!-- Header Logo End -->

                    <!-- Main Menu One Start -->
                     <div class="col-auto d-none d-lg-block position-static">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li class="menu-item-has-children"><a href="<?= BASE_PATH ?>">Trang chủ</a></li>
                                    <li class="menu-item-has-children"><a href="<?= BASE_PATH . 'index.php?controller=product&action=index' ?>">Sản phẩm</a>
                                        <ul class="sub-menu">
                                            <li><a href="cart.html">Shopping Cart</a></li>
                                            <li><a href="cart.html">Shopping Cart</a></li>
                                            <li><a href="cart.html">Shopping Cart</a></li>
                                            <li><a href="cart.html">Shopping Cart</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div><!-- Main Menu One End -->

                    <!-- User & Cart & Mobile Menu Button Start -->
                    <div class="col-auto d-flex flex-wrap align-items-center mr-5 mr-lg-0">
                        <div class="header-action">
                            <div class="header-user">
                                <a href="login-register.html" class="login"><i class="icofont-login"></i></a>
                                <a href="my-account.html" class="user"><i class="icofont-user-alt-3"></i></a>
                            </div>
                            <div class="header-cart">
                                <a href="#" class="offcanvas-cart-toggle"><span class="icon"><i class="icofont-cart"></i><span class="count">3</span></span> <span class="text">$256(3 items)</span></a>
                            </div>
                            <button class="mobile-menu-toggle"><i></i></button>
                        </div>
                    </div><!-- User & Cart & Mobile Menu Button End -->

                </div>
            </div>
        </div><!-- Header Section End -->

        <!--Offcanvas Cart Section Start-->
        <div class="offcanvas-cart-section">
            <div class="inner">

                <!--Offcanvas Cart Top Start-->
                <div class="offcanvas-cart-top">
                    <button class="offcanvas-cart-close">Close Cart <i class="icofont-close-line"></i></button>
                </div>
                <!--Offcanvas Cart Top End-->

                <!--Offcanvas Cart Wrapper Start-->
                <div class="offcanvas-cart-wrap">

                    <!--Offcanvas Cart Start-->
                    <div class="offcanvas-cart">

                        <!--Offcanvas Cart Item Start-->
                        <div class="offcanvas-cart-item">
                            <a href="single-product.html" class="image"><img src="<?= BASE_PATH ?>/public/site/assets/images/products/product-1.jpg" alt=""></a>
                            <div class="content">
                                <a href="single-product.html" class="title">Camera Pro 440</a>
                                <span class="price">Price: $295</span>
                                <span class="qty">Qty: 01</span>
                            </div>
                            <button class="cart-item-remove"><i class="icofont-ui-delete"></i></button>
                        </div>
                        <!--Offcanvas Cart Item End-->

                        <!--Offcanvas Cart Item Start-->
                        <div class="offcanvas-cart-item">
                            <a href="single-product.html" class="image"><img src="<?= BASE_PATH ?>/public/site/assets/images/products/product-2.jpg" alt=""></a>
                            <div class="content">
                                <a href="single-product.html" class="title">Red Digital Camera</a>
                                <span class="price">Price: $275</span>
                                <span class="qty">Qty: 01</span>
                            </div>
                            <button class="cart-item-remove"><i class="icofont-ui-delete"></i></button>
                        </div>
                        <!--Offcanvas Cart Item End-->

                        <!--Offcanvas Cart Item Start-->
                        <div class="offcanvas-cart-item">
                            <a href="single-product.html" class="image"><img src="<?= BASE_PATH ?>/public/site/assets/images/products/product-3.jpg" alt=""></a>
                            <div class="content">
                                <a href="single-product.html" class="title">Axor Digital camera</a>
                                <span class="price">Price: $295</span>
                                <span class="qty">Qty: 01</span>
                            </div>
                            <button class="cart-item-remove"><i class="icofont-ui-delete"></i></button>
                        </div>
                        <!--Offcanvas Cart Item End-->

                    </div>
                    <!--Offcanvas Cart End-->

                    <!--Offcanvas Cart Footer Start-->
                    <div class="offcanvas-cart-footer">
                        <h5 class="total">Total: <span class="amount">$1160</span></h5>
                        <a href="#" class="btn checkout-btn">Check out</a>
                    </div>
                    <!--Offcanvas Cart Footer End-->

                </div>
                <!--Offcanvas Cart Wrapper End-->

            </div>
        </div>
        <!--Offcanvas Cart Section End-->
