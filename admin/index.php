<?php

// require các file trong commons 

require_once "../commons/env.php";
require_once "../commons/helper.php";
require_once "../commons/connect-db.php";


// require các file trong controllers và models 

require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);


// điều hướng 
$act = $_GET['act'] ?? '/';
match($act){
    '/' => DashBoard(),
};



require_once "../commons/disconnect-db.php";