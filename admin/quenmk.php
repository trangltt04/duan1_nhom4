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
    $errEmail = '';
    $isCheck = true;
    $thongbao = "";
    ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        if (empty($email)) {
            $isCheck = false;
            $errEmail = "Cần nhập email";
        }

        if ($isCheck) {
            $checkemail = checkemail_admin($email);
            if (is_array($checkemail)) {
                $thongbao = "Mật khẩu của bạn là: " . $checkemail['password'];
            } else {
                $thongbao = "Email này không đúng, hãy kiểm tra lại";
            }
        }
    }
    ?>
    <section class="bg-gray-50 min-h-screen flex items-center justify-center">
        <!-- login container -->
        <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
            <!-- form -->
            <div class="md:w-1/2 px-8 md:px-16">
                <h2 class="font-bold text-2xl text-[#002D74]">Quên mật khẩu admin</h2>
                <p class="text-xs mt-4 text-[#002D74]">Nhập email tài khoản admin của bạn ở đây</p>

                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="flex flex-col">
                    <div class="flex flex-col">
                        <input class="p-2 mt-8 rounded-xl border" type="email" name="email" placeholder="Email"
                            value="<?= !empty($email) ? $email : null ?>">
                        <p class="text-red-500 text-[13px] pl-2">
                            <?= $errEmail ?><br>
                    </div>

                    <button name="guiemail" type="submit"
                        class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Gửi mật
                        khẩu</button>
                </form>
                <p class="text-red-500 text-[13px] pl-2 py-2">
                    <?php
                    if (isset($thongbao) && $thongbao != "") {
                        echo $thongbao;
                    }
                    ?>
                </p>
                <div class="mt-5 text-xs flex justify-between items-center text-[#002D74]">
                    <p>Bạn đã có tài khoản?</p>
                    <a href="./login.php" class="py-2 px-4 bg-white border rounded-xl hover:scale-110 duration-300">Đăng
                        nhập ngay</a>
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