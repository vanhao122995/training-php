<?php
    //Kết nối SQL
    require_once ('./../libs/database.php');
    $connect = connect_db();
    
    $id = $_GET['id'];
    $sql = "DELETE FROM contact WHERE id = " . $id;
    $result = mysqli_query($connect, "SELECT * FROM contact WHERE id =  $id");
    $row   = mysqli_fetch_assoc($result);
    $old_image = './../uploads/' .$row['image'];
    unlink($old_image);
    mysqli_query($connect, $sql);
    session_start();
    $_SESSION["message"] = "Đã xóa thành công id = $id";
    header('Location: http://localhost/training-php/website.com/contact');
?>

