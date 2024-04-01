<div class="main-content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Trường dữ liệu</th>
                        <th>Dữ liệu</th>
                    </tr>

                    <?php if (is_array($brands)) : ?>
                        <?php foreach ($brands as $fileName => $value) :
                            $showName = isset($fileNameShow[$fileName]) ? $fileNameShow[$fileName] : ucfirst($fileName);
                        ?>
                            <tr>
                                <td><?= $showName ?></td>
                                <td>
                                    <?php
                                        switch ($fileName){
                                            case 'id':
                                                echo $value;
                                                break;
                                            case 'name':
                                                echo $value;
                                                break;
                                            case 'image':
                                                echo '<img src="'.  BASE_URL . $value . '" width= "200px">';
                                                break;
                                            
                                        }
                                    ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </table>
                    <a href="<?= BASE_URL_NEW_ADMIN ?>?act=brands" class="btn btn-danger">Danh sách</a>
            </div>
        </div>
    </div>

</div>