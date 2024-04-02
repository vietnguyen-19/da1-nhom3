
<div class="main-content">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Quản lý tài khoản</h3>
        <table class="table">
            <tr>
                <th>Trường dữ liệu</th>
                <th>Dữ liệu</th>
            </tr>

            <?php if (is_array($products)) : ?>
                <?php foreach ($products as $fieldName => $value) : 
                        $showName = isset($fileNameShow[$fieldName]) ? $fileNameShow[$fieldName] : ucfirst($fieldName);
                    ?>
                    <tr>
                        <td><?= $showName ?></td>
                        <td>
                            <?php
                            switch ($fieldName) {
                                case 'name':
                                case 'price':
                                case 'sale_price':
                                case 'description':
                                case 'p_pimage':
                                    echo '<img src="' . BASE_URL . $value . '" alt="" width="100px">';
                                    break;
                                case 'p_img_thumbnail':
                                    echo '<img src="' . BASE_URL . $value . '" alt="" width="100px">';
                                    break;
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
</div>