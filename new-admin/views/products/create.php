<div class="main-content">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">
            <?= $title ?>
        </h3>

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
                        <label for="id_category" class="form-label">Loại sản phẩm:</label>
                        <select class="form-control" id="id_category" name="id_category">
                            <option value="0" disabled selected>Chọn loại sản phẩm</option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category['id'] ?>">
                                    <?= $category['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="id_brand" class="form-label">Nhãn hàng:</label>
                        <select class="form-control" id="id_brand" name="id_brand">
                            <option value="0" disabled selected>Chọn nhãn hàng</option>
                            <?php foreach ($brands as $brand) : ?>
                                <option value="<?= $brand['id'] ?>">
                                    <?= $brand['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Tên sản phẩm:</label>
                        <input type="text" class="form-control" id="name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>" placeholder="Enter name" name="name">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="price" class="form-label">Giá gốc:</label>
                        <input type="price" class="form-control" id="price" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['price'] : null ?>" placeholder="Enter price" name="price">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="sale_price" class="form-label">Giá sale:</label>
                        <input type="text" class="form-control" id="sale_price" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['sale_price'] : null ?>" placeholder="Enter sale_price" name="sale_price">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="images" class="form-label">hình ảnh:</label>
                        <input type="file" class="form-control" id="images" name="images">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="img_thumbnail" class="form-label">Biến thể:</label>
                        <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="sale_price" class="form-label">Từ khóa:</label>
                        <input type="text" class="form-control" id="key_word" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['key_word'] : null ?>" placeholder="Enter key_word" name="key_word">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="view" class="form-label">Lượt xem:</label>
                        <input type="number" class="form-control" id="view" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['view'] : null ?>" placeholder="Enter view" name="view">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="view" class="form-label">Số lượng:</label>
                        <input type="number" class="form-control" id="view" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['view'] : null ?>" placeholder="Enter quantity" name="quantity">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="description" class="form-label">Mô tả sản phẩm:</label>
                        <br>
                        <textarea id="description" name="description" style="border: solid 1px black;"><?= isset($_SESSION['data']) ? $_SESSION['data']['description'] : null ?></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="<?= BASE_URL_NEW_ADMIN ?>?act=product" class="btn btn-danger">Danh sách</a>
        </form>


        <!-- END DATA TABLE -->
    </div>
</div>

<?php if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
} ?>