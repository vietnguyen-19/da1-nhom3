<?php

if (!function_exists('listAllOrderByUserID')) {
    function listAllOrderByUserID($userID)
    {
        try {
            $sql = "
            SELECT o.id           as o_id ,
                o.user_name       as o_user_name,
                o.user_address    as o_user_address ,
                o.user_email      as o_user_email ,
                o.user_phone      as o_user_phone ,
                o.note            as o_note ,
                CASE o.status_payment
                WHEN 0 THEN 'chưa thanh toán'
                WHEN 1 THEN 'đã thanh toán'
                WHEN -1 THEN 'đơn hàng đã hủy'
                END as o_status_payment ,
                o.create_at       as o_create_at,
                o.total_price     as o_total_price ,
                o.create_at       as o_create_at ,
                o.update_at       as o_update_at,
                s.status          as s_status
                
            FROM orders as o
            INNER JOIN order_status as s ON o.id_status = s.id
            WHERE o.id_user = :userID
            ORDER BY o.id DESC;
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":userID", $userID);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('showOneForOrderItemsByUserID')) {
    function showAllForOrderItemsByUserID($orderID)
    {
        
        try {
            $sql = "
            SELECT o.id       as o_id,
                   o.quantity as o_quantity,
                   o.price    as o_price,
                   p.name     as p_name,
                   s.id       as s_id
            FROM order_items o
            INNER JOIN orders s ON o.id_order = s.id
            INNER JOIN products p ON o.id_product = p.id
            WHERE o.id_order = :orderID 
            ORDER BY o.id DESC
            LIMIT 1
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":orderID", $orderID);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
