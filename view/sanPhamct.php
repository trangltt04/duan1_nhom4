<!-- product -->
<div class="bg-gray-100 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <form action="index.php?act=add_to_card" method="post" class="flex md:flex-row -mx-4">
                <div class="px-4">
                    <div class="h-[460px] w-[428px] rounded-lg hover:shadow-md mb-4 flex justify-center items-center">
                        <img class="max-h-[460px] max-w-[428px] object-cover"
                            src="./uploads/<?php echo $sanPhamCt["img"]; ?>" alt="Product Image">
                        <input type="hidden" name="hinhAnh" value="./uploads/<?php echo $sanPhamCt["img"]; ?>">
                    </div>
                    <div class="flex justify-center items-center mx-2 mb-4">
                        <div class="w-full px-2">
                            <input type="submit" name="submit" value="Thêm vào giỏ hàng"
                                class="text-center w-[200px] rounded-xl text-sm text-[#C92127] font-bold border-2 border-solid border-[#C92127] leading-5 bg-white py-3 px-4">
                        </div>
                    </div>
                </div>
                <div class="md:flex-1 px-4">

                    <!-- <h2 class="text-2xl font-bold text-gray-800  mb-2">Tên sách</h2> -->
                    <h2 class=" font-bold mb-4 text-red-600">

                        <?php echo '<input type="hidden" name="id" value="' . $sanPhamCt["id"] . '" readonly >';
                        echo $sanPhamCt["ten"]; ?>
                    </h2>
                    <div class="flex mb-4">
                        <?php
                        if (!empty($list_tacgia_sach_spct)) {
                            echo ' <div class="mr-4">';
                            echo '<span class="text-gray-700">Tác giả:</span>';
                            echo '<span class="text-gray-600 font-bold">';
                            foreach ($list_tacgia_sach_spct as $key => $value) {
                                echo $value["tac_gia_name"], " ,";
                            }
                            echo '</div>';
                            echo '</span>';
                        } else {
                            // Ẩn div tác giả
                        } ?>
                        <div>
                            <span class=" text-gray-700 ">Nhà xuất bản:</span>
                            <span class="text-gray-600 font-bold">
                                <?php echo $sanPhamCt["nha_san_xua_name"]; ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <div class="mr-4">
                            <span class=" text-gray-700 ">Danh mục:</span>
                            <span class="text-gray-600 font-bold">
                                <?php echo $sanPhamCt["danh_muc_name"]; ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex mb-4 items-center">
                        <div class="mr-4">
                            <?php echo '<input type="hidden"  value="' . number_format(floatval($sanPhamCt["gia"]), 0, ".", ",") . '" readonly > 
                            
                         <input class="text" hidden value="' . $sanPhamCt["gia"] . '" id="gia_bien_the"  name="gia"
                            onchange="myFunction()"></input>
                        <span class="text-[#FF0000] text-[24px] font-bold no-underline" name="gia_sau_bien_the" id="gia_sau_bien_the">
                            ' . number_format(floatval($sanPhamCt["gia"]), 0, ".", ",") . ' đ
                        </span> '; ?>

                        </div>
                        <?php
                        if ($sanPhamCt["gia_sale"] && trim($sanPhamCt["gia_sale"]) !== '') {
                            echo '<div>  
                        <del class="mt-1 text-[#929292] text-sm leading-4 text-left">' . number_format(floatval($sanPhamCt["gia_sale"]), 0, ".", ",") . ' đ</del>
                    </div>';
                        }
                        ?>
                    </div>
                    <?php if (!empty($bien_the_bia)): ?>
                        <div class="mb-4">
                            <span class="font-bold text-gray-700">Loại Hàng:</span>
                            <div class="flex items-center mt-2">
                                <div>
                                    <?php foreach ($bien_the_bia as $Check): ?>
                                        <?php extract($Check); ?>
                                        <label>
                                            <input type="radio" name="loai_bia"
                                                value="<?php echo $Check['muc_tang'] . ',' . $Check['loai_bia']; ?>"
                                                onchange="myFunction()" <?php if ($Check['muc_tang'] == 0) {
                                                    echo ' checked="checked"';
                                                } ?>
                                                class="bg-gray-300 text-gray-700 dark:text-white py-2 ml-3 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">
                                            <?php echo $loai_bia; ?>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!--  -->
                    <div class="mb-4">
                        <span class="font-bold text-gray-700">Số Lượng:</span>
                        <div class="flex items-center">
                            <span
                                class="border bg-white cursor-pointer rounded-md py-2 px-4 mr-2 decrease-quantity">-</span>
                            <input type="number" name="so_luong" value="1" min="1" class="text-center w-8 quantity"
                                readonly>
                            <span
                                class="border bg-white cursor-pointer rounded-md py-2 px-4 ml-2 increase-quantity">+</span>
                        </div>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700">Mô tả:</span>
                        <p class="text-gray-600 text-sm mt-2">
                            <?php echo $sanPhamCt["mo_ta"]; ?>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Lấy tất cả các nút giảm số lượng
    const decreaseButtons = document.querySelectorAll('.decrease-quantity');
    // Lấy tất cả các nút tăng số lượng
    const increaseButtons = document.querySelectorAll('.increase-quantity');
    // Lấy input số lượng
    const quantityInput = document.querySelector('input[name="so_luong"]');

    // Gắn sự kiện click cho nút giảm số lượng
    decreaseButtons.forEach(button => {
        button.addEventListener('click', () => {
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantity--;
                quantityInput.value = quantity;
            }
            if (quantity === 1) {
                button.disabled = true; // Vô hiệu hóa nút giảm số lượng
            }
        });
    });

    // Gắn sự kiện click cho nút tăng số lượng
    increaseButtons.forEach(button => {
        button.addEventListener('click', () => {
            let quantity = parseInt(quantityInput.value);
            quantity++;
            quantityInput.value = quantity;
            decreaseButtons.forEach(decreaseButton => {
                decreaseButton.disabled = false; // Kích hoạt lại nút giảm số lượng
            });
        });
    });
</script>

<!-- bình luận form -->
<div class="flex justify-center gap-2 py-4">
    <h2 class="font-bold py-3 text-2xl">Bình luận sản phẩm</h2>
</div>
<section class="mt-5 w-[800px] mx-auto" id="binhluan">

    <?php
    extract($sanPhamCt);
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#binhluan").load("./view/binhluan/form_binhluan.php", { idSp: <?= $id ?> });
        });
    </script>
</section>

<!-- Sản phẩm nổi bật  -->
<section class="container-content my-5 ">

    <div class="bg-white p-2  rounded-xl">
        <div class="flex justify-center gap-2 py-4">
            <h2 class="font-bold py-3 text-2xl">Sản phẩm cùng loại</h2>
        </div>

        <!--  --> <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                <?php
                // echo "<pre>";
                // var_dump($sach_cungLoai);
                // die;
                foreach ($sach_cungLoai as $key => $value) {
                    $giaCu_listSP = $value['gia_sale'];
                    $giaMoi_listSP = $value['gia'];
                    // Kiểm tra giá trị của $giaCu_listSP trước khi thực hiện phép chia
                    if ($giaCu_listSP != 0) {
                        $phanTramGiamGia_listSP = round((($giaCu_listSP - $giaMoi_listSP) / $giaCu_listSP) * 100, 0);
                    } else {
                        $phanTramGiamGia_listSP = 0; // Gán giá trị mặc định nếu $giaCu_listSP là 0
                    }
                    echo '<div class="hover:shadow-md md:p-4 p-2 text-sm leading-5 bg-white rounded-xl swiper-slide">
 <div>
     <a href="index.php?act=sanphamct&idsp=' . $value["id"] . '" class="w-[190px] h-[190px] flex justify-center items-center">
         <img src="./uploads/' . $value["img"] . '" alt="loading" class="max-w-[190px] max-h-[190px]">
     </a>
 </div>

 <div class="mt-2">
     <div class="overflow-hidden text-ellipsis max-h-9 min-h-9">
         <a href="index.php?act=sanphamct&idsp=' . $value["id"] . '" class="leading-4 text-[#424242] text-sm text-left hover:text-[#ff379b] w-[184px]">' . $value["ten"] . '</a>
     </div>';

                    if ($value["gia_sale"] && trim($value["gia_sale"]) !== '') {
                        echo ' <div class="mt-2">
                 <div>
                     <a href="' . $value["id"] . '" class="font-bold text-[#C92127] leading-6 text-left pr-2">' . number_format($value["gia"], 0, ".", ",") . ' đ</a>
                     <div class=" inline bg-[#C92127] text-white rounded-br-12 rounded-bl-12 rounded-tl-lg rounded-tr-lg rounded-b-lg text-left text-sm font-bold grid-auto line-height-18px p-1">
                         ' . $phanTramGiamGia_listSP . ' %
                     </div>
                 </div>
                 
                 <del class="mt-1 text-[#929292] text-sm leading-4 text-left">' . number_format($value["gia_sale"], 0, ".", ",") . ' đ</del>
                 <div class="text-xs leading-5 text-[#2F80ED] my-1">Đã bán ' . $value["luot_ban"] . ' cuốn</div> 
                 <div class="mt-2 flex items-center">
                     <img src="https://file.hstatic.net/200000785527/file/label_img_1_ddaf3d6b446745c9a0052f99fd888209.png"
                         class="w-[18px] h-[18px]" alt="">
                     <div class="text-[#d42611] font-bold leading-[15px] text-xs ml-1">Flashsale </div>
                 </div>
             </div>';
                    } else {
                        echo '
             <div class="mt-2">
                 <div>
                     <span class="font-bold text-[#FF0000] leading-6 text-left pr-2">' . number_format($value["gia"], 0, ".", ",") . ' đ</span>
                 </div>
                 <div class="text-xs leading-5 text-[#2F80ED] mt-6">Đã bán ' . $value["luot_ban"] . ' cuốn</div> 
                 ';
                        echo '</div>';
                    }
                    echo '  </div>
         </div>';

                }
                ?>
            </div>
            <div class="swiper-pagination mt-10"></div>
        </div>

        <div class="flex justify-center items-center py-2"><a
                class="text-center w-[200px] rounded-xl text-sm text-[#C92127] font-bold border-2 border-solid border-[#C92127] leading-5 bg-white py-3 px-4"
                href="index.php?act=sanpham&iddm=<?php echo $sanPhamCt["danh_muc_id"]; ?>">Xem thêm</a></div>


    </div>
</section>

<script>
    var y;
    function myFunction() {
        var x = parseFloat(document.querySelector('input[name="loai_bia"]:checked').value);
        console.log("x", x);
        y = parseFloat(document.getElementById("gia_bien_the").value);
        var formattedPrice = (y + x).toLocaleString("vi-VN");
        document.getElementById("gia_sau_bien_the").innerHTML = formattedPrice + " đ";
    }
</script>