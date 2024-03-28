<div class="main-content">
<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35">Quản lý nhãn hàng</h3>
    <table class="table">
        <tr>
            <th>Trường dữ liệu</th>
            <th>Dữ liệu</th>
        </tr>

        <?php foreach ($brand as $fieldName => $value) { ?>
            <tr>
                <td><?= ucfirst($fieldName) ?></td>
                <td>
                    <?= $value ?>
                </td>
            </tr>
        <?php } ?>
    </table>

    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=brands" class="btn btn-danger">Danh sách</a>
    <a href="?act=brands-update&id=<?=$brand['id']?>">
    <button class="btn btn-primary">Cập nhật</button>
    </a>
    <!-- END DATA TABLE -->
</div>
</div>  