<?php
function LoginAdmin()
{
    $title = 'Đăng nhập ';

    if (!empty($_POST)) {
        adminLogin();
        $adminName = $_SESSION['admin_name'];
        $adminEmail = $_SESSION['admin_email'];
    }

    require_once PATH_VIEW_NEW_ADMIN . 'login/login.php';
}

function adminLogin()
{
    $admin = getAdminByEmailAndPassword($_POST['email'], $_POST['password']);

    if (empty($admin)) {

        $_SESSION['error'] = 'Email hoặc password chưa đúng!';

        header('Location: ' .  BASE_URL_NEW_ADMIN . '?act=login-admin');
        exit();
    }

    $_SESSION['admin'] = $admin;
   
    $_SESSION['admin_name'] = $admin['name'];
    $_SESSION['admin_email'] = $admin['email'];

    header('Location: ' . BASE_URL_NEW_ADMIN . '?act=/');
    exit();
}


function LogoutAdmin()
{
    if(!empty($_SESSION['admin'])){
        session_destroy();
    }
    header('Location: ' . BASE_URL . '?act=/');
    exit();
}
