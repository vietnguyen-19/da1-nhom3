<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35">Quản lý tài khoản</h3>

    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>
                     
                    </th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Password</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Type</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                 
                    <tr class="tr-shadow">
                    <td>
                        <label class="au-checkbox">
                            <input type="checkbox">
                            <span class="au-checkmark"></span>
                        </label>
                    </td>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['password'] ?></td>
                        <td><?= $user['address'] ?></td>
                        <td>
                            <span class="block-email"><?= $user['email'] ?></span>
                        </td>
                        <td><?= $user['phone'] ?></td>
                        <td>
                            <span class="status--process"><?= $user['type'] ?></span>
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </div>
                        </td>
                    </tr>


                <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>