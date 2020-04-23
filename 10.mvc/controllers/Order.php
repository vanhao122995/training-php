<?php

class Order extends Controller {
    public $db_order = null;
    public function __construct() {
        parent::__construct();
        $this->db_order = $this->db('Order_Model');
    }

    public function index() {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $str_id = '';
        $str_email = '';

        if($id) {
            $str_id = "AND `order`.`id` = $id ";
            
        }
        if($name) {       
            $str_email = "AND user.email LIKE '%$name%'";
        }

        $sql = "SELECT `order`.*, user.email, user.name, COUNT(`order`.`id`) as so_luong FROM `order`, user, order_detail
                WHERE `order`.`user_id` = user.id AND `order`.`id` = order_detail.order_id $str_id $str_email
                GROUP BY `order`.`id`";
        $data = $this->db_order->execueQuery($sql, true);

        //phân trang
        $totalRows = count($data);
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; 
        $itemPerPage = 10; //số item muốn hiển thị trên 1 trang
        $offset = $itemPerPage*($currentPage -1);
        $param['limit'] = [$offset, $itemPerPage];

        $this->view->currentPage = $currentPage;
        $this->view->totalRows = $totalRows;
        $this->view->itemPerPage = $itemPerPage;
        $this->view->id = $id;       
        $this->view->name = $name;
        $this->view->data = $data;
        $this->view->template = 'order/index';
        $this->view->load('layout');
    }

    public function changeStatus() {

        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $status = isset($_GET['status']) ? $_GET['status'] : '';

        if($id > 0) {
            $status = $status == 1 ? 0 : 1;
            $sql = "UPDATE order SET status = $status WHERE id = $id";
            if($this->db_order->execueQuery($sql)) {
                $url = BASE_PATH . 'index.php?controller=order&action=index';
                header('location: ' . $url);
            }
        }
    }

    public function delete() {

        $id = isset($_GET['id']) ? $_GET['id'] : '';

        if($id > 0) {
            $status = $status == 1 ? 0 : 1;
            $sql = "DELETE FROM order WHERE id = $id";
            if($this->db_order->execueQuery($sql)) {
                $url = BASE_PATH . 'index.php?controller=order&action=index';
                header('location: ' . $url);
            }
        }
    }

    public function detail() {

        $id = isset($_GET['id']) ? $_GET['id'] : '';

        $sql = "SELECT order_detail.*, product.name FROM order_detail, product 
        WHERE order_detail.product_id = product.id  AND order_id = $id";
        $this->view->data = $this->db_order->execueQuery($sql, true);

        $this->view->template = 'order/detail';
        $this->view->load('layout');
    }


}