<?php
    if(is_array($khachSan))  {
        extract($khachSan);
     }
     $imgPath = "../upload/img".$anh_khach_san;
     if(is_file($imgPath)) {
        $image = "<img src=".$imgPath." style='width: 100px; height: 100px;'>";
    } else {
        $image = "không ảnh";
    }

?>
<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Cập nhật khách sạn</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Cập nhật khách sạn
                </p>
            </div>

            <div class="main-table">
                <div class="form">
                    <form action="index.php?act=capnhatkhachsan" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Tên khách sạn:</label> <br>
                            <input type="text" name="tenkhachsan" id=""
                                value="<?php echo $khachSan['name_khach_san']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh khách sạn:</label> <br>
                            <?=$image?>
                            <input type="file" name="anhkhachsan" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Hotline khách sạn:</label> <br>
                            <input type="text" name="hotline" id="" value="<?php echo $khachSan['sdt_khach_san']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ:</label> <br>
                            <input type="text" name="diachi" id="" value="<?php echo $khachSan['address']?>">
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$id_khach_san?>">
                            <input type="submit" name="capnhat" onclick="return confirm('Cập nhật khách sạn thành công')" value="Cập nhật khách sạn">
                            <input type="reset" value="Nhập lại">
                            <a href="index.php?act=khachsan"><input type="button" value="Danh sách khách sạn"></a>
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