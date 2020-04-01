<?php
//bài tập viết 1 hàm kết nối vs mysql hàm trả về biến kết nối nếu như kết nối thành công ngược lại trả về lỗi khi kn thất bại

function checkconectDB($database){

    $servername = "localhost";//127.0.0.1:8080//192.168.0.1
    $username = "root";
    $password = "";

  // Create connection
    $connect = mysqli_connect($servername, $username, $password, $database);
  
  // Check connection
    if (!$connect) {
        die("Kết nối không thành công, chi tiết lỗi : " . mysqli_connect_error());
    }
    echo "Kết nối thành công: ";
    return $connect;
}
  // Test the funtion with database
    $db1 = checkconectDB("my_table_product");
    $db2 = checkconectDB("doan_sv");
    echo '<pre>';
    print_r($kiemtra);
    echo '</pre>';



//Bài tập: Viết       hàm get slug cho phép tham khảo trên mạng

function to_slug($str) {
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
}

$str = "chúng ta đi đâu thế";
$slug = to_slug($str);
echo $slug;




?>

>