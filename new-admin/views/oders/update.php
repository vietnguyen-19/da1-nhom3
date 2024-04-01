<div class="main-content">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35"> <?= $name ?> </h3>
        
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['success'] ?>
            </div>
            <?php unset($_SESSION['success']) ?>
            
        <?php endif; ?>

        <?php if (isset($_SESSION['errors'])) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($_SESSION['errors'] as $error) : ?>
                        <li> <?= $error ?> </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php unset($_SESSION['errors']) ?>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="row">
            <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="first_name" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="first_name" value="<?= $oder['first_name'] ?>" placeholder="Enter firstname" name="first_name">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="last_name" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" value="<?= $oder['last_name'] ?>" placeholder="Enter lastname" name="last_name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" value="<?= $oder['address'] ?>" placeholder="Enter address" name="address">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="number" class="form-control" id="phone" value="<?= $oder['phone'] ?>" placeholder="Enter phone" name="phone">
                    </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" value="<?= $oder['email'] ?>" placeholder="Enter email" name="email">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="paymethod" class="form-label">paymethod:</label>
                        <select name="paymethod" id="paymethod" class="form-control">
                            <option <?= $oder['paymethod'] == 1 ? 'selected' : null ?> value="1">cash</option>
                            <option <?= $oder['paymethod'] == 0 ? 'selected' : null?> value="0">electronic wallet</option>
                        </select>
                    </div>

                </div>
                <div class="col-md-6">
                <div class="mb-3 mt-3">
                        <label for="note" class="form-label">note:</label>
                        <input type="text" class="form-control" id="note" value="<?= $oder['note'] ?>"  placeholder="Enter note" name="note">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="total_price" class="form-label">total price:</label>
                        <input type="number" class="form-control" id="total_price" value="<?= $oder['total_price'] ?>"  placeholder="Enter total_price" name="total_price">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="<?= BASE_URL_NEW_ADMIN ?>?act=oders" class="btn btn-danger">Danh sách</a>

        </form>


        <!-- END DATA TABLE -->
    </div>
</div>