<?php

class Cart extends Controller {
    public $db_product = null;
    public function __construct($params) {
        parent::__construct($params);
        $this->db_product = $this->db('Product_Model');
    }

    public function index() {
        $data = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        if($data) {
            foreach($data as $key => $val) {  
                $data[$key]['product'] = $this->db_product->getOne([['id', '=', $val['id']]]);   
       
            }
        }
        $this->view->data = $data;
        $this->view->template = 'cart/index';
        $this->view->load('site/layout');
    }

    public function add() {
        //unset($_SESSION['cart']);die();
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        if($id) {
            //giỏ hnagf chưa có gì
                //thêm vào
            //giỏ hàng đã tồn tại
                //check id + qty
                //chưa add mới
            $qty = isset($_GET['qty']) ? $_GET['qty'] : 1;
            if(isset($_SESSION['cart'])) {
                $flag = true;
                foreach($_SESSION['cart'] as $key => $val) {
                    if($val['id'] == $id) {
                        $_SESSION['cart'][$key]['qty'] += $qty;
                        $flag = false;
                    }
                }
                if($flag) {
                    $_SESSION['cart'][] = array(
                        'id' => $id,
                        'qty' => $qty
                    );
                }
            }else {
                $_SESSION['cart'][] = array(
                    'id' => $id,
                    'qty' => $qty
                );
            }
        }
        $url = BASE_PATH . 'index.php?controller=cart&action=index';
        header('location: ' . $url);
    }

}