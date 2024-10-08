<?php
function insert_danhmuc($name)
{
    $sql = "INSERT INTO danh_muc(name) VALUES ('$name')";
    pdo_execute($sql);
}
function delete_danhmuc($id)
{
    $sql = "DELETE FROM danh_muc WHERE id = $id";
    pdo_query($sql);
}
function list_danhmuc($searchName)
{
    $sql = "SELECT * FROM danh_muc WHERE 1";
    if ($searchName != "") {
        $sql .= " AND name LIKE '%" . $searchName . "%'";
    }
    $sql .= " ORDER BY id desc";
    // echo $sql;
    // die();
    $listDm = pdo_query($sql);
    return $listDm;
}
function edit_danhmuc($id)
{
    $sql = "SELECT * FROM danh_muc WHERE id = $id";
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($id, $name)
{
    $sql = "UPDATE danh_muc
                SET name='$name' WHERE id = $id";
    pdo_execute($sql);
}
?>