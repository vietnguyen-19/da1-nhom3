<div class="main-content">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35"><?= $title ?></h3>
        <div class="table-data__tool-right">
         
        </div>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['success'] ?>
            </div>
            <?php unset($_SESSION['success']) ?>
        <?php endif; ?>
        <div class="table-responsive ">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Mã Đơn</th>
                        <th>Họ tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Ghi chú</th>
                        <th>Thanh toán</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($orders as $order) : 
                            $name = $order['o_first_name']. ' ' . $order['o_last_name'];
                        ?>
                        <tr class="tr-shadow">
                            <td><?= $order['o_id'] ?></td>
                            <td><?= $name ?></td>
                            <td><?= $order['o_address'] ?></td>
                            <td><?= $order['o_note'] ?></td>
                            <td><?= $order['o_paymethod'] ?></td>
                            <td><?= $order['o_total_price'] ?></td>
                            <td><?= $order['s_status'] ?></td>
              
                            <td>
                                <div class="table-data-feature">
                                    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=orders-detail&id=<?= $order['o_id'] ?>">
                                        <button class="item" data-toggle="tooltip" title="show">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>