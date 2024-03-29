
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Detail
            </h6>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Trường dữ liệu</th>
                    <th>Dữ liệu</th>
                </tr>

                <?php foreach ($brands as $fieldName => $value) : ?>
                    <tr>
                        <td><?= ucfirst($fieldName) ?></td>
                        <td><?= $value ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <a href="<?= BASE_URL_NEW_ADMIN ?>?act=categories" class="btn btn-danger">Back to list</a>
        </div>
    </div>
</div>
=======
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

