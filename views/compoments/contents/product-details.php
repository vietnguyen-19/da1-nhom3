<!--product details start-->
<div class="product_details mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img id="zoom1" src="<?= $products['p_pimage'] ?>" data-zoom-image="<?= $products['p_pimage'] ?>" alt="big-1">
                        </a>
                    </div>

                    <div class="single-zoom-thumb">
                        <ul id="gallery_01">
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="<?= $products['p_img_thumbnail'] ?>" data-zoom-image="<?= $products['p_img_thumbnail'] ?>">
                                    <img src="<?= $products['p_img_thumbnail'] ?>" alt="zo-th-1" />
                                </a>

                            </li>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <form action="#">

                        <h1><?= $products['p_name'] ?></h1>
                        <div class="product_nav">
                        </div>
                        <div class=" product_ratting">
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="review"><a href="#"> (customer review ) </a></li>
                            </ul>

                        </div>
                        <div class="price_box">
                            <span class="current_price"><?= $products['p_price'] ?></span>
                            <span class="old_price"><?= $products['p_sale_price'] ?></span>
                            <span> Vnd</span>
                        </div>
                        <div class="product_meta">
                            <span>Loại điện thoại: <strong><?= $products['c_name'] ?></strong></span>
                        </div>
                        <div>
                            <span>thương hiệu: <strong><?= $products['au_name'] ?></strong> </span>
                        </div>
                        <br>
                        <div class="product_variant quantity">
                            <span>Số lượng trong kho: <?= $products['p_quantity'] ?> </span>
                        </div>
                        <div class="product_variant quantity">
                            <a class="button" href="<?= BASE_URL . '?act=cart-add&productID=' . $products['p_id'] . '&quantity=1' ?>">add to cart</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!--product details end-->

<!--product info start-->
<div class="product_d_info">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist" id="nav-tab">
                            <li>
                                <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Mô tả chi tiết</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <p><?= $products['p_description'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product info end-->

<!--product area start-->
<section class="product_area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2><span>Sản phẩm <strong>Tương tự</strong></span></h2>
                </div>
                <div class="product_carousel product_column5 owl-carousel">
                    <?php foreach ($product as $product) : ?>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="#"><?= $product['p_name'] ?></a></h3>
                                <!-- <p class="manufacture_product"><a href="#">Accessories</a></p> -->
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="<?= BASE_URL . '?act=product-detail&productID=' . $product['p_id'] ?>"><img src="<?= BASE_URL . $product['p_pimage'] ?>" alt=""></a>
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
                                        <a href="<?= BASE_URL . '?act=cart-add&productID=' . $product['p_id'] . '&quantity=1' ?>" title="add to cart"><span class="lnr lnr-cart"></span></a>
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
<!--product area end-->