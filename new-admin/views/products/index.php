<div class="main-content">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35"><?= $title ?></h3>
        <div class="table-data__tool-right">
            <a href="<?= BASE_URL_NEW_ADMIN ?>?act=product-create">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Thêm mới</button>
            </a>
        </div>
        
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['success'] ?>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>


        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>Mã SP</th>
                        <th>Tên </th>
                        <th>Giá</th>
                        <th>Giá sale</th>
                        <th>Mô tả</th>
                        <th>Hình ảnh</th>
                        <th>số lượng</th>
                        <th>Từ khóa</th>
                        <th>lượt xem</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($products as $product) : ?>
                        <tr class="tr-shadow">
                            <td><?= $product['p_id'] ?></td>
                            <td><?= $product['p_name'] ?></td>
                            <td><?= $product['p_price'] ?></td>
                            <td><?= $product['p_sale_price'] ?></td>
                            <td>
                                <span><?= $product['p_description'] ?></span>
                            </td>
                            <td><img src="<?= BASE_URL . $product['p_pimage'] ?>" alt=""></td>
                            <td><?= $product['p_quantity'] ?></td>
                            <td><?= $product['p_key_word'] ?></td>
                            <td><?= $product['p_view'] ?></td>


                            <td>
                                <div class="table-data-feature">
                                    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=product-detail&id=<?= $product['p_id'] ?>">
                                        <button class="item" data-toggle="tooltip" title="show">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=product-update&id=<?= $product['p_id'] ?>">
                                        <button class="item" data-toggle="tooltip" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                    </a>
                                    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=product-delete&id=<?= $product['p_id'] ?>" onclick="return confirm('Bạn có chắc chắn xóa không')">
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