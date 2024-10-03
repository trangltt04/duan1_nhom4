<div class=" bg-gray-50">
    <div class="container-content grid lg:grid-cols-2 xl:grid-cols-3 gap-4 h-full">
        <?php if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
            extract($_SESSION['user']);
        }
        // var_dump($_SESSION['user']);
        // die;
        ?>
        <div class="bg-[#3f3f3f] lg:h-screen lg:sticky lg:top-0  rounded-xl">
            <div class="relative h-full">
                <div class="p-8 lg:overflow-auto lg:h-[calc(100vh-60px)]">
                    <h2 class="text-2xl font-bold text-white">Danh sách sản phẩm</h2>
                    <div class="space-y-6 mt-10">
                        <?php
                        if (is_array($gioHang)) {
                            foreach ($gioHang as $key => $value) {
                                echo '
                                <div class="grid sm:grid-cols-2 items-start gap-6">
                            <div class="px-4 py-6 shrink-0 bg-gray-50 rounded-md">
                                <img src="./uploads/' . $value['hinhAnh'] . '"
                                    class="w-full object-contain" />
                            </div>

                            <div>
                                <h3 class="text-base text-white line-clamp-2">' . $value['ten'] . '</h3>
                                <ul class="text-xs text-white space-y-3 mt-4">
                                    <li class="flex flex-wrap gap-4">Loại: <span class="ml-auto">' . $value['loai_bia'] . '</span></li>
                                    <li class="flex flex-wrap gap-4">Số lượng <span class="ml-auto">' . $value['so_luong'] . '</span></li>
                                    <li class="flex flex-wrap gap-4">Tổng giá <span class="ml-auto">' . number_format($value["thanhtien"], 0, ".", ",") . ' đ</span></li>
                                </ul>
                            </div>
                        </div>
                                ';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="absolute left-0 bottom-0 bg-[#444] w-full p-4">
                    <h4 class="flex flex-wrap gap-4 text-base text-white">Tổng cộng <span class="ml-auto">
                            <?php
                            echo number_format($tongGia['tong'], 0, ".", ",");
                            ?> đ
                        </span></h4>
                </div>
            </div>
        </div>
        <div class="xl:col-span-2 h-max rounded-md p-8 sticky top-0">
            <h2 class="text-2xl font-bold text-[#333]">Hoàn tất đơn đặt hàng của bạn</h2>
            <form class="mt-10" action="index.php?act=thanh_toan" method="post">
                <div>
                    <h3 class="text-lg font-bold text-[#333] mb-6">Thông tin cá nhân</h3>
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div class="relative flex flex-col">
                            <label for="">Tên của bạn</label>
                            <input type="text" required placeholder="Name" name="name" value="<?= $name ?>"
                                class="px-4 py-3.5 bg-white text-[#333] w-full text-sm border-b-2 focus:border-[#333] outline-none" />

                        </div>
                        <div class="relative flex flex-col">
                            <label for="">Số Điện thoại</label>
                            <input type="number" placeholder="Số Điện thoại" required name="phone" value="<?= $phone ?>"
                                class="px-4 py-3.5 bg-white text-[#333] w-full text-sm border-b-2 focus:border-[#333] outline-none" />
                        </div>
                        <div class="relative flex flex-col">
                            <label for="">Email</label>
                            <input type="email" placeholder="Email" required name="email" value="<?= $email ?>"
                                class="px-4 py-3.5 bg-white text-[#333] w-full text-sm border-b-2 focus:border-[#333] outline-none" />
                        </div>
                        <div class="relative flex flex-col">
                            <label for="">Địa chỉ</label>
                            <input type="text" required placeholder="Địa chỉ" name="dia_chi" value="<?= $dia_chi ?>"
                                class="px-4 py-3.5 bg-white text-[#333] w-full text-sm border-b-2 focus:border-[#333] outline-none" />

                        </div>
                    </div>

                    <label for="message" class="mt-6 block mb-2 text-sm font-medium text-gray-900 ">Ghi chú</label>
                    <textarea id="message" rows="4" name="ghi_chu"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Ghi chú đơn hàng..."></textarea>

                </div>

                <div class="mt-6">
                    <!-- <h3 class="text-lg font-bold text-[#333] mb-6">Phương thưc thanh toán</h3>
                    <div>
                        <input type="radio" name="payment_method" checked id="COD" value="COD">
                        <label for="cod">Thanh toán khi giao hàng (COD)</label> <br>
                        <input type="radio" name="payment_method" id="VNPay" value="VNPay">
                        <label for="vnpay">Chuyển khoản qua ngân hàng qua VNPay</label>
                    </div> -->
                    <div class="w-full p-4">
                        <h4 class="flex gap-4 text-base ">Tổng cộng :
                            <span class="text-red-500 font-bold">
                                <?php
                                echo number_format($tongGia['tong'], 0, ".", ",");
                                ?> đ
                            </span>
                        </h4>
                    </div>
                    <div class="flex gap-6 max-sm:flex-col mt-10">
                        <!-- <input type="submit" name="exit" value="Hủy bỏ"
                            class="rounded-md px-6 py-3 w-full text-sm font-semibold bg-transparent hover:bg-gray-100 border-2 border-[#C92127] text-[#C92127]"> -->
                        <input type="submit" name="muahang" value="COD"
                            class="rounded-md px-6 py-3 w-full text-sm font-semibold bg-[#C92127] text-white hover:bg-[#dd292f]">
                        <!-- <input type="submit" name="redirect" value="VNPay"
                            class="rounded-md px-6 py-3 w-full text-sm font-semibold bg-[#C92127] text-white hover:bg-[#dd292f]"> -->
                    </div>
                    <div class="flex gap-6 max-sm:flex-col mt-10">

                        <!-- <input type="submit" name="payUrl" value="MoMO"
                            class="rounded-md px-6 py-3 w-full text-sm font-semibold bg-[#C92127] text-white hover:bg-[#dd292f]"> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>