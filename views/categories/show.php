<section class="product_area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2><span> <strong><?= $categoryName ?></strong></span></h2>
                </div>

                <div class="  " style="display: flex;" >
                    <?php foreach ($showProductByCategories as $category) : ?>
                        <div class="single_product" style="width: 200px;" >
                            <div class="product_name">
                                <h3>
                                    <a href="<?= BASE_URL . '?act=product-detail&productID=' . $category['p_id'] ?>">
                                        <?= $category['p_name'] ?></a>
                                </h3>
                            </div>

                            <div class="product_thumb">
                                <a class="primary_img" href="<?= BASE_URL . '?act=product-detail&productID=' . $category['p_id'] ?>"><img src="<?= BASE_URL . $category['p_pimage'] ?>" alt=""></a>
                                <a class="secondary_img" href="<?= BASE_URL . '?act=product-detail&productID=' . $category['p_id'] ?>"><img src="<?= BASE_URL . $category['p_img_thumbnail'] ?>" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-0%</span>
                                </div>
                            </div>

                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price"><?= $category['p_sale_price'] ?: $category['p_price'] ?></span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a>
                                        <a href="<?= BASE_URL . '?act=cart-add&productID=' . $category['p_id'] . '&quantity=1' ?>" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>

                                <div class="bar_percent">

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</section>