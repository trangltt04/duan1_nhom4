<div>
    <section>
        <div class="bg-gray-100 py-8 w-full">
            <div class="container-content mx-auto px-4">
                <h1 class="text-2xl font-semibold mb-4">Giỏ Hàng Của Bạn</h1>
                <?php if (!empty($gioHang)): ?>
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:w-3/4">
                            <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                                <table class="w-full">
                                    <thead>
                                        <tr>
                                            <th class="text-left font-semibold">Sản phẩm</th>
                                            <th class="text-left font-semibold">Giá</th>
                                            <th class="text-left font-semibold">Số lượng</th>
                                            <th class="text-left font-semibold">Thành tiền</th>
                                            <th class="text-left font-semibold ">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // print_r($gioHang);
                                        // die;
                                        foreach ($gioHang as $key => $value) {
                                            $hinh = "./uploads/" . $value['hinhAnh'];
                                            echo '      <tr>
                                                 <td class="py-4">
                                                     <div class="flex items-center">
                                                         <img class="h-16 w-16 mr-4" src="' . $hinh . '"
                                                             alt="Product image">
                                                             <div class="flex flex-col">
                                                         <span class="font-medium text-[14px] w-[200px] line-clamp-2">' . $value['ten'] . '</span> 
                                                        <p class="mt-1 text-[#929292] text-sm leading-4">' . $value['loai_bia'] . '</p>
                                                        </div>
                                                     </div>
                                                 </td>
                                                 <td class="py-4">' . number_format(floatval($value['gia']), 0, ".", ",") . '</td>
                                                 <td class="py-4">
                                                    <div class="flex items-center">
                                                        <button class="border rounded-md py-2 px-4 mr-2 decrease-quantity">-</button>
                                                        <span class="text-center w-8 quantity">' . $value['so_luong'] . '</span>
                                                     <button class="border rounded-md py-2 px-4 ml-2 increase-quantity">+</button>
                                             </div>
                                                 </td>
                                                 <td class="py-4">' . number_format(floatval($value['thanhtien']), 0, ".", ",") . '</td>
                                                 <td class="py-4"><a href="index.php?act=deleteGioHang&id=' . $value['id'] . '" onclick="return confirm(\'Bạn muốn xóa ?\')"><input type="button" value="Xóa"  class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"></a></td>
                                                </tr> ';
                                        }
                                        ?>
                                        <!-- More product rows -->
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="md:w-1/4">
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <!-- <hr class="my-2"> -->
                                <div class="flex justify-between mb-2">
                                    <span class="font-semibold">
                                        <h3>Tổng số tiền :
                                    </span>
                                    <span class="font-semibold">
                                        <?php
                                        echo number_format(floatval($tongGia['tong']), 0, ".", ",");
                                        ?>
                                    </span>
                                </div>
                                <form action="index.php?act=thanh_toan" method="post">
                                    <input type="submit" value="THANH TOÁN"
                                        class="bg-red-700 text-white py-2 px-4 rounded-lg mt-4 w-full">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div>
                        <p class="py-4 px-5 text-[#85640] rounded-lg mb-4 bg-[#fff3cd] border border-[#ffeeba] w-full">
                            <a href="index.php?act=sach">Giỏ hàng trống, bấm vào đây tiếp tuc mua sắm.</a>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>


<script>
    const decreaseButtons = document.querySelectorAll('.decrease-quantity');
    const increaseButtons = document.querySelectorAll('.increase-quantity');

    decreaseButtons.forEach(button => {
        button.addEventListener('click', () => {
            const quantityElement = button.nextElementSibling;
            let quantity = parseInt(quantityElement.textContent);
            if (quantity > 0) {
                quantity--;
                quantityElement.textContent = quantity;
            }
        });
    });

    increaseButtons.forEach(button => {
        button.addEventListener('click', () => {
            const quantityElement = button.previousElementSibling;
            let quantity = parseInt(quantityElement.textContent);
            quantity++;
            quantityElement.textContent = quantity;
        });
    });
</script>