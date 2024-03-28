<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35">Quản lý tài khoản</h3>
    <table class="table">
        <tr>
            <th>Trường dữ liệu</th>
            <th>Dữ liệu</th>
        </tr>

        <?php if (is_array($products)): ?>
        <?php foreach ($products as $fieldName => $value): ?>
            <tr>
                <td><?= ucfirst($fieldName) ?></td>
                <td>
                    <?php
                    switch ($fieldName) {
                        case 'p_name':
                        case 'p_price':
                        case 'p_sale_price':
                        case 'p_description':
                        case 'p_pimage':
                        case 'p_img_thumbnail':
                        case 'p_quantity':
                        case 'p_key_word':
                        case 'p_view':
                        default:
                            echo $value;
                            break;
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
<a href="<?= BASE_URL_NEW_ADMIN ?>?act=product" class="btn btn-danger">Back to list</a>
<!-- END DATA TABLE -->
</div>