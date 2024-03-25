<?php
function ProductListAll()
{

    $products = listAll('products');

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
            "name" => $_POST['name'] ?? null,
            "email" => $_POST['email'] ?? null,
            "address" => $_POST['address'] ?? null,
            "phone" => $_POST['phone'] ?? null,
            "password" => $_POST['password'] ?? null,
            "type" => $_POST['type'] ?? null,
        ];

        validateProductsCreate($data);

        insert('products', $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=products');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'master.php';
}
function validateProductsCreate($data)
{
    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } else if (strlen($data['name']) > 50) {
        $errors[] = 'Trường name dài tối đa 50 ký tự';
    }

    if (empty($data['email'])) {
        $errors[] = 'Trường email là bắt buộc';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Trường email không đúng định dạng';
    } else if (!checkUniqueEmail('products', $data['email'])) {
        $errors[] = 'Email đã được sử dụng';
    }

    if (empty($data['password'])) {
        $errors[] = 'Trường password là bắt buộc';
    } else if (strlen($data['password']) < 8 || strlen($data['password']) > 20) {
        $errors[] = 'Trường password đồ dài nhỏ nhất là 8, lớn nhất là 20';
    }


    if ($data['type'] === null) {
        $errors[] = 'Trường type là bắt buộc';
    } else if (!in_array($data['type'], [0, 1])) {
        $errors[] = 'Trường type phải là 0 or 1';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=user-create');
        exit();
    }
}

function ProductsUpdate($id)
{
    $user = showOne('products', $id);

    if (empty($user)) {
        e404();
    }
    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name'] ?? null,
            "email" => $_POST['email'] ?? null,
            "address" => $_POST['address'] ?? null,
            "phone" => $_POST['phone'] ?? null,
            "password" => $_POST['password'] ?? null,
            "type" => $_POST['type'] ?? null,
        ];

        validateProductsCreate($data);

        update('products', $id, $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=products-update');
        exit();
    }
    $title = 'Cập nhật thông tin user';
    $views = 'products/update';
    require_once PATH_VIEW_NEW_ADMIN . 'master.php' . $user['name'];
}

function UserDelete($id)
{
    delete2('products', $id);
    header('Location: ' . BASE_URL_NEW_ADMIN . '?act=products');
    exit();
}
