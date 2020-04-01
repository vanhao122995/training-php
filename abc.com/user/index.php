

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
</head>
<body>
<style>
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse; 
        width: 100%;             
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
    #content {
        width: 80%;
        margin: 0 auto;
    }
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
    .alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    }

    .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
    }

    .closebtn:hover {
    color: black;
    }
</style>
    <div id="content">
        <h3>Danh sánh User</h3>
            <div>
                <a href="http://localhost/training-php/abc.com/user/create.php">Thêm mới</a>
            </div>
        <div>
    <!--TH1: SELECT * FROM `user` 
        TH2: SELECT * FROM `user` WHERE id = 23
        TH3: SELECT * FROM `user` WHERE name = 'teo'
        TH3: SELECT * FROM `user` WHERE id = 23 AND name = 'teo' -->
        <?php
            //Start the session
            session_start();
            //require libs database
            require_once('./../libs/database.php');
            // Create connection
            $conn = connect_db();

            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $name = isset($_GET['name']) ? $_GET['name'] : '';
            //*************************cách 1******************************

            // $sql = "SELECT * FROM user";

            // if($id != '') {
            //     $sql = "SELECT * FROM user WHERE id = $id";
            // }

            // if($name != '') {
            //     $sql = "SELECT * FROM user WHERE name = '$name'";
            // }

            // if($name != '' && $id != '') {
            //     $sql = "SELECT * FROM user WHERE id = $id AND name = '$name'";
            // }

            //*************************cách 2******************************
            // TH1: SELECT * FROM `user` 
            // TH2: SELECT * FROM `user` WHERE id = 23 có id và k có name
            // TH3: SELECT * FROM `user` WHERE name = 'teo' có nane và k có id
            // TH3: SELECT * FROM `user` WHERE id = 23 AND name = 'teo' có name và id
            $sql = "SELECT * FROM user"; //$str1 . $str2
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
                    $query = 'DELETE FROM user WHERE id = ' . $id;
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
                    <th>Email</th>
                    <th>Username</th>            
                    <th>Address</th>
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
                            <p><img src="http://localhost/training-php/abc.com/uploads/<?= $row['image'] ?>" width="50" height="50"></p>
                            <?php echo $row['name']; ?>
                        </td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['created']; ?></td>
                        <td>
                            <a href="http://localhost/training-php/abc.com/user/delete.php?id=<?php echo $row['id']; ?>">Xoá</a>
                            <a href="http://localhost/training-php/abc.com/user/edit.php?id=<?php echo $row['id']; ?>">Sửa</a>
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