<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35">Thêm  tài khoản</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>" placeholder="Enter name" name="name">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['email'] : null ?>" placeholder="Enter email" name="email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['address'] : null ?>" placeholder="Enter address" name="address">
                </div>
                <div class="mb-3 mt-3">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="number" class="form-control" id="phone" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['phone'] : null ?>" placeholder="Enter phone" name="phone">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['password'] : null ?>" placeholder="Enter password" name="password">
                </div>
                <div class="mb-3 mt-3">
                    <label for="type" class="form-label">Type:</label>
                    <select name="type" id="type" class="form-control">
                        <option <?= isset($_SESSION['data']) && $_SESSION['data']['type'] == 1 ? 'selected' : null ?> value="1">Admin</option>
                        <option <?= isset($_SESSION['data']) && $_SESSION['data']['type'] == 0 ? 'selected' : null ?> value="0">Member</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="<?= BASE_URL_ADMIN ?>?act=users" class="btn btn-danger">Back to list</a>
    </form>

    
    <!-- END DATA TABLE -->
</div>