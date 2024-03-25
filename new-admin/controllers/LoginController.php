<?php
function LoginAdmin(){
    $views = 'login/login';
    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function ForgotPassword(){
    $views = 'login/forget-pass';
    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}