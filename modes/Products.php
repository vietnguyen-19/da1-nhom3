<?php

function getAllProducts()
{
    try {
        $sql = "SELECT * FROM products";

        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (\Exception $e) {
        debug($e);
    }
}