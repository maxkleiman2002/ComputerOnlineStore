<?php
session_start();

//        $name1 = filter_var(trim($_POST['name1']));
//        print_r($name1);



        $dbHost = "localhost";
        $dbXeHost="localhost/XE";
        $dbUsername="root";
        $dbPassword = "";

        $emailNameIsUnique = true;
        $passwordIsValid = true;
        $emailIsEmpty = false;
        $passwordIsEmpty = false;
        $password2IsEmpty = false;
        $numberIsValid = true;

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            if ($_POST["email"]=="") {
                $emailIsEmpty = true;
            }
            $con = mysqli_connect($dbHost, $dbUsername, $dbPassword);
            if (!$con){
                exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
            }
            mysqli_set_charset($con, 'utf-8');

            mysqli_select_db($con, "compshop");
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $form = mysqli_query($con, "SELECT id FROM users WHERE name='".$email."'");
            $formIDnum=mysqli_num_rows($form);

            if ($formIDnum) {
                $emailNameIsUnique = false;
            }
            if($_POST['password'] == ''){
                $passwordIsEmpty = true;
            }
            if($_POST['password2'] == ''){
                $password2IsEmpty = true;
            }
            if($_POST['password'] != $_POST['password2']){
                $passwordIsValid = false;
                $_SESSION['message'] = 'Помилка: Паролі не співпадають';
                header("Location: ../registration.php");
            }

            if(strlen($_POST['number']) !=10){
                $_SESSION['message2'] = 'Помилка: Невірно заданий номер телефону';
                $numberIsValid = false;
                header("Location: ../registration.php");
            }

//            if($_POST['password'] !=$_POST['password2']) {
//                    $_SESSION['message'] = 'Помилка: Паролі не співпадають';
//                    header("Location: ../registration.php");
//                }


            if (!$emailIsEmpty && $emailNameIsUnique && !$passwordIsEmpty && !$password2IsEmpty && $passwordIsValid && $numberIsValid) {
                $name = mysqli_real_escape_string($con,$_POST['name']);
                $surname = mysqli_real_escape_string($con,$_POST['surname']);
                $patronymic = mysqli_real_escape_string($con,$_POST['patronymic']);
                $birth_day = mysqli_real_escape_string($con,$_POST['birth-day']);
                $birth_month = mysqli_real_escape_string($con,$_POST['birth-month']);
                $birth_year = mysqli_real_escape_string($con,$_POST['birth-year']);
                $phone = mysqli_real_escape_string($con,$_POST['number']);
                $city = mysqli_real_escape_string($con,$_POST['city']);
                $post = mysqli_real_escape_string($con,$_POST['post']);
                $password = mysqli_real_escape_string($con, $_POST['password']);
                $password = md5($password);
                mysqli_select_db($con, "compshop");
                mysqli_query($con, "INSERT users (name, surname, patronymic, dayOfBirth, monthOfBirth, yearOfBirth, number, city, post, email, password) VALUES ('" . $name . "', '" . $surname . "','" . $patronymic . "', '" . $birth_day . "','" . $birth_month . "','" . $birth_year . "','" . $phone . "','" . $city . "','" . $post . "','" . $email . "','" . $password . "')");
                mysqli_free_result($form);
                mysqli_close($con);
                $_SESSION['message3'] = 'Реєстрація пройшла успішна';
                header('Location: ../authorization.php');

                exit;
            }
        }






