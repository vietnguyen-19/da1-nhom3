<?php


function contactShow(){
    $title = 'Liên hệ';
    $view = '/contacts/show';
    
    $settings = settingPluckKeyValue();
    
    require_once PATH_VIEW . '/master.php';

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