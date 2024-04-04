<?php

function getCartID($userID)
{
    // Lấy dữ liệu trong DB
    $cart = getCartByUserID($userID);

    if (empty($cart)) {
        return insert_get_last_id('carts', [
            'id_user' => $userID
        ]);
    }

    return $cart['id'];
}

function getCartByUserID($userID)
{
    try {
        $sql = "SELECT * FROM carts WHERE id_user = :id_user LIMIT 1";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id_user", $userID);

        $stmt->execute();

        return $stmt->fetch();
    } catch (\Exception $e) {
        debug($e);
    }
}
