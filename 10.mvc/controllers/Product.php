<?php
class Product extends Controller {
    public $db_product = null;
    public function __construct() {
        parent::__construct();
        $this->db_product = $this->db('Product_Model');
    }

    public function index() {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $param = [];

        if($id) {
            $param['where'][] = ['id', '=', $id];
            
        }
        if($name) {
            $name = '%' . $name . '%';
            $param['where'][] = ['name', 'LIKE', $name];
        }

        $this->view->id = $id;
        $this->view->name = $name;
        $this->view->data = $this->db_product->getAll($param);

        $this->view->load('product/index');
    }

    public function changeStatus() {

        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $status = isset($_GET['status']) ? $_GET['status'] : '';

        if($id > 0 && $status != '') {
            $status = $status == 1 ? 0 : 1;
            echo $sql = "UPDATE product SET status = $status WHERE id = $id";
            if($this->db_product->execueQuery($sql)) {
                $url = BASE_PATH . 'index.php?controller=product&action=index';
                header('location: ' . $url);
            }
        }
    }

    //format price 10000 -> 10.000 VND, 1.000.000 VND
    //Thêm 1 filter status -> select 
    //delete singe and muilti
    //

}