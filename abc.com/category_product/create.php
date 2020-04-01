<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới danh mục sản phẩm</title>
    <link rel="stylesheet" href="http://localhost/training-php/abc.com/public/styles.css">
</head>
<body>
<?php
    // Start the session
    session_start();
    //require libs database, helpers
    require_once('./../libs/database.php');
    require_once('./../libs/helpers.php');
    // Create connection
    $conn = connect_db();
    // lần đầu $_POST rỗng
    if(isset($_POST['name'])) {
        $name       = $_POST['name'];
        $status    = $_POST['status'];
        $detail    = $_POST['detail'];
        $created   = time();
        $errors    = [];
        if($name == '') {
            $errors[] = 'Name không được rỗng';
        }

        $name_image = '';
        if($_FILES["image"]["name"] != '') {
            $name_image = time() . '-' . $_FILES["image"]["name"];    
            $path_image = './../uploads/category_product/' . $name_image;
            move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
        }

        if(count($errors) == 0) {
            $sql = "INSERT INTO category_product VALUES (null, '$name', '$name_image', '$detail', '$status', $created)";
            $result = mysqli_query($conn, $sql);
            $_SESSION["message"] = "Dữ liệu được thêm thành công";
            ridirect('http://localhost/training-php/abc.com/category_product');
        }

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
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="fname">Trạng thái</label>
            <select name="status">
                <option value="1" >Active</option>
                <option value="0" >Inactive</option>
            </select>
            <label for="fname">Name</label>
            <input type="text" id="fname" name="name" value="<?php if(isset($name)) { echo $name; } ?>" placeholder="Name">

            <label for="lname">Detail</label>
            <textarea id="lname" name="detail"><?php if(isset($detail)) { echo $detail; } ?></textarea>
            
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