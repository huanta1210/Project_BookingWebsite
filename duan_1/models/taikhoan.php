<?php
    function insert_taiKhoan($user_taikhoan,$pass_taikhoan,$email_taikhoan) {
        $sql = "INSERT INTO taikhoan(user_taikhoan,pass_taikhoan,email_taikhoan) 
        VALUES ('$user_taikhoan', '$pass_taikhoan', '$email_taikhoan')";
        pdo_execute($sql);
    }
    function insert_taiKhoanAdmin($name_useradmin,$pass_admin,$email_admin) {
        $sql = "INSERT INTO taikhoan_admin(name_useradmin,pass_admin,email_admin) 
        VALUES ('$name_useradmin', '$pass_admin', '$email_admin')";
        pdo_execute($sql);
    }

    function getUser($user_taikhoan,$pass_taikhoan) {
        $sql = "SELECT * FROM taikhoan WHERE user_taikhoan = '$user_taikhoan' AND pass_taikhoan = '$pass_taikhoan'";
        $result = pdo_query_one($sql);
        return $result;
    }
    function getUserAdmin($name_useradmin,$pass_admin) {
        $sql = "SELECT * FROM taikhoan_admin WHERE name_useradmin = '$name_useradmin' AND pass_admin = '$pass_admin'";
        $result = pdo_query_one($sql);
        return $result;
    }

  
    
    // function update_taiKhoan($id ,$user ,$pass ,$email ,$address, $tell) {
    //     $sql ="UPDATE taikhoan 
    //     SET user ='$user', pass ='$pass', email ='$email', address ='$address', tell ='$tell' WHERE id = '$id'";
    //     pdo_execute($sql);
    // }

    // function checkEmail($email) {
    //     $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
    //     $result = pdo_query_one($sql);
    //     return $result;
    // }

    function loadAllTaiKhoan() {
        $sql = "SELECT * FROM taikhoan ORDER BY id_taikhoan DESC ";
        $listTaiKhoan = pdo_query("$sql");
        return $listTaiKhoan;
    }
?>