<?php
    //print_r($_POST);
    $email = $_POST['email'];
    $question = $_POST['question'];
    $sub = $_POST['subject'];

    $error ='';
    if(trim($email) == '') {
        $error = 'Введіть свій Email';
    }
     elseif (trim($question) == ''){
        $error = 'Введіть своє питання';
    }
    elseif (strlen($question)<5){
        $error = 'Ваше  питання повинно містити більше 5 символів';
    }


    if($error != '') {
        echo $error;
        exit;
    }

    $subject = "=?utf-8?B?".base64_encode($sub)."?=";
    $headers = "From: $email\r\n Reply-to: $email\r\n Content-type : text/html;charset=utf-8\r\n";
    mail('kleiman.maksym@chnu.edu.ua',$subject,$question,$headers);

    header('Location: /question.php');

    ?>