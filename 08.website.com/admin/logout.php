<?php
   require_once "./../define.php";
   session_start();
   session_destroy();
   header("Location: $base_url/admin/login.php");
?>