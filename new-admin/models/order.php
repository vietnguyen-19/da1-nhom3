<?php

if (!function_exists('listAllOrder')) {
    function listAllOrder()
    {
        try {
            $sql = "
            SELECT o.id       as o_id ,
                o.shipping    as o_shipping ,
                o.first_name  as o_first_name ,
                o.last_name   as o_last_name ,
                o.address     as o_address ,
                o.email       as o_email ,
                o.phone       as o_phone ,
                o.note        as o_note ,
                o.paymethod   as o_paymethod ,
                o.total_price as o_total_price ,
                s.status      as s_status ,
                u.name        as u_name ,
                p.name        as p_name  
            FROM orders as o
            INNER JOIN order_status as s ON o.id_status = s.id
            INNER JOIN users as u ON o.id_user = u.id
            INNER JOIN products as p ON o.id_product = p.id ORDER BY o.id DESC;
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showOneForOrder')) {
    function showOneForOrder($id)
    {
        try {
            $sql = "
            SELECT o.id       as o_id ,
                o.shipping    as o_shipping ,
                o.first_name  as o_first_name ,
                o.last_name   as o_last_name ,
                o.address     as o_address ,
                o.email       as o_email ,
                o.phone       as o_phone ,
                o.note        as o_note ,
                o.paymethod   as o_paymethod ,
                o.total_price as o_total_price ,
                o.id_status   as o_id_status ,
                s.status      as s_status ,
                u.name        as u_name ,
                p.name        as p_name,
                p.price       as p_price
            FROM orders as o
            INNER JOIN order_status as s ON o.id_status = s.id
            INNER JOIN users as u ON o.id_user = u.id
            INNER JOIN products as p ON o.id_product = p.id
                WHERE 
                    o.id = :id 
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
