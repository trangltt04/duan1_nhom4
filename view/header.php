<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <!-- font -->
    <!-- <link rel="stylesheet" href="css/fontawesome/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css -->
    <link rel="stylesheet" href="css/view/index.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<!-- font-[Poppins] -->

<body class="">
    <div class="bg-white sticky z-[11] top-0 w-full " style="box-shadow: 0 1px 3px gray">
        <div>
            <div class="swiper mySwiper2 bg-[#C92127]">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><a class=" h-[50px]" href="index.php"><span
                                class="transition-all duration-300 ease-linear text-white font-medium flex justify-center items-center h-[38px] text-sm">Free
                                ship tất cả các đơn hàng từ 299k </span></a></div>
                    <div class="swiper-slide"><a class=" h-[50px]" href="index.php"><span
                                class="transition-all duration-300 ease-linear text-white font-medium flex justify-center items-center h-[38px] text-sm">Quà
                                tặng hấp dẫn. Mua hàng ngay đừng bỏ lỡ.</span></a></div>
                </div>
            </div>
            <div>

                <div>
                    <nav class="container-content flex justify-between items-center ">
                        <div>
                            <a href="index.php"><img class="w-16 cursor-pointer"
                                    src="https://cdn-icons-png.flaticon.com/512/5968/5968204.png" alt="..."></a>

                        </div>
                        <div
                            class="nav-links duration-500 md:static absolute bg-white  md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto flex items-center px-5">
                            <ul class="flex md:flex-row flex-col md:items-center md:gap-7 gap-4">
                                <li>
                                    <a class="hover:text-gray-500" href="index.php">Trang chủ</a>
                                </li>
                                <li>
                                    <a class="hover:text-gray-500" href="index.php?act=sach">Sản phẩm</a>
                                </li>
                                <!-- <li>
                                <a class="hover:text-gray-500" href="index.php?act=gioithieu ">Giới thiệu</a>
                            </li> -->
                                <li>
                                    <a class="hover:text-gray-500" href="index.php?act=tintuc">Tin tức</a>
                                </li>
                                <li>
                                    <div class="">
                                        <a id="dropdownButton" class="cursor-pointer w-55 m-7 md:m-0 hover:text-gray-500 
                            transition duration-400 ease-in">Danh Mục <i class="fa-solid fa-chevron-down"></i></a>
                                        <ul id="dropdownMenu"
                                            class="absolute hidden mt-2 py-2 w-55  bg-white rounded-md shadow-md z-10">
                                            <?php foreach ($listDm as $key => $value) {
                                            echo '<li><a class="hover:text-gray-500 p-3"  href="index.php?act=sanpham&iddm=' . $value["id"] . '">' . $value["name"] . '</a></li>';
                                        } ?>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a class="hover:text-gray-500" href="index.php?act=lienhe">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="flex items-center gap-6">
                            <form action="index.php?act=searchsp" method="post">
                                <input type="text" name="kyw" placeholder="Tìm kiếm"
                                    class="border border-gray-400 p-2 rounded-md text-xs">
                                <input type="submit" name="submit" value="Tìm"
                                    class="bg-red-500 text-white px-2 text-sm py-1 rounded ">
                            </form>
                            <div>
                                <a href="index.php?act=giohang" class="flex flex-col justify-center items-center">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <!-- <div class="text-xs mt-1">Giỏ hàng</div> -->
                                </a>
                            </div>
                            <div>
                                <!-- <a href="#" class="flex flex-col justify-center items-center"><i class="fa-regular fa-user"></i>
                        <div class="text-xs mt-1">Đăng nhập</div>
                    </a> -->

                                <div class="relative inline-block text-left">
                                    <div>
                                        <button type="button" class="flex flex-col justify-center items-center"
                                            id="menu-button" aria-expanded="true" aria-haspopup="true">

                                            <?php if (!isset($_SESSION['user'])) { ?>
                                            <i class="fa-regular fa-user"></i>
                                            <?php } else { ?>
                                            <?php if (isset($_SESSION['user']) && isset($_SESSION['user']['avatar'])) { ?>
                                            <img class="w-[30px] h-[30px] rounded-full"
                                                src="./uploads/<?php echo $_SESSION['user']['avatar']; ?>"
                                                alt="Rounded avatar">
                                            <?php } else { ?>
                                            <img class="w-[30px] h-[30px] rounded-full"
                                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                                alt="Rounded avatar">
                                            <?php } ?>
                                            <?php } ?>
                                            <!-- <div class="text-xs mt-1">Đăng nhập</div> -->
                                        </button>
                                    </div>

                                    <div class="absolute right-0 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44"
                                        id="userDropdown" role="menu" aria-orientation="vertical"
                                        aria-labelledby="menu-button" tabindex="-1">
                                        <?php if (isset($_SESSION['user'])) {
                                        // var_dump($_SESSION['user']);
                                        // die;
                                        extract($_SESSION['user']);
                                        ?>
                                        <div class="px-4 py-3 text-sm text-gray-900 ">
                                            <div>
                                                <?php echo $name ?>
                                            </div>
                                            <div class="font-medium truncate">
                                                <?php echo $email ?>
                                            </div>
                                        </div>
                                        <hr>

                                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="avatarButton">

                                            <li>
                                                <a href="index.php?act=donHangCuaToi"
                                                    class="block px-4 py-2 hover:bg-gray-100">Đơn hàng của tôi</a>
                                            </li>
                                            <li><a href="index.php?act=quenmk"
                                                    class="block px-4 py-2 hover:bg-gray-100">Quên
                                                    mật
                                                    khẩu</a></li>
                                            <li>
                                                <a href="index.php?act=edittk"
                                                    class="block px-4 py-2 hover:bg-gray-100">Cập
                                                    nhật tài khoản</a>
                                            </li>
                                            <?php if ($is_admin == 1) { ?>
                                            <li>
                                                <a href="admin/index.php" class="block px-4 py-2 hover:bg-gray-100">Vào
                                                    trang
                                                    quản
                                                    trị</a>
                                            </li>
                                            <?php } ?>
                                        </ul>

                                        <div class="py-1">
                                            <hr>
                                            <a href="index.php?act=logout"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                Đăng xuất
                                            </a>
                                        </div>

                                        <?php } else { ?>

                                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="avatarButton">
                                            <li>
                                                <a href="index.php?act=dangnhap"
                                                    class="block px-4 py-2 hover:bg-gray-100">Đăng
                                                    nhập</a>
                                            </li>
                                            <li>
                                                <a href="index.php?act=dangky"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    Đăng ký
                                                </a>
                                            </li>
                                        </ul>

                                        <?php } ?>
                                    </div>
                                </div>

                                <script>
                                // Lấy tham chiếu đến các phần tử trong DOM
                                const menuButton = document.getElementById('menu-button');
                                const dropdown = document.getElementById('userDropdown');

                                // Bắt sự kiện click vào nút "menuButton"
                                menuButton.addEventListener('click', () => {
                                    // Kiểm tra trạng thái hiện tại của dropdown
                                    const isDropdownVisible = dropdown.style.display === 'block';

                                    // Ẩn/hiện dropdown dựa trên trạng thái hiện tại
                                    if (isDropdownVisible) {
                                        dropdown.style.display = 'none';
                                    } else {
                                        dropdown.style.display = 'block';
                                    }
                                });
                                </script>


                            </div>
                        </div>
                </div>
            </div>
        </div>