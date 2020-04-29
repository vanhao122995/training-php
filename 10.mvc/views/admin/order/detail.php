<div class="cart-table table-responsive mb-30">
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $total = 0;
                foreach($this->data as $key => $obj) { 
                    $total += $obj->price*$obj->quantity;
            ?>
                <tr>
                    <td><a href="single-product.html"><img src="assets/images/products/cart-product-1.jpg"
                                alt="Product"></a></td>
                    <td><a href="single-product.html"><?= $obj->name ?></a></td>
                    <td><span><?= Helper::formatNumber($obj->price) ?></span></td>
                    <td>
                        <div class="pro-qty"><?= $obj->quantity ?></div>
                    </td>
                    <td><span><?= Helper::formatNumber($obj->price*$obj->quantity) ?></span></td>
                    <td><a href="#"><i class="fa fa-trash-o"></i></a></td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
              <td colspan="4">Sum</td>
              <td><?= Helper::formatNumber($total) ?></td>
            </tr>
          </tfoot>
    </table>
</div>