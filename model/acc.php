<?php

function delete_acc($id)
{
    $sql = "DELETE FROM users WHERE id = $id";
    pdo_query($sql);
}
function list_acc($searchName)
{
    $sql = "SELECT * FROM users WHERE 1";
    if ($searchName != "") {
        $sql .= " AND name LIKE '%" . $searchName . "%'";
    }
    $sql .= " ORDER BY id desc";
   
    $listAcc = pdo_query($sql);
    return $listAcc;
}
function edit_acc($id)
{
    $sql = "SELECT * FROM users WHERE id = $id";
    $acc = pdo_query_one($sql);
    return $acc;
}
function  update_acc($id, $is_admin)
{
    $sql = "UPDATE users 
    SET id='$id',
    is_admin='$is_admin'
     
     WHERE id = $id";
    pdo_execute($sql);
}
?>