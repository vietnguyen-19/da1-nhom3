<section class="product_area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2><span> sản phẩm <strong>mới</strong></span></h2>
                </div>
                <div class="product_carousel product_column5 owl-carousel">
                    <?php foreach ($products as $product) : ?>
                        <div class="single_product">

                            <div class="product_name">
                                <h3>
                                    <a href="<?= BASE_URL . '?act=product-detail&productID=' . $product['p_id'] ?>"><?= $product['p_name'] ?></a>
                                </h3>
                            </div>

                            <div class="product_thumb">
                                <a class="primary_img" href="<?= BASE_URL . '?act=product-detail&productID=' . $product['p_id'] ?>"><img src="<?= BASE_URL . $product['p_pimage'] ?>" alt=""></a>
                                <a class="secondary_img" href="<?= BASE_URL . '?act=product-detail&productID=' . $product['p_id'] ?>"><img src="<?= BASE_URL . $product['p_img_thumbnail'] ?>" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
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
                                        <span class="regular_price"><?= $product['p_price'] ?></span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a>
                                        <a href="<?= BASE_URL . '?act=cart-add&productID=' . $product['p_id'] . '&quantity=1' ?>" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</section>