<?php

// file khai báo các biến môi trường, dùng gobal 

define('PATH_CONTROLLER',__DIR__ . '/../controllers/');
define('PATH_MODEL',__DIR__ . '/../modes/');
define('PATH_VIEW',__DIR__ . '/../views');

define('PATH_CONTROLLER_ADMIN',__DIR__ . '/../admin/controllers/');
define('PATH_MODEL_ADMIN',__DIR__ . '/../admin/models/');
define('PATH_VIEW_ADMIN',__DIR__ . '/../admin/views/');

define('BASE_URL',          'http://localhost/fix_da1/');
define('BASE_URL_ADMIN',          'http://localhost/fix_da1/admin/');



// thông tin kết nối database
define('DB_HOST','localhost');
define('DB_PORT','3306');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','da1_web');