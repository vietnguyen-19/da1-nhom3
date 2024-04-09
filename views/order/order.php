<div class="Checkout_section mt-32">
    <div class="container">
        <div class="checkout_form">
            <h2>Đặt hàng</h2>
            <br>
            <form action="<?= BASE_URL . '?act=order-purchase' ?>" method="post">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h3>Thông tin Địa chỉ</h3>
                        <div class="row">
                            <div class="col-lg-6 mb-20">
                                <label> Họ tên:</label>
                                <input type="text" placeholder="Họ và tên..." name="user_name" value="<?= $_SESSION['cilent']['name'] ?>" id="user_name">
                            </div>

                            <div class="col-12 mb-20">
                                <label>Địa chỉ:</label>
                                <input placeholder="Địa chỉ..." type="text" name="user_address" value="<?= $_SESSION['cilent']['address'] ?>" id="user_address">
                            </div>
                            <div class="col-lg-6 mb-20">
                                <label>Số điện thoại:</label>
                                <input placeholder="số điện thoại..." type="tel" name="user_phone" value="<?= $_SESSION['cilent']['phone'] ?>" id="user_phone">

                            </div>
                            <div class="col-lg-6 mb-20">
                                <label> Email:</label>
                                <input placeholder="email...." type="email" name="user_email" value="<?= $_SESSION['cilent']['email'] ?>" id="user_email">

                            </div>

                            <div class="col-12 mb-20">
                                <input id="address" type="checkbox" data-target="createp_account" />
                                <label class="righ_0" for="address" data-bs-toggle="collapse" href="#collapsetwo" aria-controls="collapsetwo">Địa chỉ khác ?</label>

                                <div id="collapsetwo" class="collapse one" data-parent="#accordion">
                                    <div class="col-lg-6 mb-20">
                                        <label> Họ tên:</label>
                                        <input type="text" placeholder="Họ và tên..." name="user_name_alt" id="user_name">
                                    </div>

                                    <div class="col-12 mb-20">
                                        <label>Địa chỉ:</label>
                                        <input placeholder="Địa chỉ..." type="text" name="user_address_alt" id="user_address">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label>Số điện thoại:</label>
                                        <input placeholder="số điện thoại..." type="tel" name="user_phone_alt" id="user_phone">

                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label> Email:</label>
                                        <input placeholder="email...." type="email" name="user_email_alt" id="user_email">

                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="order-notes">
                                    <label for="order_note">Ghi chú đơn hàng</label>
                                    <textarea id="order_note" placeholder="Ghi chú thêm cho shop, tài xế..."  name="note"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h3>Đơn hàng</h3>
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_name">Sản phẩm</th>
                                        <th class="product_quantity">Số lượng</th>
                                        <th class="product_total">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($_SESSION['cart'])) :
                                        foreach ($_SESSION['cart'] as $item) : ?>
                                            <tr>
                                                <td class="product_name">
                                                    <?= $item['p_name'] ?>
                                                </td>
                                                <td class="product_quantity">
                                                    <?= $item['quantity'] ?>
                                                </td>

                                                <td class="product_total">
                                                    <?php
                                                    $total = ($item['p_sale_price'] ?: $item['p_price']) * $item['quantity'];

                                                    echo number_format($total);
                                                    ?>
                                                </td>
                                            </tr>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <h3>Tổng tiền:
                                <?= caculator_total_order() ?> VND
                            </h3>
                        </div>
                        <div class="payment_method">
                            <div class="panel-default">
                                <input id="payment" name="check_method" type="radio" data-target="createp_account" checked />
                                <label for="payment" data-bs-toggle="collapse" href="#method" aria-controls="method">Thanh toán khi nhận hàng</label>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="order_button">
                    <button type="submit">Đặt hàng ngay</button>
                    <a href="<?= BASE_URL ?>" onclick="return confirm('bạn chắc chứ ???')">
                        <label class="righ_0">Trang chủ</label>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>