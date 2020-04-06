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
    $ids            = $_POST['id'];
    $name           = $_POST['name'];
    $email         = $_POST['email'];
    $username        = $_POST['username'];
    $password     = $_POST['password'];
    $address         = $_POST['address'];
    $phone          = $_POST['phone'];
    $created        = $_POST['created'];

    $errors     = [];
    
    if($ids == '') {
        $errors[] = 'id không được rỗng';
    }
    if($name == '') {
        $errors[] = 'name không được rỗng';
    }
    if($email == '') {
        $errors[] = 'email không được rỗng';
    }
    if($username == '') {
        $errors[] = 'username không được rỗng';
    }
    if($password == '') {
        $errors[] = 'password không được rỗng';
    }
    if($address == '') {
        $errors[] = 'address không được rỗng';
    }
    if($phone == '') {
        $errors[] = 'phone không được rỗng';
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
        $sql = "INSERT INTO user 
        VALUES ('$id', '$name', '$email', '$username', '$password', '$address', '$phone', '$name_image','$created')";
        $resurt = mysqli_query ($connect, $sql );
        session_start();
        $_SESSION["message"] = "Đã thêm thành công ID = $id";
        header('Location: http://localhost/training-php/website.com/user');
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

                    <label for="fname">Mã User :</label>
                    <input type="text" id="fname" name="id" value="<?php if(isset($id)) { echo $id; } ?>"><br>

                    <label for="fname">Họ và tên</label>
                    <input type="text" id="fname" name="name" value="<?php if(isset($name)) { echo $name; } ?>"><br>
                    
                    <label for="lname">image</label>
                    <input type="file" name="image">
                    </br>

                    <label for="fname">Email</label>
                    <input type="text" id="fname" name="email" value="<?php if(isset($email)) { echo $email; } ?>"><br>

                    <label for="fname">User name :</label>
                    <input type="text" id="fname" name="username" value="<?php if(isset($username)) { echo $username; } ?>"><br>

                    <label for="fname">Password :</label>
                    <input type="text" id="fname" name="password" value="<?php if(isset($password)) { echo $password; } ?>"><br>

                    <label for="fname">Address :</label>
                    <input type="text" id="fname" name="address" value="<?php if(isset($address)) { echo $address; } ?>"><br>

                    <label for="fname">Phone :</label>
                    <input type="text" id="fname" name="phone" value="<?php if(isset($phone)) { echo $phone; } ?>"><br>

                    <label for="fname">created</label>
                    <input type="text" id="fname" name="created" value="<?php if(isset($created)) { echo $created; } ?>"><br>

                    <input type="submit" value="Submit">
                    <a href="http://localhost/training-php/website.com/user">Trở về</a>
                </form>

</html>