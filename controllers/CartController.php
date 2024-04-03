<?php

function cartAdd($productID, $quantity = 0)
{
    

    $product = showOne('products', $productID);

    if (empty($product)) {
        debug('404 Not found');
    }
    $cartID = getCartID( $_SESSION['cilent']);

    if (!isset($_SESSION['cart'][$productID])) {
        $_SESSION['cart'][$productID] = $product;
        $_SESSION['cart'][$productID]['quantity'] = $quantity;
        

        insert('cart_items', [
            
            'cart_id' => $cartID,
            'product_id' => $productID,
            'quantity' => $quantity
        ]);
    } else {
        $qtyTMP = $_SESSION['cart'][$productID]['quantity'] += $quantity;

        updateQuantityByCartIDAndProductID($cartID, $productID, $qtyTMP);
    }

    header('Location: ' . BASE_URL . '?act=cart-list');
}

function cartList()

{
    $view = '/cart/cart-list';
    
    require_once PATH_VIEW . '/master.php';
}

function cartInc($productID)
{
    // Kiểm tra sản phẩm có tồn tại không
    $product = showOne('products', $productID);

    if (empty($product)) {
        debug('404 Not found');
    }

    // Tăng số lượng lên 1
    if (isset($_SESSION['cart'][$productID])) {
        $qtyTMP = $_SESSION['cart'][$productID]['quantity'] += 1;

        updateQuantityByCartIDAndProductID($_SESSION['cartID'], $productID, $qtyTMP);
    }

    // Chuyển hướng qua trang list cart
    header('Location: ' . BASE_URL . '?act=cart-list');
}

function cartDec($productID)
{
    $product = showOne('products', $productID);

    if (empty($product)) {
        debug('404 Not found');
    }

    if (isset($_SESSION['cart'][$productID]) && $_SESSION['cart'][$productID]['quantity'] > 2) {
        $qtyTMP = $_SESSION['cart'][$productID]['quantity'] -= 1;

        updateQuantityByCartIDAndProductID($_SESSION['cartID'], $productID, $qtyTMP);
    }

    header('Location: ' . BASE_URL . '?act=cart-list');
}

function cartDel($productID)
{
    $product = showOne('products', $productID);

    if (empty($product)) {
        debug('404 Not found');
    }

    if (isset($_SESSION['cart'][$productID])) {
        unset($_SESSION['cart'][$productID]);

        deleteCartItemByCartIDAndProductID($_SESSION['cartID'], $productID);
    }

    header('Location: ' . BASE_URL . '?act=cart-list');
}
