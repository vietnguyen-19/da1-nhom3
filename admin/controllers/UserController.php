<?php


function UserListAll()
{
    $title = 'Danh sách user';
    $view = 'users/index';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';

    $sql = "SELECT * FROM users";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->execute();
    return $users = $stmt->fetchAll();
}

function UserShowOne($id)
{
    $title = 'Chi tiết user' . 'khu vực thêm tên';
    $view = 'users/show';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function UserCreate()
{
    $title = 'Tạo mới user';
    $view = 'users/create';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function UserUpdate($id)
{
    $title = 'Cập nhật thông tin user';
    $view = 'users/update';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function UserDelete($id)
{
    $title = 'Danh sách user';
}
