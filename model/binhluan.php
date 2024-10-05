<?php
function insert_binhluan($idSp, $idUser, $noiDung, $ngayBinhLuan, $thoiGianBinhLuan)
{
    $sql = "INSERT INTO binh_luan( customer_id, product_id, content, created_time_at,created_day_at) 
        VALUES 
        ('$idSp','$idUser','$noiDung','$thoiGianBinhLuan','$ngayBinhLuan')";
    pdo_execute($sql);
}

function list_binhLuan($searchBl)
{
    $sql = "SELECT binh_luan.*, products.ten as TenSach, products.img, users.name, users.avatar, users.email FROM products 
    JOIN binh_luan on binh_luan.customer_id = products.id 
    JOIN users on binh_luan.product_id = users.id WHERE 1";
    if ($searchBl != "") {
        $sql .= " AND content LIKE '%" . $searchBl . "%'";
    }
    $sql .= " ORDER BY id desc";
    $listBl = pdo_query($sql);
    return $listBl;
}

function delete_binhLuan($id)
{
    $sql = "DELETE FROM binh_luan WHERE id = $id";
    pdo_query($sql);
}
function selectAll_binhluan($idSp)
{
    $sql = "SELECT * FROM binh_luan JOIN users on binh_luan.product_id = users.id WHERE binh_luan.customer_id = $idSp";
    // var_dump($sql);
    // die();
    $listBl = pdo_query($sql);
    return $listBl;
}