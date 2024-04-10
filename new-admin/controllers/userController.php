<?php
function UserListAll()
{

    $users = listAll('users');

    $title = 'Danh sách tài khoản';
    $view = 'users/index';

    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function UserShowOne($id)
{

    $user = showOne('users', $id);

    if (empty($user)) {
        e404();
    }

    $title = 'Chi tiết User: ' . $user['name'];
    $view = 'users/show';

    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function UserCreate()
{
    $title = 'Thêm mới tài khoản';
    $view = 'users/create';

    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name'] ?? null,
            "email" => $_POST['email'] ?? null,
            "address" => $_POST['address'] ?? null,
            "phone" => $_POST['phone'] ?? null,
            "password" => $_POST['password'] ?? null,
            "type" => $_POST['type'] ?? null,
        ];
        validateUserCreate($data);

        insert('users', $data);

        $_SESSION['success'] = 'Thêm tài khoản thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=users');
        exit();
    }

    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
}
function validateUserCreate($data)
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
    } else if (!checkUniqueEmail('users', $data['email'])) {
        $errors[] = 'Email đã được sử dụng';
    }
    if (empty($data['password'])) {
        $errors[] = 'Trường password là bắt buộc';
    } else if (strlen($data['password']) < 6 || strlen($data['password']) > 20) {
        $errors[] = 'Trường password đồ dài nhỏ nhất là 6, lớn nhất là 20';
    }


    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=users-create');
        exit();
    }
}

function UserUpdate($id)
{
    $user = showOne('users', $id);

    $title = 'Cập nhật thông tin tài khoản';
    $view = 'users/update';
    $name = 'cập nhật tài khoản: ' . $user['name'];
   

    if (empty($user)) {
        e404();
    }
    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name'] ??  $user['name'],
            "email" => $_POST['email'] ??  $user['email'],
            "address" => $_POST['address'] ??  $user['address'],
            "phone" => $_POST['phone'] ??  $user['phone'],
            "password" => $_POST['password'] ??  $user['password'],
            "type" => $_POST['type'] ??  $user['type'],
        ];

        validateUserUpdate($id,$data);

        update('users', $id, $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=users-update&id=' . $id);
        exit();
    }
    
    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
}

function validateUserUpdate($id, $data)
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
    } else if (!checkUniqueEmailForUpdate('users', $id, $data['email'])) {
        $errors[] = 'Email đã được sử dụng';
    }
    if (empty($data['password'])) {
        $errors[] = 'Trường password là bắt buộc';
    } else if (strlen($data['password']) < 6 || strlen($data['password']) > 20) {
        $errors[] = 'Trường password đồ dài nhỏ nhất là 6, lớn nhất là 20';
    }


    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        
        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=users-update&id=' . $id);
        exit();
    }
}
function UserDelete($id)
{
    delete2('users', $id);
    header('Location: ' . BASE_URL_NEW_ADMIN . '?act=users');
    $_SESSION['success'] = 'Xóa thành công!';

    exit();
}
