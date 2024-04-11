<?php

function homeCilent()
{

    $title = 'trang chủ';
    $view = '/DashBoard';

    $products = listAllProduct();
    $categories = listAll('categories');
    $users = listAll('users');
    $brands = listAll('brands');
    

    require_once PATH_VIEW . '/master.php';

}
function adminLoginInCilent()
{
    require_file(PATH_CONTROLLER_NEW_ADMIN);
    
}

function showByCategory($categoryID){

    $showProductByCategories = listProductsByCategory($categoryID);
    
    $categoryName = $showProductByCategories[0]['c_name'];
    
    if (empty($showProductByCategories)) {
        e404();
    }
    
    
    $view = '\categories\show';
    $title = 'loại sản phẩm';

    require_once PATH_VIEW . '/master.php';

}