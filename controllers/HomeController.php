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
function dataProducts()
{

    require_once PATH_VIEW . '/master.php';
}
