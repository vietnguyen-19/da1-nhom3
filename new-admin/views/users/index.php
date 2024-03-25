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
                        <th>Password</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Type</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr class="tr-shadow">
                            <td>
                                <label class="au-checkbox">
                                    <input type="checkbox">
                                    <span class="au-checkmark"></span>
                                </label>
                            </td>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['password'] ?></td>
                            <td><?= $user['address'] ?></td>
                            <td>
                                <span class="block-email"><?= $user['email'] ?></span>
                            </td>
                            <td><?= $user['phone'] ?></td>
                            <td>
                                <span class="status--process"><?= $user['type']
                                                                    ? '<span class="badge badge-success" >Admin</span>'
                                                                    : '<span class="badge badge-warning" >Member</span>' ?></span>
                            </td>
                            <td>
                                <div class="table-data-feature">
                                    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=users-detail&id=<?= $user['id'] ?>">
                                        <button class="item" data-toggle="tooltip" title="show">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=users-update&id=<?= $user['id'] ?>">
                                        <button class="item" data-toggle="tooltip" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                    </a>
                                    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=users-delete&id=<?= $user['id'] ?>" onclick="return confirm('Bạn có chắc chắn xóa không')">
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