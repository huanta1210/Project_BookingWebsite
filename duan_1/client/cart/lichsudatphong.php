
<style>
    .main-table {
    padding-bottom: 20px;
}

.main-table a {
    text-decoration: none;
    padding: 5px;
    background-color: #00CC33;
    border-radius: 5px;
    color: #000;
}

.main-table-title .line {
    margin-top: 10px;
    border-bottom: 1px solid #aeacac;
    width: 100%;
}

.main-table-title a:hover,
.main-table-title a input[type="button"]:hover {
    background-color: #ffff00;
    color: #000;
}

.main-table-title a input[type="button"] {
    border: none;
    background-color: #00CC33;
}

.main-table table {
    margin-top: 20px;
}

.main-table {
    margin-top: 20px;
    padding-left: 20px;
    padding-right: 20px;

}

.main-table table input[type="button"] {
    border: none;
    background-color: #00CC33;
}

.main-table table a {
    text-decoration: none;
    color: #000;
}

.main-table table .delete,
.main-table table .delete input[type="button"] {
    background-color: red;
}

.main-table table .delete:hover,
.main-table table .delete input[type="button"]:hover,
.main-table table .update:hover,
.main-table table .update input[type="button"]:hover {
    background-color: #ffff00;
}

.main-table table .update,
.main-table table .update input[type="button"] {
    background-color: #1C86EE;
}

.main-table table tr,
th,
td {
    border: 1px solid #aeb0b3;
    padding: 10px;
}

table {
    padding: 10px 10px 0 10px;
    width: 100%;
    text-align: center;
}
</style>

<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Lịch sử đặt phòng</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title" style="margin-bottom:30px">
            </div>

            <div class="main-table">
                <div class="main-table-title">
                    <!-- <a href="index.php?act=addphong"><i class="fa fa-plus-circle" aria-hidden="true"></i> <input
                            type="button" value="Thêm phòng"></a>
                    <p class="line"></p> -->
                </div>
                <table>
    <tr>
        <th>Mã đặt phòng</th>
        <th>Ảnh phòng</th>
        <th>Tên phòng</th>
        <th>Tên khách sạn</th>
        <th>Người đặt phòng</th>
        <th>Số điện thoại</th>
        <th>Ngày đặt phòng</th>
        <th>Ngày trả phòng</th>
        <th>Phương thức thanh toán</th>
        <th>Trạng thái</th>
        <th>Tổng giá</th>
        <th>Thao tác</th>
    </tr>

    <?php 
        foreach($loadDatphong as $phong) {
            extract($phong);
            $imgPath = "../upload/img".$anh_datphong;
            $huydatphong = "index.php?act=huydatphong&id_dat_phong=".$id_dat_phong;
            if(is_file($imgPath)) {
                $image = "<img src=".$imgPath." style='width: 40px; height: 40px;'>";
            } else {
                $image = "không ảnh";
            }
                        
            $statusColor = '';
                switch ($trang_thai) {
                    case 0:
                        $statusText = 'Đang chờ xác nhận'; 
                        $statusColor = 'yellow'; 
                        break;
                    case 1:
                        $statusText = 'Đã xác nhận'; 
                        $statusColor = 'green'; 
                        break;
                    case 2:
                        $statusText = 'Đã thanh toán'; 
                        $statusColor = 'blue'; 
                        break;
                    case 3:
                        $statusText = 'Huỷ bỏ'; 
                        $statusColor = 'red'; 
                        break;
                    default:
                        $statusText = '';
                        $statusColor = ''; 
                        break;
                }
                        
                echo '
                    <tr>
                        <td>'.$id_dat_phong.'</td>
                        <td>'.$image.'</td>
                        <td>'.$name.'</td>
                        <td>'.$name_khach_san.'</td>
                        <td>'.$tentaikhoan.'</td>
                        <td>'.$sodienthoai.'</td>
                        <td>'.$ngaydatphong.'</td>
                        <td>'.$ngaytraphong.'</td>
                        <td>'.$name_paymethod.'</td>
                        <td style="background-color: '.$statusColor.';">'.$statusText.'</td> <!-- Thêm màu nền cho cột trạng thái -->
                        <td>'.$tongtien.'</td>
                        <td><a class="delete" href="'.$huydatphong.'"><input type="button" value="Huỷ đặt phòng"></a></td>
                    </tr>
                ';
        }
        
    ?>
    
                    
                </table>
            </div>
        </div>
    </div>


</div>
</div>
</div>


