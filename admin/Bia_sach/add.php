<div class="font-bold text-[30px]">
    Thêm mới Bìa sách
</div>

<form action="index.php?act=insertBia" method="post" class="w-[700px] mx-auto mt-5" enctype="multipart/form-data">
    <div class="grid gap-6 md:grid-cols-2">
        <div>
            <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 ">Tên bìa</label>
            <input type="text" name="loai_bia"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Giá sale " />
        </div>
        <div>
            <label for="website" class="block mb-2 text-sm font-medium text-gray-900 ">Giá tăng</label>
            <input type="number" name="muc_tang"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Giá tăng" value="0" />
        </div>
    </div>

    <div class="mt-5">

        <!-- <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>"> -->
        <input type="hidden" name="id" value="<?= $id ?>">

        <input type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
            name="submit" value="Thêm mới">
        <input type="reset"
            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
            value="Reset">
    </div>

</form>