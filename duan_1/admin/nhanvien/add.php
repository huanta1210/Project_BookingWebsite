<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Thêm nhân viên</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Thêm nhân viên
                </p>
            </div>

            <div class="main-table">
                <div class="form">
                    <form action="index.php?act=addnhanvien" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="">Tên nhân viên:</label> <br>
                            <input type="text" name="tennhanvien" id="">
                            <?php if (!empty($_SESSION["errors"]["tennhanvien"])) : ?>
                                <span style="color:red;" class="form-message"><?php echo $_SESSION["errors"]["tennhanvien"]; ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh nhân viên:</label> <br>
                            <input type="file" name="anhnhanvien" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Email:</label> <br>
                            <input type="text" name="emailnhanvien" id="">
                            <?php if (!empty($_SESSION["errors"]["emailnhanvien"])) : ?>
                                <span style="color:red;" class="form-message"><?php echo $_SESSION["errors"]["emailnhanvien"]; ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ:</label> <br>
                            <input type="text" name="diachi" id="">
                            <?php if (!empty($_SESSION["errors"]["diachi"])) : ?>
                                <span style="color:red;" class="form-message"><?php echo $_SESSION["errors"]["diachi"]; ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại:</label> <br>
                            <input type="text" name="dienthoai" id="">
                            <?php if (!empty($_SESSION["errors"]["dienthoai"])) : ?>
                                <span style="color:red;" class="form-message"><?php echo $_SESSION["errors"]["dienthoai"]; ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="">Căn cước công dân:</label> <br>
                            <input type="text" name="cccd" id="">
                            <?php if (!empty($_SESSION["errors"]["cccd"])) : ?>
                                <span style="color:red;" class="form-message"><?php echo $_SESSION["errors"]["cccd"]; ?></span>
                            <?php endif; ?>
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
                            <input type="submit" name="themmoinhanvien" value="Thêm nhân viên">
                            <input type="reset" value="Nhập lại">
                            <a href="index.php?act=quanlinhanvien"><input type="button" value="Danh sách nhân viên"></a>
                        </div>
                        
                       
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>