<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa danh mục sản phẩm</title>
    <link rel="stylesheet" href="http://localhost/training-php/abc.com/public/styles.css">
</head>
<body>
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
        $name      = $_POST['name'];
        $status    = $_POST['status'];
        $detail    = $_POST['detail'];
        $created   = time();
        $errors     = [];
        if($name == '') {
            $errors[] = 'Name không được rỗng';
        }
        if(count($errors) == 0) {
            $sql = "UPDATE user " . 
                        "SET name = '$name', image= '', detail= '$detail', status= $status,  detail= $detail" . 
                        " WHERE id = $id";
            mysqli_query($conn, $sql);
           $_SESSION["message"] = "User chỉnh sửa thành công";
           ridirect('http://localhost/training-php/abc.com/category_product');
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
            <select name="status">
                <option value="1" >Active</option>
                <option value="0" >Inactive</option>
            </select>

            <label for="fname">Name</label>
            <input type="text" id="fname" name="name" value="<?= isset($name) ? $name : $user['name']; ?>" placeholder="Name">

            <label for="lname">Detail</label>
            <textarea id="lname" name="detail"><?= isset($detail) ? $detail : $user['detail']; ?></textarea>
            
            <label for="lname">Hình ảnh</label>
            <input type="file" name="image">
            </br>
            <input type="submit" value="Submit">
            <a href="http://localhost/training-php/abc.com/category_product">Trở về</a>
        </form>
        </div>
    </div>
</body>
</html>