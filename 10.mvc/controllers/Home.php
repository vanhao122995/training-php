<?php
class Home extends Controller {

    public function index() {
        $this->view->load('product/index');
    }

    public function add() {
        $this->view->load('product/index');
    }

    public function edit() {
        echo __METHOD__;
    }
}