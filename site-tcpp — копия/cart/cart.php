<?php
error_reporting(-1);
session_start();
require_once '../inc/connect.php';
require_once '../inc/funcs.php';

global $pdo;


if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {

    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    $stmt = $pdo->prepare('SELECT * FROM compshop.products WHERE id = ?');
    $stmt->execute([$_POST['product_id']]);

    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($product && $quantity > 0) {

        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {

                $_SESSION['cart'][$product_id] += $quantity;
            } else {

                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    // Prevent form resubmission...
    header('location: cart_page.php?page=cart');
    exit;
}
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}

if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
}
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }
}
?>




//if(isset($_POST["pid"]) && isset($_POST["pname"]) && isset($_POST["pprice"]) && isset($_POST["pimage"]) && isset($_POST["pcode"]) && isset($_POST["pcategory"])) {
//    $id = $_POST["pid"];
//    $name = $_POST["pprice"];
//    $image = $_POST["pimage"];
//    $code = $_POST["pcode"];
//    $category = $_POST["pcategory"];
//    $qty = 1;
//
//    global $pdo;
//    $select_stmt = $pdo->prepare("SELECT product_code FROM compshop.cart WHERE product_code=:code ");
//    $select_stmt -> execute(array(":code"=>$code));
//    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
//
//    $check_code = $row["product_code"];
//
//    if (!$check_code) {
//        $insert_stmt = $pdo->prepare("INSERT INTO compshop.cart(product_name,
//                          product_price,
//                          product_image,
//                          quantity,
//                          total_price,
//                          product_code,
//                          category)
//                            VALUES (
//                                    :name,
//                                    :price,
//                                    :image,
//                                    :qty,
//                                    :ttl_price,
//                                    :code,
//                                    :category)");
//
//        $insert_stmt->bindParam(":name", $name);
//        $insert_stmt->bindParam(":price", $price);
//        $insert_stmt->bindParam(":image", $image);
//        $insert_stmt->bindParam(":qty", $qty);
//        $insert_stmt->bindParam(":ttl_price", $price);
//        $insert_stmt->bindParam(":code", $code);
//        $insert_stmt->bindParam(":category", $category);
//        $insert_stmt->execute();
//
//    } else {
//        //
//    }
//
//    if (isset($_GET["miniCount"]) && isset($_GET["miniCount"]) == "mini_count") {
//        $select_stmt = $pdo->prepare("SELECT * FROM compshop.cart");
//        $select_stmt->execute();
//        $row = $select_stmt->rowCount();
//        echo $row;
//
//    }
//
//
//}

//if (isset($_GET['cart'])) {
//    switch ($_GET['cart']) {
//        case 'add':
//            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
//            $product = get_product($id);
//            if(!$product) {
//                echo json_encode(['code' => 'error', 'answer' => "Error product"]);
//            }
//            else{
//                add_to_cart($product);
//                ob_start();
//                require 'cart_modal.php';
//                $cart = ob_get_clean();
//                echo json_encode(['code' => 'ok',  'answer'=> $cart]);
//            }
//
//            break;
//        case  'clear':
//            if(!empty($_SESSION['cart'])){
//                unset($_SESSION['cart']);
//                unset($_SESSION['cart.sum']);
//                unset($_SESSION['cart.qty']);
//            }
//            require __DIR__ . 'cart_page.php';
//            break;
//    }
//}
//
