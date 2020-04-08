<?php
   session_start();
   require_once "./../define.php";
   require_once "./../libs/DB.php";
   
   if(!isset($_SESSION["is_login"]) || $_SESSION["is_login"] !== true){
      header("Location: $base_url/admin/login.php");
   }

   $controller = isset($_GET['controller']) ? $_GET['controller'] : 'product';
   $action = isset($_GET['action']) ? $_GET['action'] : 'index';

   $path_file = ROOT_PATH . "/admin/$controller/$action.php";

   if(!file_exists($path_file)) {
      $controller = 'notify';
      $action = '404';
   }

   require_once ROOT_PATH . "/admin/$controller/$action.php";


?>
