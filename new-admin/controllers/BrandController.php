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
            "name" => $_POST['name'] ?? null,
        ];

        validateCategoryCreate($data);
        
        insert('brands', $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=brands');
        exit();
    }

    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
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
        ];

        validateCategoryUpdate($id, $data);
         
        update('brands', $id, $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=brands-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
}



function brandsDelete($id)
{
    delete2('brands', $id);

    $_SESSION['success'] = 'Thao tác thành công!';
    
    header('Location: ' . BASE_URL_NEW_ADMIN . '?act=brands');
    exit();
}
