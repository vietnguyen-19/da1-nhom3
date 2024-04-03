<section class="product_area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2><span> Sản phẩm <strong>Bán chạy</strong></span></h2>
                </div>
                <div class="product_carousel product_column4 owl-carousel">
                    <?php foreach ($products as $product) : ?>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html"><?= $product['p_name'] ?></a></h3>
                                <!-- <p class="manufacture_product"><a href="#">Accessories</a></p> -->
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="<?= BASE_URL . $product['p_pimage'] ?>" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="<?= BASE_URL . $product['p_img_thumbnail'] ?>" alt=""></a>
                                <div class="label_product">

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
                                        <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                                <div class="quantity_progress">
                                    <p class="product_sold">Quantity: <span><?= $product['p_quantity'] ?></span></p>
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