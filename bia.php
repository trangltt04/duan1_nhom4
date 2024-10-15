<?php
function insert_bia_bienthe($loai_bia, $muc_tang)
{
    $sql = "INSERT INTO bien_the
    (loai_bia, muc_tang) VALUES ('$loai_bia','$muc_tang')";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_trung_gian_bia_product($product_id, $bia_id)
{
    $sql = "INSERT INTO trung_gian_bia_product(product_id, bia_id) VALUES ('$product_id','$bia_id')";
    // echo $sql;
    // die;
    pdo_execute($sql);
}
?>