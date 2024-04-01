<?php

function homeCilent(){
    $products = getAllProducts();
    require_once PATH_VIEW .'/master.php';
}
function dataProducts(){
    $products = getAllProducts();
    
    require_once PATH_VIEW .'master.php';
}

