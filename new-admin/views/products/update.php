<div class="col-md-12">
    <!-- DATA TABLE -->

    <h3 class="title-5 m-b-35">
        <?= $title ?>
    </h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="id_category" class="form-label">Categories:</label>
                    <select class="form-control" id="id_category" name="id_category">
                        <?php foreach ($categories as $category) : ?>
                            <option <?= ($products['p_id_category'] == $category['id']) ? 'selected' : null ?> value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3 mt-3">
                    <label for="id_brand" class="form-label">Brand:</label>
                    <select class="form-control" id="id_brand" name="id_brand">
                        <?php foreach ($brands as $brand) : ?>
                            <option <?= ($products['p_id_brand'] == $brand['id']) ? 'selected' : null ?> value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" value="<?= $products['p_name'] ?>" placeholder="Enter name" name="name">
                </div>
                <div class="mb-3 mt-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="price" class="form-control" id="price" value="<?= $products['p_price'] ?>" placeholder="Enter price" name="price">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="sale_price" class="form-label">Sale_price</label>
                    <input type="text" class="form-control" id="sale_price" value="<?= $products['p_sale_price'] ?>"value="<?= $products['p_price'] ?>" placeholder="Enter sale_price" name="sale_price">
                </div>
                <div class="mb-3 mt-3">
                    <label for="images" class="form-label">Images:</label>
                    <input type="file" class="form-control" id="images" name="images">
                    <img src="<?= BASE_URL . $products['p_pimage'] ?>" alt="" width="100px">
                </div>
                <div class="mb-3 mt-3">
                    <label for="img_thumbnail" class="form-label">Img Ihumbnail:</label>
                    <input type="file" class="form-control" id="img_thumbnail"  name="img_thumbnail">
                    <img src="<?= BASE_URL . $products['p_img_thumbnail'] ?>" alt="" width="100px">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="description" class="form-label">Mô tả sản phẩm:</label>
                    <textarea id="description" value="<?= $products['p_description'] ?>" name="description"></textarea>

                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="<?= BASE_URL_NEW_ADMIN ?>?act=product" class="btn btn-danger">Danh sách</a>
    </form>


    <!-- END DATA TABLE -->
</div>