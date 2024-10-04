<?php
function insert_tac_gia($name)
{
    $sql = "INSERT INTO tac_gia(name) VALUES ('$name')";
    pdo_execute($sql);
}
function delete_tac_gia($id)
{
    $sql = "DELETE FROM tac_gia WHERE id = $id";
    pdo_query($sql);
}
function list_tac_gia($searchTG)
{
    $sql = "SELECT * FROM tac_gia WHERE 1";
    if ($searchTG != "") {
        $sql .= " AND name LIKE '%" . $searchTG . "%'";
    }
    $sql .= " ORDER BY id desc";
    // echo $sql;
    // die();
    $listTg = pdo_query($sql);
    return $listTg;
}
function edit_tac_gia($id)
{
    $sql = "SELECT * FROM tac_gia WHERE id = $id";
    $tg = pdo_query_one($sql);
    return $tg;
}
function update_tac_gia($id, $name)
{
    $sql = "UPDATE tac_gia
                SET name='$name' WHERE id = $id";
    pdo_execute($sql);
}
?>