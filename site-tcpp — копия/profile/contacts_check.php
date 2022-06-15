<?php
session_start();
$dbHost = "localhost";
$dbXeHost="localhost/XE";
$dbUsername="root";
$dbPassword = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {


    $con = mysqli_connect($dbHost, $dbUsername, $dbPassword);
    if (!$con) {
        exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    }
    mysqli_set_charset($con, 'utf-8');

    mysqli_select_db($con, "compshop");


    $email = mysqli_real_escape_string($con,$_POST['email']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);

    $id =  $_SESSION['user']['id'];
    $name = $_SESSION['user']['name'];

    $surname = $_SESSION['user']['surname'];
    $patronymic = $_SESSION['user']['patronymic'];;

    $city = $_SESSION['user']['city'];
    $post = $_SESSION['user']['post'];
    $password = $_SESSION['user']['password'];
    $dayOfBirth = $_SESSION['user']['dayOfBirth'];
    $monthBirth = $_SESSION['user']['monthOfBirth'];
    $yearOfBirth = $_SESSION['user']['yearOfBirth'];
    $_SESSION['user']['number'] = $phone;
    $_SESSION['user']['email'] = $email;


    mysqli_query($con,"UPDATE `users` SET `name`='$name',
    `surname`='$surname',`patronymic`='$patronymic',`dayOfBirth`='$dayOfBirth',`monthOfBirth`='$monthBirth',
    `yearOfBirth`='$yearOfBirth',`number`='$phone',`city`='$city',`post`='$post',`email`='$email',`password`='$password' WHERE id = $id");

    mysqli_close($con);

    header('Location: profile_main.php');

}