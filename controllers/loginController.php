<?php

function loginCilent()
{
    $title = 'Đăng nhập';
    $view = '/login/login';

    if (!empty($_POST)) {
        cilentLogin();
        $cilentName = $_SESSION['cilent_name'];
    }

    require_once PATH_VIEW . '/master.php';
}
function registerCilent()
{
    $title = 'Thêm mới User';
    $view = '/login/register';

    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name'] ?? null,
            "email" => $_POST['email'] ?? null,
            "address" => $_POST['address'] ?? null,
            "phone" => $_POST['phone'] ?? null,
            "password" => $_POST['password'] ?? null,
        ];
        validateUserCreate($data);

        insert('users', $data);

        $_SESSION['success'] = 'Thêm tài khoản thành công!';

        header('Location: ' . BASE_URL );
        exit();
    }
    require_once PATH_VIEW . '/master.php';
}


function cilentLogin()
{
    $cilent = getCilentByEmailAndPassword($_POST['email'], $_POST['password']);

    if (empty($cilent)) {
        $_SESSION['errors'] = 'Email hoặc password chưa đúng';

        header('Location:' . BASE_URL . '?act=login');
        exit();
    }

    $_SESSION['cilent'] = $cilent;

    $_SESSION['cilent_name'] = $cilent['name'];

    header('Location:' . BASE_URL);
    exit();
}

function LogoutCilent()
{
    if (!empty($_SESSION['cilent'])) {
        session_destroy();
    }
    header('Location: ' . BASE_URL);
    exit();
}
function validateUserCreate($data)
{
    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Tên người dùng là bắt buộc';
    } else if (strlen($data['name']) > 50) {
        $errors[] = 'Tên người dùng dài tối đa 50 ký tự';
    }
    if (empty($data['email'])) {
        $errors[] = ' email là bắt buộc';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = ' email không đúng định dạng';
    } else if (!checkUniqueEmail('users', $data['email'])) {
        $errors[] = 'Email đã được sử dụng';
    }
    if (empty($data['password'])) {
        $errors[] = ' password là bắt buộc';
    } else if (strlen($data['password']) < 6 || strlen($data['password']) > 20) {
        $errors[] = ' password đồ dài nhỏ nhất là 6, lớn nhất là 20';
    }


    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL . '?act=register');
        exit();
    }
}
