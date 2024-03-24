<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?= $title ?? 'DashBoard' ?> - Admin</title>

    <!-- Fontfaces CSS-->
    <link href="../asets/admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="../asets/admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../asets/admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../asets/admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../asets/admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../asets/admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../asets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../asets/admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../asets/admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../asets/admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../asets/admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../asets/admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../asets/admin/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <?php
        require_once PATH_VIEW_NEW_ADMIN . 'layouts\sidebar.php';
        ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php
            require_once PATH_VIEW_NEW_ADMIN . "layouts\header.php";
            ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <?php
            require_once PATH_VIEW_NEW_ADMIN . $views . '.php';
            // require_once PATH_VIEW_NEW_ADMIN .'users/index.php';
            ?>
            <!-- END MAIN CONTENT-->
        </div>
        <!-- FOOTER DESKOP -->
        <?php
        require_once PATH_VIEW_NEW_ADMIN . 'layouts/footer.php';
        ?>
        <!-- END FOOTER DESKOP -->
        <!-- END PAGE CONTAINER-->
    </div>

    <!-- Jquery JS-->
    <script src="../asets/admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../asets/admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../asets/admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../asets/admin/vendor/slick/slick.min.js">
    </script>
    <script src="../asets/admin/vendor/wow/wow.min.js"></script>
    <script src="../asets/admin/vendor/animsition/animsition.min.js"></script>
    <script src="../asets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../asets/admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../asets/admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../asets/admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../asets/admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../asets/admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../asets/admin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../asets/admin/js/main.js"></script>

</body>

</html>
<!-- end document-->
