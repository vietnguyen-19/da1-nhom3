<?php

function cartAdd($productID, $quantity = 0)
{
    
    // kiểm tra xem có product với ID không
    $product = showOneForProduct($productID);

    if (empty($product)) {
        debug('404 Not found');
    }
    

    // kiểm tra trong bảng cart đã có bản ghi nào của user chưa
    // có rồi thì lấy cartID, chưa có thì tạo mới
    $cartID = getCartID( $_SESSION['cilent']['id']);

    $_SESSION['cartID'] = $cartID;


    if (!isset($_SESSION['cart'][$productID])) {
        $_SESSION['cart'][$productID] = $product;
        $_SESSION['cart'][$productID]['quantity'] = $quantity;
        

        insert('cart_items', [
            
            'id_cart' => $cartID,
            'id_product' => $productID,
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
    $title = 'danh sách giỏ hàng';
    $view = '/cart/cart-list';
    // debug($_SESSION['cart']);
    require_once PATH_VIEW . '/master.php';
}

function cartInc($productID)
{
    // Kiểm tra sản phẩm có tồn tại không
    $product = showOneForProduct($productID);

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
    $product = showOneForProduct($productID);

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
    $product = showOneForProduct($productID);

    if (empty($product)) {
        debug('404 Not found');
    }

    if (isset($_SESSION['cart'][$productID])) {
        unset($_SESSION['cart'][$productID]);

        deleteCartItemByCartIDAndProductID($_SESSION['cartID'], $productID);
    }

    header('Location: ' . BASE_URL . '?act=cart-list');
}

function countCart(){
    $cart = $_SESSION['cart']['p_id'];
    $count = 0;
    foreach($cart as $Cart){
        $count += 1;
    }
}