<div class="font-bold text-[30px]">
    update Sách
</div>
<?php
$ErrtenSanPham = "";
$Errgia = "";
$ErrmoTa = "";
$ErrTg = "";

$isCheck = true;

?>


<form action="index.php?act=updateSp" method="post" class="w-[700px] mx-auto mt-5" enctype="multipart/form-data">
    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Tên sản phẩm</label>
        <input type="name" id="name" name="name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Tên sản phẩm..." value="<?= $SP["ten"] ?>" />
        <p class="text-red-500">
            <?= $ErrtenSanPham ?>
        </p>
    </div>
    <div class="grid gap-6 md:grid-cols-2">
        <div>
            <label for="tacGia_id" class="block mb-2 text-sm font-medium text-gray-900">Tác giả</label>

            <?php
            // Lấy danh sách các ID tác giả liên quan đến sản phẩm
            $listTacGiaSeleced = list_tacgia_sach($SP['id']);
            $listTacGiaID = array_column($listTacGiaSeleced, 'id');

            $sach_tacgia_id = json_encode(array_column($listTacGiaSeleced, 'tac_gia_id'));
            foreach ($listTg as $key => $value) {

                $checked = in_array($value['id'], $listTacGiaID) ? 'checked' : ''; // Kiểm tra xem tác giả có trong danh sách tác giả của sản phẩm hay không
                echo '<input type="checkbox" name="tacGia_id[]" value="' . $value["id"] . '" ' . $checked . '> ' . $value["name"] . '<br>';
            }
            ?>
            <input type="hidden" name="sach_tacgia_id" value="<?= $sach_tacgia_id ?>">
        </div>
        <div>
            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 ">Nhà Xuất Bản</label>
            <select id="countries" name="nha_san_xuat_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <?php
                foreach ($listNxb as $key => $value) {
                    if ($SP["nha_san_xuat_id"] == $value["id"]) {
                        echo '<option value="' . $value["id"] . '" selected>' . $value["name"] . '</option>';
                    } else {
                        echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
                    }
                }
                ?>
            </select>
            <?php if (isset($ErrnhaSanXuatId)): ?>
                <p class="text-red-500">
                    <?= $ErrnhaSanXuatId ?>
                </p>
            <?php endif; ?>
        </div>

        <div>
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">danh mục</label>
            <select id="countries" name="danh_muc_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <?php
                foreach ($listDm as $key => $value) {
                    if ($SP["danh_muc_id"] == $value["id"]) {
                        echo '<option value="' . $value["id"] . '" selected>' . $value["name"] . '</option>';
                    } else {
                        echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
                    }
                }
                ?>
            </select>
            <?php if (isset($ErrdanhMucId)): ?>
                <p class="text-red-500">
                    <?= $ErrdanhMucId ?>
                </p>
            <?php endif; ?>
        </div>
        <div>
            <label for="website" class="block mb-2 text-sm font-medium text-gray-900 ">Giá bán</label>
            <input type="number" id="website" name="gia"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="gia" value="<?= $SP["gia"] ?>" />
            <?php if (isset($Errgia)): ?>
                <p class="text-red-500">
                    <?= $Errgia ?>
                </p>
            <?php endif; ?>
        </div>
        <div>
            <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 ">Giá sale (Không bắt
                buộc)</label>
            <input type="number" id="visitors" name="gia_sale"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Giá sale " value="<?= $SP["gia_sale"] ?>" />
        </div>
        <div>

            <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Ảnh</label>
            <input
                class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 w-full p-2.5"
                aria-describedby="file_input_help" id="file_input" type="file" name="img">

        </div>

    </div>

    <div class="">
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Thông tin sản phẩm</label>
        <textarea id="message" rows="4" name="mo_ta"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
            placeholder="Write your thoughts here..."><?= $SP["mo_ta"] ?></textarea>
        <?php if (isset($ErrmoTa)): ?>
            <p class="text-red-500">
                <?= $ErrmoTa ?>
            </p>
        <?php endif; ?>
    </div>
    <div class="mt-5">
        <input type="hidden" name="id" value="<?= $SP["id"] ?>">
        <input type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
            name="submit" value="Cập nhật">
        <input type="reset"
            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
            value="Reset">
        <a href="index.php?act=sach"
            class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Danh
            Sách</a>
    </div>

</form>