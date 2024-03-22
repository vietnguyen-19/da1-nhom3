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
    $title = 'Tạo mới user';
    $view = 'users/create';

    
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
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
