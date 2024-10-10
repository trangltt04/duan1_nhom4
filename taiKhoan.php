<?php
// đăng kí
function insert_taikhoan($email, $name, $password)
{
    $sql = "INSERT INTO users(email,name,password) VALUES ('$email','$name','$password')";
    pdo_execute($sql);
}
// đăng nhập
function checkUser($email, $password)
{
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function checkUser_admin($email, $password)
{
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND is_admin = 1";
    $sp = pdo_query_one($sql);
    return $sp;
}
function list_Alltaikhoan()
{
    $sql = "SELECT * FROM users ORDER BY id desc"; // sắp xếp 
    $listTk = pdo_query($sql);

    return $listTk;
}

function update_taikhoan($id, $name, $img, $sđt, $email, $password, $dia_chi)
{
    $sql = "UPDATE users 
    SET 
        name='$name',
        avatar='$img',
        phone='$sđt',
        email='$email',
        password='$password',
        dia_chi='$dia_chi'
        WHERE id = $id";
    pdo_execute($sql);

}

function select_taiKhoan_id($id)
{
    $sql = "SELECT * FROM `users` WHERE id= $id";
    pdo_execute($sql);
}
function checkemail($email)
{
    $sql = "SELECT * FROM users WHERE email = '$email'";
    // echo $sql;
    // die;
    $sp = pdo_query_one($sql);
    return $sp;
}
function checkemail_admin($email)
{
    $sql = "SELECT * FROM users WHERE email = '$email' AND is_admin = 1";
    $sp = pdo_query_one($sql);
    return $sp;
}
function email_da_ton_tai($email){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $em = pdo_query_one($sql);
    return $em;
}

function ten_dang_nhap_da_ton_tai($name) {
    $sql = "SELECT * FROM users WHERE name = '$name'";
    $user = pdo_query_one($sql);
    return $user;
}



?>