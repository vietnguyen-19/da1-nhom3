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
    if(!empty($_SESSION['cilent'])){
        session_destroy();
    }
    header('Location: ' . BASE_URL);
    exit();
}
