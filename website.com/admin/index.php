<?php

   $controller = isset($_GET['controller']) ? $_GET['controller'] : 'product';
   $action = isset($_GET['action']) ? $_GET['action'] : 'index';

   require_once "./$controller/$action.php";


   // session_start();
   // if(!isset($_SESSION["is_login"]) || $_SESSION["is_login"] !== true){
   //    header('Location: http://localhost/training-php/website.com/login.php');
   // }else {
   //    header('Location: http://localhost/training-php/website.com/product');
   // }



?>
