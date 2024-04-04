<!--slider area start-->
<?php require_once PATH_VIEW . '\compoments\banners\banner-slideShow.php' ?>
<!--slider area end-->

<!--brand area start-->
<?php require_once PATH_VIEW . '/compoments/contents/brands.php' ?>
<!--brand area end-->

<!--product area start-->
<?php require_once PATH_VIEW . '/compoments\contents\top-sale.php' ?>
<!--product area end-->

<!--featured categories area start-->
<!--featured categories area end-->

<!--Our Products-->
<?php require_once PATH_VIEW . '/compoments\contents\new-Products.php' ?>
<!--product area end-->

<!--banner area start-->

<!--banner area end-->

<!--product area start-->
<section class="product_area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2><span> Đáng <strong>chú ý</strong></span></h2>
                </div>
                <div class="product_carousel product_column5 owl-carousel">
                    <?php foreach ($products as $product): ?>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="<?= BASE_URL ?>?act=product-detail&id=<?= $product['p_id'] ?>">
                                        <?= $product['p_name'] ?> 
                                    </a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="<?= BASE_URL ?>?act=product-detail&id=<?= $product['p_id'] ?>"><img
                                        src="<?= BASE_URL . $product['p_pimage'] ?>" alt="" width="234px"
                                        height="234px"></a>
                                <a class="secondary_img" href="<?= BASE_URL ?>?act=product-detail&id=<?= $product['p_id'] ?>"><img
                                        src="./asets/client/img/product/product6.jpg" alt=""></a>
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
                                        <span class="regular_price">
                                            <?= $product['p_price'] ?>
                                        </span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="wishlist.html" title="Add to Wishlist"><span
                                                class="lnr lnr-heart"></span></a>
                                        <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
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
<!--product area end-->

<!--blog area start-->

<!--blog area end-->