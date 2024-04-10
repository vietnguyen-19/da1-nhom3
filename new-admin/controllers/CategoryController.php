<?php

function categoryListAll()
{
    $title = 'Danh sách loại sản phẩm';
    $view = 'categories/index';
    $style = 'datatable';
    
    $categories = listAll('categories');

    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
}

function categoryShowOne($id)
{
    $category = showOne('categories', $id);

    if(empty($category)) {
        e404();
    }

    $title = 'Chi tiết sản phẩm: ' . $category['name'];
    $view = 'categories/show';

    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
}

function categoryCreate()
{
    $title = 'Thêm mới sản phẩm';
    $view = 'categories/create';

    if (!empty($_POST)) {
        
        $data = [
            "name" => $_POST['name'] ?? null,
        ];

        validateCategoryCreate($data);
        
        insert('categories', $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=categories');
        exit();
    }

    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
}

function validateCategoryCreate($data) {
    // name - bắt buộc, độ dài tối đa 50 ký tự, Không được trùng

    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } 
    else if(strlen($data['name']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    } 
    else if(! checkUniqueName('categories', $data['name'])) {
        $errors[] = 'Name đã được sử dụng';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=category-create');
        exit();
    }
}

function categoryUpdate($id)
{
    $category = showOne('categories', $id);

    if(empty($category)) {
        e404();
    }

    $title = 'Cập nhật sản phẩm: ' . $category['name'];
    $view = 'categories/update';

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? $category['name'],
        ];

        validateCategoryUpdate($id, $data);
         
        update('categories', $id, $data);

        $_SESSION['success'] = 'Thao tác thành công!';

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=category-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_NEW_ADMIN . 'master.php';
}

function validateCategoryUpdate($id, $data) {
    // name - bắt buộc, độ dài tối đa 50 ký tự, Không được trùng

    $errors = [];

    if (empty($data['name'])) {
        $errors[] = 'Trường name là bắt buộc';
    } 
    else if(strlen($data['name']) > 50) {
        $errors[] = 'Trường name độ dài tối đa 50 ký tự';
    }
    else if(! checkUniqueNameForUpdate('categories', $id, $data['name'])) {
        $errors[] = 'Name đã được sử dụng';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;

        header('Location: ' . BASE_URL_NEW_ADMIN . '?act=category-update&id=' . $id);
        exit();
    }
}

function categoryDelete($id)
{
    delete2('categories', $id);

    $_SESSION['success'] = 'Thao tác thành công!';
    
    header('Location: ' . BASE_URL_NEW_ADMIN . '?act=categories');
    exit();
}
