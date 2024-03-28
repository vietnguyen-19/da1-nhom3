<?php
function BrandListAll()
{

    $brands = listAll('brands');

    $title = 'Danh sách nhãn hàng';
    $views = 'brands/index';

    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function BrandShowOne($id)
{

    $brand = showOne('brands', $id);

    if (empty($brand)) {
        e404();
    }

    $title = 'Chi tiết nhãn hàng:' . $brand['name'];
    $views = 'brands/show';

    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function BrandCreate()
{
    $title = 'Thêm mới nhãn hàng';
    $views = 'brands/create';

    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name'] ?? null,
          
        ];
        validateBrandCreate($data);

        insert('brands', $data);

        $_SESSION['success'] = 'Thêm nhãn hàng thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=brands');
        exit();
    }

    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
}
function validateBrandCreate($data)
{
    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } else if (strlen($data['name']) > 50) {
        $errors[] = 'Trường name dài tối đa 50 ký tự';
    }

   


    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=brands-create');
        exit();
    }
}

function BrandUpdate($id)
{
    $brand = showOne('brands', $id);

    $title = 'Cập nhật thông tin nhãn hàng';
    $views = 'brands/update';
    $name = 'cập nhật nhãn hàng: ' . $brand['name'];
   

    if (empty($brand)) {
        e404();
    }
    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name'] ?? null,
          
        ];

        validateBrandUpdate($id,$data);

        update('brands', $id, $data);

        $_SESSION['success'] = 'Update thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=brands-update&id=' . $id);
        exit();
    }
    
    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
}

function validateBrandUpdate($id, $data)
{
    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } else if (strlen($data['name']) > 50) {
        $errors[] = 'Trường name dài tối đa 50 ký tự';
    }

  


    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        
        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=brands-update&id=' . $id);
        exit();
    }
}
function BrandDelete($id)
{
    delete2('brands', $id);
    header('Location: ' . BASE_URL_NEW_ADMIN . '?act=brands');
    $_SESSION['success'] = 'Xóa thành công!';

    exit();
}


