<?php

session_start();

// require các file trong commons 

require_once "../commons/env.php";
require_once "../commons/helper.php";
require_once "../commons/connect-db.php";
require_once '../commons/model.php';



// require các file trong controllers và models 
require_file(PATH_MODEL);
require_file(PATH_CONTROLLER_NEW_ADMIN);
require_file(PATH_MODEL_NEW_ADMIN);



// điều hướng
$act = $_GET['act'] ?? '/';

// check đã đăng nhập admin chưa
middleware_auth_check($act);

match ($act) {
    '/' => HomeAdmin(),

    // luồng Products
    'product' => ProductListAll(),
    'product-detail' => ProductsShowOne($_GET['id']),
    'product-create' => ProductsCreate(),
    'product-update' => ProductUpdate($_GET['id']),
    'product-delete' => productDelete($_GET['id']),

    // luồng người dùng
    'users' => UserListAll(),
    'users-detail' => UserShowOne($_GET['id']),
    'users-create' => UserCreate(),
    'users-update' => UserUpdate($_GET['id']),
    'users-delete' => UserDelete($_GET['id']),

    // luồng setting
    'setting-form' => settingShowForm(),
    'setting-save' => settingSave(),

    'categories' => categoryListAll(),
    'category-detail' => categoryShowOne($_GET['id']),
    'category-create' => categoryCreate(),
    'category-update' => categoryUpdate($_GET['id']),
    'category-delete' => categoryDelete($_GET['id']),

    'brands' => brandsListAll(),
    'brands-detail' => brandsShowOne($_GET['id']),
    'brands-create' => brandsCreate(),
    'brands-update' => brandsUpdate($_GET['id']),
    'brands-delete' => brandsDelete($_GET['id']),


    // đăng nhập 
    'login-admin' => LoginAdmin(),
    'logout-admin' => LogoutAdmin(),
};


require_once "../commons/disconnect-db.php";
