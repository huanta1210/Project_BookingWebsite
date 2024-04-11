<?php 
SESSION_START();
unset($_SESSION["errors"]); 
include "header.php";

include "../models/danhmuc.php";
include "../models/khachsan.php";
include "../models/phong.php";
include "../models/taikhoan.php";
include "../models/nhanvien.php";

include "../models/binhluan.php";
include "../models/cart.php";


include "../models/pdo.php"; 


if(isset($_GET['act'])) {
    $act = $_GET['act'];
    switch($act) {
        // quản lí danh mục phòng
        case 'adddm':
            if(isset($_POST['themmoi']) && $_POST['themmoi']) {
                $ten_loaiphong = $_POST['tenloaiphong'];
                if(empty($ten_loaiphong)) {
                    echo "<script>alert('Tên loại phòng không được để trống!')</script>";
                } else {
                    try {
                        $sql = "SELECT COUNT(*) FROM loai_phong WHERE ten_loaiphong = ?";
                        $count = pdo_query_value($sql, $ten_loaiphong);
                
                        if ($count > 0) {
                            echo "<script>alert('Tên loại phòng đã tồn tại!')</script>";
                        } else {
                            $sql_insert = "INSERT INTO loai_phong (ten_loaiphong) VALUES (?)";
                            pdo_execute($sql_insert, $ten_loaiphong);
                            echo "Thêm loại phòng thành công!";
                        }
                    } catch (PDOException $e) {
                        echo "Lỗi: " . $e->getMessage();
                    }
                }
            }
            include "danhmuc/add.php";
            break;

        case 'listdanhmuc':
            $listLoaiPhong = loadLoaiPhong();
            include "danhmuc/list.php";
            break;

        case 'delete':
            if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                deleteLoaiPhong();
            }
            $listLoaiPhong = loadLoaiPhong();
            include "danhmuc/list.php";
            break;

        case 'update':
            if(isset($_GET['id']) && ($_GET['id'] > 0)) { 
                $loaiPhong = loadOneLoaiPhong();
            }
            include "danhmuc/update.php";
            break;

        case 'updateloaiphong':
            if(isset($_POST['capnhat']) && $_POST['capnhat']) {
                updateLoaiPhong(); 
                $thongbao = "<h4>Cập nhật thành công</h4>";
            }
            $listLoaiPhong = loadLoaiPhong();
            include "danhmuc/list.php";
            break;
            
        //Quản lí khách sạn 
        // case 'khachsan':
        //     $listKhachSan = loadKhachSan();
        //     include "khachsan/list.php";
        //     break;

        // case 'addkhachsan':
        //     if(isset($_POST['themmoi']) && $_POST['themmoi']) {
        //         $errors = [];
        //         $tenkhachsan = $_POST['tenkhachsan'];
        //         $sdtkhachsan = $_POST['hotline'];
        //         $diachi = $_POST['diachi'];
                
        //         $anhkhachsan = $_FILES['anhkhachsan']['name'];
        //         $anhkhachsan_tmp = $_FILES['anhkhachsan']['tmp_name'];
        //         move_uploaded_file($anhkhachsan_tmp, '../upload/img'.$anhkhachsan);

        //         if(empty($tenkhachsan)) {
        //             $errors[] = 'Vui lòng nhập tên khách sạn';
        //         }
                
        //         if(empty($sdtkhachsan)) {
        //             $errors[] = 'Vui lòng nhập hotline khách sạn';
        //         }
        //         if (!is_numeric($sdtkhachsan)) {
        //             $errors[] = 'Hotline phải là số';
        //         }

        //         if(empty($diachi)) {
        //             $errors[] = 'Vui lòng nhập địa chỉ khách sạn';
        //         }

        //         if(empty($errors)) {
        //             insertKhachSan($tenkhachsan,$anhkhachsan,$sdtkhachsan,$diachi);
        //             $thongbao = "<h4>Thêm thành công</h4>";
        //         } else {
        //             foreach($errors as $error) {
        //                 echo '<p style="color:red" >'.$error.'</p>';
        //             }
        //         }
        //     }

        //     include "khachsan/add.php";
        //     break;

        // case 'updatekhachsan':
        //     if(isset($_GET['id']) && ($_GET['id'] > 0)) { 
        //         $khachSan = loadOneKhachSan();
        //     }
        //     include "khachsan/update.php";
        //     break;

        // case 'capnhatkhachsan':
        //     if(isset($_POST['capnhat']) && $_POST['capnhat']) {
        //         $tenkhachsan = $_POST['tenkhachsan'];
        //         $sdtkhachsan = $_POST['hotline'];
        //         $diachi = $_POST['diachi'];
        //         $id = $_POST['id'];
                
        //         $anh_khach_san = $_FILES['anhkhachsan']['name'];
        //         $anhkhachsan_tmp = $_FILES['anhkhachsan']['tmp_name'];
        //         move_uploaded_file($anhkhachsan_tmp, '../upload/img'.$anh_khach_san);

        //         updateKhachSan($id,$tenkhachsan,$anh_khach_san,$sdtkhachsan,$diachi);                
        //     }
        //     $listKhachSan = loadKhachSan();

        //     include "khachsan/list.php";
        //     break;
            
        // case 'deletekhachsan':
        //     if(isset($_GET['id']) && ($_GET['id'] > 0)) {
        //         deleteKhachSan();
        //     }
        //     $listKhachSan = loadKhachSan();

        //     include "khachsan/list.php";
        //     break;
        // quản lí phòng
        case 'quanliphong':
            if(isset($_POST['timkiemtheodanhmuc']) && $_POST['timkiemtheodanhmuc']) {
                $kyw = $_POST['search'];
                $id_loaiphong = $_POST['id_loaiphong'];  
            } else {
                $kyw = '';
                $id_loaiphong = 0;
            }
            
            $listPhong = load_phong($kyw,$id_loaiphong);
            $listLoaiPhong = loadLoaiPhong();
            include "phong/list.php";
            break;
        case 'addphong':
            if(isset($_POST['themmoi']) && $_POST['themmoi']) {
                $tenphong = $_POST['tenphong'];
                $giaphong = $_POST['giaphong'];
                

                $id_khach_san = $_POST['id_khach_san'];
                
                $img = $_FILES['anhphong']['name'];
                $img_tmp = $_FILES['anhphong']['tmp_name'];
                move_uploaded_file($img_tmp, '../upload/img'.$img);
                
                $mota = $_POST['mota'];
                $succhua = $_POST['succhua'];
                $idloaiphong = $_POST['id_loaiphong'];

                insertPhong($tenphong,$giaphong,$img,$mota,$succhua,$idloaiphong,$id_khach_san); 
                $thongbao = "<h4>Thêm thành công</h4>";

            }
            $listkhachsan = loadKhachSan();
            $listLoaiPhong = loadLoaiphong();
            $listPhong = loadPhong();
            include "phong/add.php";
            break;

        case 'deletephong':
            if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                deletephong();
            }
            $listPhong = loadPhong();
            include "phong/list.php";
            break;

        case 'updatephong':
            if(isset($_GET['id']) && ($_GET['id'] > 0)) { 
                $phong = loadOnePhong();
            }
            $listkhachsan = loadKhachSan();
            $listLoaiPhong = loadLoaiphong();
            include "phong/update.php";
            break;
    
        case 'capnhatphong':
            if(isset($_POST['capnhat']) && $_POST['capnhat']) {
                $tenphong = $_POST['tenphong'];
                $giaphong = $_POST['giaphong'];
             
                $img = $_FILES['anhphong']['name'];
                $img_tmp = $_FILES['anhphong']['tmp_name'];
                move_uploaded_file($img_tmp, '../upload/img'.$img);
                
                $id = $_POST['id'];
                $mota = $_POST['mota'];
                $succhua = $_POST['succhua'];
                $id_loaiphong = $_POST['id_loaiphong'];
                $id_khach_san = $_POST['id_khach_san'];

                updatePhong($id,$tenphong,$giaphong,$img,$mota,$succhua,$id_loaiphong,$id_khach_san);
                $thongbao = "<h4>Thêm thành công</h4>";
            }
            $listkhachsan = loadKhachSan();
            $listLoaiPhong = loadLoaiphong();
            $listPhong = loadPhong();
            include "phong/list.php";
            break;
            // quản lí người dùng
            case 'quanlinguoidung':
                $listTaiKhoan = loadAllTaiKhoan();
                include "taikhoan/list.php";
                break;

                //Bình luận
            case 'quanlibinhluan':
                $listBinhLuan = loadAllBinhLuan();
                include "binhluan/list.php";
                break;
            case 'deletebinhluan':
                if(isset($_GET['id_binhluan']) && ($_GET['id_binhluan'] > 0)) {
                    deleteBinhLuan();
                }
                $listBinhLuan = loadAllBinhLuan();
                include "binhluan/list.php";
                break;
            // quản lí checkin out
            case 'booking':
                if(isset($_POST['timkiemtheoten']) && $_POST['timkiemtheoten']) {
                    $search = $_POST['search'];
                    $id_dat_phong = $_POST['id_dat_phong'];
                } else {
                    $search = '';
                    $id_dat_phong = 0;
                }      
                $loadDatphong = loadDatPhong($search, $id_dat_phong);
                include "booking/list.php";
                break;

            case 'checkinout':
                if(isset($_POST['timkiemtheoiddatphong']) && $_POST['timkiemtheoiddatphong']) {
                    $id_dat_phong = $_POST['id_dat_phong'];
                } else {
                    $id_dat_phong = 0;
                }   
                $bills = loadBillDetails($id_dat_phong);
                include "checkinout/list.php";
                break;
            case 'dongydatphong':
                if (isset($_GET['id_dat_phong'])) {
                    $bookingId = $_GET['id_dat_phong'];
            
                    try {
                        // Kiểm tra xem đơn đặt phòng có tồn tại không
                        $currentStatus = pdo_query_value("SELECT trang_thai FROM dat_phong WHERE id_dat_phong = ?", $bookingId);
            
                        if ($currentStatus !== false) {
                            if ($currentStatus == 0) {
                                // Cập nhật trạng thái của đơn đặt phòng thành đã xác nhận (1)
                                pdo_execute("UPDATE dat_phong SET trang_thai = 1 WHERE id_dat_phong = ?", $bookingId);
                                echo "<script>alert('Xác nhận đơn đặt phòng thành công!')</script>";
                            } elseif ($currentStatus == 3) {
                                // Cập nhật trạng thái của đơn đặt phòng thành đã xác nhận (1)
                                pdo_execute("UPDATE dat_phong SET trang_thai = 1 WHERE id_dat_phong = ?", $bookingId);
                                echo "<script>alert('Xác nhận đơn đặt phòng thành công!')</script>";
                            } else {
                                echo "<script>alert('Đơn đặt phòng đã được xác nhận trước đó!')</script>";
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
                $bills = loadBillDetails();
                include "checkinout/list.php";
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
                $bills = loadBillDetails();
                include "checkinout/list.php";
                break;
                
            case 'dathanhtoan':
                    if (isset($_GET['id_dat_phong'])) {
                        $bookingId = $_GET['id_dat_phong'];
                
                        try {
                            // Kiểm tra xem đơn đặt phòng có tồn tại không
                            $currentStatus = pdo_query_value("SELECT trang_thai FROM dat_phong WHERE id_dat_phong = ?", $bookingId);
                
                            if ($currentStatus !== false) {
                                if ($currentStatus == 1) {
                                    // Cập nhật trạng thái của đơn đặt phòng thành đã xác nhận (1)
                                    pdo_execute("UPDATE dat_phong SET trang_thai = 2 WHERE id_dat_phong = ?", $bookingId);
                                    echo "<script>alert('Xác nhận thanh toán đơn đặt phòng thành công!')</script>";;
                                } else {
                                    echo "<script>alert('Đơn đặt phòng đã được xác nhận trước đó!')</script>";
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
                    $bills = loadBillDetails();
                    include "checkinout/list.php";
                    break;
            //Quản lí nhân viên
            case 'quanlinhanvien':
                if(isset($_POST['timkiemtennhanvien']) && $_POST['timkiemtennhanvien']) {
                    $kyw = $_POST['search'];
                    $id_vaitro = $_POST['id_vaitro'];  
                } else {
                    $kyw = '';
                    $id_vaitro = 0;
                }
                $listNhanVien = load_NhanVien($kyw,$id_vaitro);
                $listNhanVienVaiTro = loadNhanVienVaiTro();
                include "nhanvien/list.php";
                break;
            case 'addnhanvien':
                if(isset($_POST['themmoinhanvien']) && $_POST['themmoinhanvien']) {

                    $errors = [];

                    $name_nhanvien = $_POST['tennhanvien'];
                    
                    $img_nhanvien = $_FILES['anhnhanvien']['name'];
                    $img_tmp = $_FILES['anhnhanvien']['tmp_name'];
                    move_uploaded_file($img_tmp, '../upload/img'.$img_nhanvien);

                    $email_nhanvien = $_POST['emailnhanvien'];
                    $address_nhanvien = $_POST['diachi'];
                    $tell_nhanvien = $_POST['dienthoai'];
                    $cccd_nhanvien = $_POST['cccd'];
                    $id_vaitro = $_POST['id_vaitro'];

                    if(empty($name_nhanvien)) {
                        $errors['tennhanvien'] = "Không để trống tên";
                    }

                    if(empty($email_nhanvien)) {
                        $errors['emailnhanvien'] = "Không để trống email";
                    } elseif (!filter_var($email_nhanvien, FILTER_VALIDATE_EMAIL)) {
                        $errors["emailnhanvien"] = "Email không hợp lệ";
                    }

                    if(empty($address_nhanvien)) {
                        $errors['diachi'] = "Không để trống địa chỉ";
                    }

                    if(empty($tell_nhanvien)) {
                        $errors['dienthoai'] = "Không để trống số điện thoại";
                    } elseif (!is_numeric($tell_nhanvien)) {
                        $errors["dienthoai"] = "Số điện thoại phải ở dạng số";
                    }

                    if(empty($cccd_nhanvien)) {
                        $errors['cccd'] = "Không để trống căn cước công dân";
                    }

                    if(empty($errors)) {
                        insertNhanVien($name_nhanvien,$img_nhanvien,$email_nhanvien,$address_nhanvien,$tell_nhanvien,$cccd_nhanvien,$id_vaitro);
                        echo "<script>alert('Thêm nhân viên thành công!')</script>";
                        echo "<script>window.location.href = 'index.php?act=quanlinhanvien';</scripalert>";
                    } else {
                        $_SESSION["errors"] = $errors;
                    }
    
                    
                }
                $listNhanVienVaiTro = loadNhanVienVaiTro();
                include "nhanvien/add.php";
                break;
            case 'updateNhanVien':
                if(isset($_GET['id_nhanvien']) && ($_GET['id_nhanvien'] > 0)) { 
                    $nhanVien = loadOneNhanVien();
                }
                $listNhanVienVaiTro = loadNhanVienVaiTro();
                // $listNhanVien = loadNhanVien();
                include "nhanvien/update.php";
                break;
            case 'capnhatnhanvien':
                if(isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $name_nhanvien = $_POST['tennhanvien'];
                    
                    $img_nhanvien = $_FILES['anhnhanvien']['name'];
                    $img_tmp = $_FILES['anhnhanvien']['tmp_name'];
                    move_uploaded_file($img_tmp, '../upload/img'.$img_nhanvien);

                    $email_nhanvien = $_POST['emailnhanvien'];
                    $address_nhanvien = $_POST['diachi'];
                    $tell_nhanvien = $_POST['dienthoai'];
                    $cccd_nhanvien = $_POST['cccd'];
                    $id_vaitro = $_POST['id_vaitro'];
                    $id = $_POST['id_nhanvien'];
    
                    updateNhanVien($id,$name_nhanvien,$img_nhanvien,$email_nhanvien,$address_nhanvien,$tell_nhanvien,$cccd_nhanvien,$id_vaitro);
                    echo "<script>alert('Cập nhật nhân viên thành công!')</script>";
                }
                $listNhanVien = loadNhanVien();
                include "nhanvien/list.php";
                break;
            case 'deleteNhanVien':
                if(isset($_GET['id_nhanvien']) && ($_GET['id_nhanvien'] > 0)) {
                    deleteNhanVien();
                }
                $listNhanVien = loadNhanVien();
                include "nhanvien/list.php";
                break;
            // biểu đồ thống kê
            case 'bieudo':
                try {
                    $sql = "SELECT YEAR(ngaydatphong) AS Nam, MONTH(ngaydatphong) AS Thang, COUNT(id_bill) AS TongSoHoaDon, SUM(tongtien) AS TongTien 
                    FROM bill GROUP BY YEAR(ngaydatphong), MONTH(ngaydatphong)";
                    $result = pdo_query($sql);
                    $chart_data = [];
                    $chart_data[] = ['Tháng', 'Tổng số hóa đơn', 'Tổng tiền'];

                    foreach ($result as $row) {
                        $chart_data[] = [
                            "Tháng {$row['Thang']} năm {$row['Nam']}",
                            (int)$row['TongSoHoaDon'],
                            (int)$row['TongTien']
                        ];
                    }
                    $chart_data_json = json_encode($chart_data);

                } catch (PDOException $e) {
                    
                    echo "Lỗi: " . $e->getMessage();
                }
                include "thongke/bieudo.php";
                break;
             
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "home.php";
include "footer.php";
?>