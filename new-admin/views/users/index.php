<div class="table-data__tool">
    <div class="table-data__tool-left">
        <div class="rs-select2--light rs-select2--md">
            <select class="js-select2" name="property">
                <option selected="selected">All Properties</option>
                <option value="">Option 1</option>
                <option value="">Option 2</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <div class="rs-select2--light rs-select2--sm">
            <select class="js-select2" name="time">
                <option selected="selected">Today</option>
                <option value="">3 Days</option>
                <option value="">1 Week</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <button class="au-btn-filter">
            <i class="zmdi zmdi-filter-list"></i>filters</button>
    </div>
    <!-- thêm user -->
    <div class="table-data__tool-right">
        <a href="<?= BASE_URL_NEW_ADMIN ?>?act=users-create">
            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i>Thêm mới</button>
        </a>
        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
            <select class="js-select2" name="type">
                <option selected="selected">Export</option>
                <option value="">Option 1</option>
                <option value="">Option 2</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
    </div>
</div>


<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35"><?= $title ?></h3>

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
                                <a href="/?act=users-detail$id=<?= $user?>"></a>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fa fa-eye"></i>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
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