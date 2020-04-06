

<!DOCTYPE html>
<html>
<head>
    <title> contact </title>
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
            $address = isset($_GET['address']) ? $_GET['address'] : '';
            $phone = isset($_GET['phone']) ? $_GET['phone'] : '';

    //Tìm kiếm theo id và name và price và status (flag_where)
            $sql = "SELECT * FROM contact"; //$str1 . $str2
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
            if($address != '') {
                if($flag_where) {
                $sql .= " AND address = '$address'";
                }else {
                $sql .= " WHERE address = '$address'";
                $flag_where = true;
                }
            }
            if($phone != '') {
                if($flag_where) {
                $sql .= " AND phone = '$phone'";
                }else {
                $sql .= " WHERE phone = '$phone'";
                $flag_where = true;
                }
            }



        //Xóa nhiều id
            if(isset($_POST['submit-multi-id']) && isset($_POST['ids'])) {
                $ids = $_POST['ids'];
                foreach($ids as $id) {
                   $query = 'DELETE FROM contact WHERE id = ' . $id;
                   mysqli_query($connect, $query);
                   $_SESSION["message"] = "Đã xóa thành công id =";
               }
            }
        
        //Kiểm tra câu sql 
            $resurt = mysqli_query ($connect, $sql );

    ?>
    <h2> LIÊN HỆ </h2>
            <!-- form Tìm kiếm -->
    <a><b>Tìm kiếm</b></a><br><br>
    <div>
        <form action="" method="GET">
            <div>
                <label for="fname">ID</label><br>
                <input type="text" name="id" value="<?php $id ?>" placeholder="ID">
            </div>
            <div>
                <label for="fname">Name</label><br>
                <input type="text" name="name" value="<?php $name ?>" placeholder="Name">
            </div>
            <div>
                <label for="fname">Address</label><br>
                <input type="text" name="address" value="<?php $address ?>" placeholder="Address">
            </div>
            <div>
                <label for="fname">Phone</label><br>
                <input type="text" name="phone" value="<?php $phone ?>" placeholder="Phone">
            </div>
            <div>
                <input type="submit" name="submit" value="Search">
            </div>
        </form>
    </div>
    <br>

    <!-- Form xóa nhiều id -->
    <form action="" method="POST">
        <div>
            <a href="http://localhost/training-php/website.com/contact/create.php">+New contact</a>
        </div>
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
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Edit</th>
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
                    <?php echo $row['name']; ?>
                </td>
                <td><?php echo $row ['address']; ?></td>
                <td><?php echo $row ['phone']; ?></td>
                <td>
                    <button><a href = 'http://localhost/training-php/website.com/contact/delete.php?id=<?php echo $row ['id'];?>'>Delete</a></button>
                    <button><a href = 'http://localhost/training-php/website.com/contact/edit.php?id=<?php echo $row ['id'];?>'>Edit</a></button>
                </td>
            </tr>
            <?php } ?>
        </table>
        <div>
            <input type="submit" name="submit-multi-id" value="Delete">
        </div>
    </form>
</body>
</html>
