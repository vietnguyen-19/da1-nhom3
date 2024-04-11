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
    
    
    
    if (!empty($showProductByCategories)) {
        
        $categoryName = $showProductByCategories[0]['c_name'];
        $view = '\categories\show';
        $title = 'loại sản phẩm';
    
        require_once PATH_VIEW . '/master.php';

    }else{
        $errorName = "Bạn chưa có sản phẩm nào";
        $view = '\categories\show';
        $title = 'loại sản phẩm';
    
        require_once PATH_VIEW . '/master.php';
    }
    
    
   

}