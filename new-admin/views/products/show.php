<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35">Quản lý tài khoản</h3>
    <table class="table">
        <tr>
            <th>Trường dữ liệu</th>
            <th>Dữ liệu</th>
        </tr>

        <?php foreach ($user as $fieldName => $value) { ?>
            <tr>
                <td><?= ucfirst($fieldName) ?></td>
                <td>
                    <?php
                    switch ($fieldName) {
                        case 'password':
                            echo '**********';
                            break;
                        case 'type':
                            echo $value
                                ? '<span class="badge badge-success">Admin</span>'
                                : '<span class="badge badge-warning">Member</span>';
                            break;
                        default:
                            echo $value;
                            break;
                    }
                    ?>
                </td>
            </tr>
        <?php } ?>
    </table>

    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=users" class="btn btn-danger">Back to list</a>
    <!-- END DATA TABLE -->
</div>