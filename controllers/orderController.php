<?php

function orderCheckout()
{
    $view = '/order/order';
    $title = 'Đặt hàng';
    require_once PATH_VIEW . '/master.php';
}

function orderPurchase()
{
    if (!empty($_POST) && !empty($_SESSION['cart'])) {
        // xử lý lưu vào bảng orders và order_items
        if (!empty($_POST['user_name_alt']) && !empty($_POST['user_address_alt']) && !empty($_POST['user_phone_alt'])) {
            try {
                $data = [
                    'id_user' => $_SESSION['cilent']['id'],
                    'id_status' => 1,
                    'user_name' => $_POST['user_name_alt'],
                    'user_address' => $_POST['user_address_alt'],
                    'user_email' => $_POST['user_email_alt'],
                    'user_phone' => $_POST['user_phone_alt'],
                    'note' => $_POST['note'],
                    'total_price' => caculator_total_order(),
                    'status_payment' => 0,
                ];

                $orderID = insert_get_last_id('orders', $data);

                foreach ($_SESSION['cart'] as $productID => $item) {
                    $orderItem = [
                        'id_product' => $productID,
                        'id_order' => $orderID,
                        'quantity' => $item['quantity'],
                        'price' => $item['p_sale_price'] ?: $item['p_price'],
                    ];
                    insert('order_items', $orderItem);
                }
                // xử lý hậu 
                deleteCartItemByCartID($_SESSION['cartID']);
                delete2('carts', $_SESSION['cartID']);

                unset($_SESSION['cart']);
                unset($_SESSION['cartID']);
            } catch (\Exception $e) {
                debug($e);
            }
        } else {
            try {
                $data = [
                    'id_user' => $_SESSION['cilent']['id'],
                    'id_status' => 1,
                    'user_name' => $_POST['user_name'],
                    'user_address' => $_POST['user_address'],
                    'user_email' => $_POST['user_email'],
                    'user_phone' => $_POST['user_phone'],
                    'note' => $_POST['note'],
                    'total_price' => caculator_total_order(),
                    'status_payment' => 0,
                ];

                $orderID = insert_get_last_id('orders', $data);

                foreach ($_SESSION['cart'] as $productID => $item) {
                    $orderItem = [
                        'id_product' => $productID,
                        'id_order' => $orderID,
                        'quantity' => $item['quantity'],
                        'price' => $item['p_sale_price'] ?: $item['p_price'],
                    ];
                    insert('order_items', $orderItem);
                }
                // xử lý hậu 
                deleteCartItemByCartID($_SESSION['cartID']);
                delete2('carts', $_SESSION['cartID']);

                unset($_SESSION['cart']);
                unset($_SESSION['cartID']);
            } catch (\Exception $e) {
                debug($e);
            }


            header('location: ' . BASE_URL . '?act=order-success');
            exit();
        }

        // require_once PATH_VIEW . '/master.php';

        header('Location: ' . BASE_URL);
        //     exit();
    }
}

function orderSuccess()
{

    $view = '\order\order-success';
    $title = 'Đặt hàng thành công';
    require_once PATH_VIEW . '/master.php';
}


function orderList()
{
    $userID = $_SESSION['cilent']['id'];

    $orders = [];

    $order = listAllOrderByUserID($userID);

    if (!empty($order)) {

        foreach ($order as $order) {

            $orderID = $order['o_id'];
            $orderItem = showAllForOrderItemsByUserID($orderID);

            foreach ($orderItem as $orderItem) {
                $orders[] = [
                    'id' => $order['o_id'],
                    'user_name' => $order['o_user_name'],
                    'product_name' => $orderItem['p_name'],
                    'price' => $orderItem['o_price'],
                    'quantity' => $orderItem['o_quantity'],
                    'total' => $order['o_total_price'],
                    'status_payment' => $order['o_status_payment'],
                    'status' => $order['s_status']

                ];
            }
        }
        $view = '\order\order-list';
        $title = 'Đơn hàng';
        require_once PATH_VIEW . '/master.php';
    }
}
