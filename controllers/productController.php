<?php


function ProductsShow($productID)
{

    // $products = showOneForProduct($id);
    // if (empty($products)) {
    //     e404();
    // }

    // $fileNameShow = [
    //     'p_name' => 'Tên sản phẩm',
    //     'p_price' => 'Giá',
    //     'p_sale_price' => 'Giá sale',
    //     'p_description' => 'Mô tả',
    //     'p_pimage' => 'Hình ảnh',
    //     'p_img_thumbnail' => 'Biến thể',
    //     'p_quantity' => 'Số lượng',
    //     'p_key_word' => 'Từ khóa',
    //     'p_view' => 'Lượt xem',
    //     'p_id' => 'Mã sản phẩm ',
    //     'p_id_brand' => 'Mã nhãn hàng',
    //     'p_id_category' => 'Mã loại',
    //     'c_name' => 'Tên loại',
    //     'au_name' => 'Tên nhãn hàng',
    // ];

    $view = '/contents/product-details';
    $title = "chi tiết sản phẩm";

    require_once PATH_VIEW . '/master.php';
}


