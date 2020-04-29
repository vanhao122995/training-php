<?php include("./views/site/elements/breakcrum.php"); ?>
<!-- Cart Section Start -->
<div class="section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!--Cart Table Start-->
                <form action="#">
                    <div class="cart-table table-responsive mb-30">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>                              
                                <?php
                                    $xhtml = '';
                                    $total = 0;
                                    if($this->data) {
                                        foreach($this->data as $key => $val) {
                                            $image = BASE_PATH . 'uploads' . DS . $val['product']->image;
                                            $totalRow = $val['product']->price*$val['qty'];
                                            $total += $totalRow;
                                            $xhtml .=   '<tr>
                                                            <td><a href="single-product.html"><img with="100" height="100" src="'.$image.'" alt="Product"></a></td>
                                                            <td><a href="single-product.html">'.$val['product']->name.'</a></td>
                                                            <td><span>'.Helper::formatNumber($val['product']->price, 'admin').'</span></td>
                                                            <td>
                                                                <div class="pro-qty"><input type="text" value="'.$val['qty'].'"></div>
                                                            </td>
                                                            <td><span>'. Helper::formatNumber($totalRow, 'admin').'</span></td>
                                                            <td><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                                        </tr>
                                                        ';
                                        }
                                    }
                                    echo $xhtml;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </form>
                <!--Cart Table End-->

                <div class="row mbn-40">
                    <!--Cart Summary Start-->
                    <div class="col-lg-6 col-12 mb-40">
                        <div class="cart-summary">
                            <div class="cart-summary-wrap">
                                <h4>Cart Summary</h4>
                                <h5>Grand Total <span><?= Helper::formatNumber($total, 'admin') ?></span></h5>
                            </div>
                            <div class="cart-summary-button">
                                <button class="btn">Checkout</button>
                                <button class="btn">Update Cart</button>
                            </div>
                        </div>
                    </div>
                    <!--Cart Summary End-->

                </div>

            </div>
        </div>
    </div>
</div><!-- Cart Section End -->
