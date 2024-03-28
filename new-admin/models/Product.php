<?php

if (!function_exists('listAllProduct')) {
    function listAllProduct()
    {
        try {
            $sql = "
            SELECT 
            p.id            as p_id,
            p.id_brand      as p_id_brand,
            p.id_category   as p_id_category,
            p.name          as p_name,
            p.price         as p_price,
            p.sale_price    as p_sale_price,
            p.description   as p_description,
            p.images         as p_pimage,
            p.img_thumbnail as p_img_thumbnail,
            p.quantity      as p_quantity,
            p.key_word      as p_key_word,
            p.view          as p_view,
            c.name          as c_name,
            au.name         as au_name
        FROM products as p
        INNER JOIN categories as c ON c.id = p.id_category
        INNER JOIN brands as au ON au.id = p.id_brand
        ORDER BY p.id DESC;
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showOneForProduct')) {
    function showOneForProduct($id)
    {
        try {
            $sql = "
            SELECT 
            p.id            as p_id,
            p.id_brand      as p_id_brand,
            p.id_category   as p_id_category,
            p.name          as p_name,
            p.price         as p_price,
            p.sale_price    as p_sale_price,
            p.description   as p_description,
            p.images         as p_pimage,
            p.img_thumbnail as p_img_thumbnail,
            p.quantity      as p_quantity,
            p.key_word      as p_key_word,
            p.view          as p_view,
            c.name          as c_name,
            au.name         as au_name
        FROM products as p
        INNER JOIN categories as c ON c.id = p.id_category
        INNER JOIN brands as au ON au.id = p.id_brand
                WHERE 
                    p.id = :id 
                LIMIT 1
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getTagsForPost')) {
    function getTagsForPost($postID)
    {
        try {
            $sql = "
                SELECT 
                    t.id    t_id,
                    t.name  t_name
                FROM tags as t
                INNER JOIN post_tag as pt   ON t.id     = pt.tag_id
                WHERE pt.post_id = :post_id;
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':post_id', $postID);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('deleteTagsByPostID')) {
    function deleteTagsByPostID($postID)
    {
        try {
            $sql = "DELETE FROM post_tag WHERE post_id = :post_id;";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':post_id', $postID);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
