<?php
    if(is_array($phong)) {
        extract($phong);
     }
    $imgPath = "../upload/img".$img;
    if(is_file($imgPath)) {
        $image = "<img src=".$imgPath." style='width: 50px; height: 50px;'>";
    } else {
        $image = "không ảnh";
    }

?>
<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Cập nhật phòng</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Cập nhật phòng
                </p>
            </div>

            <div class="main-table">
                <div class="form">
                    <form action="index.php?act=capnhatphong" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Danh mục sản phẩm:</label> <br>
                            <select name="id_loaiphong" id="">
                                <?php
                                    foreach($listLoaiPhong as $loaiPhong) {
                                        extract($loaiPhong);
                                        if($id_loaiphong == $id_phong) {
                                            echo '<option value="'.$id_loaiphong.'" selected>'.$ten_loaiphong.'</option>';
                                        } else {
                                            echo '<option value="'.$id_loaiphong.'">'.$ten_loaiphong.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tên phòng:</label> <br>
                            <input type="text" name="tenphong" id="" value="<?php echo $phong['name']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Giá phòng:</label> <br>
                            <input type="number" name="giaphong" id="" value="<?php echo $phong['price']?>">
                        </div>
                       
                        <div class="form-group">
                            <label for="">Ảnh phòng:</label> <br>
                            <?=$image?> <br> <br>
                            <input type="file" name="anhphong" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả phòng:</label> <br>
                            <textarea name="mota" id="" cols="20" rows="5"><?php echo $phong['noidung_binhluan'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Sức chứa phòng:</label> <br>
                            <input type="text" name="succhua" id="" value="<?=$phong['suc_chua'] ?>">
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
                            <input type="hidden" name="id" value=<?=$id_phong?>>
                            <input type="submit" name="capnhat" onclick="return confirm('Cập nhật phòng thành công')" value="Cập nhật phòng">
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