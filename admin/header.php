<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet" href="dist/css/style.css">
    <!-- font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>admin </title>
</head>

<body class="text-gray-800 font-inter">

    <!-- start: Sidebar -->
    <div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
        <a href="index.php" class="flex items-center pb-4 border-b border-b-gray-800">
            <?php if (isset($_SESSION['user'])) {
                echo '<img src="../uploads/' . $_SESSION['user']['avatar'] . '" alt="" class="w-8 h-8 rounded object-cover">';
            } else {
                echo '<img src="https://cdn.sforum.vn/sforum/wp-content/uploads/2023/10/avatar-trang-4.jpg" alt="" class="w-8 h-8 rounded object-cover">';
            }
            ?>

            <span class="text-lg font-bold text-white ml-3">
                <?php if (isset($_SESSION['user'])) {
                    echo $_SESSION['user']['name'];
                } else {
                    echo "Admin";
                }
                ?>
            </span>
        </a>
        <ul class="mt-4">
            <li class="mb-1 group ">
                <a href="index.php"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-house mr-3 text-lg"></i>
                    <span class="text-sm">Trang chủ</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="index.php?act=sach"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-book mr-3 text-lg"></i>

                    <span class="text-sm">Sách</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="index.php?act=listDm"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-list mr-3 text-lg"></i>
                    <span class="text-sm">Danh mục</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="index.php?act=listTacGia"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-at mr-3 text-lg"></i>

                    <span class="text-sm">Tác giả</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="index.php?act=nhaXuatBan"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-bookmark mr-3 text-lg"></i>
                    <span class="text-sm">Nhà xuất bản</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="index.php?act=order"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-cart-shopping mr-3 text-lg"></i>
                    <span class="text-sm">Đơn hàng</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="index.php?act=account"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-regular fa-user mr-3 text-lg"></i>
                    <span class="text-sm">Tài khoản</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="index.php?act=comment"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-regular fa-comment mr-3 text-lg"></i>
                    <span class="text-sm">Bình luận</span>
                </a>
            </li>
            <!-- <li class="mb-1 group">
                <a href="index.php?act=thongKe"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-chart-simple mr-3 text-lg"></i>
                    <span class="text-sm">Thống kê</span>
                </a>
            </li> -->

            <li class="mb-1 group">
                <a href="index.php?act=logout"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-gear mr-3 text-lg"></i>
                    <span class="text-sm">Đăng xuất</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
        <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <ul class="flex items-center text-sm ml-4">
                <li class="mr-2">
                    <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
                </li>
                <li class="text-gray-600 mr-2 font-medium">/</li>
                <li class="text-gray-600 mr-2 font-medium">Analytics</li>
            </ul>
            <ul class="ml-auto flex items-center">
                <span class="text-base text-black ml-3"> xin chào,
                    <?php if (isset($_SESSION['user'])) {
                        echo $_SESSION['user']['name'];
                    } else {
                        echo "Admin";
                    }
                    ?>
                </span>
                <!-- avt + profile -->
                <li class="dropdown ml-3">
                    <button type="button" class="dropdown-toggle flex items-center">
                        <?php if (isset($_SESSION['user'])) {
                            echo '<img src="../uploads/' . $_SESSION['user']['avatar'] . '" alt="" class="w-8 h-8 rounded object-cover">';
                        } else {
                            echo '<img src="https://cdn.sforum.vn/sforum/wp-content/uploads/2023/10/avatar-trang-4.jpg" alt="" class="w-8 h-8 rounded object-cover">';
                        }
                        ?>
                    </button>
                    <ul
                        class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                        <!-- <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                        </li> -->
                        <li>
                            <a href="../"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Vào
                                Website</a>
                        </li>
                        <li>
                            <a href="index.php?act=logout"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Đăng
                                xuất</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- content -->
        <div class="p-6">