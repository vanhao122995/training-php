<?php

function connect_db() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = 'my_table_product';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);
    // Change character set to utf8
    mysqli_set_charset($conn,"utf8");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}