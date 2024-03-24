<?php

function userListAll()
{
    $title = 'Danh sách users';
    $views = 'users/index';

    $users = listAll('users');
    debug($users);
    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function userCreate()
{
    $title = 'Tạo mới users';
    $views = 'users/create';

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

    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}
