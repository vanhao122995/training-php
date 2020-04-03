<?php
   session_start();
   require_once "./../define.php";

   $controller = isset($_GET['controller']) ? $_GET['controller'] : 'product';
   $action = isset($_GET['action']) ? $_GET['action'] : 'index';

   $path_file = ROOT_PATH . "/admin/$controller/$action.php";

   if(!file_exists($path_file)) {
      $controller = 'notify';
      $action = '404';
   }

   require_once ROOT_PATH . "/site/$controller/$action.php";


?>
