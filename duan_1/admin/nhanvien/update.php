
<?php
    if(is_array($nhanVien))  {
        extract($nhanVien);
    }
    $imgPath = "../upload/img".$img_nhanvien;
    if(is_file($imgPath)) {
        $image = "<img src=".$imgPath." style='width: 50px; height: 50px;'>";
    } else {
        $image = "không ảnh";
    }
     

?>

<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Cập nhật nhân viên</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Cập nhật nhân viên
                </p>
            </div>

            <div class="main-table">
                <div class="form">
                    <form action="index.php?act=capnhatnhanvien" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="">Tên nhân viên:</label> <br>
                            <input type="text" name="tennhanvien" id="" value="<?php echo $nhanVien['name_nhanvien'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh nhân viên:</label> <br>
                            <?=$image?>
                            <input type="file" name="anhnhanvien" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Email:</label> <br>
                            <input type="text" name="emailnhanvien" id="" value="<?php echo $nhanVien['email_nhanvien'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ:</label> <br>
                            <input type="text" name="diachi" id="" value="<?php echo $nhanVien['address_nhanvien'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại:</label> <br>
                            <input type="number" name="dienthoai" id="" value="<?php echo $nhanVien['tell_nhanvien'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Căn cước công dân:</label> <br>
                            <input type="text" name="cccd" id="" value="<?php echo $nhanVien['cccd_nhanvien'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Chức vụ:</label> <br>
                            <select name="id_vaitro" id="">
                                <?php
                                    foreach($listNhanVienVaiTro as $vaiTro) {
                                        extract($vaiTro);
                                        echo '<option value="'.$id_vaitro.'">'.$ten_vaitro.'</option>';
                                    }
                                ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <input type="hidden" name="id_nhanvien" value="<?=$id_nhanvien?>">
                            <input type="submit" name="capnhat" value="Cập nhật nhân viên">
                            <input type="reset" value="Nhập lại">
                            <a href="index.php?act=quanlinhanvien"><input type="button" value="Danh sách nhân viên"></a>
                        </div>
                        
                       
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>