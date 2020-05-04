<?php
class Home extends Controller {

    public function index() {
        $this->view->template = 'home/index';
        $this->view->load('site/layout');
    }

}