<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chinh sua</title>
    <link rel="stylesheet" href="http://localhost/training-php/website.com/public/styles.css">
</head>
<body>
<?php
    //Kết nối SQL
    require_once ('./../libs/database.php');
    $connect = connect_db();

    $id = $_GET['id']; 
    $sql = "SELECT * FROM user WHERE id =  $id";
    $result = mysqli_query($connect, $sql);
    $row   = mysqli_fetch_assoc($result);

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
    
    //Kiem tra file anh co ton tai hay khong
    if(isset($_FILES["image"]["name"]) && ($_FILES["image"]["name"] != "")) {
        if ($_FILES["image"]["size"] < 500) {
             $errors[] = 'Kính thước file quá lớn';
        }
        $type_file = pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
        $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif', 'jfif');
        if (!in_array(strtolower($type_file), $type_fileAllow)) {
            $errors[] = 'File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh';
        }
            $old_image = './../uploads/' .$row['image'];
            $name_image = time() . '-' . $_FILES["image"]["name"];
            $path_image = './../uploads/' . $name_image;
            unlink($old_image);
            move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
        }else {
            $name_image = $row['image'];   
        }
    
    if(count($errors) == 0) {
        $sql = "UPDATE user SET 
            id = '$ids' ,  
            name = '$name', 
            email = '$email', 
            username = '$username' ,
            password = '$password',
            address= '$address', 
            phone= '$phone', 
            image= '$name_image',
            created= '$created' 
        WHERE id = $id";

        mysqli_query($connect, $sql);
        session_start();
        $_SESSION["message"] = "Đã chỉnh sửa thành công id = $id";
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

                    <label for="fname">id</label>
                    <input type="text" id="fname" name="id" value="<?= isset($ids) ? $ids : $row['id']; ?>"><br><br>

                    <label for="fname">name</label>
                    <input type="text" id="fname" name="name" value="<?= isset($name) ? $name : $row['name']; ?>"><br><br>

                    <label for="fname">Email</label>
                    <input type="text" id="fname" name="email" value="<?= isset($email) ? $email : $row['email']; ?>"><br><br>
         
                    <label for="fname">User name</label>
                    <input type="text" id="fname" name="username" value="<?= isset($username) ? $username : $row['username']; ?>"><br><br>

                    <label for="fname">Password</label>
                    <input type="text" id="fname" name="password" value="<?= isset($password) ? $password : $row['password']; ?>"><br><br>

                    <label for="fname">Address</label>
                    <input type="text" id="fname" name="address" value="<?= isset($address) ? $address : $row['address']; ?>"><br><br>

                    <label for="fname">Phone</label>
                    <input type="text" id="fname" name="phone" value="<?= isset($phone) ? $phone : $row['phone']; ?>"><br><br>

                    <label for="lname">Image :</label>
                    <p><img src="http://localhost/training-php/website.com/uploads/<?= $row['image'] ?>" width="50" height="50"></p>
                    <input type="file" name="image">
                    </br>   

                    <label for="fname">created</label>
                    <input type="text" id="fname" name="created" value="<?= isset($created) ? $created : $row['created']; ?>"><br><br>

                    <input type="submit" value="Submit">

                </form>

</html>