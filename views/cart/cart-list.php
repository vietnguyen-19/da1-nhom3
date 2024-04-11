<div class="shopping_cart_area mt-32">
    <div class="container">
        <?php if(empty($_SESSION['cart'])){ ?>
            <h2>bạn chưa thêm sản phẩm nào vào giỏ hàng!!</h2>
            <div class="cart_submit">
            <a href="<?= BASE_URL . '?act=/' ?>">
                <button type="submit">Mua hàng</button>
            </a>
        </div>
        <?php }else{ ?>
            <form action="#">
            <div class="row">
                <h2>Danh sách giỏ hàng</h2>
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">Xóa</th>
                                        <th class="product_thumb">Hình ảnh</th>
                                        <th class="product_name">Tên sản phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product_quantity">Số lượng</th>
                                        <th class="product_total">Thành tiền</th>
                                    </tr>
                                </thead>
            
                                <tbody>
                                    <?php
                                    if (!empty($_SESSION['cart'])) :
                                        foreach ($_SESSION['cart'] as $item) : ?>
                                            <tr>
                                                <td class="product_remove">
                                                    <a href="<?= BASE_URL . '?act=cart-del&productID=' . $item['p_id'] ?>" onclick="return confirm('có chắc xóa không')"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                                <td class="product_thumb">
                                                    <img src="<?= BASE_URL . $item['p_pimage'] ?>" alt="">
                                                </td>
                                                <td class="product_name">
                                                    <?= $item['p_name'] ?>
                                                </td>
                                                <td class="product-price">
                                                    <?= number_format($item['p_sale_price'] ?: $item['p_price']) ?>
                                                </td>

                                                <td class="product_quantity">
                                                    <a href="<?= BASE_URL . '?act=cart-dec&productID=' . $item['p_id'] ?>" class="btn">-</a>
                                                    <span class="btn "><?= $item['quantity'] ?></span>
                                                    <a href="<?= BASE_URL . '?act=cart-inc&productID=' . $item['p_id'] ?>" class="btn">+</a>
                                                </td>
                                                <td class="product_total">
                                                    <?php
                                                    $total = ($item['p_sale_price'] ?: $item['p_price']) * $item['quantity'];

                                                    echo number_format($total);
                                                    ?>
                                                </td>
                                            </tr>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="cart_submit">
            <a href="<?= BASE_URL . '?act=order-checkout' ?>">
                <button type="submit">Thanh toán</button>
            </a>
        </div>
        <?php } ?>

    </div>
</div>