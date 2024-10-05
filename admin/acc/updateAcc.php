<div class="font-bold text-[30px]">
    Sửa người dùng
</div>

<form class="max-w-sm mx-auto mt-9 " action="index.php?act=updateAcc" method="post">
    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">ID người dùng</label>
        <input type="text" id="disabled-input" aria-label="disabled input"
            class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed"
            value="<?php echo $acc['id'] ?>" disabled>
    </div>
    <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Tên Người dùng</label>
        <input type="text"
            class="bg-gray-100 border cursor-not-allowed border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500  block w-full p-2.5  focus:border-blue-500"
            name="nameacc" value="<?php echo $acc['name'] ?>" disabled>
    </div>
    <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Hình Ảnh Người Dùng</label>
    </div>
    <img class="w-[50px] h-[50px] rounded-full" src="../uploads/<?php echo $acc['avatar'] ?>" alt="">
    <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Số Diện Thoại</label>
        <input type="text"
            class="bg-gray-100 border cursor-not-allowed border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500  block w-full p-2.5  focus:border-blue-500"
            name="phone" value="<?php echo $acc['phone'] ?>" disabled>
    </div>
    <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
        <input type="text"
            class="bg-gray-100 border cursor-not-allowed border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500  block w-full p-2.5  focus:border-blue-500"
            name="email" value="<?php echo $acc['email'] ?>" disabled>
    </div>
    <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900" disabled>Vai trò</label>
        <select name="is_admin" id="cars"
            class="bg-gray-100 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500  block w-full p-2.5  focus:border-blue-500">
            <?php
            for ($i = 0; $i <= 1; $i++) {
                $selected = ($acc['is_admin'] == $i) ? 'selected' : '';
                echo '<option 
                value="' . $i . '" ' . $selected . '>';
                echo ($i == 0) ? 'Người dùng' : 'Admin';
                echo '</option>';
            }
            ?>
        </select>
    </div>


    <div class="flex items-center mb-5">
        <!-- id -->
        <input type="text" hidden value="<?php echo $acc['id'] ?>" name="id">

        <input type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
            name="update" value="Cập nhật">
        <input type="reset"
            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
            value="Reset">
        <a href="index.php?act=account"
            class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Danh
            Sách</a>
    </div>
</form>