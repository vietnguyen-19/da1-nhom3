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
<?php require_once PATH_VIEW . '/compoments\contents\Our-Products.php' ?>
<!--product area end-->

<!--banner area start-->

<!--banner area end-->

<!--product area start-->
<section class="product_area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2><span> <strong>Best</strong>Sellers</span></h2>
                </div>
                <div class="product_carousel product_column5 owl-carousel">
                    <?php foreach ($products as $product) : ?>
                        <div class="single_product">

                            <div class="product_name">
                                <h3><a href="product-details.html"><?= $product['p_name'] ?></a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="<?= BASE_URL . $product['p_pimage'] ?>" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="./asets/client/img/product/product6.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-57%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                    </ul>
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