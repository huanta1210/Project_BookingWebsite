<?php
    if(is_array($loaiPhong))  {
        extract($loaiPhong);
     }

?>
<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Danh mục loại phòng</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Tạo mới loại phòng
                </p>
            </div>

            <div class="main-table">
                <div class="form">
                    <form action="index.php?act=updateloaiphong" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Tên Loại phòng:</label> <br>
                            <input type="text" name="tenloaiphong" id="" value="<?=$ten_loaiphong?>">
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$id_loaiphong?>">
                            <input type="submit" name="capnhat" onclick="return confirm('Cập nhật thành công')" value="Cập nhật phòng">
                            <input type="reset" value="Nhập lại">
                            <a href="index.php?act=listdanhmuc" ><input type="button"
                                    value="Danh sách danh mục phòng"></a>
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