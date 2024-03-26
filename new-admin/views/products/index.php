<div class="main-content">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35"><?= $title ?></h3>
        <div class="table-data__tool-right">
            <a href="<?= BASE_URL_NEW_ADMIN ?>?act=users-create">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Thêm mới</button>
            </a>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th> </th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Sale_price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Key_word</th>
                        <th>View</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($products as $product) : ?>
                        <tr class="tr-shadow">
                            <td>
                                <label class="au-checkbox">
                                    <input type="checkbox">
                                    <span class="au-checkmark"></span>
                                </label>
                            </td>
                            <td><?= $product['id'] ?></td>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['price'] ?></td>
                            <td><?= $product['sale_price'] ?></td>
                            <td>
                                <span ><?= $product['description'] ?></span>
                            </td>
                            <td><?= $product['image'] ?></td>
                            <td><?= $product['quantity'] ?></td>
                            <td><?= $product['key_word'] ?></td>
                            <td><?= $product['view'] ?></td>
                          

                            <td>
                                <div class="table-data-feature">
                                    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=users-detail&id=<?= $product['id'] ?>">
                                        <button class="item" data-toggle="tooltip" title="show">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=users-update&id=<?= $product['id'] ?>">
                                        <button class="item" data-toggle="tooltip" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                    </a>
                                    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=users-delete&id=<?= $product['id'] ?>" onclick="return confirm('Bạn có chắc chắn xóa không')">
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