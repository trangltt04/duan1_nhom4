<div>
    <section>
        <div class="bg-gray-100 py-8 w-full">
            <div class="container-content mx-auto px-4">
                <h1 class="text-2xl font-semibold mb-4">Đơn hàng Của Bạn</h1>
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="bg-[#3f3f3f]  lg:top-0  rounded-xl pb-3">
                        <div class="relative w-[700px]">
                            <div class="p-8 lg:overflow-auto ">
                                <h2 class="text-2xl font-bold text-white">Danh sách sản phẩm</h2>
                                <div class="space-y-6 mt-10">
                                    <?php
                                    if (is_array($gioHang)) {
                                        foreach ($gioHang as $key => $value) {
                                            echo '
                                <div class="grid sm:grid-cols-2 items-start gap-6">
                            <div class="px-4 py-6 shrink-0 bg-gray-50 rounded-md">
                                <img src="./uploads/' . $value['hinhAnh'] . '"
                                    class="" />
                            </div>

                            <div>
                                <h3 class="text-base text-white line-clamp-2">' . $value['ten'] . '</h3>
                                <ul class="text-xs text-white space-y-3 mt-4">
                                    <li class="flex flex-wrap gap-4">Loại: <span class="ml-auto">' . $value['loai_bia'] . '</span></li>
                                    <li class="flex flex-wrap gap-4">Số lượng <span class="ml-auto">' . $value['so_luong'] . '</span></li>
                                    <li class="flex flex-wrap gap-4">Tổng giá <span class="ml-auto ">' . number_format($value["Gia_tien_Pro_id"], 0, ".", ",") . ', đ</span></li>
                                </ul>
                            </div>
                        </div>
                                ';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-1/4">
                        <form action="index.php?act=updateDHcuatoi" method="post">
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h2 class="text-lg font-semibold mb-4">Mã đơn hàng : 
                                    <?php echo $list_order_cart_where_id["id"] ?>
                                </h2>
                                <span class="font-medium text-black">Họ tên:</span>
                                <?php echo $list_order_cart_where_id["name"] ?> <br>
                                <span class="font-medium text-black">Sdt:</span>
                                <?php echo $list_order_cart_where_id["phone"] ?> <br>
                                <span class="font-medium text-black">Email:</span>
                                <?php echo $list_order_cart_where_id["email"] ?> <br>
                                <span class="font-medium text-black">Địa chỉ:</span>
                                <?php echo $list_order_cart_where_id["adress"] ?> <br>
                                <span class="font-medium text-black">Ghi chú:</span>
                                <?php echo $list_order_cart_where_id["ghi_chu"] ?> <br>
                                <div class="flex justify-between mb-2">
                                    <span>Phương thức thanh toán</span>
                                    <span>
                                        <?php echo $list_order_cart_where_id["payment"] ?>
                                    </span>
                                </div>
                                <div class="flex justify-between mb-2">
                                    <span>Trạng thái</span>
                                    <?php
                                    $statusMessages = [
                                        1 => "Đơn hàng mới",
                                        2 => "Đang giao hàng",
                                        3 => "Đã giao hàng thành công",
                                        4 => "Giao hàng không thành công",
                                        5 => "Đơn hàng bị hủy"
                                    ];

                                    foreach ($statusMessages as $key => $value) {
                                        $selected = ($list_order_cart_where_id["status"] == $key) ? 'selected' : '';
                                        if ($selected) {
                                            echo '<span class="text-sm text-red-600 font-bold">' . $value . '</span><br>';
                                        }
                                    }
                                    ?>
                                </div>
                                <hr class="my-2">
                                <div class="flex justify-between mb-2 ">
                                    <span class="font-semibold">
                                        <h3>Tổng số tiền :
                                    </span>
                                    <span class=" text-sm text-red-600">
                                        <?php
                                        echo number_format($list_order_cart_where_id["tong_tien"], 0, ".", ",");
                                        ?> đ
                                    </span>
                                </div>
                                <input type="text" hidden value="<?php echo $list_order_cart_where_id['id'] ?>"
                                    name="id">
                                <!-- 
                                <input type="submit" name="submit" value="Hủy đơn hàng"
                                    class="bg-red-700 text-white py-2 px-4 rounded-lg mt-4 w-full"> -->
                                <?php
                                foreach ($statusMessages as $key => $value) {
                                    $selected = ($list_order_cart_where_id["status"] == $key) ? 'selected' : '';
                                    if ($selected) {
                                        if ($key == 1) {
                                            echo '<input type="submit" name="submit" onclick="return confirm(\'Bạn chắc chắn muốn hủy đơn hàng ?\')" value="Hủy đơn hàng" class="bg-red-700 text-white py-2 px-4 rounded-lg mt-4 w-full">';
                                        } else {
                                            echo '<span class="text-sm text-red-600 text-center">Không thể hủy đơn hàng.</span>';
                                        }
                                    }
                                }
                                ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>