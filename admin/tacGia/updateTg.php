
<div class="font-bold text-[30px]">
    Sửa Tác giả
</div>

<form class="max-w-sm mx-auto mt-9 " action="index.php?act=updateTg" method="post">
    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">ID Tác giả</label>
        <input type="text" id="disabled-input" aria-label="disabled input"
            class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed"
            value="<?php echo $tg['id'] ?>"  disabled>
    </div>
    <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Tên Tác giả</label>
        <input type="text"
            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500  block w-full p-2.5  focus:border-blue-500"
         name="nametg" value="<?php echo $tg['name'] ?>">
    </div>
    <div class="flex items-center mb-5">
<!-- id -->
<input type="text" hidden value="<?php echo $tg['id'] ?>" name="id">

        <input type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
            name="updateTg" value="Cập nhật">
        <input type="reset" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" value="Reset">
        <a href="index.php?act=listTacGia" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Danh Sách</a>
    </div>
</form>