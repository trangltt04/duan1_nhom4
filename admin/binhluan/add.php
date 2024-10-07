
<div class="font-bold text-[30px]">
    Thêm mới bình luận
</div>

<form class="max-w-sm mx-auto mt-9 " action="index.php?act=add_comment" method="post">
    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">ID Bình luận</label>
        <input type="text" id="disabled-input" aria-label="disabled input"
            class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed"
            value="ID BÌNH LUẬN" disabled>
    </div>
    <div class="mb-5">
        <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nội dung</label>
        <input type="text"
            class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500  block w-full p-2.5  focus:border-blue-500"
            value="" name="content">
    </div>
    <div class="flex items-center mb-5">
        <input type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
            name="themMoi" value="Thêm mới">
        <input type="reset" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" value="Reset">
        <a href="index.php?act=listBl" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Danh Sách</a>
    </div>
</form>