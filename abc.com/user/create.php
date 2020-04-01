<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới</title>
</head>
<body>
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}

    input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
    }

    input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }

    input[type=submit]:hover {
    background-color: #45a049;
    }

    .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    }
    #content {
        width: 80%;
        margin: 0 auto;
    }
</style>
<?php
    // Start the session
    session_start();
    //require libs database, helpers
    require_once('./../libs/database.php');
    require_once('./../libs/helpers.php');
    // Create connection
    $conn = connect_db();

    //     Array
    // (
    //     [name] => Tèo
    //     [username] => teo
    //     [address] => Q1, HCM
    // )
    // INSERT INTO user
    // VALUES (null, 'Tèo', 'teo', '', 'Q1, HCM', 1234567);
    // lần đầu $_POST rỗng
    if(isset($_POST['name'])) {
        $name       = $_POST['name'];
        $username   = $_POST['username'];
        $address    = $_POST['address'];
        $email      = $_POST['email'];
        $errors     = [];
        if($name == '') {
            $errors[] = 'Name không được rỗng';
        }
        if($username == '') {
            $errors[] = 'Username không được rỗng';
        }
        if($address == '') {
            $errors[] = 'Address không được rỗng';
        }
        if($email == '') {
            $errors[] = 'Email không được rỗng';
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) && $email != ''){
            $errors[] = 'Email không hợp lệ'; 
        }

        if($_FILES["image"]["name"] == '') {
            $errors[] = 'Vui lòng chọn ảnh';
        }else {
            // if ($_FILES["image"]["size"] < 50000000000) {
            //     $errors[] = 'Kính thước file quá lớn';
            // }

            $name_image = time() . '-' . $_FILES["image"]["name"];
            $type_file = pathinfo($name_image,PATHINFO_EXTENSION);
            
            $path_image = './../uploads/' . $name_image;
            //$name_image1 = './../uploads/' . 'image.jpg';
            move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
            //validate type file: png, jpg, mảng
            //upload nhiều file => upload muilti files
        }

        if(count($errors) == 0) {
            $sql = "INSERT INTO user VALUES (null, '$name', '$email', '$username', '', '$address', null, '$name_image', 1234567)";
            //$sql = 'INSERT INTO user VALUES (null, ' . $name . ',' . $username. ', "",' . $address . ', 1234567)';
            $result = mysqli_query($conn, $sql);
            $_SESSION["message"] = "Dữ liệu được thêm thành công";
            ridirect('http://localhost/training-php/abc.com/user');
        }
        // echo '<pre>';
        // print_r($errors);
        // echo '</pre>';
    }

?>
    <div id="content">
        <h3>Thêm mới</h3>
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
        <?php
                // if(isset($errors)) {
                //     echo $errors['msg'];
                // }               
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="fname">Name</label>
            <input type="text" id="fname" name="name" value="<?php if(isset($name)) { echo $name; } ?>" placeholder="Name">

            <label for="lname">Username</label>
            <input type="text" id="lname" name="username" value="<?php if(isset($username)) { echo $username; }  ?>" placeholder="Username">

            <label for="lname">Email</label>
            <input type="text" id="lname" name="email" value="<?php if(isset($email)) { echo $email; }  ?>" placeholder="Email">

            <label for="lname">Address</label>
            <input type="text" id="lname" name="address" value="<?php if(isset($address)) { echo $address; }  ?>" placeholder="Address">
            
            <label for="lname">Hình ảnh</label>
            <input type="file" name="image">
            </br>
            <input type="submit" value="Submit">
            <a href="http://localhost/training-php/abc.com/user">Trở về</a>
        </form>
        </div>
    </div>
</body>
</html>