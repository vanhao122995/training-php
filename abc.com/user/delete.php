<?php
    session_start();
    //require libs database
    require_once('./../libs/database.php');
    require_once('./../libs/helpers.php');
    // Create connection
    $conn = connect_db();

    $id = $_GET['id'];
    $sql = 'DELETE FROM user WHERE id = ' . $id;
    mysqli_query($conn, $sql);
    $_SESSION["message"] = "User có id $id đã được xóa thành công";
    ridirect('http://localhost/training-php/abc.com/user');
?>