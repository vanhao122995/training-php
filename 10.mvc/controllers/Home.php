<?php
class Home extends Controller {
    public $db_product = null;
    public function __construct($params) {
        parent::__construct($params);
        $this->db_product = $this->db('Product_Model');
    }
    public function index() {
        $param = [];
        $param['where'][] = ['is_popular', '=', 1];
        $param['where'][] = ['status', '=', 1];
        $this->view->list_product_popular =  $this->db_product->getAll($param);
        $param = [];
        $param['where'][] = ['is_featured', '=', 1];
        $param['where'][] = ['status', '=', 1];
        $this->view->list_product_featured =  $this->db_product->getAll($param);

        $this->view->template = 'home/index';
        $this->view->load('site/layout');
    }

}