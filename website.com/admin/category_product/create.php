<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới</title>
    <link rel="stylesheet" href="http://localhost/training-php/website.com/public/styles.css">
</head>
<body>
<?php
    //Kết nối SQL
    require_once ('./../libs/database.php');
    $connect = connect_db();


if(isset($_POST['name'])) {
    $id             = $_POST['id'];
    $name           = $_POST['name'];

    $detail         = $_POST['detail'];
    $status          = $_POST['status'];
    $created        = $_POST['created'];

    $errors     = [];
    
    if($id == '') {
        $errors[] = 'Mã số đơn hàng không được rỗng';
    }

    if($name == '') {
        $errors[] = 'name không được rỗng';
    }

    if($detail == '') {
        $errors[] = 'Chi tiết không được rỗng';
    }
    if($status == '') {
        $errors[] = 'status không được rỗng';
    }
    if($created == '') {
        $errors[] = 'created không được rỗng';
    }


    if($_FILES["image"]["name"] == '') {
        $errors[] = 'Vui lòng chọn ảnh';
    }else {
        if ($_FILES["image"]["size"] < 500) {
            $errors[] = 'Kính thước file quá lớn';
        }

        $name_image = time() . '-' . $_FILES["image"]["name"];
        $path_image = './../uploads/' . $name_image;
        $type_file = pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
        $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif','jfif');
        if (!in_array(strtolower($type_file), $type_fileAllow)) {
            $errors[] = 'File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh';
        }
    }

    
    if(count($errors) == 0) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
        $sql = "INSERT INTO category_product 
        VALUES ('$id', '$name', '$name_image', '$detail','$status','$created')";
        $resurt = mysqli_query ($connect, $sql );
        session_start();
        $_SESSION["message"] = "Đã thêm thành công ID = $id";
        header('Location: http://localhost/training-php/website.com/category_product');
    }
}
?>
    <div class="container">
        <div>
            <ul>
                <?php 
                    if(isset($errors)) {
                        foreach($errors as $val) { 
                ?>
                    <li><?php echo $val ?></li>
                <?php 
                        } 
                    }
                ?>
            </ul>
        </div>

    <div id="content">
        <h3>Thêm mới</h3>
            <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">

                    <label for="fname">id</label>
                    <input type="text" id="fname" name="id" value="<?php if(isset($id)) { echo $id; } ?>"><br>

                    <label for="fname">Name</label>
                    <input type="text" id="fname" name="name" value="<?php if(isset($name)) { echo $name; } ?>"><br>

                    <label for="lname">image</label>
                    <input type="file" name="image">
                    </br>

                    <label for="fname">detail</label>
                    <input type="text" id="fname" name="detail" value="<?php if(isset($detail)) { echo $detail; } ?>"><br>

                    <label for="fname">status</label>
                        <select name="status">
                            <option value="New" >New</option>
                            <option value="Used" >Used</option>
                        </select>

                    <label for="fname">created</label>
                    <input type="text" id="fname" name="created" value="<?php if(isset($created)) { echo $created; } ?>"><br>

                    <input type="submit" value="Submit">
                    <a href="http://localhost/training-php/website.com/category_product">Trở về</a>
                </form>

</html>