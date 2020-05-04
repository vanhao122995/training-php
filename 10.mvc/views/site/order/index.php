        <!--Page Banner Section Start-->
        <div class="section section-wide">
            <div class="container-fluid">

                <!--Page Banner Start-->
                <div class="page-banner">
                    <div class="container">
                        <h2 class="page-title">Checkout</h2>
                        <ul class="page-breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
                <!--Page Banner End-->

            </div>
        </div>
        <!--Page Banner Section End-->

        <!-- Checkout Section Start -->
        <div class="section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <!-- Checkout Form Start-->
                        <form action="<?= BASE_PATH . 'index.php?controller=order&action=add' ?>" method="POST" class="checkout-form">
                            <div class="row mbn-40">

                                <div class="col-lg-7 mb-40">

                                    <!-- Billing Address -->
                                    <div id="billing-form" class="mb-10">
                                        <div class="row mbn-30">
                                            <div class="col-md-6 col-12 mb-30">
                                                <label>Address</label>
                                                <input type="test" name="address" placeholder="Address">
                                            </div>                                 
                                        </div>

                                        <div class="row mbn-30">
                                            <div class="col-md-6 col-12 mb-30">
                                                <label>Ngày giao hàng</label>
                                                <input type="date" name="deliver_date" placeholder="Ngày giao hàng">
                                            </div>                                 
                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-5 mb-40">
                                    <div class="row">

                                        <!-- Cart Total -->
                                        <div class="col-12 mb-30">

                                            <h4 class="checkout-title">Cart Total</h4>

                                            <div class="checkout-cart-total">

                                                <h4>Product <span>Total</span></h4>

                                                <ul>
                                                    
                                                    <?php
                                                        $xhtml = '';
                                                        $total = 0;
                                                        if($this->data) {
                                                            foreach($this->data as $key => $val) {
                                                                $image = BASE_PATH . 'uploads' . DS . $val['product']->image;
                                                                $totalRow = $val['product']->price*$val['qty'];
                                                                $total += $totalRow;
                                                                $url_delete = BASE_PATH . 'index.php?controller=cart&action=delete&id='. $val['id'];
                                                                $xhtml .=   '<li>'.$val['product']->name.' X '.$val['qty'].' <span>'.Helper::formatNumber($val['product']->price, 'admin').'</span></li>';
                                                            }
                                                        }
                                                        echo $xhtml;
                                                    ?>
                                                </ul>
                                                <h4>Grand Total <span><?= Helper::formatNumber($total, 'admin') ?></span></h4>
                                                <div class="cart-summary-button">
                                                    <button class="btn" type="submit" name="submit">Checkout</button>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </form><!-- Checkout Form End-->

                    </div>
                </div>
            </div>
        </div><!-- Checkout Section End -->
