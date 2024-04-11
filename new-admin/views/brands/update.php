<div class="main-content">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">

            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['errors'])) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($_SESSION['errors'] as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php unset($_SESSION['errors']); ?>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Tên nhãn hàng:</label>
                            <input type="text" class="form-control" id="name" value="<?= $brands['name'] ?>" placeholder="Enter name" name="name">
                        </div>
                        <div class="mb-3 mt-3">
                        <label for="image" class="form-label">Hình ảnh:</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <img src="<?= BASE_URL . $brands['image'] ?>" alt="" width="100px">
                    </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= BASE_URL_NEW_ADMIN ?>?act=brands" class="btn btn-danger">Back to list</a>
            </form>
        </div>
    </div>
</div>