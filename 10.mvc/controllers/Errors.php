<?php
class Errors extends Controller {
    public function index() {
        $this->view->msg = 'Day la trang loi';
        $this->view->load('error/error');
    }
}