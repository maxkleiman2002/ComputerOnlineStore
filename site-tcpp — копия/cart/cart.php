<?php
error_reporting(-1);
session_start();
require_once '../inc/connect.php';
require_once '../inc/funcs.php';

global $pdo;



if (isset($_GET['cart'])) {
    switch ($_GET['cart']) {
        case 'add':
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $product = get_product($id);

            if (!$product) {
                echo json_encode(['code' => 'error', 'answer' => 'Error product']);
            } else {
                add_to_cart($product);
                ob_start();
               require_once 'cart_page.php';
                $cart = ob_get_clean();
                echo json_encode(['code' => 'ok', 'answer' => $cart]);
            }
            break;
    }
}
