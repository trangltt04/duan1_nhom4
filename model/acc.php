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

?>