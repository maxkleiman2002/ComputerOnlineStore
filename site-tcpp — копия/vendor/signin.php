<?php

session_start();

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

    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = md5(mysqli_real_escape_string($con, $_POST['password']));

    $check_user = mysqli_query($con,"SELECT * FROM `users`  WHERE `email` ='$email' AND `password` = '$password'");
    $pass = mysqli_real_escape_string($con,$_POST['password']);

    $check_admin = mysqli_query($con,"SELECT * FROM `admin`  WHERE `email` ='$email' AND `password` = '$pass'");
    if(mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            "surname" => $user['surname'],
            "patronymic"=> $user['patronymic'],
            "dayOfBirth" => $user['dayOfBirth'],
            "monthOfBirth" =>$user['monthOfBirth'],
            "yearOfBirth" => $user['yearOfBirth'],
            "number" => $user['number'],
            "city" => $user['city'],
            "post" => $user['post'],
            "email" =>$user['email'],
            "password"=>$user['password'],
        ];
        $_SESSION['admin']  =false;

            header("Location: ../profile/profile_main.php");


    }
    elseif  (mysqli_num_rows($check_admin) > 0){
        $_SESSION['admin'] = true;
        header("Location: ../admin_panel/admin_catalog.php");
    }
    else{
        $_SESSION['message3'] = 'Невірний логін або пароль';

        header("Location: ../authorization.php");
    }

}