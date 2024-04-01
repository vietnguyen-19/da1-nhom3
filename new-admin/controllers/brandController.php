<?php

function brandsListAll()
{
    $title = 'Danh sách brands';
    $view = 'brands/index';
    $script = 'datatable';
    $script2 = 'brands/script';
    $style = 'datatable';
    
    $brands = listAll('brands');

    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
}

function brandsShowOne($id)
{
    $brands = showOne('brands', $id);

    if(empty($brands)) {
        e404();
    }

    $fileNameShow=[
        'id' => 'mã nhãn hàng',
        'name' => 'tên nhãn hàng',
        'image' => 'hình ảnh',
    ];

    $title = 'Chi tiết brands: ' . $brands['name'];
    $view = 'brands/show';

    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
}

function brandsCreate()
{
    $title = 'Thêm mới brands';
    $view = 'brands/create';

    if (!empty($_POST)) {
        
        $data = [
            'name' => $_POST['name'] ?? null,
            'image'          => get_file_upload('image'),
        ];

        $image = $data['image'];
        if (is_array($image)) {
            $data['image'] = upload_file($image, 'uploads/image/');
        }

        validateBrandCreate($data);
        
        insert('brands', $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=brands');
        exit();
    }

    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
}

function validateBrandCreate($data){
    $errors = [];
    
    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    }
    if (empty($data['image'])) {
        $errors[] = 'không được để trống hình ảnh';
    }
    
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=brands-create');
        exit();
    }
}

function brandsUpdate($id)
{
    $brands = showOne('brands', $id);

    if(empty($brands)) {
        e404();
    }

    $title = 'Cập nhật brands: ' . $brands['name'];
    $view = 'brands/update';

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? $brands['name'],
            'image'        => get_file_upload('image',          $brands['image']),
        ];

        validateBrandUpdate($id,$data);
         
        update('brands', $id, $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=brands-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
}

function validateBrandUpdate($id,$data){
    $errors = [];
    
    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    }
    if (empty($data['image'])) {
        $errors[] = 'không được để trống hình ảnh';
    }
    
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=brands-update&id='. $id);
        exit();
    }
}

function brandsDelete($id)
{
    delete2('brands', $id);

    $_SESSION['success'] = 'Thao tác thành công!';
    
    header('Location: ' . BASE_URL_NEW_ADMIN . '?act=brands');
    exit();
}
