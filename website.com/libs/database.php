<?php
function connect_db() {
    //Kết nối SQL
    $servername = "localhost" ;
    $username = "root";
    $password ="";
    $dtb_name = "my_table_product";
    $connect = mysqli_connect($servername, $username, $password, $dtb_name);
    // Change character set to utf8
    mysqli_set_charset($connect,"utf8");
    if(!$connect){
        die("Kết nối thất bại" . mysqli_connect_error());
    }
    return $connect;
}