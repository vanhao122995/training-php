<?php
    session_start();
    //Kết nối SQL
    require_once ('./../libs/database.php');
    $connect = connect_db();
    
    $id = isset($_GET['id']) ? $_GET['id'] : 0;

    if($id > 0) {
        $sql = "DELETE FROM product WHERE id = " . $id;
        $result = mysqli_query($connect, "SELECT * FROM product WHERE id =  $id");
        $row   = mysqli_fetch_assoc($result);
        $old_image = './../uploads/' .$row['image'];
        unlink($old_image);
        mysqli_query($connect, $sql);
        $_SESSION["message"] = "Đã xóa thành công id = $id";
    }

    header("Location: $base_url/admin/index.php?controller=product&action=index");

?>

