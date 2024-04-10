<?php


function ProductsShow($productID)
{
    $product = listAllProduct();
    if (empty($product)) {
        e404();
    }

    $products = showOneForProduct($productID);
    if (empty($products)) {
        e404();
    }


    $view = '/compoments\contents\product-details';

    $title = "chi tiết sản phẩm";

    require_once PATH_VIEW . '/master.php';
}
function ShowByBrand($brandID)
{
    $productByBrands = listProductsByBrand($brandID);
    
    if (empty($productByBrands)) {
        e404();
    }
    
    $view = '/compoments\contents\productByBrand';
    
    $title = "Sản phẩm theo nhãn hàng";
    
    require_once PATH_VIEW . '/master.php';
}


