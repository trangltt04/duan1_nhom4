<?php
function select_1_sach($id_user)
{
    $sql = "SELECT gio_hang_items.id,products.id as id_product,gio_hang_items.loai_bia, gio_hang_items.user_id,gio_hang_items.so_luong,gio_hang_items.gia AS gia, (gio_hang_items.so_luong * gio_hang_items.gia ) 
    AS thanhtien, products.ten ,products.img AS hinhAnh 
    FROM gio_hang_items 
    JOIN products ON products.id=gio_hang_items.product_id 
    WHERE gio_hang_items.user_id = $id_user
    ORDER BY gio_hang_items.id desc";
    $gioHang = pdo_query($sql);
    return $gioHang;
}

function delete_gio_hang($id)
{
    $sql = "DELETE FROM gio_hang_items WHERE id = $id";
    pdo_query($sql);
}
function add_gio_hang($id_user, $product_id, $so_luong, $gia, $loai_bia)
{
    $sql = "INSERT INTO gio_hang_items(user_id, product_id, so_luong, gia,loai_bia) 
     VALUES ('$id_user','$product_id','$so_luong','$gia','$loai_bia')";
    // echo $sql;
    // die;
    pdo_execute($sql);
}
function tong_gia($id_user)
{
    $sql = "SELECT SUM(so_luong*gio_hang_items.gia) AS tong FROM gio_hang_items 
    JOIN products ON products.id=gio_hang_items.product_id 
    WHERE gio_hang_items.user_id = $id_user";
    $tongGia = pdo_query_one($sql);
    return $tongGia;
}
function update_SanPham_Da_co_cart($id_user, $so_luong, $id_product, $loai_bia, $gia)
{
    $sql = "UPDATE gio_hang_items 
    SET so_luong = $so_luong 
    WHERE product_id = $id_product 
    AND loai_bia = '$loai_bia' 
    AND gio_hang_items.user_id = $id_user";
    pdo_execute($sql);
}
function insert_donHang_id($customer_id, $status, $tong_tien, $payment, $ghi_chu, $name, $phone, $email, $adress, $created_at)
{
    $sql = "INSERT INTO gio_hang(customer_id, status, tong_tien, payment, ghi_chu, name, phone, email, adress,created_at) 
    VALUES ('$customer_id','$status','$tong_tien','$payment','$ghi_chu','$name','$phone','$email','$adress','$created_at')";
    // echo $sql;
    $e = pdo_execute_return_lastInsertId($sql);
    return $e;
}
function insert_gio_hang_item_thanhtoan($so_luong, $product_id, $loai_bia, $user_id, $gio_hang_id, $thanhtien)
{
    $sql = "INSERT INTO gio_hang_item_thanhtoan(so_luong, product_id, loai_bia, user_id, gio_hang_id,Gia_tien_Pro_id) 
    VALUES ('$so_luong','$product_id','$loai_bia','$user_id','$gio_hang_id','$thanhtien')";
    $e = pdo_execute_return_lastInsertId($sql);
    return $e;
}
function delete_sanPham_cart($id)
{
    $sql = "DELETE FROM gio_hang_items WHERE id = $id";
    pdo_query($sql);
}

// admin
function select_order_cart($search)
{
    $sql = "SELECT gio_hang.id,gio_hang.customer_id as id_user, gio_hang.status, gio_hang.tong_tien, gio_hang.payment, gio_hang.ghi_chu, gio_hang.name, gio_hang.phone, gio_hang.email,gio_hang.adress, gio_hang.created_at  
    FROM `gio_hang` WHERE 1";
    if ($search != "") {
        $sql .= " AND gio_hang.id LIKE $search";
    }
    $sql .= " ORDER BY gio_hang.id desc";
    $gioHang = pdo_query($sql);
    return $gioHang;
}
function select_ChiTietDonHang_where_id($id)
{
    $sql = "SELECT gio_hang.id,gio_hang.customer_id as id_user, gio_hang.status, gio_hang.tong_tien, gio_hang.payment, gio_hang.ghi_chu, gio_hang.name, gio_hang.phone, gio_hang.email,gio_hang.adress, gio_hang.created_at  
    FROM `gio_hang`
    WHERE id = $id
    ORDER BY gio_hang.id desc";
    $gioHang = pdo_query_one($sql);
    return $gioHang;
}
function select_gio_hang_item_thanhtoan_where_id($id)
{
    $sql = "SELECT gio_hang_item_thanhtoan.*, products.ten, products.img AS hinhAnh, products.id  FROM `gio_hang_item_thanhtoan`
    JOIN products on products.id = gio_hang_item_thanhtoan.product_id
        WHERE gio_hang_item_thanhtoan.gio_hang_id  = $id
        ORDER BY gio_hang_item_thanhtoan.id desc";
    // echo $sql;
    // die;
    $gioHang = pdo_query($sql);
    return $gioHang;
}
function update_status_don_hang($id, $selectedStatus)
{
    $sql = "UPDATE `gio_hang` SET `status`='$selectedStatus' WHERE  id = $id";
    pdo_execute($sql);
}

function update_luot_ban($id, $selectedStatus)
{
    if ($selectedStatus == 3) {
        // Đã giao hàng thành công
        $gioHang = select_gio_hang_item_thanhtoan_where_id($id);
        if (!empty($gioHang)) {
            foreach ($gioHang as $item) {
                $soLuong = $item["so_luong"];
                if (isset($item["product_id"])) {
                    $idSanPham = $item["product_id"];
                    // Cập nhật lượt bán thành số lượng sản phẩm
                    update_luot_ban_san_pham($idSanPham, $soLuong);
                }
            }
        }
    } else {
        // Chưa giao hàng thành công
        $gioHang = select_gio_hang_item_thanhtoan_where_id($id);
        if (!empty($gioHang)) {
            foreach ($gioHang as $item) {
                if (isset($item["product_id"])) {
                    $idSanPham = $item["product_id"];
                    // Cập nhật lượt bán thành 0
                    update_luot_ban_san_pham($idSanPham, 0);
                }
            }
        }
    }
}
function update_status_ChiTietDonHang($id, $selectedStatus)
{
    // Cập nhật trạng thái của đơn hàng
    update_status_don_hang($id, $selectedStatus);
    // Cập nhật lượt bán của sản phẩm
    update_luot_ban($id, $selectedStatus);
}

function update_luot_ban_san_pham($id_product, $soLuong)
{
    $sql = "UPDATE `products` SET `luot_ban` = '$soLuong' WHERE `products`.`id` = $id_product";
    pdo_execute($sql);
}
// function update_luot_ban_san_pham($id_product, $soLuong)
// {
//     $sql = "UPDATE `products` SET `luot_ban`='$soLuong' WHERE products.id =  $id_product";
//     pdo_execute($sql);
// }
function select_Don_hang_cua_toi_where_idUser($id, $search)
{
    $sql = "SELECT gio_hang.id,gio_hang.customer_id as id_user, gio_hang.status, gio_hang.tong_tien, gio_hang.payment, gio_hang.ghi_chu, gio_hang.name, gio_hang.phone, gio_hang.email,gio_hang.adress, gio_hang.created_at  
    FROM `gio_hang`
    WHERE gio_hang.customer_id = $id";
    if ($search != "") {
        $sql .= " AND gio_hang.id LIKE  $search";
    }
    $sql .= " ORDER BY gio_hang.id desc";
    // echo $sql; die;
    $gioHang = pdo_query($sql);
    return $gioHang;
}
function select_Don_hang_cua_toi_thanhtoan_where_id($id)
{
    $sql = "SELECT gio_hang_item_thanhtoan.*, products.ten, products.img AS hinhAnh, ( gio_hang_item_thanhtoan.so_luong * products.gia ) 
    AS thanhtien  FROM `gio_hang_item_thanhtoan`
    JOIN products on products.id = gio_hang_item_thanhtoan.product_id
        WHERE gio_hang_item_thanhtoan.user_id  = $id
        ORDER BY gio_hang_item_thanhtoan.id desc";
    $gioHang = pdo_query($sql);
    return $gioHang;
}
function update_status_DHcuatoi($id)
{
    $sql = "UPDATE `gio_hang` SET `status`='5' WHERE  id = $id";
    pdo_execute($sql);
}
?>