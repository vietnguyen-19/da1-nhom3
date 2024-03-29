<?php
function OderListAll()
{

    $oders = listAll('oders');

    $title = 'Danh sách Oder';
    $views = 'oders/index';

    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function OderShowOne($id)
{

    $oder = showOne('oders', $id);

    if (empty($oder)) {
        e404();
    }

    $title = 'Chi tiết Oder: ';
    $views = 'oders/show';

    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}


function OderUpdate($id)
{
    $oder = showOne('oders', $id);

    $title = 'Cập nhật thông tin oder';
    $views = 'oders/update';
    $name = 'cập nhật đơn hàng ' ;
   

    if (empty($oder)) {
        e404();
    }
    if (!empty($_POST)) {

        $data = [
            "first_name" => $_POST['first_name'] ?? null,
            "last_name" => $_POST['last_name'] ?? null,
            "address" => $_POST['address'] ?? null,
            "email" => $_POST['email'] ?? null,
            "phone" => $_POST['phone'] ?? null,
            "note" => $_POST['note'] ?? null,
            "paymethod" => $_POST['paymethod'] ?? null,
            "total_price" => $_POST['total_price'] ?? null,
        ];

        validateOderUpdate($id,$data);

        update('oders', $id, $data);

        $_SESSION['success'] = 'Update thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=oders-update&id=' . $id);
        exit();
    }
    
    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
}

function validateOderUpdate($id, $data)
{
    $errors = [];

    if (empty($data['first_name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } else if (strlen($data['first_name']) > 50) {
        $errors[] = 'Trường name dài tối đa 50 ký tự';
    }
    if (empty($data['last_name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } else if (strlen($data['last_name']) > 50) {
        $errors[] = 'Trường name dài tối đa 50 ký tự';
    }
    if (empty($data['email'])) {
        $errors[] = 'Trường email là bắt buộc';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Trường email không đúng định dạng';
    } else if (!checkUniqueEmailForUpdate('oders', $id, $data['email'])) {
        $errors[] = 'Email đã được sử dụng';
    }
   
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        
        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=oders-update&id=' . $id);
        exit();
    }
}
function OderDelete($id)
{
    delete2('oders', $id);
    header('Location: ' . BASE_URL_NEW_ADMIN . '?act=oders');
    $_SESSION['success'] = 'Hủy thành công!';

    exit();
}