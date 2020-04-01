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
    $ids          = $_POST['id'];
    $name         = $_POST['name'];
    $address      = $_POST['address'];
    $phone        = $_POST['phone'];

    $errors     = [];
    if($ids == '') {
        $errors[] = 'id không được rỗng';
    }
    if($name == '') {
        $errors[] = 'name không được rỗng';
    }
    if($address == '') {
        $errors[] = 'address không được rỗng';
    }
    if($phone == '') {
        $errors[] = 'phone không được rỗng';
    }

    if(count($errors) == 0) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
        $sql = "INSERT INTO contact 
        VALUES ('$id', '$name', '$address', '$phone')";
        $resurt = mysqli_query ($connect, $sql );
        session_start();
        $_SESSION["message"] = "Đã thêm thành công ID = $id";
        header('Location: http://localhost/training-php/website.com/contact');
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

                    <label for="fname">ID :</label>
                    <input type="text" id="fname" name="id" value="<?php if(isset($id)) { echo $id; } ?>"><br>

                    <label for="fname">Name</label>
                    <input type="text" id="fname" name="name" value="<?php if(isset($name)) { echo $name; } ?>"><br>

                    <label for="fname">Address</label>
                    <input type="text" id="fname" name="address" value="<?php if(isset($address)) { echo $address; } ?>"><br>

                    <label for="fname">Phone</label>
                    <input type="text" id="fname" name="phone" value="<?php if(isset($phone)) { echo $phone; } ?>"><br>


                    <input type="submit" value="Submit">
                    <a href="http://localhost/training-php/website.com/contact">Trở về</a>
                </form>

</html>