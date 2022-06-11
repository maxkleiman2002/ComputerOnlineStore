<?php
$connect = mysqli_connect('localhost','root','','computer_shop');

if(mysqli_connect_errno()){
    die('Помилка у підключенні до БД ('.mysqli_connect_errno() .') : '.mysqli_connect_error());

}
else{
    echo 'БД підключена';
}