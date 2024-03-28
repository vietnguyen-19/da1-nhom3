<!-- account-wap -->
<div class="account-wrap">
    <div class="account-item clearfix js-item-menu">
        <div class="image">
            <img src="../asets/admin/images/icon/avatar-01.jpg" alt="John Doe" />
        </div>
        <div class="content">
            <a class="js-acc-btn" href="#"><?= $_SESSION['admin_name'] ?></a>
        </div>
        <div class="account-dropdown js-dropdown">
            <div class="info clearfix">
                <div class="image">
                    <a href="#">
                        <img src="../asets/admin/images/icon/avatar-01.jpg" alt="John Doe" />
                    </a>
                </div>
                <div class="content">
                    <h5 class="name">
                        <a href="#"><?= $_SESSION['admin_name'] ?></a>
                    </h5>
                    <span class="email"><?= $_SESSION['admin_email'] ?></span>
                </div>
            </div>
            <div class="account-dropdown__footer">
                <a href="?act=logout-admin">
                    <i class="zmdi zmdi-power"></i>Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- end account-wap -->