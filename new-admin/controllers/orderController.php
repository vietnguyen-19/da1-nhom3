<?php
function OrderListAll()
{

    $orders = listAllOrder();


    $title = 'Danh sách Đơn hàng';
    $view = 'orders/index';


    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}

function OrderShowOne($id)
{
    $title = 'Chi tiết Order ';
    $view = 'orders/show';
    $orderItems = showOneForOrderItems($id);
    $order = showOneForOrder($id);


    if (empty($order) && !empty($orderItems)) {
        e404();
    }

    $createAt = strtotime($order['o_create_at']);
    $updateAt = strtotime($order['o_update_at']);

    $format = 'd/m/Y H:i:s';

    $orderSHow = [
        'id' => $order['o_id'],
        'user_name' => $order['o_user_name'],
        'name' => $orderItems['p_name'],
        'user_address' => $order['o_user_address'],
        'user_email' => $order['o_user_email'],
        'user_phone' => $order['o_user_phone'],
        'note' => $order['o_note'],
        'price' => $orderItems['o_price'],
        'total_price' => $order['o_total_price'],
        'status_payment' => $order['o_status_payment'],
        'status' => $order['s_status'],

    ];
    // debug($orderItems);
    $idStatus = $order['o_id_status'];

    $status = [];
    if ($idStatus == 1) {
        $status = [
            ['id' => '1', 'value' => 'chờ xác nhận'],
            ['id' => '2', 'value' => 'chờ lấy hàng'],
            ['id' => '5', 'value' => 'hủy đơn'],

        ];
    } else if ($idStatus == 2) {
        $status = [
            ['id' => '2', 'value' => 'chờ lấy hàng'],
            ['id' => '3', 'value' => 'đang giao hàng'],

        ];
    } else if ($idStatus == 3) {
        $status = [
            ['id' => '3', 'value' => 'đang giao hàng'],
            ['id' => '4', 'value' => 'giao thành công'],
        ];
    } else if ($idStatus == 4) {
        $status = [
            ['id' => '4', 'value' => 'giao thành công'],
        ];
    } else if ($idStatus == 5) {
        $status = [
            ['id' => '5', 'value' => 'đã hủy đơn'],
        ];
    }
    $errors = [];

    if (!empty($_POST)) {
        $data = [
            'id_status' => $_POST['status'],
        ];

        if ($data['id_status'] == $idStatus) {
            $errors[] = 'trạng thái mới không được giống trạng thái cũ';
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('location:' . BASE_URL_NEW_ADMIN . '?act=orders-detail&id=' . $order['o_id']);
            exit();
        }

        try {

            $sql = "UPDATE `orders` SET id_status = :id_status,
             status_payment = CASE 
             WHEN :id_status = 4 THEN 1 
             WHEN :id_status = 5 THEN -1
             ELSE  status_payment END
            WHERE id = :id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $_SESSION['success'] = 'cập nhật trạng thái thành công';
            header('location:' . BASE_URL_NEW_ADMIN . '?act=orders-detail&id=' . $order['o_id']);
            exit();
        } catch (\Exception $e) {
            debug($e);
        }
    }

    require_once PATH_VIEW_NEW_ADMIN . "master.php";
}
