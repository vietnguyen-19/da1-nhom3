<?php

function HomeAdmin(){
    $title = 'DashBoard';
    $view = 'DashBoard.php';
    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function userListAll(){
    $title = 'Users';
    $view = 'users/index.php';
    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}
