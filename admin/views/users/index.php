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
                <tr class="spacer"></tr>
                <tr class="tr-shadow">
                    <td>
                        <label class="au-checkbox">
                            <input type="checkbox">
                            <span class="au-checkmark"></span>
                        </label>
                    </td>
                    <td>Lori Lynch</td>
                    <td>
                        <span class="block-email">john@example.com</span>
                    </td>
                    <td class="desc">iPhone X 64Gb Grey</td>
                    <td>2018-09-29 05:57</td>
                    <td>
                        <span class="status--process">Processed</span>
                    </td>
                    <td>$999.00</td>
                    <td>
                        <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                <i class="zmdi zmdi-mail-send"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                <i class="zmdi zmdi-more"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="spacer"></tr>
                <tr class="tr-shadow">
                    <td>
                        <label class="au-checkbox">
                            <input type="checkbox">
                            <span class="au-checkmark"></span>
                        </label>
                    </td>
                    <td>Lori Lynch</td>
                    <td>
                        <span class="block-email">lyn@example.com</span>
                    </td>
                    <td class="desc">iPhone X 256Gb Black</td>
                    <td>2018-09-25 19:03</td>
                    <td>
                        <span class="status--denied">Denied</span>
                    </td>
                    <td>$1199.00</td>
                    <td>
                        <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                <i class="zmdi zmdi-mail-send"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                <i class="zmdi zmdi-more"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="spacer"></tr>
                <tr class="tr-shadow">
                    <td>
                        <label class="au-checkbox">
                            <input type="checkbox">
                            <span class="au-checkmark"></span>
                        </label>
                    </td>
                    <td>Lori Lynch</td>
                    <td>
                        <span class="block-email">doe@example.com</span>
                    </td>
                    <td class="desc">Camera C430W 4k</td>
                    <td>2018-09-24 19:10</td>
                    <td>
                        <span class="status--process">Processed</span>
                    </td>
                    <td>$699.00</td>
                    <td>
                        <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                <i class="zmdi zmdi-mail-send"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                <i class="zmdi zmdi-more"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>