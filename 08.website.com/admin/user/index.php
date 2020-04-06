

<!DOCTYPE html>
<html>
<head>
    <title> user </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <link rel="stylesheet" href="http://localhost/training-php/website.com/public/styles.css">
</head>
<body>
    <?php

    //Kết nối SQL
        require_once ('./../libs/database.php');
        $connect = connect_db();

        session_start();

    //Kiểm tra tồn tại giá trị tìm kiếm
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $name = isset($_GET['name']) ? $_GET['name'] : '';
            $username = isset($_GET['username']) ? $_GET['username'] : '';
            $phone = isset($_GET['phone']) ? $_GET['phone'] : '';
    //Tìm kiếm theo id và name và price và status (flag_where)
            $sql = "SELECT * FROM user"; //$str1 . $str2
            $flag_where = false;
            if($id != '') {
                $sql .= " where id = $id";
                $flag_where = true;
            }
            if($name != '') {
                if($flag_where) {
                $sql .= " AND `name` = '$name' ";
                }else {
                $sql .= " WHERE  `name` = '$name' ";
                $flag_where = true;
                }
            }
            if($username != '') {
                if($flag_where) {
                $sql .= " AND `username` = '$username' ";
                }else {
                $sql .= " WHERE  `username` = '$username' ";
                $flag_where = true;
                }
            }
            if($phone != '') {
                if($flag_where) {
                $sql .= " AND `phone` = '$phone' ";
                }else {
                $sql .= " WHERE  `phone` = '$phone' ";
                $flag_where = true;
                }
            }
        //Xóa nhiều id
            if(isset($_POST['submit-multi-id']) && isset($_POST['ids'])) {
                $ids = $_POST['ids'];
                foreach($ids as $id) {
                   $query = 'DELETE FROM user WHERE id = ' . $id;
                   mysqli_query($connect, $query);
                   $_SESSION["message"] = "Đã xóa thành công id =";
               }
            }
        
        //Kiểm tra câu sql 
            $resurt = mysqli_query ($connect, $sql );

    ?>
    <h2> DANH SÁCH USER </h2>
            <!-- form Tìm kiếm -->
    <a><b>Tìm kiếm User : </b></a><br><br>
    <div>
        <form action="" method="GET">
            <div>
                <label for="fname">Mã User</label><br>
                <input type="text" name="id" value="<?php $id ?>" placeholder="Mã ID">
            </div>
            <div>
                <label for="fname">Name: </label><br>
                <input type="text" name="name" value="<?php $name ?>" placeholder="Name">
            </div>
            <div>
                <label for="fname">User name</label><br>
                <input type="text" name="username" value="<?php $username ?>" placeholder="Username">
            </div>
            <div>
                <label for="fname">phone</label><br>
                <input type="text" name="phone" value="<?php $phone ?>" placeholder="Phone">
            </div>
            <div>
                <input type="submit" name="submit" value="Tìm kiếm">
            </div>
        </form>
    </div>
    <br>


    <form action="" method="POST">
        <div>
            <a href="http://localhost/training-php/website.com/user/create.php">Thêm mới</a>
        </div>
            <!-- Form xóa nhiều id -->
            <?php 
                    if(isset($_SESSION['message'])) { 
            ?>
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <?php 
                            if(isset($_POST['submit-multi-id']) && isset($_POST['ids'])) {
                                $ids = $_POST['ids'];
                                foreach($ids as $id) {
                                    echo  $_SESSION['message'] . $id . '<br>';        
                               }    unset($_SESSION['message']);
                            }
                            if(isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                        ?>
                    </div>
            <?php   } ?>
        <table id = "customers" >
            <tr>
                <th></th>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Address</th>
                <th>Phone</th>
                <th>created</th>
                <th>Hành động</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($resurt)) {
            ?>
            <tr>
                <td>
                    <input type="checkbox" name="ids[]" value="<?php echo $row['id']; ?>" >
                </td>
                <td><?php echo $row ['id'];?></td>
                <td>
                    <p><img src="http://localhost/training-php/website.com/uploads/<?= $row['image'] ?>" width="50" height="50"></p>
                    <?php echo $row['name']; ?>
                </td>
                <td><?php echo $row ['email']; ?></td>
                <td><?php echo $row ['username']; ?></td>
                <td><?php echo $row ['password']; ?></td>
                <td><?php echo $row ['address']; ?></td>
                <td><?php echo $row ['phone']; ?></td>
                <td><?php echo $row ['created']; ?></td>
                <td>
                    <button><a href = 'http://localhost/training-php/website.com/user/delete.php?id=<?php echo $row ['id'];?>'> Xoá</a></button>
                    <button><a href = 'http://localhost/training-php/website.com/user/edit.php?id=<?php echo $row ['id'];?>'> Sửa</a></button>
                </td>
            </tr>
            <?php } ?>
        </table>
        <div>
            <input type="submit" name="submit-multi-id" value="Xóa">
        </div>
    </form>
</body>
</html>
