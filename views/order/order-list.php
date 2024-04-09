<div class="shopping_cart_area mt-32">
    <div class="container">
        <form action="#">
            <div class="row">
                <h2>Đơn hàng của bạn</h2>
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_name">Mã đơn</th>
                                        <th class="product_name">Tên người nhận</th>
                                        <th class="product_name">Tên sản phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product_quantity">Số lượng</th>
                                        <th class="product_total">Tổng tiền</th>
                                        <th class="product_name">Hình thức thanh toán</th>
                                        <th class="product_name">Trạng thái đơn hàng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (!empty($orders)){
                                        
                                        foreach ($orders as $order) : ?>
                                            <tr>
                                                <td class="product_id">
                                                    <?= $order['id'] ?>
                                                </td>
                                                <td class="product_name">
                                                    <?= $order['user_name'] ?>
                                                </td>
                                                <td class="product_name">
                                                    <?= $order['product_name'] ?>
                                                </td>
                                                <td class="product-price">
                                                    <?= number_format($order['price']) ?>
                                                </td>

                                                <td class="product_quantity">
                                                    <span class="btn "><?= $order['quantity'] ?></span>
                                                </td>
                                                <td class="product_total">
                                                   <?= $order['total'] ?>
                                                </td>
                                                <td class="product_name">
                                                    <?= $order['status_payment'] ?>
                                                </td>
                                                <td class="product_name">
                                                    <?= $order['status'] ?>
                                                </td>
                                            </tr>
                                    <?php
                                        endforeach;
                                    }else{ ?>
                                        <h2>Bạn chưa có đơn hàng nào</h2>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>