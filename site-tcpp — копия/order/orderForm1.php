<?php

session_start();
ini_set('display_errors', 'Off');
require_once '../inc/connect.php';
require_once '../inc/funcs.php';
$products = get_products();

$grand_total = 0;
$all_items = "";
$items = array();


$stack_title = [];
$stack_img = [];
$stack_category = [];
$stack_price = [];
$stack_qty = [];


//print_r($_SESSION['cart_title']);
//print_r($_SESSION['cart_img']);
//print_r($_SESSION['cart_price']);
//print_r($_SESSION['cart_qty']);
//print_r($_SESSION['cart_category']);





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


//    $category = mysqli_real_escape_string($con,$_POST['category']);
//    $title = mysqli_real_escape_string($con,$_POST['title']);
//    $price = mysqli_real_escape_string($con,$_POST['price']);
//    $qty = mysqli_real_escape_string($con,$_POST['qty']);
//    $img = mysqli_real_escape_string($con,$_POST['img']);
//    $sum_qty = mysqli_real_escape_string($con,$_SESSION['cart.qty']);
//    $sum_price = mysqli_real_escape_string($con, $_POST['cart.sum']);








//    $cartArray = [
//            "title" => $title,
//            "category" => $category,
//            "price"=> $price,
//    ];
//    var_dump($cartArray);

//    $title = json_encode($_SESSION['cart_title']);
//    print_r(json_decode($title));
//
//    mysqli_select_db($con, "compshop");
//    mysqli_query($con, "INSERT cart (product_name, product_price,  quantity, category)
//    VALUES ('" . json_encode($_SESSION['cart_title']) . "', '" . json_encode($_SESSION['cart_price']) . "', '" . json_encode($_SESSION['cart_qty']). "','" . json_encode($_SESSION['cart_category']) . "')");
//    mysqli_close($con);
}

$_SESSION['total_sum'] = $_POST['sum'];
$_SESSION['total_qty'] = $_POST['qty_total'];





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>???????????????????? ????????????????????</title>
    <link rel="stylesheet" href="orderForm.css">

</head>
<body>




<header>
    <div class="logo">
        <div class="elips_logo">
            <p>CF</p>
        </div>
        <div class="logo-text">
            <p>
                Computer<br>
                Flagman
            </p>
        </div>
    </div>

    <nav>
        <ul class="f1">
            <li><a href="../main_screen.php">??????????????</a></li>
            <li><a href="../delivety.php">????????????????</a></li>
            <li><a href="../payment.php">????????????</a></li>
            <li><a href="../contacts.php">????????????????</a></li>
            <?php
            if($_SESSION['user']) {

                echo ' <li ><a href = "../vendor/logout.php" ><button class="auth_but" > ??????????</button ></a ></li >';

            }
            else{
                echo ' <li ><a href = "../authorization.php" ><button class="auth_but" > ????????</button ></a ></li >';
            }
            ?>
            <li><a href="#" id="id-cart"> <img src="../cart.svg"></a></li>

            <li><div class="count-cart">
                    <span class="mini-count"> <?=$_SESSION['cart.qty'] ?? 0 ?></span>
                </div> </li>
        </ul>
    </nav>
</header>





<div class="main">

    <div class="head">
        <hr color="DBDBDC">
        <h1>???????????????????? ????????????????????</h1>
    </div>
    <form action="checkout.php" method="POST">
        <div class="form-wrapper">

            <div class="to-centre">
                <?php if(!empty($_SESSION['cart'])):?>

                <fieldset>
                    <legend>???????? ????????????????????: </legend>
                    <div class="group">
                        <label for="name">????'??: </label> <input type="text"  name="name" id="name" value="<?=$_SESSION['user']['name'] ?>"/>
                    </div>

                    <div class="group">
                        <label for="surname">????????????????: </label> <input type="text"  name="surname" id="surname" value="<?=$_SESSION['user']['surname'] ?>"/>
                    </div>

                    <div class="group">
                        <label for="patronymic">????'?? ????-????????????????: </label> <input type="text"  name="patronymic" id="patronymic" value="<?=$_SESSION['user']['patronymic'] ?>"/>
                    </div>

                    <div class="group">
                        <label for="number">??????????????: </label>
                        <input type="number"  name="number" id="number" value="<?=$_SESSION['user']['number'] ?>"/>
                    </div>
                    <div class="group">
                        <label for="city">??????????: </label>
                        <input type="text"  name="city" id="city" value="<?=$_SESSION['user']['city'] ?>">
                    </div>
                    <div class="group">
                        <label for="post">?????????? ???????????????????? ?????????? ??????????: </label>
                        <input type="text"  name="post" id="post" value="<?=$_SESSION['user']['post'] ?>"/>
                    </div>
                    <div class="group">
                        <label for="email">E-mail : </label>
                        <input type="email"  name="email" id="email" value="<?=$_SESSION['user']['email'] ?>"/>
                    </div>
                </fieldset>

                <?php endif;?>
                <fieldset>
                    <legend>???????????? ????????????: </legend>
                    <div class="group">
                        <label for="noCard">???????????? ?????? ????????????????<input type="radio" value="???????????? ????????????????" name="payment_method" id="noCard"></label><br>
                    </div>
                    <div class="group">
                        <label for="card">???????????? ??????????????&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" value="???????????????????????? ????????????" name="payment_method" id="card"></label>
                    </div>

                           <input type="hidden" name = "grand_total" value="<?=$_SESSION['cart.sum'] + 78 ?>">

                    <input type="hidden" name = "total_qty" value="<?=$_SESSION['cart.qty'] ?>">


</div>
        </div>

    <div class="order-info">

        <div class="confirm-order">



            <p class="t1"><span class="small"> ???????????????? <?=$_SESSION['cart.qty'] ?> ??????????????:</span> <span class="order-price"><?=$_SESSION['cart.sum'] ?> ??????.</span> </p>
            <p class="t2"><span class="small"> ????????????????:</span> <span class="big">78 ??????.</span> </p>
            <hr color="DBDBDC">
            <p class="t3"><span class="big2"> ??????????: </span><span class="order-sum"><?=$_SESSION['cart.sum'] + 78  ?> ??????.</span> </p>



            <div class="modal-footer">

                <button type="submit"  class="btn-primary">?????????????????????? ????????????????????</button>
            </div>


    </div>
</div>
    </form>
<footer>

    <div class="logo-wrapper">
        <div class="footer-logo">
            <span>CF</span>
        </div>
        <div class="footer-logo-text">
            <p>Computer Flagman</p>
        </div>
    </div>

    <div class="about-shop">
        <p> <span>COMPUTER FLAGMAN</span></p>
        <a href="../about_shop.php"> <p>?????? ????????????????</p></a>
        <a href=""> <p>?????????? ??????????????????</p></a>
        <a href=""><p>???????????? ?? Computer Flagman</p></a>
        <a href=""> <p>?????????????? ????????????????????</p></a>
    </div>
    <div class="info-for-seller">
        <p><span>??????????????</span></p>
        <p><a href="../delivety.php">???????????????? ???? ????????????</a></p>
        <p><a href="">?????????? ???? ???????????????????? ????????????</a></p>
        <p><a href="">????????????????</a></p>
        <p><a href="../question.php">?????????????? ??????????????</a></p>
    </div>
    <div class="contacts">
        <p>
            <span>?????????????????? ??????????: </span><br>
            <img src="../icons/phone.png" alt="phone" /> <span class="icon">+38 068 190 2723</span><br>
            <img src="../icons/message_icon.png" alt="email" /> <span class="icon">maxkleiman2002@gmail.com</span>
        </p>
        <br/>
        <p>
            <span> ???????????? ???????????? call-????????????</span><br>
            ????????????????????
        </p>
        <br/>
        <p>
            <span>????????????:</span><br>
            ??.????????????????, ??????. ???????????? ??????????????, 69
        </p>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</footer>
</body>
</html>