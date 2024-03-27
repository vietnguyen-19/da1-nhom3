<?php
function ProductListAll()
{

    $products = listAllProduct();

    $title = 'Danh sách Products';
    $views = 'products/index';

    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function ProductsShowOne($id)
{

    $user = showOne('products', $id);

    if (empty($user)) {
        e404();
    }

    $title = 'Chi tiết Products: ' . $user['name'];
    $views = 'products/show';

    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function ProductsCreate()
{
    $title = 'Thêm mới Products';
    $views = 'products/create';

    if (!empty($_POST)) {

        $data = [
            'name'   => $_POST['category_id']    ?? null,
            'price'     => $_POST['author_id']      ?? null,
            'sale_price'         => $_POST['title']          ?? null,
            'description'       => $_POST['excerpt']        ?? null,
            'image'       => $_POST['content']        ?? null,
            'img_thumnail'  => get_file_upload('img_thumnail'),
            
        ];
        $image = $data['image'];
        if (is_array($image)) {
            $data['image'] = upload_file($image, 'uploads/image/');
        }

        $img_thumbnail = $data['img_thumbnail'];
        if (is_array($img_thumbnail)) {
            $data['img_thumbnail'] = upload_file($img_thumbnail, 'uploads/image/');
        }

        try {
            $GLOBALS['conn']->beginTransaction();

            $postID = insert_get_last_id('products', $data);
    
            $GLOBALS['conn']->commit();
        } catch (Exception $e) {
            $GLOBALS['conn']->rollBack();

            if (is_array($image) 
                && !empty($data['image'])
                && file_exists(PATH_UPLOAD . $data['image'])) {
                unlink(PATH_UPLOAD . $data['image']);
            }

            if (is_array($img_thumbnail) 
                && !empty($data['img_thumbnail'])
                && file_exists(PATH_UPLOAD . $data['img_thumbnail'])) {
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
function ProductsUpdate($id)
{
    $user = showOne('products', $id);

    if (empty($user)) {
        e404();
    }
    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name'] ?? null,
            "price" => $_POST['price'] ?? null,
            "sale-price" => $_POST['sale-price'] ?? null,
            "description" => $_POST['description'] ?? null,
            "image" => $_POST['image'] ?? null,
            "image-thumbnail" => $_POST['image-thumbnail'] ?? null,
            "quantity" => $_POST['quantity'] ?? null,
            "key-word" => $_POST['key-word'] ?? null,
 
        ];

        // validateProductsCreate($data);

        update('products', $id, $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=products-update');
        exit();
    }
    $title = 'Cập nhật thông tin user';
    $views = 'products/update';
    require_once PATH_VIEW_NEW_ADMIN . 'master.php' . $user['name'];
}
function ProductDelete($id)
{
    $user = showOne('products', $id);

    if (empty($user)) {
        e404();
    }
    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name'] ?? null,
            "price" => $_POST['price'] ?? null,
            "sale-price" => $_POST['sale-price'] ?? null,
            "description" => $_POST['description'] ?? null,
            "image" => $_POST['image'] ?? null,
            "image-thumbnail" => $_POST['image-thumbnail'] ?? null,
            "quantity" => $_POST['quantity'] ?? null,
            "key-word" => $_POST['key-word'] ?? null,
 
        ];

        // validateProductsCreate($data);

        update('products', $id, $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=products-update');
        exit();
    }
    $title = 'Cập nhật thông tin user';
    $views = 'products/update';
    require_once PATH_VIEW_NEW_ADMIN . 'master.php' . $user['name'];
}


