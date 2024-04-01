<?php
function ProductListAll()
{

    $products = listAllProduct();

    $title = 'Danh sách sản phẩm';
    $view = 'products/index';

    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function ProductsShowOne($id)
{

    $products = showOneForProduct($id);
    if (empty($products)) {
        e404();
    }

    $fileNameShow = [
        'p_name' => 'Tên sản phẩm',
        'p_price' => 'Giá',
        'p_sale_price' => 'Giá sale',
        'p_description' => 'Mô tả',
        'p_pimage' => 'Hình ảnh',
        'p_img_thumbnail' => 'Biến thể',
        'p_quantity' => 'Số lượng',
        'p_key_word' => 'Từ khóa',
        'p_view' => 'Lượt xem',
        'p_id' => 'Mã sản phẩm ',
        'p_id_brand' => 'Mã nhãn hàng',
        'p_id_category' => 'Mã loại',
        'c_name' => 'Tên loại',
        'au_name' => 'Tên nhãn hàng',
    ];

    $view = 'products/show';

    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function ProductsCreate()
{
    $title      = 'Thêm mới sản phẩm';
    $view       = 'products/create';


    $categories     = listAll('categories');
    $products        = listAll('products');
    $brands           = listAll('brands');

    if (!empty($_POST)) {
        $data = [
            'id_brand'       => $_POST['id_brand']       ?? null,
            'id_category'    => $_POST['id_category']    ?? null,
            'name'           => $_POST['name']           ?? null,
            'price'          => $_POST['price']          ?? null,
            'sale_price'     => $_POST['sale_price']     ?? null,
            'description'    => $_POST['description']    ?? null,
            'images'          => get_file_upload('images'),
            'img_thumbnail'  => get_file_upload('img_thumbnail'),
            'quantity'       => $_POST['quantity']    ?? 0,
            'key_word'       => $_POST['key_word	']    ?? 'no',
            'view'           => $_POST['view']    ?? 0,
        ];

        $image = $data['images'];
        if (is_array($image)) {
            $data['images'] = upload_file($image, 'uploads/image/');
        }

        $img_thumbnail = $data['img_thumbnail'];
        if (is_array($img_thumbnail)) {
            $data['img_thumbnail'] = upload_file($img_thumbnail, 'uploads/image/');
        }

        validateProductsCreate($data);
        try {
            $GLOBALS['conn']->beginTransaction();

            insert_get_last_id('products', $data);

            $GLOBALS['conn']->commit();
        } catch (Exception $e) {
            $GLOBALS['conn']->rollBack();

            if (
                is_array($image)
                && !empty($data['images'])
                && file_exists(PATH_UPLOAD . $data['images'])
            ) {
                unlink(PATH_UPLOAD . $data['images']);
            }

            if (
                is_array($img_thumbnail)
                && !empty($data['img_thumbnail'])
                && file_exists(PATH_UPLOAD . $data['img_thumbnail'])
            ) {
                unlink(PATH_UPLOAD . $data['img_thumbnail']);
            }

            debug($e);
        }

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=product');
        exit();
    }

    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
}
function validateProductsCreate($data)
{
    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } 
    if ($data['id_brand'] == 0) {
        $errors[] = 'Bạn chưa chọn nhãn hàng';
    } 
    if ($data['id_category'] == 0) {
        $errors[] = 'Bạn chưa chọn loại sản phẩm';
    } 
    if (empty($data['price'])) {
        $errors[] = 'Giá sản phẩm là bắt buộc';
    } 
    if (empty($data['images'])) {
        $errors[] = 'không được để trống hình ảnh';
    }
    
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=product-create');
        exit();
    }
}
function ProductUpdate($id)
{
    $products = showOneForProduct($id);

    if (empty($products)) {

        e404();
    }

    $title      = 'Cập nhật sản phẩm: ' . $products['p_name'];
    $view       = 'products/update';

    $categories     = listAll('categories');
    $users        = listAll('users');
    $brands           = listAll('brands');



    if (!empty($_POST)) {
        $data = [
            'id_brand'        => $_POST['id_brand']          ?? $products['p_id_brand'],
            'id_category'     => $_POST['id_category']  ?? $products['p_id_category'],
            'name'            => $_POST['name']           ?? $products['p_name'],
            'price'           => $_POST['price']          ?? $products['p_price'],
            'sale_price'      => $_POST['sale_price']     ?? $products['p_sale_price'],
            'description'     => $_POST['description']    ?? $products['p_description'],
            'quantity'        => $_POST['quantity']          ?? $products['p_quantity'],
            'key_word'        => $_POST['key_word']          ?? $products['p_key_word'],
            'view'            => $_POST['view']           ?? $products['p_view'],

            'images'        => get_file_upload('images',          $products['p_pimage']),
            'img_thumbnail' => get_file_upload('img_thumbnail',   $products['p_img_thumbnail'])
        ];

        validateProductUpdate($id, $data);

        $images = $data['images'];
        if (is_array($images)) {
            $data['images'] = upload_file($images, 'uploads/image/');
        }

        $img_thumbnail = $data['img_thumbnail'];
        if (is_array($img_thumbnail)) {
            $data['img_thumbnail'] = upload_file($img_thumbnail, 'uploads/image/');
        }

        try {
            $GLOBALS['conn']->beginTransaction();

            update('products', $id, $data);



            $GLOBALS['conn']->commit();
        } catch (Exception $e) {
            $GLOBALS['conn']->rollBack();

            if (
                is_array($images)
                && !empty($data['images'])
                && file_exists(PATH_UPLOAD . $data['images'])
            ) {
                unlink(PATH_UPLOAD . $data['images']);
            }

            if (
                is_array($img_thumbnail)
                && !empty($data['img_thumbnail'])
                && file_exists(PATH_UPLOAD . $data['img_thumbnail'])
            ) {
                unlink(PATH_UPLOAD . $data['img_thumbnail']);
            }

            debug($e);
        }

        if (
            !empty($images)
            && !empty($products['images'])
            && !empty($data['images'])
            && file_exists(PATH_UPLOAD . $products['images'])
        ) {
            unlink(PATH_UPLOAD . $products['images']);
        }

        if (
            !empty($imgCover)
            && !empty($products['img_thumbnail'])
            && !empty($data['img_thumbnail'])
            && file_exists(PATH_UPLOAD . $products['img_thumbnail'])
        ) {
            unlink(PATH_UPLOAD . $products['img_thumbnail']);
        }

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=product-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
}

function validateProductUpdate($id, $data){
    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } 
    if ($data['id_brand'] == 0) {
        $errors[] = 'Bạn chưa chọn nhãn hàng';
    } 
    if ($data['id_category'] == 0) {
        $errors[] = 'Bạn chưa chọn loại sản phẩm';
    } 
    if (empty($data['price'])) {
        $errors[] = 'Giá sản phẩm là bắt buộc';
    } 
    
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=product-update&id=' . $id);
        exit();
    }
}

function productDelete($id)
{
    $product = showOneForProduct($id);

    if (empty($product)) {
        e404();
    }

    try {
        $GLOBALS['conn']->beginTransaction();



        delete2('products', $id);

        $GLOBALS['conn']->commit();
    } catch (Exception $e) {
        $GLOBALS['conn']->rollBack();

        debug($e);
    }

    if (
        !empty($product['img_thumnail'])
        && file_exists(PATH_UPLOAD . $product['img_thumnail'])
    ) {
        unlink(PATH_UPLOAD . $product['img_thumnail']);
    }

    if (
        !empty($product['img_cover'])
        && file_exists(PATH_UPLOAD . $product['img_cover'])
    ) {
        unlink(PATH_UPLOAD . $product['img_cover']);
    }

    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_NEW_ADMIN . '?act=product');
    exit();
}
