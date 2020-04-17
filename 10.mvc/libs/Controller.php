<?php
class Controller {
    protected $view = null;

    public function __construct() {
        $this->view = new View;
    }
    //load 1 model
    public function db($name_model) {
        $path = ROOT_PATH . 'models' . DS . $name_model  . '.php';
        if(file_exists($path)) {
            require_once $path;
            return new $name_model;
        }   
    }
}