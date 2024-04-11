<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Thêm phòng</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Thêm phòng
                </p>
            </div>

            <div class="main-table">
                <div class="form">
                    <form action="index.php?act=addphong" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Danh mục phòng:</label> <br>
                            <select name="id_loaiphong" id="">
                                <?php
                                    foreach($listLoaiPhong as $loaiPhong) {
                                        extract($loaiPhong);
                                        echo '<option value="'.$id_loaiphong.'">'.$ten_loaiphong.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tên phòng:</label> <br>
                            <input type="text" name="tenphong" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Giá phòng:</label> <br>
                            <input type="number" name="giaphong" id="">
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Ngày đặt phòng:</label> <br>
                            <input type="date" name="ngaydatphong" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Ngày trả phòng:</label> <br>
                            <input type="date" name="ngaytraphong" id="">
                        </div> -->
                        <div class="form-group">
                            <label for="">Ảnh phòng:</label> <br>
                            <input type="file" name="anhphong" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả phòng:</label> <br>
                            <textarea name="mota" id="" cols="20" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Sức chứa phòng:</label> <br>
                            <input type="text" name="succhua" id="">
                        </div>

                        <div class="form-group">
                            <label for="">Khách sạn:</label> <br>
                            <select name="id_khach_san" id="">
                                <?php
                                    foreach($listkhachsan as $khachSan) {
                                        extract($khachSan);
                                        echo '<option value="'.$id_khach_san.'">'.$name_khach_san.'</option>';
                                    }
                                ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <input type="submit" name="themmoi" onclick="return confirm('Thêm phòng thành công')" value="Thêm phòng">
                            <input type="reset" value="Nhập lại">
                            <a href="index.php?act=quanliphong"><input type="button" value="Danh sách phòng"></a>
                        </div>
                        <?php
                                if(isset($thongbao) && ($thongbao != "")) echo "$thongbao";
                            ?>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>