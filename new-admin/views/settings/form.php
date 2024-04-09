<div class="main-content">
    <h3 class="title-5 m-b-35"><?= $title ?></h3>
    <form action="<?= BASE_URL_NEW_ADMIN . '?act=setting-save' ?>" method="POST">
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['success'] ?>
            </div>
            <?php unset($_SESSION['success']) ?>
        <?php endif; ?>

        <table class="table">

            <tr>
                <th>Trường dữ liệu</th>
                <th>Dữ liệu</th>
            </tr>
            <?php foreach($settings as $keys => $values) :
                ?>
                <tr>
                    <td>
                        <?= $keys ?>
                    </td>
                    <td>
                    <input type="text" name="<?= $keys ?>" class="form-label form-control" value="<?= $values ?? null ?>">
                </td>
                </tr>

            <?php endforeach; ?>

        </table>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="<?= BASE_URL_NEW_ADMIN ?>?act=/" class="btn btn-danger">Trở lại </a>
    </form>

</div>