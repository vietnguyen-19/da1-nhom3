<!-- customer login start -->
<div class="customer_login mt-32">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-12 col-md-6">
                <div class="account_form">
                    <h2>register</h2>
                    <?php if (isset($_SESSION['success'])) : ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['success'] ?>
                        </div>
                        <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['errors'])) : ?>
                        <div class="alert alert-danger">
                            <ul>
                                <li>
                                    <?= $_SESSION['errors'] ?>
                                </li>
                            </ul>
                        </div>
                        <?php unset($_SESSION['errors']) ?>
                    <?php endif; ?>

                    <form action="#" method="post">
                        <p>
                            <label>Tên người dùng <span>*</span></label>
                            <input type="text" class="form-control" id="name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>" placeholder="Enter name" name="name" autocomplete="name">
                        </p>
                        <p>
                            <label>Email <span>*</span></label>
                            <input type="email" class="form-control" id="email" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['email'] : null ?>" placeholder="Enter email" name="email" autocomplete="username">
                        </p>
                        <p>
                            <label>Mật khẩu <span>*</span></label>
                            <input type="password" class="form-control" id="password" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['password'] : null ?>" placeholder="Enter password" name="password" autocomplete="current-password">
                        </p>

                        <p>
                            <label>SĐT <span>*</span></label>
                            <input type="number" class="form-control" id="phone" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['phone'] : null ?>" placeholder="Enter phone" name="phone">
                        </p>
                        <p>
                            <label>Địa chỉ <span>*</span></label>
                            <input type="text" class="form-control" id="address" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['address'] : null ?>" placeholder="Enter address" name="address">
                        </p>
                        <p style="gap: 20px;">Bạn đã có tài khoản<a style="color: blue;  text-decoration: underline;" href="<?= BASE_URL.'?act=login' ?>">Đăng Nhập Ngay</a> </p>
                        <div class="login_submit">
                            <button type="submit">Đăng ký</button>

                        </div>
                </div>

                </form>
            </div>
        </div>
        <!--login area start-->

    </div>
</div>
</div>
<!-- customer login end -->