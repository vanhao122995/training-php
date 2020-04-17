<?php
class Product extends Controller {

    public function index() {

        $db = $this->db('Product_Model');

        $this->view->data = $db->getAll();

        $this->view->load('product/index');
    }
}