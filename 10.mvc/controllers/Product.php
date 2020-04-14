<?php
class Product extends Controller {

    public function index() {
        $this->view->load('product/index');
    }
}