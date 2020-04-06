<?php
    // echo '<pre>';
    // print_r($_GET);
    // echo '</pre>';
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "my_table_product";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    echo '<pre>';
    print_r($conn);
    echo '</pre>';

    // Create database
    $sql = "CREATE DATABASE connect_db1";

    mysqli_query($conn, $sql);
    //bài tập viết 1 hàm kết nối vs mysql hàm trả về biến kết nối nếu như kết nối thành công ngược lại trả về lỗi khi kn thất bại

?>


<!DOCTYPE html>
<html>
<body>

    <div>Login</div>
    <form action="http://localhost/training-php/buoi-5/register.php" method="POST">
        <input type="text" name="username" />
        <input type="text" name="password" />
        <button type="submit" name="register">Đăng ký</button>
    </form>

</body>
</html>