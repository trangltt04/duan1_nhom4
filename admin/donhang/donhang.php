<div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700">
                <div class="py-3 px-4">
                    <div class="flex justify-between items-center">
                        <form class="w-[500px]" action="index.php?act=order" method="post">
                            <div class="relative ">
                                <input type="search" id="search-dropdown"
                                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500   "
                                    placeholder="Nhập mã đơn hàng" name="search_id_DH" />

                                <button type="submit" name="submit"
                                    class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  ">
                                    <!-- icon search -->
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <span class="sr-only">Search</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Mã đơn hàng</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Sản phẩm</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Đại chỉ</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Thời gian</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Trạng thái</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Phương thức <br> thanh toán </th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                    Tổng tiền</th>
                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-white uppercase">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php
                            // echo '<pre>';
                            // print_r($list_order_cart);
                            // die;
                            foreach ($list_order_cart as $key => $value) {
                                $gioHang = select_gio_hang_item_thanhtoan_where_id($value['id']);
                                // echo "<pre>";
                                // var_dump($gioHang);
                                // die;
                                // Kiểm tra mảng $gioHang có phần tử hay không
                                if (!empty($gioHang)) {
                                    // echo "<pre>";
                                    // var_dump($gioHang);
                                    // die;
                                    $status = $value["status"];
                                    $statusMessages = [
                                        1 => "Đơn hàng mới",
                                        2 => "Đang giao hàng",
                                        3 => "Đã giao hàng thành công",
                                        4 => "Giao hàng không thành công",
                                        5 => "Đơn hàng bị hủy"
                                    ];
                                    echo '
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap font-bold text-sm text-red-600">' . $value["id"] . '</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                    <div class="flex items-center">
                                                        <img class="h-16 w-16 mr-4"
                                                            src="../uploads/' . $gioHang[0]["hinhAnh"] . '"
                                                            alt="Product image">
                                                        <div class="flex flex-col">
                                                            <span class="font-medium text-[14px] w-[200px] line-clamp-1">' . $gioHang[0]["ten"] . '</span>
                                                            <p class="mt-1 text-[#929292] text-sm leading-4">' . $gioHang[0]["loai_bia"] . '</p>
                                                            <p class="mt-1 text-[#929292] text-sm leading-4"><span
                                                                    class="font-medium text-black">Số lượng: </span>' . $gioHang[0]["so_luong"] . '</p>
                                                            <a href="index.php?act=ChiTietDonHang&id=' . $value["id"] . '" class="mt-1 font-medium text-blue-600">Xem thêm</a>
                                                        </div>
                                                    </div>
                                                </td>
                                
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                    <span class="font-medium text-black">Họ tên:</span> ' . $value["name"] . ' <br>
                                                    <span class="font-medium text-black">Sdt:</span> ' . $value["phone"] . ' <br>
                                                    <!-- <span class="font-medium text-black">Email:</span> ' . $value["email"] . ' <br> -->
                                                    <span class="font-medium text-black">Địa chỉ:</span> ' . $value["adress"] . ' <br>
                                                    <span class="font-medium text-black line-clamp-2">Ghi chú:</span> ' . $value["ghi_chu"] . '<br>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">' . $value["created_at"] . '</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">' . ($statusMessages[$status] ?? "Trạng thái không hợp lệ") . '</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">' . $value["payment"] . '</td>
                                                <td class="px-6 py-4 whitespace-nowrap font-bold text-sm text-red-600">' . number_format(floatval($value["tong_tien"]), 0, ".", ",") . 'đ</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                    <a href="index.php?act=ChiTietDonHang&id=' . $value["id"] . '"
                                                        class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Cập nhật</a>
                                                </td>
                                            </tr>
                                        ';
                                }
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>