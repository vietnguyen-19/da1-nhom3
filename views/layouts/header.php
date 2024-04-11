<?php
$categories = listAll('categories');
?>

<header class="header_area header_padding">
    <!--header top start-->
    <?php require_once PATH_VIEW . '/compoments/header/top-start.php' ?>
    <!--header top start-->

    <!--header middel start-->
    <?php require_once PATH_VIEW . '/compoments/header/middel-start.php' ?>
    <!--header middel end-->
    <!--header bottom satrt-->
    <div class="header_bottom bottom_four sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="main_menu header_position">
                        <nav>
                            <ul>
                                <li>
                                    <a href="?act=/">Trang chủ<i class="fa "></i></a>
                                </li>

                                <li>
                                    <a href="#">Điện thoại<i class="fa fa-angle-down"></i></a>

                                    <ul class="sub_menu">
                                        <?php foreach ($categories as $category) : ?>
                                            <li>
                                                <a href="<?= BASE_URL . '?act=showByCategory&categoryID=' .$category['id'] ?>">
                                                    <?= $category['name'] ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>

                                </li>
                                <li>
                                    <a href="?act=contact">Liên hệ </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>