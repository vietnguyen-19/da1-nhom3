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


        insert('users', $data);

        $_SESSION['success'] = 'Thêm tài khoản thành công!';

        header('Location: ' . BASE_URL);
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
