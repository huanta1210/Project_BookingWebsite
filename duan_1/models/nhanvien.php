<?php 
    function loadNhanVien() {
        $sql = "SELECT * FROM quanli_nhanvien JOIN vai_tro ON quanli_nhanvien.id_vaitro = vai_tro.id_vaitro";
        $listNhanVien = pdo_query("$sql");
        return $listNhanVien;
    }
    function loadNhanVienVaiTro() {
        $sql = "SELECT * FROM vai_tro ";
        $listNhanVien = pdo_query("$sql");
        return $listNhanVien;
    }   

    function load_NhanVien($kyw="",$id_vaitro=0) {
        $sql ="SELECT * FROM quanli_nhanvien WHERE 1";
        if($kyw != "") {
            $sql.=" AND name_nhanvien LIKE '%".$kyw."%' "; 
        }
        if($id_vaitro > 0) {
            $sql.=" AND id_vaitro ='".$id_vaitro."'"; 
        }
        $sql.=" ORDER BY id_nhanvien DESC ";
        $listLoaiPhong = pdo_query($sql);
        return $listLoaiPhong;
    }

    function insertNhanVien($name_nhanvien,$img_nhanvien,$email_nhanvien,$address_nhanvien,$tell_nhanvien,$cccd_nhanvien,$id_vaitro) {
        $sql = "INSERT INTO quanli_nhanvien(name_nhanvien,img_nhanvien,email_nhanvien,address_nhanvien,tell_nhanvien,cccd_nhanvien,id_vaitro) 
        VALUES ('$name_nhanvien','$img_nhanvien','$email_nhanvien','$address_nhanvien','$tell_nhanvien','$cccd_nhanvien','$id_vaitro')";
        pdo_execute($sql);
    }
    function deleteNhanVien() {
        $id = $_GET['id_nhanvien'];
        $sql = "DELETE FROM quanli_nhanvien WHERE id_nhanvien = '$id'";
        pdo_execute($sql);
    }
    
    function loadOneNhanVien() {
        if(isset($_GET['id_nhanvien']) && !empty($_GET['id_nhanvien'])) {
            $id = $_GET['id_nhanvien'];
            // Kiểm tra tính hợp lệ của $id nếu cần
            $sql = "SELECT * FROM quanli_nhanvien JOIN vai_tro ON quanli_nhanvien.id_vaitro = vai_tro.id_vaitro WHERE quanli_nhanvien.id_nhanvien = '$id'";
            $loadOneNhanVien = pdo_query_one($sql);
            return $loadOneNhanVien;
        } else {
            // Trả về null hoặc giá trị mặc định khác tùy vào yêu cầu của ứng dụng
            return null;
        }
    }
    
    
    function updateNhanVien($id,$name_nhanvien,$img_nhanvien,$email_nhanvien,$address_nhanvien,$tell_nhanvien,$cccd_nhanvien,$id_vaitro) {
        if($img_nhanvien != "") {
            $sql ="UPDATE quanli_nhanvien SET name_nhanvien ='$name_nhanvien', img_nhanvien ='$img_nhanvien', email_nhanvien ='$email_nhanvien', address_nhanvien ='$address_nhanvien', tell_nhanvien ='$tell_nhanvien', cccd_nhanvien ='$cccd_nhanvien', id_vaitro = '$id_vaitro' WHERE id_nhanvien = '$id'";
        } else {
            $sql ="UPDATE quanli_nhanvien SET name_nhanvien ='$name_nhanvien', email_nhanvien ='$email_nhanvien', address_nhanvien ='$address_nhanvien', tell_nhanvien ='$tell_nhanvien', cccd_nhanvien ='$cccd_nhanvien', id_vaitro = '$id_vaitro' WHERE id_nhanvien = '$id'";

        }
        pdo_execute($sql);
    }
?>