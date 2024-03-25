<!-- main content dashborad -->
    <div class="main-content">
        <!-- WELCOME-->
        <section class="welcome p-t-10">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">Welcome !</h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>
        <!-- END WELCOME-->

        <!-- STATISTIC-->
        <section class="statistic statistic2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="statistic__item statistic__item--green">
                            <h2 class="number">
                                <?php
                                    $users = listAll('users');
                                    echo count($users);
                                ?>
                            </h2>
                            <span class="desc">Người dùng</span>
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="statistic__item statistic__item--orange">
                            <h2 class="number">
                                <?php
                                    $products = listAll('products');
                                    echo count($products);
                                ?>
                            </h2>
                            <span class="desc">Sản phẩm</span>
                            <div class="icon">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="statistic__item statistic__item--red">
                            <h2 class="number">
                                <?php
                                    $oders = listAll('oders');
                                    echo count($oders);
                                ?>
                            </h2>
                            <span class="desc">Đơn hàng</span>
                            <div class="icon">
                                <i class="zmdi zmdi-money"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END STATISTIC-->

        <!-- STATISTIC CHART-->
        <section class="statistic-chart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">Thống Kê</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <!-- CHART-->
                        <div class="statistic-chart-1">
                            <h3 class="title-3 m-b-30">Người truy cập</h3>
                            <div class="chart-wrap">
                                <canvas id="widgetChart5"></canvas>
                            </div>
                            <div class="statistic-chart-1-note">
                                <span class="big">10,368</span>
                                <span>/ <?php
                                    $users = listAll('users');
                                    echo count($users);
                                ?> người dùng</span>
                            </div>
                        </div>
                        <!-- END CHART-->
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <!-- TOP CAMPAIGN-->
                        <div class="top-campaign">
                            <h3 class="title-3 m-b-30">Top bán chạy</h3>
                            <div class="table-responsive">
                                <table class="table table-top-campaign">
                                    <tbody>
                                        <tr>
                                            <td>1. Australia</td>
                                            <td>$70,261.65</td>
                                        </tr>
                                        <tr>
                                            <td>2. United Kingdom</td>
                                            <td>$46,399.22</td>
                                        </tr>
                                        <tr>
                                            <td>3. Turkey</td>
                                            <td>$35,364.90</td>
                                        </tr>
                                        <tr>
                                            <td>4. Germany</td>
                                            <td>$20,366.96</td>
                                        </tr>
                                        <tr>
                                            <td>5. France</td>
                                            <td>$10,366.96</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END TOP CAMPAIGN-->
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <!-- CHART PERCENT-->
                        <div class="chart-percent-2">
                            <h3 class="title-3 m-b-30">Thống kê %</h3>
                            <div class="chart-wrap">
                                <canvas id="percent-chart2"></canvas>
                                <div id="chartjs-tooltip">
                                    <table></table>
                                </div>
                            </div>
                            <div class="chart-info">
                                <div class="chart-note">
                                    <span class="dot dot--blue"></span>
                                    <span>products</span>
                                </div>
                                <div class="chart-note">
                                    <span class="dot dot--red"></span>
                                    <span>Services</span>
                                </div>
                            </div>
                        </div>
                        <!-- END CHART PERCENT-->
                    </div>
                </div>
            </div>
        </section>
        <!-- END STATISTIC CHART-->

    </div>

