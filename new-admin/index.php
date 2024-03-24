<?php

// require các file trong commons 

require_once "../commons/env.php";
require_once "../commons/helper.php";
require_once "../commons/connect-db.php";
require_once '../commons/model.php';



// require các file trong controllers và models 
require_file(PATH_CONTROLLER_NEW_ADMIN);
require_file(PATH_MODEL_NEW_ADMIN);


// điều hướng
$act = $_GET['act'] ?? '/';

match($act){
    '/' => HomeAdmin(),

    // luồng người dùng
    'users' => UserListAll(),
    'users-detail' => UserShowOne($_GET['id']),//test ?act=users-detail&id=1
    'users-create' => UserCreate(),
    'users-update' => UserUpdate($_GET['id']),
    'users-delete' => UserDelete($_GET['id']),
};


require_once "../commons/disconnect-db.php";