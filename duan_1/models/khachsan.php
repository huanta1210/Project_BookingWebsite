<?php 

function loadKhachSan() {
    $sql = "SELECT * FROM khach_san";
    $listKhachSan = pdo_query("$sql");
    return $listKhachSan;
}

function insertKhachSan($tenkhachsan,$anhkhachsan,$sdtkhachsan,$diachi) {
    $sql = "INSERT INTO khach_san(name_khach_san,anh_khach_san,sdt_khach_san,address) VALUES ('$tenkhachsan','$anhkhachsan','$sdtkhachsan','$diachi')";
    pdo_execute($sql);
}

function deleteKhachSan() {
    $id = $_GET['id'];
    $sql = "DELETE FROM khach_san WHERE id_khach_san = '$id'";
    pdo_execute($sql);
}

function loadOneKhachSan() {
    $id = $_GET['id'];
    $sql = "SELECT * FROM khach_san WHERE id_khach_san = '$id'";
    $khachSan = pdo_query_one($sql);
    return $khachSan;
}

function updateKhachSan($id,$tenkhachsan,$anh_khach_san,$sdtkhachsan,$diachi) {
    if($anh_khach_san != "") {
        $sql ="UPDATE khach_san SET name_khach_san ='$tenkhachsan', anh_khach_san ='$anh_khach_san', sdt_khach_san ='$sdtkhachsan', address ='$diachi' WHERE id_khach_san = '$id'";
    } else {
        $sql ="UPDATE khach_san SET name_khach_san ='$tenkhachsan', sdt_khach_san ='$sdtkhachsan', address ='$diachi' WHERE id_khach_san = '$id'";

    }
    pdo_execute($sql);
}



?>