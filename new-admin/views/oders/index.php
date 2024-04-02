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
                        <th>Mã </th>
                        <th>Họ tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Ghi chú</th>
                        <th>Thanh toán</th>
                        <th>Tổng tiền</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($oders as $oder) : 
                            $name = $oder['first_name']. ' ' . $oder['last_name'];
                        ?>
                        <tr class="tr-shadow">
                            <td><?= $oder['id'] ?></td>
                            
                            <td><?= $name ?></td>
                            <td><?= $oder['address'] ?></td>
                            <td><?= $oder['note'] ?></td>
                            <td><?= $oder['paymethod'] ?></td>
                            <td><?= $oder['total_price'] ?></td>


                         
                            <td>
                                <div class="table-data-feature">
                                    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=oders-detail&id=<?= $oder['id'] ?>">
                                        <button class="item" data-toggle="tooltip" title="show">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=oders-update&id=<?= $oder['id'] ?>">
                                        <button class="item" data-toggle="tooltip" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                    </a>
                                    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=oders-delete&id=<?= $oder['id'] ?>" onclick="return confirm('Xác nhận hủy đơn hàng????')">
                                        <button class="item" data-toggle="tooltip" title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
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