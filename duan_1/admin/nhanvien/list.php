<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Quản lí nhân viên</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Quản lí nhân viên
                </p>
                <form style="padding: 10px 20px;" action="index.php?act=quanlinhanvien" method="POST">
                    <input style="border: 1px solid #CCCCCC; padding:5px; border-radius:5px" type="search" name="search" id="">
                    <span>
                    <select style="border: 1px solid #CCCCCC; padding:5px; border-radius:5px" name="id_vaitro" id="">
                        <option value="0" selected>Tất cả</option>
                        <?php 
                            foreach ($listNhanVienVaiTro as $nhanvien) {
                                extract($nhanvien);
                                echo '
                                    <option value='.$id_vaitro.'>'.$ten_vaitro.'</option>;
                                ';
                            }
                        ?>
                    </select>
                    </span>
                    <input style="border: 1px solid #CCCCCC; padding:5px; border-radius:5px" name="timkiemtennhanvien" type="submit" value="Tìm kiếm">
                </form>
             
                
            </div>

            <div class="main-table">
                <div class="main-table-title">
                    <a href="index.php?act=addnhanvien"><i class="fa fa-plus-circle" aria-hidden="true"></i> <input
                            type="button" value="Thêm nhân viên"></a>
                    <p class="line"></p>
                </div>
                <table>
                    <tr>
                        <th>Mã nhân viên</th>
                        <th>Tên nhân viên</th>
                        <th>Ảnh nhân viên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Căn cước công dân</th>
                        <th>Chức vụ</th>
                        <th>Thao tác</th>
                    </tr>

                    <?php 
                        foreach($listNhanVien as $nhanVien ) {
                            extract($nhanVien);
                            $imgPath = "../upload/img".$img_nhanvien;
                            if(is_file($imgPath)) {
                                $image = "<img src=".$imgPath." style='width: 40px; height: 40px;'>";
                            } else {
                                $image = "không ảnh";
                            }
                            $updateNhanVien = "index.php?act=updateNhanVien&id_nhanvien=".$id_nhanvien;
                            $deleteNhanVien = "index.php?act=deleteNhanVien&id_nhanvien=".$id_nhanvien;
                            $thongbao = "Bạn có chắc chắn muốn xoá ". $name_nhanvien;
                            echo '
                                <tr>
                                    <td>'.$id_nhanvien.'</td>
                                    <td>'.$name_nhanvien.'</td>
                                    <td>'.$image.'</td>
                                    <td>'.$email_nhanvien.'</td>
                                    <td>'.$address_nhanvien.'</td>
                                    <td>'.$tell_nhanvien.'</td>
                                    <td>'.$cccd_nhanvien.'</td>
                                    <td>'.$ten_vaitro.'</td>
                                    <td ><a class="update" href="'.$updateNhanVien.'"><i class="fa fa-wrench" aria-hidden="true"></i><input type="button" value="Sửa"></a></td>
                                    <td><a class="delete" href="'.$deleteNhanVien.'"onclick="return confirm(\''.$thongbao.'\')" role="button"><input type="button" value="Xoá"></a></td>
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