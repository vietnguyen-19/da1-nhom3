<?php

function settingShowForm()
{
    $title = 'Danh sách Setting';
    $views = 'settings/form';

    $settings = settingPluckKeyValue();

    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function settingSave()
{
    $settings = settingPluckKeyValue();

    foreach ($_POST as $keys => $value) {
        if (isset($settings[$keys])) {

            if ($value != $settings[$keys]) {
                settingUpdateByKey($keys, ['values' =>  $value]);
            }
        } else {
            insert('settings', ['keys' => $keys, 'values' => $value]);
        }
    }
    
    header('Location: ' . BASE_URL_NEW_ADMIN . '?act=setting-form');
    $_SESSION['success'] = 'Thao tác thành công!';

    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function settingPluckKeyValue()
{
    $data = listAll('settings');

    $settings = [];
    foreach ($data as $item) {
        $settings[$item['keys']] = $item['values'];
    }

    return $settings;
}
