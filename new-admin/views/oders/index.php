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
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        
                        <th>Firt Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Note</th>

                        <th>Paymethod</th>
                        <th>Total price</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($oders as $oder) : ?>
                        <tr class="tr-shadow">
                            <td><?= $oder['id'] ?></td>
                            
                            <td><?= $oder['first_name'] ?></td>
                            <td><?= $oder['last_name'] ?></td>
                            <td><?= $oder['address'] ?></td>
                            <td>
                                <span class="block-email"><?= $oder['email'] ?></span>
                            </td>
                            <td><?= $oder['phone'] ?></td>
                            <td><?= $oder['note'] ?></td>
                            <td><?= $oder['paymethod'] ?'cash' :'electronic wallet' ?></td>
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