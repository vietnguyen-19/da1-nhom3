<?php


function UserListAll()
{
    $title = 'Danh sách User';
    $view = 'users/index';
    $script = 'datatable';
    $script2 = 'users/script';
    $style = 'datatable';
    
    $users = listAll('users');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
 
function UserShowOne($id)
{

    $user = showOne('users', $id);

    if(empty($user)) {
        e404();
    }

    $title = 'Chi tiết User: ' . $user['name'];
    $view = 'users/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function UserCreate()
{
    $title = 'Thêm mới User';
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

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_ADMIN . '?act=users');
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function validateUserCreate($data) {
    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } 
    else if(strlen($data['name']) > 50) {
        $errors[] = 'Trường name dài tối đa 50 ký tự';
    }

    if (empty($data['email'])) {
        $errors[] = 'Trường email là bắt buộc';
    } 
    else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Trường email không đúng định dạng';
    } 
    else if(! checkUniqueEmail('users', $data['email'])) {
        $errors[] = 'Email đã được sử dụng';
    }

    if (empty($data['password'])) {
        $errors[] = 'Trường password là bắt buộc';
    } 
    else if(strlen($data['password']) < 8 || strlen($data['password']) > 20) {
        $errors[] = 'Trường password đồ dài nhỏ nhất là 8, lớn nhất là 20';
    }


    if ($data['type'] === null) {
        $errors[] = 'Trường type là bắt buộc';
    } 
    else if(! in_array($data['type'], [0, 1])) {
        $errors[] = 'Trường type phải là 0 or 1';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL_ADMIN . '?act=user-create');
        exit();
    }
}

function UserUpdate($id)
{
    $user = showOne('users', $id);

    if(empty($user)) {
        e404();
    }

    $title = 'Cập nhật thông tin user';
    $view = 'users/update';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php' . $user['name'];
}

function UserDelete($id)
{
    $title = 'Danh sách user';
}
