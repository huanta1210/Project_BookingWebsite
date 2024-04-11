<?php 
    function totalCart() {
        $tong = 0;
        foreach ($_SESSION['cart'] as $cart) {
           $tong = $cart[3];
        }
        return $tong;
    }

    function insertBill($name,$email,$ngaydatphong,$ngaytraphong,$dienthoai,$tong,$payMethod) {
        $sql = "INSERT INTO bill(tentaikhoan, emailtaikhoan,ngaydatphong,ngaytraphong,sodienthoai,tongtien,id_paymethod)
        VALUES ('$name','$email','$ngaydatphong','$ngaytraphong','$dienthoai','$tong','$payMethod')";
        return pdo_execute_lastInsertId($sql);
    }

    function insertCart($id_taikhoan,$name_datphong,$anh_datphong,$ngay_den,$ngay_di,$tong,$id_bill,$id_phong) {
        $sql = "INSERT INTO dat_phong(id_taikhoan,name_datphong,anh_datphong, ngay_den, ngay_di,tong_tien,id_bill,id_phong)
        VALUES ('$id_taikhoan','$name_datphong','$anh_datphong','$ngay_den','$ngay_di','$tong','$id_bill','$id_phong')";
        pdo_execute($sql);
    }

    function loadOneBill($id_bill) {
        $sql = "SELECT * FROM bill WHERE id_bill = '$id_bill'";
        $bill = pdo_query_one($sql);
        return $bill;
    }

    function loadThongKe() {
        $sql = "SELECT 
        DATE_FORMAT(ngaydatphong, '%Y-%m') AS month,
        COUNT(*) AS total_orders FROM bill WHERE
        YEAR(ngaydatphong) = YEAR(CURRENT_DATE()) AND MONTH(ngaydatphong) = MONTH(CURRENT_DATE())
        GROUP BY 
        DATE_FORMAT(ngaydatphong, '%Y-%m');";
        $listThongKe = pdo_query($sql);
        return $listThongKe;

    }

    function loadAllBill() {
        $sql = "SELECT * FROM bill JOIN dat_phong ON bill.id_bill = dat_phong.id_bill JOIN phong ON dat_phong.id_phong = phong.id_phong;";
        $bill = pdo_query($sql);
        return $bill;
    }

    function loadOneBillDetails() {
        $id_bill = $_GET['id_bill'];
        $sql = "SELECT * FROM bill 
        JOIN dat_phong ON bill.id_bill = dat_phong.id_bill 
        JOIN phong ON dat_phong.id_phong = phong.id_phong
        JOIN loai_phong ON phong.id_loaiphong = loai_phong.id_loaiphong
        JOIN khach_san ON phong.id_khach_san = khach_san.id_khach_san
        WHERE bill.id_bill = '$id_bill'";
        $bill = pdo_query($sql);
        return $bill;

    }
    // function loadBillDetails() {
    //     $sql = "SELECT dat_phong.anh_datphong,dat_phong.name_datphong,taikhoan.user_taikhoan,taikhoan.tell_taikhoan,dat_phong.ngay_den,dat_phong.ngay_di,dat_phong.id_dat_phong FROM dat_phong 
    //     JOIN phong ON dat_phong.id_phong = phong.id_phong
    //     JOIN taikhoan ON dat_phong.id_taikhoan = taikhoan.id_taikhoan
    //     GROUP BY id_dat_phong DESC";
    //     $bill = pdo_query($sql);
    //     return $bill;
    // }
    function loadBillDetails($id_dat_phong = 0) {
        $sql = "SELECT dat_phong.anh_datphong, dat_phong.name_datphong, taikhoan.user_taikhoan, taikhoan.tell_taikhoan, dat_phong.ngay_den, dat_phong.ngay_di, dat_phong.id_dat_phong 
                FROM dat_phong 
                JOIN phong ON dat_phong.id_phong = phong.id_phong
                JOIN taikhoan ON dat_phong.id_taikhoan = taikhoan.id_taikhoan";
        
        if (!empty($id_dat_phong)) {
            $sql .= " WHERE dat_phong.id_dat_phong = '".$id_dat_phong."'";
        }
        
        $sql .= " GROUP BY dat_phong.id_dat_phong DESC";
        
        $bill = pdo_query($sql);
        return $bill;
    }
    


    function getBill($n) {
        switch($n) {
            case '0':
                $trangthai = "Đang chờ xác nhận";
                break;
            case '1':
                $trangthai = "Đã xác nhận";
                break;
            case '2':
                $trangthai = "Đã thanh toán";
                break;
            case '3':
                $trangthai = "Huỷ bỏ";
                break;
            default:
                break;

        }
        return $trangthai;
    }
    function getPayments($n) {
        switch($n) {
            case '0':
                $trangthai = "Thẻ ATM nội địa";
                break; 
            case '1':
                $trangthai = "Thẻ thanh toán";
                break;
            case '2':
                $trangthai = "Thanh toán tại quầy";
                break;
            default:
                break;
        }
        return $trangthai;
    }

   
    function insertTaiKhoan($fullname, $email, $tell_taikhoan) {
        $sql = "INSERT INTO taikhoan(user_taikhoan,email_taikhoan,tell_taikhoan) 
        VALUES ('$fullname', '$email', '$tell_taikhoan')";
        pdo_execute($sql);
    }

    function getUsers($fullname, $email, $tell_taikhoan) {
        $sql = "SELECT * FROM taikhoan WHERE user_taikhoan = '$fullname' AND email_taikhoan = '$email' AND tell_taikhoan = '$tell_taikhoan'";
        $result = pdo_query_one($sql);
        return $result;
    }

    function loadBillBooking() {
        $sql = "SELECT * FROM bill
        JOIN dat_phong ON bill.id_bill = dat_phong.id_bill";
        $loadBillBooking = pdo_query($sql);
        return $loadBillBooking;
    }
   
?>