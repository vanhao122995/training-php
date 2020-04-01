<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa</title>
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
    session_start();
    //require libs database
    require_once('./../libs/database.php');
    require_once('./../libs/helpers.php');
    // Create connection
    $conn = connect_db();

    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id =  $id";
    $result = mysqli_query($conn, $sql);
    $user   = mysqli_fetch_assoc($result);

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
        if(count($errors) == 0) {
            $sql = "UPDATE user " . 
                        "SET name = '$name', email= '$email', username= '$username', address= '$address'" . 
                        " WHERE id = $id";
            mysqli_query($conn, $sql);
           $_SESSION["message"] = "User chỉnh sửa thành công";
           ridirect('http://localhost/training-php/abc.com/user');
        }

    }

?>
    <div id="content">
        <h3>Chỉnh sửa</h3>
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
                // if(isset($name)) {
                //     echo $name;
                // }else { echo $user['name']; }              
        ?>
        <form action="" method="POST">
            <label for="fname">Name</label>
            <input type="text" id="fname" name="name" value="<?= isset($name) ? $name : $user['name']; ?>" placeholder="Name">

            <label for="lname">Username</label>
            <input type="text" id="lname" name="username" value="<?= isset($username) ? $username : $user['username'];  ?>" placeholder="Username">

            <label for="lname">Email</label>
            <input type="text" id="lname" name="email" value="<?= isset($email) ? $email : $user['email'];  ?>" placeholder="Email">

            <label for="lname">Address</label>
            <input type="text" id="lname" name="address" value="<?= isset($address) ? $address : $user['address'];  ?>" placeholder="Address">

            <input type="submit" value="Submit">
            <a href="http://localhost/training-php/abc.com/user">Trở về</a>
        </form>
        </div>
    </div>
</body>
</html>