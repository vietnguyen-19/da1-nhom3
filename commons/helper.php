<?php 

// Khai báo các hàm dùng Global
if (!function_exists('require_file')) {
    function require_file($pathFolder) {
        $files = array_diff(scandir($pathFolder), ['.', '..']);

        foreach($files as $file) {
            require_once $pathFolder . $file;
        }
    }
}

if (!function_exists('debug')) {
    function debug($data) {
        echo "<pre>";

        print_r($data);

        die;
    }
}

if (!function_exists('e404')) {
    function e404() {
        echo "404 - Not found";
        die;
    }
}


if (!function_exists('upload_file')) {
    function upload_file($file, $pathFolderUpload) {
        $imagePath = $pathFolderUpload . time() . '-' . basename($file['name']);
            
        if (move_uploaded_file($file['tmp_name'], PATH_UPLOAD . $imagePath)) {
            return $imagePath;
        }

        return null;
    }
}


if (!function_exists('get_file_upload')) {
    function get_file_upload($field, $default = null) {

        if (isset($_FILES[$field]) && $_FILES[$field]['size'] > 0) {

            return $_FILES[$field];
        }

        return $default ?? null;
    }
}

if (!function_exists('middleware_auth_check')) {
    function middleware_auth_check($act) {
        if ($act == 'login-admin') {
            if (!empty($_SESSION['admin'])) {
                header('Location: ' . BASE_URL_NEW_ADMIN);
                exit();
            }
        } 
        elseif (empty($_SESSION['admin'])) {
            header('Location: ' . BASE_URL_NEW_ADMIN . '?act=login-admin');
            exit();
        }
    }
}
if (!function_exists('middleware_auth_check_WW')) {
    function middleware_auth_check_WW($act, $arrRouteNeedAuth) {
        if ($act == 'login') {
            if (!empty($_SESSION['cilent'])) {
                header('Location: ' . BASE_URL);
                exit();
            }
        } 
        elseif (empty($_SESSION['cilent']) && in_array($act, $arrRouteNeedAuth)) {
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }
}


if (!function_exists('caculator_total_order')) {
    function caculator_total_order() {
        if (isset($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $item){
                $price = $item['p_sale_price'] ?: $item['p_price'];
                
                $total = $price * $item['quantity'];
            }
            return number_format($total);
        } 
        return 0;
    }
}
