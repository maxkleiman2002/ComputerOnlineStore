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

    $id =  $_SESSION['user']['id'];
    $name = mysqli_real_escape_string($con,$_POST['name']);

    $surname = mysqli_real_escape_string($con,$_POST['surname']);
    $patronymic = mysqli_real_escape_string($con,$_POST['patronymic']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $date = explode(".",$date);
    $phone = $_SESSION['user']['number'];
    $city = $_SESSION['user']['city'];
    $post = $_SESSION['user']['post'];
    $email = $_SESSION['user']['email'];
    $password = $_SESSION['user']['password'];

    $_SESSION['user']['name'] = $name;
    $_SESSION['user']['surname'] = $surname;
    $_SESSION['user']['patronymic'] = $patronymic;
    $_SESSION['user']['dayOfBirth'] = $date[0];
    $_SESSION['user']['monthOfBirth'] = $date[1];
    $_SESSION['user']['yearOfBirth'] = $date[2];

     mysqli_query($con,"UPDATE `users` SET `name`='$name',
    `surname`='$surname',`patronymic`='$patronymic',`dayOfBirth`='$date[0]',`monthOfBirth`='$date[1]',
    `yearOfBirth`='$date[2]',`number`='$phone',`city`='$city',`post`='$post',`email`='$email',`password`='$password' WHERE id = $id");

    mysqli_close($con);

    header('Location: profile_main.php');

}