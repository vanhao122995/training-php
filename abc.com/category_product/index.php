

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <link rel="stylesheet" href="http://localhost/training-php/abc.com/public/styles.css">
</head>
<body>
    <div id="content">
        <h3>Danh sánh User</h3>
            <div>
                <a href="http://localhost/training-php/abc.com/category_product/create.php">Thêm mới</a>
            </div>
        <div>
        <?php
            //Start the session
            session_start();
            //require libs database
            require_once('./../libs/database.php');
            // Create connection
            $conn = connect_db();

            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $name = isset($_GET['name']) ? $_GET['name'] : '';
            //*************************filter cách 1******************************
            $sql = "SELECT * FROM category_product"; //$str1 . $str2
            $flag_where = false;
            if($id != '') {
                $sql .= " WHERE id = $id";
                $flag_where = true;
            }
            //SELECT * FROM `user` WHERE id = 23
            if($name != '') {
                if($flag_where) {
                    $sql .= " AND name = '$name'";
                }else {
                    $sql .= " WHERE name = '$name'";
                }         
            }
            //*****************delete multi ids***********************//
            if(isset($_POST['submit-multi-id']) && isset($_POST['ids'])) {
                $ids = $_POST['ids'];
                foreach($ids as $id) {
                    $query = 'DELETE FROM category_product WHERE id = ' . $id;
                    mysqli_query($conn, $query);
                }
            }

            //SELECT * FROM `user` WHERE id = 23 WHERE name = '$name'
            $result = mysqli_query($conn, $sql);
            
            // echo '<pre>';
            // print_r($_POST);
        ?>
            <form action="" method="GET">
                <div>
                    <label for="fname">Nhập mã user</label>
                    <input type="text" name="id" value="<?= $id ?>" placeholder="Mã user">
                </div>
                <div>
                    <label for="fname">Nhập tên user</label>
                    <input type="text" name="name" value="<?= $name ?>" placeholder="Tên user">
                </div>
                <div>
                    <input type="submit" name="submit" value="Tìm kiếm">
                </div>
            </form>
        </div>
        <form action="" method="POST">
            <?php 
                    if(isset($_SESSION['message'])) { 
            ?>
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <?php 
                            echo  $_SESSION['message']; 
                            unset($_SESSION['message']);//xóa session
                        ?>
                    </div>
            <?php } ?>
            <table id="customers">
                <tr>
                    <th></th>
                    <th>id</th>
                    <th>Name</th>
                    <th>Trạng thái</th>            
                    <th>Created</th>
                    <th>Hành động</th>
                </tr>
                <?php 
                    while($row = mysqli_fetch_assoc($result)) { 
                ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="ids[]" value="<?php echo $row['id']; ?>" />
                        </td>
                        <td><?php echo $row['id']; ?></td>
                        <td>
                            <p><img src="http://localhost/training-php/abc.com/uploads/category_product/<?= $row['image'] ?>" width="50" height="50"></p>
                            <?php echo $row['name']; ?>
                        </td>
                        <td><?= $row['status'] == 1 ? "Active" : "Inactive" ?></td>
                        <td><?php echo $row['created']; ?></td>
                        <td>
                            <a href="http://localhost/training-php/abc.com/category_product/delete.php?id=<?php echo $row['id']; ?>">Xoá</a>
                            <a href="http://localhost/training-php/abc.com/category_product/edit.php?id=<?php echo $row['id']; ?>">Sửa</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <div>
                <input type="submit" name="submit-multi-id" value="Xóa">
            </div>
        </form>
    </div>
</body>
</html>