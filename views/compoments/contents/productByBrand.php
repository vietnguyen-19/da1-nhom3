<section class="product_area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (!empty($errorName)) { ?>
                    <br>
                    <h2><?= $errorName ?></h2>
                <?php } else { ?>
                    <div class="section_title">
                        <h2><span>Sản phẩm của <Strong><?= $brandName ?></Strong></span></h2>
                    </div>
                    <div class="" style="display: flex;">
                        <?php foreach ($productByBrands as $productByBrand) : ?>
                            <div class="single_product" style="width: 200px;">
                                <div class="product_name">
                                    <h3>
                                        <a href="<?= BASE_URL . '?act=product-detail&productID=' . $productByBrand['p_id'] ?>"><?= $productByBrand['p_name'] ?></a>
                                    </h3>
                                </div>

                                <div class="product_thumb " style="width: 100;">
                                    <a class="primary_img" style="width: 100%;" href="<?= BASE_URL . '?act=product-detail&productID=' . $productByBrand['p_id'] ?>"><img src="<?= BASE_URL . $productByBrand['p_pimage'] ?>" alt=""></a>
                                    <a class="secondary_img" href="<?= BASE_URL . '?act=product-detail&productID=' . $productByBrand['p_id'] ?>"><img src="<?= BASE_URL . $productByBrand['p_img_thumbnail'] ?>" alt=""></a>
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
                                            <span class="regular_price"><?= number_format($productByBrand['p_sale_price'] ?: $productByBrand['p_price'])  ?> Vnd</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a>
                                            <a href="<?= BASE_URL . '?act=cart-add&productID=' . $productByBrand['p_id'] . '&quantity=1' ?>" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                    <div class="bar_percent">

                                    </div>
                                </div>
                            </div>
                    <?php endforeach;
                    } ?>
                    </div>
            </div>
        </div>

    </div>
</section>