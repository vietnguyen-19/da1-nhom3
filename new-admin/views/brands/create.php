<div class="main-content">
    <div class="col-md-12">
        <!-- DATA TABLE -->

        <h3 class="title-5 m-b-35">Thêm Brand</h3>

        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['success'] ?>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['errors'])) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($_SESSION['errors'] as $error) : ?>
                        <li> <?= $error ?> </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php unset($_SESSION['errors']) ?>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Tên nhãn hàng:</label>
                        <input type="text" class="form-control" id="name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>" placeholder="Enter name" name="name">
                    </div>
                    <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Hình ảnh:</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                </div> 
            </div>

            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="<?= BASE_URL_NEW_ADMIN ?>?act=brands" class="btn btn-danger">Danh sách</a>
        </form>
        <!-- END DATA TABLE -->
    </div>
</div>

<?php if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
} ?>