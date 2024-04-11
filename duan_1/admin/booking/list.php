<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Quản lí nhận trả phòng</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Quản lí nhận trả phòng
                </p>
                <form style="padding: 10px 20px;" action="index.php?act=booking" method="POST">
                    <input style="border: 1px solid #CCCCCC; padding:5px; border-radius:5px" type="search" name="search" placeholder="Tìm kiếm theo tên">
                    <input style="border: 1px solid #CCCCCC; padding:5px; border-radius:5px" type="number" name="id_dat_phong" placeholder="ID đặt phòng">
                    <input style="border: 1px solid #CCCCCC; padding:5px; border-radius:5px" name="timkiemtheoten" type="submit" value="Tìm kiếm">
                </form>
            </div>

            <div class="main-table">
                
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
                    </tr>

                    <?php 
                        foreach($loadDatphong as $phong) {
                            extract($phong);
                            $imgPath = "../upload/img".$anh_datphong;
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