<?php 
SESSION_START();
unset($_SESSION["errors"]); 
unset($_SESSION["error"]); 

include "../client/header.php";

include "../models/pdo.php";
include "../models/danhmuc.php";
include "../models/phong.php";
include "../models/taikhoan.php";
include "../models/cart.php";
include "../models/binhluan.php";

require "../mail/PHPMailer-master/PHPMailer-master/src/PHPMailer.php"; 
require "../mail/PHPMailer-master/PHPMailer-master/src/SMTP.php"; 
require '../mail/PHPMailer-master/PHPMailer-master/src/Exception.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



include "../global.php";

if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


$rooms = load_phong_home();
$danhMucPhong = loadLoaiPhong();


if(isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch($act) {
        // quản lí danh mục phòng
        case 'phong':
            if(isset($_POST['kyw']) && $_POST['kyw'] != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }


            if(isset($_GET['id_loaiphong']) && $_GET['id_loaiphong'] > 0) {
                $id_loaiphong = $_GET['id_loaiphong'];
                
            } else {
                $id_loaiphong = 0;
            }
            $listLoaiPhong = load_phong($kyw,$id_loaiphong);
            include "phong.php";
            break;       
            

        case 'phongct':
            $loadOnePhong = load_One_Phong();
            include "phongct.php";
            break;
        case 'dangky':
            if(isset($_POST['dangky']) && $_POST['dangky']) {
                $name_useradmin = $_POST['fullname'];
                $pass_admin = $_POST['password'];
                $email_admin = $_POST['email'];

                $errors = [];
                if (empty($name_useradmin)) {
                    $errors["fullname"] = "Vui lòng nhập tài khoản";
                }

                if (empty($email_admin)) {
                    $errors["email"] = "Vui lòng nhập email";
                } elseif (!filter_var($email_admin, FILTER_VALIDATE_EMAIL)) {
                    $errors["email"] = "Email không hợp lệ";
                }

                if (empty($pass_admin)) {
                    $errors["password"] = "Vui lòng nhập mật khẩu";
                } elseif (strlen($pass_admin) < 6) {
                    $errors["password"] = "Mật khẩu phải chứa ít nhất 6 ký tự";
                }

                if(empty($errors)) {
                    insert_taiKhoanAdmin($name_useradmin,$pass_admin,$email_admin);
                    echo "<script>alert('Đăng ký tài khoản thành công!')</script>";
                    echo "<script>window.location.href = 'index.php?act=dangnhap';</script>";
                } else {
                    $_SESSION["errors"] = $errors;
                }
            }
            include "taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if(isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $name_useradmin = $_POST['fullname'];
                $pass_admin = $_POST['password'];
                $getUserAdmin = getUserAdmin($name_useradmin,$pass_admin);
                // $getUser = getUser($name_useradmin,$pass_taikhoan);
                $errors = [];

                if (empty($name_useradmin)) {
                    $errors["fullname"] = "Vui lòng nhập tài khoản";
                }
                if (empty($pass_admin)) {
                    $errors["password"] = "Vui lòng nhập mật khẩu";
                } elseif (strlen($pass_admin) < 6) {
                    $errors["password"] = "Mật khẩu phải chứa ít nhất 6 ký tự";
                }

                
                
                if(empty($errors)) {
                    if(is_array($getUserAdmin)) {
                        // $_SESSION['user_taikhoan'] = $getUser;
                        $_SESSION['user_admin'] = $getUserAdmin;
                        echo "<script>alert('Đăng nhập thành công!')</script>";
                        echo "<script>window.location.href = 'index.php?act=phong';</script>";
                    } else {
                        echo '<script>alert("Tài khoản không tồn tại vui lòng kiểm tra lại")</script>';
                    }
                } else {
                    $_SESSION["errors"] = $errors;
                }
            }
            include "taikhoan/dangnhap.php";
            break;

        case 'thoat':
            SESSION_UNSET();
            echo "<script>window.location.href = 'index.php?act=phong';</script>";
            break;

        case 'addcart':
            if(isset($_POST['addcart']) && $_POST['addcart']) {
                $id = $_POST['idphong'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $loaiphong = $_POST['loaiphong'];
                $succhua = $_POST['succhua'];
                $ngaydatphong = $_POST['ngay_dat_phong'];
                $ngaytraphong = $_POST['ngay_tra_phong'];
                // $id_taikhoan = $_SESSION['user_taikhoan']['id_taikhoan'];
               
                $sql = "SELECT COUNT(*) FROM dat_phong WHERE id_phong = ? AND ngay_den = ? AND ngay_di = ?";
                $result = pdo_query_value($sql, $id, $ngaydatphong, $ngaytraphong);   
                if($result > 0) {
                    echo "<script>alert('Phòng này đã được đặt');</script>";
                    echo "<script>window.location.href = 'index.php?act=phong';</script>";
                } else {
                    $roomExistsInCart = false;
                    if(!$roomExistsInCart) {
                        $addRoom = [$id, $name, $img, $price, $loaiphong, $succhua, $ngaydatphong, $ngaytraphong];
                        array_push($_SESSION['cart'], $addRoom);
                    } 
                }  
            }
              
            include "cart/backgroundcart.php";
            break;
       
            
        
        // case 'delcart':
        //     if(isset($_GET['iddatphong'])) {
        //         // array_slice($_SESSION['cart'],$_GET['iddatphong'],1);
        //         unset($_SESSION['cart'][$_GET['iddatphong']]);
        //     } else {
        //         $_SESSION['cart'] = [];
        //     } 
        //     include "cart/backgroundcart.php";
        //     break;
        case 'bill':
            include "cart/bill.php";
            break;
        case 'billconfirm':
            if(isset($_POST['dongydathang']) && $_POST['dongydathang']) {
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $tell_taikhoan = $_POST['tell_taikhoan'];

                $errors = [];
                if (empty($fullname)) {
                    $errors["fullname"] = "Vui lòng nhập tài khoản";
                }

                if (empty($email)) {
                    $errors["email"] = "Vui lòng nhập email";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors["email"] = "Email không hợp lệ";
                }

                if (empty($tell_taikhoan)) {
                    $errors["tell_taikhoan"] = "Vui lòng nhập số điện thoại";
                } elseif (!is_numeric($tell_taikhoan)) {
                    $errors["tell_taikhoan"] = "Số điện thoại phải ở dạng số";
                }
             
                if(empty($errors)) {
                    $insertUser = insertTaiKhoan($fullname, $email, $tell_taikhoan);
                    $getUsers = getUsers($fullname, $email, $tell_taikhoan);
                    if (is_array($getUsers)) {
                        if (isset($_SESSION['user'])) {
                            array_push($_SESSION['user'], $getUsers);
                        } else {
                            $_SESSION['user'] = array($getUsers);
                        }
                    }
                include "cart/billconfirm.php";

                } else {
                    $_SESSION["error"] = $errors;
                    foreach ($errors as $error) {
                        echo "Error: " . $error;
                    }
                }
            }
            include "cart/backgroundcart.php";
            break;
        case 'tienhanhthanhtoan':
            if(isset($_POST['tienhanhthanhtoan']) && $_POST['tienhanhthanhtoan']) {
                $payMethod = $_POST['checkbox'];       
                     
                if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                    $users = $_SESSION['user'];
                    foreach ($users as $user) {

                       $id_taikhoan = $user['id_taikhoan'];
                       $name = $user['user_taikhoan'];
                       $email = $user['email_taikhoan'];
                       $dienthoai = $user['tell_taikhoan'];

                    }
                }
                if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    $carts = $_SESSION['cart'];
                    foreach ($carts as $cart) {
                       $ngaydatphong = $cart[6]; 
                       $ngaytraphong = $cart[7]; 
                       $loaiphong = $cart[4];
                       $tenphong = $cart[1];

                    }
                }

                $tong = totalCart();
                $id_bill = insertBill($name,$email, $ngaydatphong,$ngaytraphong,$dienthoai,$tong,$payMethod);
                insertCart($id_taikhoan,$cart[1],$cart[2],$cart[6],$cart[7],$cart[3],$id_bill,$cart[0]);   
               
                $mail = new PHPMailer(true);

                try {
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; // Thiết lập máy chủ SMTP
                    $mail->SMTPAuth = true;
                    $mail->Username = 'huantruong1210@gmail.com'; // Tên đăng nhập SMTP
                    $mail->Password = 'vaephxtbyheaisjg'; // Mật khẩu SMTP
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587; // Cổng kết nối SMTP
                    
                    // Thiết lập người gửi và người nhận
                    $mail->setFrom('huantruong1210@gmail.com', 'Anh Huan');
                    $mail->addAddress($email, $name); // Thêm người nhận
                    
                    // Nội dung email
                    $mail->isHTML(true);
                    $mail->Subject = 'Xác nhận đặt phòng';
                    $mail->Body    = "Nội dung email xác nhận đặt hàng $tenphong loại phòng $loaiphong ngày nhận phòng $ngaydatphong ";
                    
                    $mail->send();
                    echo "<script>alert('Đặt phòng thành công!');</script>";
                    echo "<script>window.location.href = 'index.php?act=phong';</script>";
                } catch (Exception $e) {
                    echo "Gửi email thất bại: {$mail->ErrorInfo}";
                }
                
                }
            $listBill = loadOneBill($id_bill);
            include "cart/billconfirm.php";
            break;
        case 'mybilldetails':
            $bills = loadOneBillDetails();
            include "cart/mybilldetails.php";
            break;
        case 'tintuc':
            include "tintuc/tintuc.php";
            break;
        case 'gioithieu':
            include "gioithieu/gioithieu.php";
            break;
        case 'lienhe':
            include "lienhe/lienhe.php";
            break;
        case 'lichsudatphong':
            $loadDatphong = loadRoomDetails($id_dat_phong = 0);
            include "cart/lichsudatphong.php";
            break;
        case 'huydatphong':
            if (isset($_GET['id_dat_phong'])) {
                $bookingId = $_GET['id_dat_phong'];
        
                try {
                    // Kiểm tra xem đơn đặt phòng có tồn tại không
                    $currentStatus = pdo_query_value("SELECT trang_thai FROM dat_phong WHERE id_dat_phong = ?", $bookingId);
        
                    if ($currentStatus !== false) {
                        if ($currentStatus == 3) {
                            // Cập nhật trạng thái của đơn đặt phòng thành đã xác nhận (1)
                            pdo_execute("UPDATE dat_phong SET trang_thai = 1 WHERE id_dat_phong = ?", $bookingId);
                            echo "<script>alert('Xác nhận đơn đặt phòng thành công!')</script>";
                        } else if($currentStatus == 1) {
                            pdo_execute("UPDATE dat_phong SET trang_thai = 3 WHERE id_dat_phong = ?", $bookingId);
                            echo "<script>alert('Xác nhận huỷ phòng thành công!')</script>";
                        } else if ($currentStatus == 0) {
                            // Cập nhật trạng thái của đơn đặt phòng thành đã xác nhận (1)
                            pdo_execute("UPDATE dat_phong SET trang_thai = 3 WHERE id_dat_phong = ?", $bookingId);
                            echo "<script>alert('Xác nhận huỷ đặt phòng thành công!')</script>";
                        } else {
                            echo "<script>alert('Đơn đặt phòng đã được xác nhận hoặc đã thanh toán!')</script>";
                        }
                    } else {
                        echo "<script>alert('Không tìm thấy đơn đặt phòng!')</script>";
                    }
                } catch (PDOException $e) {
                    echo "Lỗi: " . $e->getMessage();
                }
            } else {
                echo "<script>alert('Thiếu thông tin đơn đặt phòng!')</script>";
            }
            // Tải lại danh sách đơn đặt phòng sau khi xử lý
            $loadDatphong = loadRoomDetails();
            include "cart/lichsudatphong.php";
            break;

        default:
            include "../client/body.php";
            break;
    }
} else {
    include "../client/body.php";
}

include "../client/footer.php";
?>