<div class="font-bold text-[30px]">
    Thêm mới Sách
</div>

<form action="index.php?act=addSach" method="post" class="w-[700px] mx-auto mt-5" enctype="multipart/form-data">
    <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Tên sản phẩm</label>
        <input type="text" id="name" name="name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            placeholder="Tên sản phẩm..." />
        <?php if (isset($ErrtenSanPham)): ?>
            <p class="text-red-500">
                <?= $ErrtenSanPham ?>
            </p>
        <?php endif; ?>
    </div>
    <div class="grid gap-6 md:grid-cols-2">
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Tác giả</label>
            <?php foreach ($listTg as $key => $value): ?>
                <input type="checkbox" name="tacGia_id[]" value="<?= $value['id'] ?>">
                <?= $value['name'] ?><br>
            <?php endforeach; ?>
            <?php if (isset($ErrtenSanPham)): ?>
                <p class="text-red-500">
                    <?= $ErrtenSanPham ?>
                </p>
            <?php endif; ?>
        </div>
        <div>
            <label for="nha_san_xuat_id" class="block mb-2 text-sm font-medium text-gray-900">Nhà Xuất Bản</label>
            <select id="nha_san_xuat_id" name="nha_san_xuat_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                required>
                <option value="0" selected>Chọn Nhà Xuất Bản</option>
                <?php foreach ($listNxb as $key => $value): ?>
                    <option value="<?= $value['id'] ?>">
                        <?= $value['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($ErrnhaSanXuatId)): ?>
                <p class="text-red-500">
                    <?= $ErrnhaSanXuatId ?>
                </p>
            <?php endif; ?>
        </div>
        <div>
            <label for="danh_muc_id" class="block mb-2 text-sm font-medium text-gray-900">Danh mục</label>
            <select id="danh_muc_id" name="danh_muc_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                required>
                <option value="0" selected>Chọn Danh mục</option>
                <?php foreach ($listDm as $key => $value): ?>
                    <option value="<?= $value['id'] ?>">
                        <?= $value['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($ErrdanhMucId)): ?>
                <p class="text-red-500">
                    <?= $ErrdanhMucId ?>
                </p>
            <?php endif; ?>
        </div>
        <div>
            <label for="gia" class="block mb-2 text-sm font-medium text-gray-900">Giá bán</label>
            <input type="number" id="gia" name="gia"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Giá bán" />
            <?php if (isset($Errgia)): ?>
                <p class="text-red-500">
                    <?= $Errgia ?>
                </p>
            <?php endif; ?>
        </div>
        <div>
            <label for="gia_sale" class="block mb-2 text-sm font-medium text-gray-900">Giá sale (Không bắt
                buộc)</label>
            <input type="number" id="gia_sale" name="gia_sale"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Giá sale" />

        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900" for="img">Ảnh</label>
            <input
                class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 w-full p-2.5"
                aria-describedby="img_help" id="img" type="file" name="img">
            <?php if (isset($Errimg)): ?>
                <p class="text-red-500">
                    <?= $Errimg ?>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <div class="">
        <label for="mo_ta" class="block mb-2 text-sm font-medium text-gray-900">Thông tin sản phẩm</label>
        <textarea id="mo_ta" rows="4" name="mo_ta"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
            placeholder="Write your thoughts here..."></textarea>
        <?php if (isset($ErrmoTa)): ?>
            <p class="text-red-500">
                <?= $ErrmoTa ?>
            </p>
        <?php endif; ?>
    </div>
    <div class="mt-5">
        <input type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
            name="submit" value="Thêm mới">
        <input type="reset"
            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
            value="Reset">
        <a href="index.php?act=sach"
            class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Danh
            Sách</a>
    </div>
</form>