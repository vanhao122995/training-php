<!DOCTYPE html>
<html>
<head>
    <title> category_product </title>
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
            $image = isset($_GET['image']) ? $_GET['image'] : '';
            $detail = isset($_GET['detail']) ? $_GET['detail'] : '';
            $status = isset($_GET['status']) ? $_GET['status'] : '';
            $created = isset($_GET['created']) ? $_GET['created'] : '';

    //Tìm kiếm theo id và name và price và status (flag_where)
            $sql = "SELECT * FROM category_product"; //$str1 . $str2
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

            if($status != '') {
                if($flag_where) {
                $sql .= " AND status = '$status'";
                }else {
                $sql .= " WHERE status = '$status'";
                $flag_where = true;
                }
            }



        //Xóa nhiều id
            if(isset($_POST['submit-multi-id']) && isset($_POST['ids'])) {
                $ids = $_POST['ids'];
                foreach($ids as $id) {
                   $query = 'DELETE FROM category_product WHERE id = ' . $id;
                   mysqli_query($connect, $query);
                   $_SESSION["message"] = "Đã xóa thành công id =";
               }
            }
        
            
            $resurt = mysqli_query ($connect, $sql );

    ?>
    <h2><b> DANH MỤC SẢN PHẨM </b></h2>
            <!-- form Tìm kiếm -->
    <a><b>Tìm kiếm theo Danh mục Sản phẩm : </b></a><br><br>
    <div>
        <form action="" method="GET">
            <div>
                <label for="fname">Tìm Mã ID</label><br>
                <input type="text" name="id" value="<?php $id ?>" placeholder="Mã ID">
            </div>
            <div>
                <label for="fname">Tìm Tên Danh mục</label><br>
                <input type="text" name="name" value="<?php $name ?>" placeholder="Tên Sản phẩm">
            </div>
            <div>
                <label for="fname">Tình trạng Sản phẩm</label><br>
                <select name="status">
                    <option value=""></option>
                    <option value="new">New</option>
                    <option value="used">Used</option>
                </select>
            </div>
            <div>
                <input type="submit" name="submit" value="Tìm kiếm">
            </div>
        </form>
    </div>
    <br>

    <!-- Form xóa nhiều id -->
    <form action="" method="POST">
        <div>
            <a href="http://localhost/training-php/website.com/category_product/create.php">Thêm mới</a>
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
                <th>id</th>
                <th>name</th>
                <th>image</th>
                <th>detail</th>
                <th>status</th>
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
                <td><?php echo $row['name']; ?></td>
                <td>
                    <p><img src="http://localhost/training-php/website.com/uploads/<?= $row['image'] ?>" width="50" height="50"></p>
                </td>
                <td><?php echo $row ['detail']; ?></td>
                <td><?php echo $row ['status']; ?></td>
                <td><?php echo $row ['created']; ?></td>
                <td>
                    <button><a href = 'http://localhost/training-php/website.com/category_product/delete.php?id=<?php echo $row ['id'];?>'> Xoá</a></button>
                    <button><a href = 'http://localhost/training-php/website.com/category_product/edit.php?id=<?php echo $row ['id'];?>'> Sửa</a></button>
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
