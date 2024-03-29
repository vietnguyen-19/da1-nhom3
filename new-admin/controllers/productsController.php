<?php
function ProductListAll()
{

    $products = listAllProduct();

    $title = 'Danh sách Products';
    $view = 'products/index';

    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function ProductsShowOne($id)
{

    $products = showOneForProduct($id);

    if (empty($products)) {
        e404();
    }


    $view = 'products/show';

    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function ProductsCreate()
{
    $title      = 'Thêm mới Product';
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

        try {
            $GLOBALS['conn']->beginTransaction();

            insert_get_last_id('products', $data);
            // if (!empty($_POST['brands'])) {
            //     foreach ($_POST['brands'] as $tagID) {
            //         insert('pro_brands', [
            //             'pro_id' => $productsID,
            //             'brands' => $tagID,
            //         ]);
            //     }
            // }

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
// function validateProductsCreate($data)
// {
//     $errors = [];

//     if (empty($data['name'])) {
//         $errors[] = 'Trường name là bắt buộc';
//     } else if (strlen($data['name']) > 50) {
//         $errors[] = 'Trường name dài tối đa 50 ký tự';
//     }

//     if (empty($data['email'])) {
//         $errors[] = 'Trường email là bắt buộc';
//     } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
//         $errors[] = 'Trường email không đúng định dạng';
//     } else if (!checkUniqueEmail('products', $data['email'])) {
//         $errors[] = 'Email đã được sử dụng';
//     }

//     if (empty($data['password'])) {
//         $errors[] = 'Trường password là bắt buộc';
//     } else if (strlen($data['password']) < 8 || strlen($data['password']) > 20) {
//         $errors[] = 'Trường password đồ dài nhỏ nhất là 8, lớn nhất là 20';
//     }


//     if ($data['type'] === null) {
//         $errors[] = 'Trường type là bắt buộc';
//     } else if (!in_array($data['type'], [0, 1])) {
//         $errors[] = 'Trường type phải là 0 or 1';
//     }

//     if (!empty($errors)) {
//         $_SESSION['errors'] = $errors;
//         $_SESSION['data'] = $data;

//         header('Location: ' . BASE_URL_NEW_ADMIN . '?act=product-create');
//         exit();

// }
// }
function ProductUpdate($id)
{
    $products = showOneForProduct($id);

    if (empty($products)) {

        e404();
    }

    $title      = 'Cập nhật product: ' . $products['p_name'];
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
            'update_day'      => date('Y-m-d H:i:s'),
            'images'        => get_file_upload('images',          $products['p_images']),
            'img_thumbnail' => get_file_upload('img_thumbnail',   $products['p_img_thumbnail'])
        ];

        // validatePostUpdate($id, $data);

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

            update('product', $id, $data);



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

        header('Location: ' . BASE_URL_ADMIN . '?act=product-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_NEW_ADMIN . 'master.php';

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
