<style>
    .brand_container .single_brand {
        width: 200px; /* Đặt kích thước cố định cho mỗi ảnh */
        height: 150px;
    }

    .brand_container .single_brand img {
        max-width: 100%; /* Đảm bảo ảnh không vượt quá kích thước của khung */
        max-height: 100%;
        display: block; /* Đảm bảo ảnh nằm trong block */
        margin: 0 auto; /* Căn giữa ảnh trong khung */
    }

</style>
<div class="brand_area mb-42">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="brand_container owl-carousel">
                    <?php foreach ($brands as $brand) : ?>
                        <div class="single_brand">
                        <a href="<?= BASE_URL . '?act=ShowByBrand&brandID=' .$brand['id'] ?>">
                                <img style="width: 200px; height: 100px;" src="<?= BASE_URL . $brand['image'] ?>" alt="">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>