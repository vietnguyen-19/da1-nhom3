<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="?act=/">
            <img src="../asets/admin/images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="?act=/">
                        <i class="fas fa-home"></i>Trang chủ</a>

                </li>
                <li class="list-unstyled navbar__list">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-shopping-cart"></i>Sản phẩm</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?= BASE_URL_NEW_ADMIN ?>?act=product">Danh sách</a>
                        </li>
                        <li>
                            <a href="#">Loại sản phẩm</a>
                        </li>
                        <li>
                            <a href="#">Nhãn hàng</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=users">
                        <i class="far fa-user"></i>Tài khoản</a>
                </li>
                <li>
                    <a href="#">
                        <i class="far fa-check-square"></i>Đơn hàng</a>
                </li>
                <li>
                    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=setting-form">
                        <i class="fa fa-gear"></i>Cài Đặt</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->