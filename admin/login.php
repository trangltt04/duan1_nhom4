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

<body>
    <?php
    include ("../model/connect.php");
    include ("../model/taiKhoan.php");
    $email = "";
    $password = "";
    $errDangNhapuser = '';
    $errDangNhappass = '';
    ?>
    <?php
    $isCheck = true;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["passsword"];
        if (empty($email)) {
            $isCheck = false;
            $errDangNhapuser = "Cần nhập email";
        }
        if (empty($password)) {
            $isCheck = false;
            $errDangNhappass = "Cần nhập mật khẩu";
        }
        if ($isCheck) {
            $checkuser = checkUser_admin($email, $password);
            if (is_array($checkuser)) {
                $_SESSION['user'] = $checkuser;
                header("Location: index.php");
                exit();
            } else {
                $thongBao = "Tài khoản không tồn tại";
            }
        }
    }
    ?>

    <section class="bg-gray-50 min-h-screen flex items-center justify-center">
        <!-- login container -->
        <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
            <!-- form -->
            <div class="md:w-1/2 px-8 md:px-16">
                <h2 class="font-bold text-2xl text-[#002D74]">Đăng nhập Admin</h2>
                <p class="text-xs mt-4 text-[#002D74]">Hãy đăng nhập bằng tài khoản admin của bạn</p>

                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="flex flex-col">
                    <div class="flex flex-col">
                        <input class="p-2 mt-8 rounded-xl border" type="email" name="email" placeholder="Email"
                            value="">
                        <p class="text-red-500 text-[13px] pl-2">
                            <?= $errDangNhapuser ?>
                        </p> <br>
                    </div>
                    <div class="relative">
                        <input class="p-2 rounded-xl border w-full" type="password" name="passsword"
                            placeholder="Password" value="">
                        <p class="text-red-500 text-[13px] pl-2">
                            <?= $errDangNhappass ?>
                        </p> <br>
                    </div>
                    <button name="submit" type="submit"
                        class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Đăng nhập</button>
                </form>
                <p class="text-red-500 text-[13px] pl-2">
                    <?php
                    if (isset($thongBao) && $thongBao != "") {
                        echo $thongBao;
                    }
                    ?>
                </p>

                <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
                    <hr class="border-gray-400">
                    <p class="text-center text-sm">HOẶC</p>
                    <hr class="border-gray-400">
                </div>

                <button
                    class="bg-white border py-2 w-full rounded-xl mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300 text-[#002D74]">
                    <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="25px">
                        <path fill="#FFC107"
                            d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                        <path fill="#FF3D00"
                            d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                        <path fill="#4CAF50"
                            d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                        <path fill="#1976D2"
                            d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
                    </svg>
                    Login with Google
                </button>

                <div class="mt-5 text-xs py-4 text-[#002D74]">
                    <a href="quenmk.php">Quên mật khẩu?</a>
                </div>
            </div>
            <!-- image -->
            <div class="md:block hidden w-1/2">
                <img class="rounded-2xl"
                    src="https://images.unsplash.com/photo-1616606103915-dea7be788566?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80">
            </div>
        </div>
    </section>


</body>

</html>