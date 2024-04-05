<?php

session_start();
// require các file trong commons 

require_once "./commons/env.php";
require_once "./commons/helper.php";
require_once "./commons/connect-db.php";
require_once './commons/model.php';


// require các file trong controllers và models 

require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);


// điều hướng 
$act = $_GET['act'] ?? '/';
$arrRouteNeedAuth = [
    'cart-add',
    'cart-list',
    'cart-inc',
    'cart-dec',
    'cart-del',
    'order-checkout',
    'order-purchase',
    'order-success',
];

// kiểm tra xem đăng nhập chưa
middleware_auth_check_WW($act, $arrRouteNeedAuth);

match ($act) {
    '/' => homeCilent(),

    'cart-add'  => cartAdd($_GET['productID'], $_GET['quantity']),
    'cart-list' => cartList(),
    'cart-inc'  => cartInc($_GET['productID']),
    'cart-dec'  => cartDec($_GET['productID']),
    'cart-del'  => cartDel($_GET['productID']),

    'order-checkout' => orderCheckout(),
    'order-purchase' => orderPurchase(),
    'order-success' => orderSuccess(),

    'login' => loginCilent(),
    'logout' => logoutCilent(),
    'admin-login' => adminLoginInCilent(),

    'product-detail' => ProductsShow($_GET['productID']),
};



require_once "./commons/disconnect-db.php";
