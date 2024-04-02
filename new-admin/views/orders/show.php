<div class="main-content">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Quản lý và cập nhật đơn hàng</h3>

        <?php if (isset($_SESSION['errors'])) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($_SESSION['errors'] as $error) : ?>
                        <li> <?= $error ?> </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php unset($_SESSION['errors']) ?>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="row">

                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label class="form-label"><strong>Mã Đơn: </strong> </label>
                        <input type="text" value="<?= $order['o_id'] ?>" disabled>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label"><strong>Họ tên khách hàng: </strong> </label>
                        <input type="text" value="<?= $showName ?>" disabled>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label"><strong>Tên sản phẩm: </strong> </label>
                        <input type="text" value="<?= $order['p_name'] ?>" disabled>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label"><strong>Địa chỉ: </strong> </label>
                        <input type="text" value="<?= $order['o_address'] ?>" disabled>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label"><strong>Email: </strong> </label>
                        <input type="text" value="<?= $order['o_email'] ?>" disabled>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label"><strong>Số điện thoại: </strong> </label>
                        <input type="text" value="<?= $order['o_phone'] ?>" disabled>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label"><strong>Ghi chú: </strong> </label>
                        <input type="text" value="<?= $order['o_note'] ?>" disabled>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label class="form-label"><strong>Giá: </strong> </label>
                        <input type="text" value="<?= $order['p_price'] ?>" disabled>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label"><strong>Phí vận chuyển: </strong> </label>
                        <input type="text" value="<?= $order['o_shipping'] ?>" disabled>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label"><strong>Tổng tiền: </strong> </label>
                        <input type="text" value="<?= $order['o_total_price'] ?>" disabled>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label"><strong>Phương thức thanh toán: </strong> </label>
                        <input type="text" value="<?= $order['o_paymethod'] ?>" disabled>
                    </div>
                    <br>
                    <div class="mb-3 mt-3">
                        <label for="o_id_status" class="form-label"><strong>Trạng thái đơn hàng: </strong> </label>
                        <select class="form-control" id="o_id_status" name="o_id_status">
                            <?php foreach ($status as $status) : ?>
                                <option value="<?= $status['id'] ?>"><?= $status['value'] ?></option>


                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            
                <button type="submit" class="btn btn-primary">Cập nhật</button>
  
            <a href="<?= BASE_URL_NEW_ADMIN ?>?act=orders" class="btn btn-danger">Danh sách</a>
        </form>

        <!-- END DATA TABLE -->
    </div>
</div>