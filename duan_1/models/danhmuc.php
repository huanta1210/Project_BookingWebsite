<?php 

function loadLoaiphong() {
    $sql = "SELECT * FROM loai_phong";
    $listLoaiPhong = pdo_query("$sql");
    return $listLoaiPhong;
}


function insertLoaiPhong($ten_loaiphong) {
    $sql = "INSERT INTO loai_phong(ten_loaiphong) VALUES ('$ten_loaiphong')";
    pdo_execute($sql);
}

function deleteLoaiphong() {
    $id = $_GET['id'];
    $sql = "DELETE FROM loai_phong WHERE id_loaiphong = '$id'";
    pdo_execute($sql);
}

function loadOneLoaiPhong() {
    $id = $_GET['id'];
    $sql = "SELECT * FROM loai_phong WHERE id_loaiphong = '$id'";
    $loaiPhong = pdo_query_one($sql);
    return $loaiPhong;
}

function updateLoaiPhong() {
    $ten_loaiphong = $_POST['tenloaiphong'];
    $id = $_POST['id'];
    $sql = "UPDATE loai_phong SET ten_loaiphong = '$ten_loaiphong' WHERE id_loaiphong = '$id'";
    pdo_execute($sql);
}



?>