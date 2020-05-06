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
                                    <?php
                                        if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {
                                    ?>
                                        <?php
                                            if($_SESSION['user']->level >= 2) {
                                        ?>
                                            <li><a href="<?= BASE_PATH . 'index.php?module=admin&controller=product&action=index' ?>">Admin</a></li>
                                            <li><a href="<?= BASE_PATH . 'index.php?controller=user&action=logout' ?>">Logout</a></li>
                                        <?php }else { ?>
                                            <li><a href="<?= BASE_PATH . 'index.php?controller=user&action=profile' ?>">Quản lý profile</a></li>
                                            <li><a href="<?= BASE_PATH . 'index.php?controller=user&action=logout' ?>">Logout</a></li>
                                        <?php } ?>
                                    <?php }else { ?>
                                        <li><a href="<?= BASE_PATH . 'index.php?controller=user&action=login' ?>">Đăng nhập</a></li>
                                        <li><a href="<?= BASE_PATH . 'index.php?controller=user&action=register' ?>">Đăng ký</a></li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div><!-- Main Menu One End -->

                    <!-- User & Cart & Mobile Menu Button Start -->
                    <div class="col-auto d-flex flex-wrap align-items-center mr-5 mr-lg-0">
                        <div class="header-action">
                            <div class="header-cart">
                                <a href="#" class="offcanvas-cart-toggle"><span class="icon"><i class="icofont-cart"></i><span class="count">3</span></span> <span class="text">$256(3 items)</span></a>
                            </div>
                            <button class="mobile-menu-toggle"><i></i></button>
                        </div>
                    </div><!-- User & Cart & Mobile Menu Button End -->

                </div>
            </div>
        </div><!-- Header Section End -->

