<?php

// file khai báo các hàm dùng gobal
if (!function_exists('require_file')) {
    function require_file($pathFolder)
    {
        if (is_dir($pathFolder) && ($files = scandir($pathFolder)) !== false) {
            $files = array_diff($files, ['.', '..']);
            foreach ($files as $file) {
                // Kiểm tra xem $file có phải là tệp không (không phải là thư mục)
                if (is_file($pathFolder . DIRECTORY_SEPARATOR . $file)) {
                    require_once $pathFolder . DIRECTORY_SEPARATOR  . $file;
                }
            }
        } else {
            echo "Không thể tìm thấy hoặc đọc thư mục: $pathFolder";
        }
    }
}

if (!function_exists('debug')) {
    function debug($data)
    {
        echo "<pre>";
        print_r($data);
        die;
    }
}