<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="http://localhost/training-php/website.com/public/styles.css">
</head>
<body>
<?php
    //Kết nối SQL
    require_once ('./../libs/database.php');
    $connect = connect_db();

    $id = $_GET['id']; 
    $sql = "SELECT * FROM contact WHERE id =  $id";
    $result = mysqli_query($connect, $sql);
    $row   = mysqli_fetch_assoc($result);

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
        $sql = "UPDATE contact SET 
            id = '$ids' ,  
            name = '$name', 
            address = '$address',
            phone = '$phone'
        WHERE id = $id";

        mysqli_query($connect, $sql);
        session_start();
        $_SESSION["message"] = "Đã chỉnh sửa thành công id = $id ";
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
        <h3>Chỉnh sửa</h3>
            <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">

                    <label for="fname">ID</label>
                    <input type="text" id="fname" name="id" value="<?= isset($ids) ? $ids : $row['id']; ?>"><br><br>

                    <label for="fname">Name</label>
                    <input type="text" id="fname" name="name" value="<?= isset($name) ? $name : $row['name']; ?>"><br><br>

                    <label for="fname">Address</label>
                    <input type="text" id="fname" name="address" value="<?= isset($address) ? $address : $row['address']; ?>"><br><br>

                    <label for="fname">Phone</label>
                    <input type="text" id="fname" name="phone" value="<?= isset($phone) ? $phone : $row['phone']; ?>"><br><br>

                    <input type="submit" value="Submit">

                </form>

</html>