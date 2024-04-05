<?php


function ProductsShow($productID)
{

    $products = showOneForProduct($productID);
    if (empty($products)) {
        e404();
    }


    $view = '/compoments\contents\product-details';

    $title = "chi tiết sản phẩm";

    require_once PATH_VIEW . '/master.php';
}


