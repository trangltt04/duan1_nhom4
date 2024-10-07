<?php
function insert_NhaXuatBan($name)
{
    $sql = "INSERT INTO nha_san_xua(name) VALUES ('$name')";
    pdo_execute($sql);
}
function delete_NhaXuatBan($id)
{
    $sql = "DELETE FROM nha_san_xua WHERE id = $id";
    pdo_query($sql);
}
function list_NhaXuatBan($searchName)
{
    $sql = "SELECT * FROM nha_san_xua WHERE 1";
    if ($searchName != "") {
        $sql .= " AND name LIKE '%" . $searchName . "%'";
    }
    $sql .= " ORDER BY id desc";
    // echo $sql;
    // die();
    $listDm = pdo_query($sql);
    return $listDm;
}
function edit_NhaXuatBan($id)
{
    $sql = "SELECT * FROM nha_san_xua WHERE id = $id";
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_NhaXuatBan($id, $name)
{
    $sql = "UPDATE nha_san_xua
                SET name='$name' WHERE id = $id";
    pdo_execute($sql);
}
?>