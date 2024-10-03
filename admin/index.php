<?php
ob_start();
session_start();
if (isset($_SESSION['user']) && $_SESSION['user']['is_admin'] == 1) {

    include ("../model/connect.php");
    include ("../model/danhmuc.php");
    include ("../model/nhaXuatBan.php");
    include ("../model/tacGia.php");
    include ("../model/acc.php");
    include ("../model/binhLuan.php");
    include ("../model/sach.php");
    include ("../model/bia.php");
    include ("../model/giohang.php");
    include ("../model/thongke.php");

    include ("header.php");
    // include ("home.php");
    if (isset($_GET["act"])) {
        $act = $_GET["act"];
        switch ($act) {
            // danh mục
            case 'addDm':
                $errdm = "";
                if (isset($_POST['themMoi'])) {
                    $name = $_POST["nameDM"];
                    $isCheck = true;
                    if (empty($name)) {
                        $isCheck = false;
                        $errdm = "Cần nhập Danh mục";
                    }
                    if ($isCheck) {
                        insert_danhmuc($name);
                        $thongbao = "Thêm thành công!";
                    }
                }
                include ("danhMuc/add.php");
                break;
            case 'listDm':
                if (isset($_POST['submit'])) {
                    $searchName = $_POST["searchName"];
                } else {
                    $searchName = "";
                }
                $listDm = list_danhmuc($searchName);
                include ("danhMuc/danhmuc.php");
                break;
            case 'deleteDm':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    delete_danhmuc($id);
                }
                $listDm = list_danhmuc("");
                include ("danhMuc/danhmuc.php");
                break;

            case 'editDm':

                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    $errnamedm = "";

                    $dm = edit_danhmuc($id);
                }
                include ("danhMuc/updateDm.php");
                break;
            case 'updateDm':
                $errnamedm = "";

                if (isset($_POST['update'])) {
                    $id = $_POST["id"];
                    $name = $_POST["namedm"];
                    $isCheck = true;

                    if (empty($name)) {
                        $isCheck = false;
                        $errnamedm = "Cần nhập tên danh mục";
                    }

                    if ($isCheck) {
                        update_danhmuc($id, $name);
                        $thongbao = "Cập nhật thành công!";
                    }
                }
                $listDm = list_danhmuc("");
                include ("danhMuc/danhmuc.php");
                break;

            // Nha xuat ban
            case 'addNxb':
                $errNXB = "";
                if (isset($_POST['themMoi'])) {
                    $name = $_POST["nameNxb"];

                    $isCheck = true;
                    if (empty($name)) {
                        $isCheck = false;
                        $errNXB = "Cần nhập Tên Nhà xuất Bản";
                    }
                    if ($isCheck) {
                        insert_NhaXuatBan($name);
                        $thongbao = "Thêm thành công!";
                    }
                }
                include ("NXB/add.php");
                break;
            case 'nhaXuatBan':
                if (isset($_POST['submit'])) {
                    $searchNXB = $_POST["searchNXB"];
                } else {
                    $searchNXB = "";
                }
                $listNxb = list_NhaXuatBan($searchNXB);
                include ("NXB/nhaxuatban.php");
                break;
            case 'deleteNxb':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    delete_NhaXuatBan($id);
                }
                $listNxb = list_NhaXuatBan("");
                include ("NXB/nhaxuatban.php");
                break;

            case 'editNxb':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    $Nxb = edit_NhaXuatBan($id);
                }
                include ("NXB/updateNxb.php");
                break;
            case 'updateNxb':
                if (isset($_POST['update'])) {
                    $id = $_POST["id"];
                    $name = $_POST["nameNxb"];
                    update_NhaXuatBan($id, $name);
                }
                $listNxb = list_NhaXuatBan("");
                include ("NXB/nhaxuatban.php");
                break;

            //Tác giả
            case 'addTg':
                $errtg = "";
                if (isset($_POST['themMoi'])) {
                    $name = $_POST["nameTg"];

                    $isCheck = true;
                    if (empty($name)) {
                        $isCheck = false;
                        $errtg = "Cần nhập Tên Tác giả";
                    }
                    if ($isCheck) {
                        insert_tac_gia($name);
                        $thongbao = "Thêm thành công!";
                    }
                }
                include ("tacGia/add.php");
                break;
            case 'listTacGia':
                if (isset($_POST['submit'])) {
                    $searchTG = $_POST["searchTg"];
                } else {
                    $searchTG = "";
                }
                $listTg = list_tac_gia($searchTG);
                include ("tacGia/listTacGia.php");
                break;
            case 'deleteTg':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    delete_tac_gia($id);
                }
                $listTg = list_tac_gia("");
                include ("tacGia/listTacGia.php");
                break;
            case 'editTg':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    $tg = edit_tac_gia($id);
                }
                include ("tacGia/updateTg.php");
                break;
            case 'updateTg':
                if (isset($_POST['updateTg'])) {
                    $id = $_POST["id"];
                    $name = $_POST["nametg"];
                    update_tac_gia($id, $name);
                }
                $listTg = list_tac_gia("");
                include ("tacGia/listTacGia.php");
                break;

            //Bình luận
            case 'comment':
                if (isset($_POST['submit'])) {
                    $searchBl = $_POST["searchBl"];
                } else {
                    $searchBl = "";
                }
                $listBl = list_binhLuan($searchBl);
                include ("binhLuan/comment.php");
                break;
            case 'deleteBl':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    delete_binhLuan($id);
                }
                $listBl = list_binhLuan("");
                include ("binhLuan/comment.php");
                break;

            // sách
            case 'sach':
                if (isset($_POST['submit'])) {
                    $searchSP = $_POST["searchSP"];
                    $danh_muc_id = $_POST["danh_muc_id"];
                } else {
                    $searchSP = "";
                    $danh_muc_id = "";
                }
                $listDm = list_danhmuc("");
                $listTg = list_tac_gia("");
                $list_Sach = list_sach($danh_muc_id, $searchSP);
                include ("sach/sach.php");
                break;
            case 'addSach':
                if (isset($_POST['submit'])) {
                    $ErrtenSanPham = "";
                    $ErrnhaSanXuatId = "";
                    $ErrdanhMucId = "";
                    $Errgia = "";
                    $ErrmoTa = "";
                    $ErrTg = "";

                    $isCheck = true;

                    $tenSanPham = $_POST['name'];
                    $nhaSanXuatId = $_POST['nha_san_xuat_id'];
                    $danhMucId = $_POST['danh_muc_id'];
                    $gia = $_POST['gia'];
                    $giaSale = $_POST['gia_sale'];
                    $moTa = $_POST['mo_ta'];
                    $created_at = date('Y-m-d H:i:s');
                    $filename = $_FILES["img"]["name"];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);

                    if (empty($tenSanPham)) {
                        $isCheck = false;
                        $ErrtenSanPham = "Tên sản phẩm không được bỏ trống.";
                    }

                    if (empty($nhaSanXuatId)) {
                        $isCheck = false;
                        $ErrnhaSanXuatId = "Vui lòng chọn Nhà Xuất Bản.";
                    }

                    if (empty($danhMucId)) {
                        $isCheck = false;
                        $ErrdanhMucId = "Vui lòng chọn Danh Mục.";
                    }

                    if (empty($gia)) {
                        $isCheck = false;
                        $Errgia = "Giá bán không được bỏ trống.";
                    }
                    if (empty($moTa)) {
                        $isCheck = false;
                        $ErrmoTa = "Cần nhập Mô tả Sản phẩm";
                    }
                    if (empty($filename)) {
                        $isCheck = false;
                        $Errimg = "Cần thêm ảnh Sản phẩm";
                    }
                    if ($isCheck) {
                        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                        $sachId = insert_sach($tenSanPham, $danhMucId, $nhaSanXuatId, $filename, $gia, $giaSale, $moTa, $created_at);
                        $thongbao = "Thêm thành công!";
                    }

                    // Lưu thông tin về tác giả
                    if (!empty($_POST['tacGia_id'])) {
                        $tacGiaIds = $_POST['tacGia_id'];
                        foreach ($tacGiaIds as $tacGiaId) {
                            insert_sach_tac_gia($sachId, $tacGiaId);
                        }
                    } else {
                        $isCheck = false;
                        $ErrTg = "Cần nhập Tên Tác giả";
                    }
                }
                $listTg = list_tac_gia("");
                $listNxb = list_NhaXuatBan("");
                $listDm = list_danhmuc("");

                include ("sach/add.php");
                break;

            case 'editSp':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];

                    $listTg = list_tac_gia("");
                    $listDm = list_danhmuc("");
                    $listNxb = list_NhaXuatBan("");
                    $SP = select_spct($id);
                }
                include ("sach/updateSp.php");
                break;

            case 'updateSp':
                if (isset($_POST['submit'])) {
                    $isCheck = true;

                    $id = $_POST["id"];
                    $tenSanPham = $_POST['name'];
                    $nhaSanXuatId = $_POST['nha_san_xuat_id'];
                    $danhMucId = $_POST['danh_muc_id'];
                    $gia = $_POST['gia'];
                    $giaSale = $_POST['gia_sale'];
                    $moTa = $_POST['mo_ta'];
                    $hinhAnh = $_FILES["img"];
                    $filename = $hinhAnh["name"];

                    // Xóa tất cả các tác giả liên quan đến sản phẩm
                    delete_tacgia_by_sanpham($id);
                    if (empty($tenSanPham)) {
                        $isCheck = false;
                        $ErrtenSanPham = "Tên sản phẩm không được bỏ trống.";
                    }
                    if (empty($gia)) {
                        $isCheck = false;
                        $Errgia = "Giá bán không được bỏ trống.";
                    }
                    if (empty($moTa)) {
                        $isCheck = false;
                        $ErrmoTa = "Cần nhập Mô tả Sản phẩm";
                    }
                    if ($isCheck) {
                        if ($filename) {
                            $filename = time() . $filename;
                            $dir = "../uploads/$filename";

                            if (move_uploaded_file($hinhAnh["tmp_name"], $dir)) {
                                update_sanpham_coHinhAnh($id, $tenSanPham, $danhMucId, $nhaSanXuatId, $filename, $gia, $giaSale, $moTa);
                            }
                        }
                        update_sanpham_KhongHinhAnh($id, $tenSanPham, $nhaSanXuatId, $danhMucId, $gia, $giaSale, $moTa);

                    }
                    // Thêm mới các tác giả cho sản phẩm
                    if (!empty($_POST['tacGia_id'])) {
                        $tacGiaIds = $_POST['tacGia_id'];
                        foreach ($tacGiaIds as $tacGiaId) {
                            insert_sach_tac_gia($id, $tacGiaId);
                        }
                    } else {
                        $isCheck = false;
                        $ErrTg = "Cần nhập Tên Tác giả";
                    }
                }
                $listDm = list_danhmuc("");
                $listTg = list_tac_gia("");
                $list_Sach = list_sach("", "");

                include ("sach/sach.php");
                break;

            case 'deleteSp':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    delete_sach($id);
                }
                $list_Sach = list_sach("", "");
                include ("sach/sach.php");
                break;

            // thêm bìa sách
            case 'BiaSach':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                include ("Bia_sach/add.php");
                break;

            case 'insertBia':
                if (isset($_POST['submit'])) {
                    $id_sach = $_POST['id'];
                    $loai_bia = $_POST['loai_bia'];
                    $muc_tang = $_POST['muc_tang'];
                    // Ví dụ:
                    $bia_id = insert_bia_bienthe($loai_bia, $muc_tang);
                    // thêm vào bảng trung gian
                    insert_trung_gian_bia_product($id_sach, $bia_id);
                }
                $list_Sach = list_sach("", "");

                include ("sach/sach.php");
                break;
            case 'account':
                if (isset($_POST['submit'])) {
                    $searchName = $_POST["searchName"];
                } else {
                    $searchName = "";
                }
                $listAcc = list_acc($searchName);
                include ("acc/acc.php");
                break;
            case 'deleteAcc':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    delete_acc($id);
                }
                $listAcc = list_acc("");
                include ("acc/acc.php");
                break;

            case 'editAcc':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    $acc = edit_acc($id);
                }
                include ("acc/updateAcc.php");
                break;
            case 'updateAcc':
                if (isset($_POST['update'])) {
                    $id = $_POST["id"];
                    $is_admin = $_POST["is_admin"];
                    update_acc($id, $is_admin);
                }
                $listAcc = list_acc("");
                include ("acc/acc.php");
                break;
            case 'logout':
                session_unset();
                header("Location: index.php");
                break;

            // đơn hàng
            case 'order':
                if (isset($_POST['submit'])) {
                    $search_id_DH = $_POST["search_id_DH"];
                    // echo $search_id_DH;
                    // die;
                } else {
                    $search_id_DH = "";
                }
                $list_order_cart = select_order_cart($search_id_DH);
                include ("donhang/donhang.php");
                break;
            case 'ChiTietDonHang':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    $list_order_cart_where_id = select_ChiTietDonHang_where_id($id);
                    $gioHang = select_gio_hang_item_thanhtoan_where_id($id);
                }
                include ("donhang/ChiTietDonHang.php");
                break;
            case 'updateChiTietDonHang':
                if (isset($_POST['submit'])) {
                    $id = $_POST["id"];
                    $selectedStatus = $_POST['status_id'];
                    update_status_ChiTietDonHang($id, $selectedStatus);
                }
                $list_order_cart = select_order_cart("");
                include ("donhang/donhang.php");
                break;

            case 'thongKe':
                if (isset($_POST['submit'])) {
                    $selected_day = $_POST['select_day'];
                    $selected_month = $_POST['select_month'];
                    $selected_year = $_POST['select_year'];

                    // Kiểm tra nếu có chọn ngày, tháng và năm
                    if ($selected_day != 0 && $selected_month != 0 && $selected_year != 0) {
                        // Thực hiện thống kê theo ngày, tháng và năm
                        $thongke_DoanhThu_sach = thongke_DoanhThu_sach($selected_month, $selected_year, $selected_day);
                    }
                    // Kiểm tra nếu chỉ chọn tháng và năm
                    elseif ($selected_month != 0 && $selected_year != 0) {
                        // Thực hiện thống kê theo tháng và năm
                        $thongke_DoanhThu_sach = thongke_DoanhThu_sach($selected_month, $selected_year, null);
                    }
                    // Kiểm tra nếu chỉ chọn năm
                    elseif ($selected_year != 0) {
                        // Thực hiện thống kê theo năm
                        $thongke_DoanhThu_sach = thongke_DoanhThu_sach(null, $selected_year, null);
                    }
                }

                $thongke_gia_DanhMuc = thongke_gia_DanhMuc();
                $top_10_sach_banChay = top_10_sach_banChay();
                $thongke_DoanhThu_5_thang = thongke_DoanhThu_6_thang();

                include ("thongke/thongke.php");
                break;
            case 'trangchu':
                if (isset($_POST['submit'])) {
                    $selected_day = $_POST['select_day'];
                    $selected_month = $_POST['select_month'];
                    $selected_year = $_POST['select_year'];

                    // Kiểm tra nếu có chọn ngày, tháng và năm
                    if ($selected_day != 0 && $selected_month != 0 && $selected_year != 0) {
                        // Thực hiện thống kê theo ngày, tháng và năm
                        $thongke_DoanhThu_sach = thongke_DoanhThu_sach($selected_month, $selected_year, $selected_day);
                    }
                    // Kiểm tra nếu chỉ chọn tháng và năm
                    elseif ($selected_month != 0 && $selected_year != 0) {
                        // Thực hiện thống kê theo tháng và năm
                        $thongke_DoanhThu_sach = thongke_DoanhThu_sach($selected_month, $selected_year, null);
                    }
                    // Kiểm tra nếu chỉ chọn năm
                    elseif ($selected_year != 0) {
                        // Thực hiện thống kê theo năm
                        $thongke_DoanhThu_sach = thongke_DoanhThu_sach(null, $selected_year, null);
                    }
                }

                $thongke_gia_DanhMuc = thongke_gia_DanhMuc();
                $top_10_sach_banChay = top_10_sach_banChay();
                $thongke_DoanhThu_5_thang = thongke_DoanhThu_6_thang();

                include ("thongke/thongke.php");
                break;
            default:
                include ("home.php");
                break;
        }
    } else {
        if (isset($_POST['submit'])) {
            $selected_day = $_POST['select_day'];
            $selected_month = $_POST['select_month'];
            $selected_year = $_POST['select_year'];

            // Kiểm tra nếu có chọn ngày, tháng và năm
            if ($selected_day != 0 && $selected_month != 0 && $selected_year != 0) {
                // Thực hiện thống kê theo ngày, tháng và năm
                $thongke_DoanhThu_sach = thongke_DoanhThu_sach($selected_month, $selected_year, $selected_day);
            }
            // Kiểm tra nếu chỉ chọn tháng và năm
            elseif ($selected_month != 0 && $selected_year != 0) {
                // Thực hiện thống kê theo tháng và năm
                $thongke_DoanhThu_sach = thongke_DoanhThu_sach($selected_month, $selected_year, null);
            }
            // Kiểm tra nếu chỉ chọn năm
            elseif ($selected_year != 0) {
                // Thực hiện thống kê theo năm
                $thongke_DoanhThu_sach = thongke_DoanhThu_sach(null, $selected_year, null);
            }
        }

        $thongke_gia_DanhMuc = thongke_gia_DanhMuc();
        $top_10_sach_banChay = top_10_sach_banChay();
        $thongke_DoanhThu_5_thang = thongke_DoanhThu_6_thang();

        include ("thongke/thongke.php");
    }
    include ("footer.php");
} else {
    include ("login.php");
}

?>