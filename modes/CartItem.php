<?php 

function updateQuantityByCartIDAndProductID($cartID, $productID, $quantity) {
    try {
        $sql = "
            UPDATE cart_items 
            SET quantity = :quantity 
            WHERE id_cart = :id_cart AND id_product = :id_product;
        ";
        
        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":quantity", $quantity);
        $stmt->bindParam(":id_cart", $cartID);
        $stmt->bindParam(":id_product", $productID);

        $stmt->execute();
    } catch (\Exception $e) {
        debug($e);
    }
}

function deleteCartItemByCartIDAndProductID($cartID, $productID) {
    try {
        $sql = "
            DELETE FROM cart_items 
            WHERE id_cart = :id_cart AND id_product = :id_product;
        ";
        
        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id_cart", $cartID);
        $stmt->bindParam(":id_product", $productID);

        $stmt->execute();
    } catch (\Exception $e) {
        debug($e);
    }
}

function deleteCartItemByCartID($cartID) {
    try {
        $sql = "
            DELETE FROM cart_items 
            WHERE id_cart = :id_cart;
        ";
        
        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id_cart", $cartID);

        $stmt->execute();
    } catch (\Exception $e) {
        debug($e);
    }
}

