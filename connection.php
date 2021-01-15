<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "country_shop";

    $connect = new mysqli($servername, $username, $password,$db_name);

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    } 
?>