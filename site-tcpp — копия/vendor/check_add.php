<?php
session_start();
require_once '../inc/funcs.php';

$dbHost = "localhost";
$dbXeHost="localhost/XE";
$dbUsername="root";
$dbPassword = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {


    $con = mysqli_connect($dbHost, $dbUsername, $dbPassword);
    if (!$con){
        exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    }
    mysqli_set_charset($con, 'utf-8');

    mysqli_select_db($con, "compshop");



    $title = mysqli_real_escape_string($con,$_POST['title']);
    $slug = mysqli_real_escape_string($con,$_POST['article']);
    $content = mysqli_real_escape_string($con,$_POST['description']);
    $img = mysqli_real_escape_string($con,$_POST['img']);
    $price = mysqli_real_escape_string($con,$_POST['price']);
    $old_price = mysqli_real_escape_string($con,$_POST['old_price']);
    $hit = mysqli_real_escape_string($con,$_POST['hit']);
    $sale = mysqli_real_escape_string($con,$_POST['sale']);
    $category = mysqli_real_escape_string($con,$_POST['category']);

    echo $title;


mysqli_query($con,"INSERT products (title, slug, content, img, price, old_price, hit, sale, category) 
    VALUES ('" . $title . "', '" . $slug . "','" . $content . "', '" . $img . "','" . $price . "','" . $old_price . "','" . $hit . "','" . $sale . "','" . $category . "')");

}