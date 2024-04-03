<!-- customer login start -->
<div class="customer_login mt-32">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-12 col-md-6">
                <div class="account_form">
                    <h2>login</h2>

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
                            <label>Email <span>*</span></label>
                            <input type="text" class="form-control" placeholder="Nhập email" name="email">
                        </p>
                        <p>
                            <label>Mật khẩu <span>*</span></label>
                            <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password">
                        </p>
                        <div class="login_submit">
                            <button type="submit">Đăng nhập</button>

                        </div>

                    </form>
                </div>
            </div>
            <!--login area start-->

        </div>
    </div>
</div>
<!-- customer login end -->