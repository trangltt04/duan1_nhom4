<?php
ob_start();
session_start();
include ("./model/connect.php");
include ("./model/danhmuc.php");
include ("./model/sach.php");
include ("./model/taiKhoan.php");
include ("./model/tacGia.php");
include ("./model/giohang.php");
// include ("../model/binhLuan.php");
// include ("../model/sach.php");

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}


$listDm = list_danhmuc("");
$listTg = list_tac_gia("");
$listSp_home = list_sach("", "", "");
$list_sach_flashSale_home = list_sach_flashSale_home();
$list_sach_banchay_home = list_sach_banchay_home();
$list_Top_6_Sach_home = list_Top_6_Sach_home();


// if (!isset($_SESSION['myCart'])) {
//     $_SESSION['myCart'] = [];
// }
// $countProducts = count($_SESSION['myCart']);

include ("view/header.php");
if (isset($_GET["act"])) {
    $act = $_GET["act"];
    switch ($act) {
        case 'tintuc':
            include ("./view/tintuc.php");
            break;
        case 'lienhe':
            include ("./view/lienhe.php");
            break;
        case 'sanpham':
            // if ((isset($_POST["kyw"])) && ($_POST["kyw"]) != "") {
            //     $kyw = $_POST["kyw"];
            // } else {
            //     $kyw = "";
            // }
            if ((isset($_GET["iddm"])) && ($_GET["iddm"]) > 0) {
                $danh_muc_id = $_GET["iddm"];
                // $searchSP = $_POST["kyw"];
            } else {
                $danh_muc_id = "";
            }
            // $listSp = list_sach($danh_muc_id);   
            $listSp = list_sach($danh_muc_id, "", "");

            include ("view/sanpham.php");
            break;
        // lọc ở sản phẩm
        case 'sach':
            if (isset($_POST['submit'])) {
                $searchSP = isset($_POST["searchSP"]) ? $_POST["searchSP"] : "";
                $danh_muc_id = isset($_POST["danh_muc_id"]) ? $_POST["danh_muc_id"] : "";
                $tacgia = isset($_POST['tacGia_id']) ? $_POST['tacGia_id'] : array();

                if (is_array($tacgia)) {
                    $tacGia_id = implode(",", $tacgia);
                } else {
                    $tacGia_id = "";
                }
            } else {
                $searchSP = "";
                $danh_muc_id = "";
                $tacGia_id = "";
            }

            $listSp = list_All_home_sach($danh_muc_id, $searchSP, $tacGia_id);
            include ("view/sanpham.php");
            break;

        //-- TÌM TÁC GIẢ TRANG SẢN PHẨM
        case 'searchsp':
            if ((isset($_POST["submit"])) && ($_POST["submit"]) != "") {
                $kyw = $_POST["kyw"];
            } else {
                $kyw = "";
            }
            $listSp = list_sach(0, $kyw);

            include ("view/sanpham.php");
            break;

        case 'sanphamct':
            if ((isset($_GET["idsp"])) && ($_GET["idsp"]) > 0) {
                $id = $_GET["idsp"];
                $sanPhamCt = select_spct($id);
                $list_tacgia_sach_spct = list_tacgia_sach_spct($id);


                $sach_cungLoai = Select_sach_cungLoai($id, $sanPhamCt["danh_muc_id"]);
                $bien_the_bia = select_loai_bia_theo_sach($id);
            } else {
                include ("view/home.php");
            }
            include ("view/sanphamct.php");
            break;

        //đăng kí
        case 'dangky':
            $errDangKypass = "";
            $errDangKyuser = "";
            $errDangKyemail = "";

            // nếu có tồn tại và có nhấp vào nút dangky
            if (isset($_POST["submit"])) {
                $email = $_POST["email"];
                $name = $_POST["name"];
                $password = $_POST["password"];
                $isCheck = true;

                //xác thực địa chỉ email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $isCheck = false;
                    $errDangKyemail = 'Bạn không được để trống email';
                }
                // Kiểm tra email đã tồn tại trong cơ sở dữ liệu hay không
                if ($email && email_da_ton_tai($email)) {
                    $isCheck = false;
                    $errDangKyemail = 'Email đã tồn tại trong hệ thống, vui lòng sử dụng email khác.';
                }
                // if (empty($email)) {
                //     $isCheck = false;
                //     $errDangKyemail = "Cần nhập email";
                // }

                if (!$name) {
                    $isCheck = false;
                    $errDangKyuser = "Cần nhập tên đăng nhập";
                } else if (ten_dang_nhap_da_ton_tai($name)) {
                    $isCheck = false;
                    $errDangKyuser = 'Tên đăng nhập đã tồn tại trong hệ thống, vui lòng chọn tên khác.';
                }

                if (!$password) {
                    $isCheck = false;
                    $errDangKypass = "Cần nhập mật khẩu";
                }

                if ($isCheck) {
                    insert_taikhoan($email, $name, $password);
                    $thongbao = "Bạn đăng kí thành công!";
                }
            }

            include ("view/taiKhoan/sigin.php");
            break;

        // đăng nhập
        case 'dangnhap':
            $email = "";
            $password = "";
            $errDangNhapuser = '';
            $errDangNhappass = '';

            $isCheck = true;
            if (isset($_POST["submit"])) {
                $email = $_POST["email"];
                $password = $_POST["passsword"];

                if (!$email) {
                    $isCheck = false;
                    $errDangNhapuser = "Cần nhập email";
                }

                if (!$password) {
                    $isCheck = false;
                    $errDangNhappass = "Cần nhập mật khẩu";
                }

                if ($isCheck) {
                    $checkuser = checkUser($email, $password);
                    if (is_array($checkuser)) {
                        $_SESSION['user'] = $checkuser;
                        header("Location: index.php");
                        exit();
                    } else {
                        $thongbao = "Tài khoản không tồn tại";
                    }
                }
            }
            include ("view/taiKhoan/login.php");
            break;


        //edit tài khoản
        case 'edittk':
            if (isset($_POST['submit'])) {
                // Lấy các giá trị được gửi từ form
                $name = $_POST["name"];
                $sđt = $_POST['phone'];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $dia_chi = $_POST["dia_chi"];
                $id = $_POST['id'];

                $hinhAnh = $_FILES["img"];
                $filename = $hinhAnh["name"];

                $filename = time() . $filename;
                $dir = "./uploads/$filename";

                move_uploaded_file($hinhAnh["tmp_name"], $dir);

                update_taikhoan($id, $name, $filename, $sđt, $email, $password, $dia_chi);

                $_SESSION['user'] = checkUser($email, $password);

                $thongbao = "Cập nhật thành công!";
                $_SESSION['thongbao'] = $thongbao;
                // Chuyển hướng người dùng về trang edittk (chỉnh sửa tài khoản)
                header('Location: index.php?act=edittk');

            }
            include "view/taiKhoan/edittk.php";
            break;

        //quên mk
        case 'quenmk':
            $errEmail = '';
            if (isset($_POST['guiemail'])) {
                $email = $_POST['email'];
                if (empty($email)) {
                    $isCheck = false;
                    $errEmail = "Cần nhập email";
                }

                $thongbao = "";
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['password'];
                } else {
                    $thongbao = "Email này không tồn tại";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;

        case 'logout':
            session_unset();
            header("Location: index.php");
            break;
        //-- GIỎ HÀNG
        case 'giohang':
            if (isset($_SESSION['user'])) {

                $gioHang = select_1_sach($_SESSION['user']['id']);
                $tongGia = tong_gia($_SESSION['user']['id']);
                include ('./view/giohang.php');
            } else {
                // echo "Bạn cần đăng nhập để xem giỏ hàng của bạn";
                echo '<div class="container-content my-5 ">
                <h1 class="font-bold text-xl leading-6 mt-1 mb-4 text-left">Giỏ hàng</h1>
                <p class="py-4 px-5 text-[#85640] rounded-lg mb-4 bg-[#fff3cd] border border-[#ffeeba]">Bạn cần đăng nhập để xem giỏ hàng của bạn.</p>
            </div>';
            }
            break;
        case 'deleteGioHang':
            if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                $id = $_GET["id"];
                delete_gio_hang($id);
                $id = $_GET["id"];
                delete_gio_hang($id);
            }
            $gioHang = select_1_sach($_SESSION['user']['id']);
            $tongGia = tong_gia($_SESSION['user']['id']);
            include ('./view/giohang.php');
            break;
        case 'add_to_card':
            if (isset($_POST['submit']) && $_POST['submit']) {
                $product_id = $_POST['id'];
                $gia = $_POST['gia'];
                $so_luong = $_POST['so_luong'];

                $selectedLoaiBia = isset($_POST['loai_bia']) ? $_POST['loai_bia'] : null;
                $loai_bia = "";
                $muc_tang = 0;
                $gia_sau_bien_the = 0;
                if (isset($selectedLoaiBia)) {
                    $selectedLoaiBia = trim($selectedLoaiBia, "[]"); // Loại bỏ các ký tự "[" và "]"
                    $arr = explode(",", $selectedLoaiBia);
                    // print_r($arr);
                    // die;

                    if (is_array($arr)) {
                        if (isset($arr[1])) {
                            $loai_bia = $arr[1];
                        } else {
                            $loai_bia = '';
                        }
                        $muc_tang = floatval($arr[0]);
                    } else {
                        $muc_tang = 0;
                        $loai_bia = '';
                    }
                } else {
                    $muc_tang = 0;
                    $loai_bia = '';
                }
                if (isset($_SESSION['user']['id'])) {
                    // Người dùng đã đăng nhập, cho phép thêm mới vào giỏ hàng
                    $gioHang = select_1_sach($_SESSION['user']['id']);

                    $product_exists = false;
                    foreach ($gioHang as &$item) {
                        if ($item['id_product'] == $product_id && $item['loai_bia'] == $loai_bia) {
                            $product_exists = true;
                            $item['so_luong'] += $so_luong;

                            update_SanPham_Da_co_cart($_SESSION['user']['id'], $item['so_luong'], $item['id_product'], $loai_bia, $gia);
                            break;
                        }
                    }
                    if (!$product_exists) {

                        $gia_sau_bien_the = floatval($gia) + $muc_tang;
                        add_gio_hang($_SESSION['user']['id'], $product_id, $so_luong, $gia_sau_bien_the, $loai_bia);
                    }
                } else {
                    // Người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
                    header("Location: index.php?act=dangnhap");
                    exit();
                }
            }

            // Hiển thị giỏ hàng
            if (isset($_SESSION['user']['id'])) {
                $gioHang = select_1_sach($_SESSION['user']['id']);
                $tongGia = tong_gia($_SESSION['user']['id']);
                include ('./view/giohang.php');
            }
            break;
        //-- THANH TOÁN
        case 'thanh_toan':
            if (isset($_POST['muahang'])) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $ghi_chu = $_POST['ghi_chu'];
                // $payment = $_POST['payment_method']; // cod vn pay
                $payment = 'COD';
                $customer_id = $_SESSION['user']['id'];
                $created_at = date('Y-m-d H:i:s');

                $tongGia = tong_gia($_SESSION['user']['id']);

                $status = 1; // trạng thái đơn hàng
                $id_DH = insert_donHang_id($customer_id, $status, $tongGia['tong'], $payment, $ghi_chu, $name, $phone, $email, $dia_chi, $created_at);

                // Lấy dữ liệu từ $gioHang và chèn vào bảng gio_hang_item_thanhtoan
                $gioHang = select_1_sach($_SESSION['user']['id']);
                $isSuccessful = true;

                foreach ($gioHang as $key => $value) {
                    $id_gio_hang_items = $value['id'];
                    $so_luong = $value['so_luong'];
                    $product_id = $value['id_product'];
                    $loai_bia = $value['loai_bia'];
                    $thanhtien = $value['thanhtien'];
                    $is_IdProduct_DH = insert_gio_hang_item_thanhtoan($so_luong, $product_id, $loai_bia, $_SESSION['user']['id'], $id_DH, $thanhtien);
                    if (isset($is_IdProduct_DH)) {
                        delete_sanPham_cart($id_gio_hang_items);
                    } else {
                        $isSuccessful = false; // Set the flag to false if any operation fails
                        break; // Exit the loop
                    }
                }
                if ($isSuccessful) {
                    header("Location: index.php?act=thankyou&id_DH=$id_DH");
                    exit();
                } else {
                    echo "Payment failed. Please try again.";
                }

            } else if (isset($_POST['redirect'])) {

                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $ghi_chu = $_POST['ghi_chu'];

                // $payment = $_POST['payment_method']; // cod vn pay
                $payment = 'VNPay';
                $customer_id = $_SESSION['user']['id'];
                $created_at = date('Y-m-d H:i:s');

                $tongGia = tong_gia($_SESSION['user']['id']);

                $status = 1; // trạng thái đơn hàng
                $id_DH = insert_donHang_id($customer_id, $status, $tongGia['tong'], $payment, $ghi_chu, $name, $phone, $email, $dia_chi, $created_at);

                $gioHang = select_1_sach($_SESSION['user']['id']);
                $isSuccessful = true;

                foreach ($gioHang as $key => $value) {
                    $id_gio_hang_items = $value['id'];
                    $so_luong = $value['so_luong'];
                    $product_id = $value['id_product'];
                    $loai_bia = $value['loai_bia'];
                    $is_IdProduct_DH = insert_gio_hang_item_thanhtoan($so_luong, $product_id, $loai_bia, $_SESSION['user']['id'], $id_DH);
                    if (isset($is_IdProduct_DH)) {
                        delete_sanPham_cart($id_gio_hang_items);
                    } else {
                        $isSuccessful = false;
                        break;
                    }
                }
                if ($id_DH) {
                    // Lưu thành công
                    // Tiếp tục xử lý chuyển hướng đến trang thanh toán của VNPAY
                    include ("./vnpay_php/vnpay_create_payment.php");
                } else {
                    // Lưu thất bại
                    echo "Failed to save order data. Please try again.";
                }

            } else if (isset($_POST['payUrl'])) {// momo

                $tongGia = tong_gia($_SESSION['user']['id']);

                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


                $partnerCode = 'MOMOBKUN20180529';
                $accessKey = 'klm05TvNBzhg7h7j';
                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                $orderInfo = "Thanh toán qua MoMo";
                $amount = "10000";
                $orderId = rand(00, 99999); // mã giao dịch
                $redirectUrl = "http://localhost:81/da1/Book_Store/index.php?act=thankyou";
                $ipnUrl = "http://localhost:81/da1/Book_Store/index.php?act=thankyou";
                $extraData = "";


                if (!empty($_POST)) {
                    $partnerCode = $partnerCode;
                    $accessKey = $accessKey;
                    $serectkey = $secretKey;
                    $orderId = $orderId; // Mã đơn hàng
                    $orderInfo = $orderInfo;
                    $amount = $amount;
                    $ipnUrl = $ipnUrl;
                    $redirectUrl = $redirectUrl;
                    $extraData = $extraData;

                    $requestId = time() . "";
                    $requestType = "payWithATM";
                    // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");

                    //before sign HMAC SHA256 signature
                    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                    $signature = hash_hmac("sha256", $rawHash, $serectkey);
                    $data = array(
                        'partnerCode' => $partnerCode,
                        'partnerName' => "Test",
                        "storeId" => "MomoTestStore",
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderId,
                        'orderInfo' => $orderInfo,
                        'redirectUrl' => $redirectUrl,
                        'ipnUrl' => $ipnUrl,
                        'lang' => 'vi',
                        'extraData' => $extraData,
                        'requestType' => $requestType,
                        'signature' => $signature
                    );
                    $result = execPostRequest($endpoint, json_encode($data));
                    $jsonResult = json_decode($result, true);  // decode json

                    // 0
                    header('Location: ' . $jsonResult['payUrl']);
                }
                // 1
            }
            $gioHang = select_1_sach($_SESSION['user']['id']);
            $tongGia = tong_gia($_SESSION['user']['id']);
            include ('./view/thanhtoan.php');
            break;

        case 'thankyou':
            if (isset($_GET["id_DH"]) && ($_GET["id_DH"] > 0)) {
                $id = $_GET["id_DH"];
            }
            include ("./view/thankyou.php");
            break;
        case 'donHangCuaToi':
            if (isset($_POST['submit'])) {
                $search_id_DH = $_POST["search_id_DH"];
                // echo $search_id_DH;
                // die;
            } else {
                $search_id_DH = "";
            }
            $select_Don_hang_cua_toi = select_Don_hang_cua_toi_where_idUser($_SESSION['user']['id'], $search_id_DH);
            $Don_hang_cua_toi_thanhtoan = select_Don_hang_cua_toi_thanhtoan_where_id($_SESSION['user']['id']);
            include ("./view/donHang/donHangCuaToi.php");
            break;
        case 'ChiTietDonHangCuaToi':
            if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                $id = $_GET["id"];
                $list_order_cart_where_id = select_ChiTietDonHang_where_id($id);
                $gioHang = select_gio_hang_item_thanhtoan_where_id($id);
            }
            include ("./view/donHang/ChiTietDonHangCuaToi.php");
            break;
        case 'updateDHcuatoi':
            if (isset($_POST['submit'])) {
                $id = $_POST["id"];
                update_status_DHcuatoi($id);
                // gọi tham số để select lại đơn hàng
                $list_order_cart_where_id = select_ChiTietDonHang_where_id($id);
                $gioHang = select_gio_hang_item_thanhtoan_where_id($id);
            }
            include ("./view/donHang/ChiTietDonHangCuaToi.php");
            break;
        case 'flashsale':
            $listSp = list_sach_flashSale_home();
            include ("view/sanpham.php");
            break;
        default:
            include ("view/home.php");
            break;
    }
} else {
    include ("view/home.php");
}

include ("view/footer.php");
?>