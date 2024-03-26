<div class="col-md-12">
    <!-- DATA TABLE -->

    <h3 class="title-5 m-b-35"><?= $title ?></h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>
                <div class="mb-3 mt-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="price" class="form-control" id="price" placeholder="Enter price" name="price">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="sale_price" class="form-label">Sale_price</label>
                    <input type="text" class="form-control" id="sale_price" placeholder="Enter sale_price" name="sale_price">
                </div>
                <div class="mb-3 mt-3">
                    <label for="images" class="form-label">Images:</label>
                    <input type="file" class="form-control" id="images" placeholder="Enter images" name="images">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="description" class="form-label">Mô tả sản phẩm:</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="<?= BASE_URL_NEW_ADMIN ?>?act=product" class="btn btn-danger">Danh sách</a>
    </form>


    <!-- END DATA TABLE -->
</div>