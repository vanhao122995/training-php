<?php
class Home extends Controller {

    public function index() {

        $db = $this->db('Product_Model');

        $this->view->load('home/index');
    }

    public function add() {
        $this->view->load('product/index');
    }

    public function edit() {
        echo __METHOD__;
    }
}