<?php 
    // function insertBinhLuan($noidung_binhluan,$id_phong,$ngaybinhluan,$id_useradmin) {
    //     $sql = "INSERT INTO binhluan(noidung_binhluan,id_phong,ngay_binhluan,id_useradmin) 
    //     VALUES ('$noidung_binhluan','$id_phong','$ngaybinhluan','$id_useradmin')";
    //     pdo_execute($sql);
    // }
    function loadBinhLuan($id_phong) {
        $sql = "SELECT * FROM binhluan JOIN taikhoan_admin ON binhluan.id_useradmin = taikhoan_admin.id_useradmin WHERE id_phong = '".$id_phong."' ORDER BY id_binhluan DESC";
        $listbinhLuan = pdo_query($sql);
        return $listbinhLuan;
    }

    function loadAllBinhLuan() {
        $sql = "SELECT * FROM binhluan 
        JOIN taikhoan ON binhluan.id_taikhoan = taikhoan.id_taikhoan
        JOIN phong ON binhluan.id_phong = phong.id_phong";
        $listbinhLuan = pdo_query($sql);
        return $listbinhLuan;
    }

    function countBinhLuan() {
        $sql = "SELECT COUNT(noidung_binhluan) FROM binhluan WHERE noidung_binhluan IS NOT NULL AND noidung_binhluan <> ''";
        $countBinhLuan = pdo_query($sql);
        return $countBinhLuan;
    }
    function updateCommentStatus($id_useradmin) {
        try {
            $sql = "UPDATE taikhoan_admin JOIN binhluan ON taikhoan_admin.id_useradmin = binhluan.id_useradmin SET binhluan.noidung_binhluan = 1 WHERE taikhoan_admin.id_useradmin = ?";
            pdo_execute($sql, $id_useradmin);
        } catch (PDOException $e) {
            throw $e;
        }
    }
    function insertBinhLuan($noidung_binhluan,$id_phong,$ngaybinhluan,$id_useradmin) {
        try {
            $sql = "INSERT INTO binhluan(noidung_binhluan, id_phong, ngay_binhluan, id_useradmin) VALUES (?, ?, ?, ?)";
            pdo_execute($sql, $noidung_binhluan, $id_phong, $ngaybinhluan,$id_useradmin);
        } catch (PDOException $e) {
            throw $e;
        }
    }
    function hasCommented($id_useradmin) {
        try {
            $sql = "SELECT COUNT(*) FROM binhluan WHERE id_useradmin = ?";
            $count = pdo_query_value($sql, $id_useradmin);
            return $count > 0;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    function deleteBinhLuan() {
        $id_binhluan = $_GET['id_binhluan'];
        $sql = "DELETE FROM binhluan WHERE id_binhluan = '$id_binhluan'";
        pdo_execute($sql);
    }

?>