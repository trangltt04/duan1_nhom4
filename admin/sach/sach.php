<!-- serch -->

<div class="relative overflow-x-auto">

    <div class="font-bold text-[30px]">
        Danh sách sản phẩm
    </div>
    <!-- input-->
    <div class="flex justify-between items-center mt-5">
        <form action="index.php?act=sach" method="post" class="w-[700px]">
            <div class="flex">

                <select id="countries" name="danh_muc_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                    <option selected value="">Chọn Nhà Danh mục</option>
                    <?php
                    foreach ($listDm as $key => $value) {
                        echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
                    }
                    ?>
                </select>

                <div class="relative w-full">
                    <input type="search" id="search-dropdown"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Nhập để tìm kiếm" name="searchSP" />

                    <button name="submit" type="submit"
                        class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>

        <div class=""><a href="index.php?act=addSach"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">Nhập
                thêm</a></div>
    </div>

    <!--  -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-7">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3" style="width: 3%">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3" style="width: 15%">
                        Tên sách
                    </th>
                    <th scope="col" class="px-6 py-3" style="width: 10%">
                        Hình ảnh
                    </th>
                    <th scope="col" class="px-6 py-3" style="width: 8%">
                        Giá gốc
                    </th>
                    <th scope="col" class="px-6 py-3" style="width: 8%">
                        Giá sale
                    </th>
                    <th scope="col" class="px-6 py-3" style="width: 25%">
                        Mô tả
                    </th>
                    <th scope="col" class="px-6 py-3" style="width: 10%">
                        Tên tác giả
                    </th>
                    <!-- <th scope="col" class="px-6 py-3" style="width: 8%">
                        Ngày đăng bán
                    </th> -->
                    <th scope="col" class="px-6 py-3" style="width: 10%">
                        Tên danh mục
                    </th>
                    <th scope="col" class="px-6 py-3" style="width: 10%">
                        Tên nhà sản xuất
                    </th>
                    <th scope="col" class="px-6 py-3" style="width: 10%">
                        #
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- <td class="px-3 py-3">' . $value["created_at"] . '</td> -->

                <?php
                foreach ($list_Sach as $key => $value) {
                    $list_tacgia_sach_spct = list_tacgia_sach_spct($value["id"]);

                    echo '
        <tr class="bg-white border-b text-black hover:bg-gray-100">
            <td class="w-4 p-4">' . $value["id"] . '</td>
            <td class="w-[500px] px-3 py-3 font-medium text-black">' . $value["ten"] . '</td>
            <td class="px-3 py-3"><img src="../uploads/' . $value["img"] . '" style="width: 110px;" alt="loading..."></td>
            <td class="px-3 py-3">' . number_format(floatval($value["gia"]), 0, ".", ",") . '</td>
            <td class="px-3 py-3">' . number_format(floatval($value["gia_sale"]), 0, ".", ",") . '</td>
            <td class="px-3 line-clamp-6">' . $value["mo_ta"] . '</td>
            <td class="px-3 py-3">';

                    foreach ($list_tacgia_sach_spct as $key_tacgia => $value_tacgia) {
                        echo $value_tacgia["tac_gia_name"] . ", ";
                    }
                    echo '</td>
            <td class="px-3 py-3">' . $value["danh_muc_name"] . '</td>
            <td class="px-3 py-3">' . $value["nha_san_xua_name"] . '</td>
            <td class="flex flex-col px-3 py-3">
            <a href="index.php?act=editSp&id=' . $value["id"] . '" class="font-medium text-blue-600 hover:underline">Edit</a> <br>
            <a href="index.php?act=deleteSp&id=' . $value["id"] . '" onclick="return confirm(\'Bạn muốn xóa ?\')" class="font-medium text-red-600  hover:underline">Remove</a><br>
            <a href="index.php?act=BiaSach&id=' . $value["id"] . '" class="font-medium text-blue-600 hover:underline">Thêm bìa</a>
        </td>
        </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>