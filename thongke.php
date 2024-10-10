<?php
function thongke_gia_DanhMuc()
{
    $sql = "SELECT danh_muc.name, 
    danh_muc.id, 
    COUNT(products.id) AS countSP, 
    SUM(products.luot_ban) AS totalLuotBan, 
    MIN(products.gia) AS minGia, 
    MAX(products.gia) AS maxGia 
FROM products 
JOIN danh_muc ON danh_muc.id = products.danh_muc_id 
GROUP BY danh_muc.id 
ORDER BY totalLuotBan DESC 
LIMIT 5;";
    return pdo_query($sql);
}

function thongke_DoanhThu_thang()
{
    $sql = "SELECT YEAR(created_at) AS nam, MONTH(created_at) AS thang, SUM(gia) AS doanh_thu
    FROM products
    GROUP BY YEAR(created_at), MONTH(created_at)
    ORDER BY YEAR(created_at), MONTH(created_at)";
    return pdo_query($sql);
}
function thongke_DoanhThu_6_thang()
{

    $sql = "SELECT YEAR(created_at) AS nam, MONTH(created_at) AS thang, SUM(gia) AS doanh_thu,  SUM(luot_ban) AS luot_ban
FROM products
WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 5 MONTH)
GROUP BY nam, thang
ORDER BY nam DESC, thang DESC;";
    return pdo_query($sql);
}
// function thongke_DoanhThu_sach($selected_month, $selected_year, $selected_day)
// {
//     $sql = "SELECT YEAR(created_at) AS nam, MONTH(created_at) AS thang,  DAY(created_at) AS ngay, SUM(gia) AS doanh_thu,luot_ban
//             FROM products
//             WHERE YEAR(created_at) = $selected_year AND MONTH(created_at) = $selected_month AND DAY(created_at) = $selected_day
//             GROUP BY nam, thang, ngay
//             ORDER BY nam DESC, thang DESC";
//     // echo $sql;
//     // die;
//     return pdo_query($sql);
// }

function thongke_DoanhThu_sach($selected_month, $selected_year, $selected_day)
{
    // Tạo câu truy vấn dựa vào điều kiện người dùng đã chọn
    $sql = "SELECT YEAR(created_at) AS nam, MONTH(created_at) AS thang, SUM(gia) AS doanh_thu, SUM(luot_ban) AS luot_ban
            FROM products
            WHERE 1";

    if (!is_null($selected_year)) {
        $sql .= " AND YEAR(created_at) = $selected_year";
    }
    if (!is_null($selected_month)) {
        $sql .= " AND MONTH(created_at) = $selected_month";
    }
    if (!is_null($selected_day)) {
        $sql .= " AND DAY(created_at) = $selected_day";
    }

    $sql .= " GROUP BY nam, thang
              ORDER BY nam DESC, thang DESC";

    return pdo_query($sql);
}

function top_10_sach_banChay()
{
    $sql = "SELECT products.luot_ban, products.ten, products.img FROM products ORDER BY products.luot_ban DESC LIMIT 10;";
    return pdo_query($sql);
}
?>