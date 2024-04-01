<?php

function homeCilent(){
     $products = listAllProduct();
     $brands = listAll('brands');
     $users = listAll('users');
    require_once PATH_VIEW .'master.php';

}
function dataProducts(){
   
    require_once PATH_VIEW .'master.php';

}

