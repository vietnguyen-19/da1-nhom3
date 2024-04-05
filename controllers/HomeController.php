<?php

function homeCilent()
{

    $title = 'trang chủ';
    $view = '/DashBoard';

    $products = listAllProduct();
    $categories = listAll('categories');
    $users = listAll('users');


    require_once PATH_VIEW . '/master.php';

}
function adminLoginInCilent()
{
    require_file(PATH_CONTROLLER_NEW_ADMIN);
    require_once PATH_VIEW_NEW_ADMIN . "?act=/" ;
}
