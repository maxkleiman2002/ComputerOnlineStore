<?php
session_start();
require_once '../inc/funcs.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $dbHost = "localhost";
    $dbXeHost="localhost/XE";
    $dbUsername="root";
    $dbPassword = "";

    $con = mysqli_connect($dbHost, $dbUsername, $dbPassword);
    if (!$con) {
        exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    }
    mysqli_set_charset($con, 'utf-8');

    mysqli_select_db($con, "compshop");


    $id = mysqli_real_escape_string($con, $_POST['productId']);
    print_r($id);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $slug = mysqli_real_escape_string($con, $_POST['article']);
    $content = mysqli_real_escape_string($con, $_POST['description']);
    $img = mysqli_real_escape_string($con, $_POST['img']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $old_price = mysqli_real_escape_string($con, $_POST['old_price']);
    $hit = mysqli_real_escape_string($con, $_POST['hit']);
    $sale = mysqli_real_escape_string($con, $_POST['sale']);
    $category = mysqli_real_escape_string($con, $_POST['category']);



    mysqli_query($con, "UPDATE `products` SET `title`='$title',`slug`='$slug',`content`='$content',`img`='$img',`price`='$price',`old_price`='$old_price',`hit`='$hit',`sale`='$sale',`category`='$category' WHERE id = $id");
    header("Location: admin_catalog.php");
}