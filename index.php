<?php

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
match($act){
    '/' => homeCilent(),
};



require_once "./commons/disconnect-db.php";