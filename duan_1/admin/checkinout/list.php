
<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Quản lí check In/Out</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Quản lí check In/Out
                </p>
                <form style="padding: 10px 20px;" action="index.php?act=checkinout" method="POST">
                    <input style="border: 1px solid #CCCCCC; padding:5px; border-radius:5px" type="number" name="id_dat_phong" placeholder="ID đặt phòng">
                    <input style="border: 1px solid #CCCCCC; padding:5px; border-radius:5px" name="timkiemtheoiddatphong" type="submit" value="Tìm kiếm">
                </form>
            </div>

            <div class="main-table">
                
                <table>
                    <tr>
                        <th>Thông tin phòng</th>
                        <th>Thông tin đặt phòng</th>
                        <th>Thao tác</th>
                    </tr>
                    <!-- <tr>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Người đặt phòng</th>
                        <th>Số điện thoại</th>
                        <th>Ngày đặt phòng</th>
                        <th>Ngày trả phòng</th>
                        <th>Tổng giá</th>
                    </tr> -->

                    <?php 
                         if(is_array($bills)) {
                            foreach ($bills as $bill) {
                                extract($bill);
                                $imgPath = "../upload/img".$anh_datphong;
                                $dongydatphong = "index.php?act=dongydatphong&id_dat_phong=".$id_dat_phong;
                                $huydatphong = "index.php?act=huydatphong&id_dat_phong=".$id_dat_phong;
                                $dathanhtoan = "index.php?act=dathanhtoan&id_dat_phong=".$id_dat_phong;

                                $thongbaodongy = "Xác nhận '.$name_datphong.' thành công ";
                                $thongbao = "Huỷ '.$name_datphong.' thành công ";


                                if(is_file($imgPath)) {
                                    $image = "<img src=".$imgPath." style='width: 40px; height: 40px;'>";
                                } else {
                                    $image = "không ảnh";
                                }
                                echo '
                                    <tr>
                                        <td>
                                            Ảnh phòng: '.$image.' <br>
                                            '.$name_datphong.' <br>
                                            Mã đặt phòng: '.$id_dat_phong.'
                                        </td>
                                        <td>
                                            Người đặt phòng: '.$user_taikhoan.' <br>
                                            Số điện thoại: '.$tell_taikhoan.' <br>
                                            Ngày đặt phòng: '.$ngay_den.' <br>
                                            Ngày trả phòng:'.$ngay_di.' <br>
                                        </td>
                                        <td>
                                            <a class="update" href="'.$dongydatphong.'">
                                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                                <input type="button" value="Xác nhận đặt phòng">
                                            </a>
                                            <a class="delete" href="'.$huydatphong.'"> 
                                                <i class="fa fa-trash" aria-hidden="true"></i><input type="button" value="Huỷ đặt phòng">
                                            </a>
                                            <a class="" href="'.$dathanhtoan.'"> 
                                                <i class="fa fa-trash" aria-hidden="true"></i><input type="button" value="Đã thanh toán">
                                            </a>
                                        </td>
                                
                                    </tr>
                                   
                                ';
                            }
                        }
                    ?>

                </table>
            </div>
        </div>
    </div>


</div>
</div>
</div>