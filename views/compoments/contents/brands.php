<div class="brand_area mb-42">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="brand_container owl-carousel">
                    <?php foreach ($brands as $brand) : ?>
                        <div class="single_brand">
                            <a href="#"><img src="<?= BASE_URL . $brand['image'] ?>" alt=""></a>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>