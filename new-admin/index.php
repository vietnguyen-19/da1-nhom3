<?php

// require các file trong commons 

require_once "../commons/env.php";
require_once "../commons/helper.php";
require_once "../commons/connect-db.php";
require_once '../commons/model.php';


// require các file trong controllers và models 
require_file(PATH_CONTROLLER_NEW_ADMIN);
require_file(PATH_MODEL_NEW_ADMIN);
require_file(PATH_VIEW_NEW_ADMIN);


// điều hướng
$act = $_GET['act'] ?? '/';

match($act){
    '/' => HomeAdmin(),
};


require_once "../commons/disconnect-db.php";