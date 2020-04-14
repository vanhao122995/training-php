<?php
    $controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';

    $class_name = ucfirst($controller);
    $path = ROOT_PATH . 'controllers/' . $class_name . '.php';
    $flag_error = false;

    //check file exist
    if(file_exists($path)) {
        require_once  ROOT_PATH . 'controllers/' . $class_name . '.php';
        //check class exist
        if (class_exists($class_name)) {
            $obj_controller = new $class_name;
            if(method_exists($obj_controller, $action)) {
                $obj_controller->$action();
            }else {
                $flag_error = true;
            }         
        }else {
            $flag_error = true;
        }       
    }else {
        $flag_error = true;
    }

    if($flag_error) {
        require_once  ROOT_PATH . 'controllers/Errors.php';
        $error = new Errors;
        $error->index();
    }