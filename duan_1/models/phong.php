<?php 

function loadPhong() {
    $sql = "SELECT * FROM phong 
    JOIN loai_phong ON phong.id_loaiphong = loai_phong.id_loaiphong
    LEFT JOIN binhluan ON phong.id_phong = binhluan.id_phong";
    $listPhong = pdo_query("$sql");
    return $listPhong;
}


function insertPhong($tenphong,$giaphong,$img,$mota,$succhua,$id_loaiphong,$id_khach_san) {
    $sql = "INSERT INTO phong(name,price,img,mo_ta,suc_chua,id_loaiphong,id_khach_san) VALUES ('$tenphong','$giaphong','$img','$mota','$succhua','$id_loaiphong','$id_khach_san')";
    pdo_execute($sql);
}

function deletephong() {
    $id = $_GET['id'];
    $sql = "DELETE FROM phong WHERE id_phong = '$id'";
    pdo_execute($sql);
}

function loadOnePhong() {
    $id = $_GET['id'];
    $sql = "SELECT * FROM phong JOIN binhluan ON phong.id_phong = binhluan.id_phong WHERE phong.id_phong = '$id'";
    $phong = pdo_query_one($sql);
    return $phong;
}

function updatePhong($id,$tenphong,$giaphong,$img,$mota,$succhua,$id_loaiphong,$id_khach_san) {
    if($img != "") {
        $sql ="UPDATE phong SET name ='$tenphong', price ='$giaphong', img ='$img', mo_ta ='$mota', suc_chua ='$succhua', id_loaiphong ='$id_loaiphong', id_khach_san = '$id_khach_san' WHERE id_phong = '$id'";
    } else {
        $sql ="UPDATE phong SET name ='$tenphong', price ='$giaphong', mo_ta ='$mota', suc_chua ='$succhua', id_loaiphong ='$id_loaiphong', id_khach_san = '$id_khach_san' WHERE id_phong = '$id'";
    }
    pdo_execute($sql);
}


function load_phong_home() {
    $sql ="SELECT * FROM phong";        
    $listPhong = pdo_query($sql);
    return $listPhong;
}

function load_One_Phong() {
    $id = $_GET['idphong'];
    $sql = "SELECT *
    FROM phong
    JOIN loai_phong ON phong.id_loaiphong = loai_phong.id_loaiphong
    JOIN khach_san ON phong.id_khach_san = khach_san.id_khach_san
    WHERE phong.id_phong = '$id';
    ";
    $phong = pdo_query_one($sql);
    return $phong;
}

function load_phong($kyw="",$id_loaiphong=0) {
    $sql ="SELECT * FROM phong WHERE 1";
    if($kyw != "") {
        $sql.=" AND name LIKE '%".$kyw."%' "; 
    }
    if($id_loaiphong > 0) {
        $sql.=" AND id_loaiphong ='".$id_loaiphong."'"; 
    }
    $sql.=" ORDER BY id_phong DESC ";
    $listLoaiPhong = pdo_query($sql);
    return $listLoaiPhong;
}

function loadDatPhong($search="", $id_dat_phong=0) {
    $sql = "SELECT dat_phong.id_dat_phong, dat_phong.anh_datphong, phong.name, khach_san.name_khach_san, bill.tentaikhoan, bill.sodienthoai, bill.ngaydatphong, bill.ngaytraphong, bill.tongtien, pay_method.name_paymethod, dat_phong.trang_thai
            FROM bill
            JOIN dat_phong ON bill.id_bill = dat_phong.id_bill
            JOIN pay_method ON bill.id_paymethod = pay_method.id_paymethod
            JOIN phong ON dat_phong.id_phong = phong.id_phong
            JOIN khach_san ON phong.id_khach_san = khach_san.id_khach_san 
            WHERE 1";

    if($search != "") {
        $sql .= " AND name_datphong LIKE '%".$search."%' "; 
    }
    if($id_dat_phong > 0) {
        $sql .= " AND dat_phong.id_dat_phong ='".$id_dat_phong."'"; 
    }

    $sql .= " ORDER BY dat_phong.id_dat_phong DESC ";

    $listDatPhong = pdo_query($sql);
    return $listDatPhong;
}

function loadRoomDetails($id_dat_phong = 0) {
    $sql = "SELECT dat_phong.id_dat_phong, dat_phong.anh_datphong, phong.name, khach_san.name_khach_san, bill.tentaikhoan, bill.sodienthoai, bill.ngaydatphong, bill.ngaytraphong, bill.tongtien, pay_method.name_paymethod, dat_phong.trang_thai
    FROM bill
    JOIN dat_phong ON bill.id_bill = dat_phong.id_bill
    JOIN pay_method ON bill.id_paymethod = pay_method.id_paymethod
    JOIN phong ON dat_phong.id_phong = phong.id_phong
    JOIN khach_san ON phong.id_khach_san = khach_san.id_khach_san";
    
    if (!empty($id_dat_phong)) {
        $sql .= " WHERE dat_phong.id_dat_phong = '".$id_dat_phong."'";
    }
    
    $sql .= " GROUP BY dat_phong.id_dat_phong DESC";
    
    $bill = pdo_query($sql);
    return $bill;
}

function searchPhong($search) {
    $sql = "SELECT * FROM phong WHERE id_phong LIKE ? OR name LIKE ?";
    $listPhong = pdo_query($sql, '%' . $search . '%', '%' . $search . '%');
    return $listPhong;
}

function searchBillByTenTaiKhoan($search) {
    $sql = "SELECT * FROM bill WHERE id_bill LIKE ? OR tentaikhoan LIKE ?";
    $result = pdo_query($sql, '%' . $search . '%', '%' . $search . '%');
    return $result;
}


?>