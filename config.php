<?php
define("server","localhost:3306");
define("username","root");
define("password","");
$con=new mysqli(server,username,password);
$con->query("create database if not exists hotel");
$con->close();
$con=new mysqli(server,username,password,"hotel");
$sql1="CREATE TABLE IF NOT EXISTS bookings(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cus_name VARCHAR(50),
    cus_phone BIGINT,
    h_name VARCHAR(50),
    h_location VARCHAR(50),
    h_price BIGINT,
    no_of_rooms INT,
    checkin_date DATE,
    checkout_date DATE,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    $con->query($sql1);

$sql2="CREATE TABLE IF NOT EXISTS customer(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cus_name VARCHAR(50),
    cus_phone BIGINT UNIQUE KEY,
    cus_password VARCHAR(50))";
$con->query($sql2);

$sql3="CREATE TABLE IF NOT EXISTS  hotels_list(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    h_name VARCHAR(50),
    h_location VARCHAR(50),
    h_price BIGINT,
    h_description VARCHAR(255),
    h_image longblob,
    h_ratings FLOAT)";
$con->query($sql3);
    
?>
