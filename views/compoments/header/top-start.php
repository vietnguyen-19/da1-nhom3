<?php
$settings = settingPluckKeyValue();
?>
<div class="header_top">
            <div class="container">
                <div class="top_inner">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="follow_us">
                                <label>Follow Us:</label>
                                <ul class="follow_link">
                                    <li><a href=""><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                    <li><a href=""><i class="ion-social-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="top_right text-end">
                                <ul>
                                    <li class="top_links"><a href="#"><i class="ion-android-person"></i>
                                    <?php if(isset($_SESSION['cilent'])){ ?>
                                        <?= $_SESSION['cilent_name'] ?><i class="ion-ios-arrow-down"></i></a>
                                        <ul class="dropdown_links">
                                            <li><a href="?act=logout">Đăng xuất </a></li>
                                            <li><a href="?act=order-list">Đơn hàng</a></li>
                                            <li><a href="<?= BASE_URL_NEW_ADMIN . '?act=login-admin' ?>">Admin</a></li>
                                        </ul>
                                    <?php }else{ ?>
                                        <a href="<?= BASE_URL . '?act=login' ?>"> Đăng nhập</a>
                                    <?php }; ?>
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>