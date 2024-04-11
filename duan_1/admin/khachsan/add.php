<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Thêm khách sạn</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Thêm khách sạn
                </p>
            </div>

            <div class="main-table">
                <div class="form">
                    <form action="index.php?act=addkhachsan" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Tên khách sạn:</label> <br>
                            <input type="text" name="tenkhachsan" id="">
                        </div>

                        <div class="form-group">
                            <label for="">Ảnh khách sạn:</label> <br>
                            <input type="file" name="anhkhachsan" id="">
                        </div>

                        <div class="form-group">
                            <label for="">Hotline khách sạn:</label> <br>
                            <input type="text" name="hotline" id="">
                        </div>

                        <div class="form-group">
                            <label for="">Địa chỉ:</label> <br>
                            <input type="text" name="diachi" id="">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="themmoi" onclick="return confirm('Thêm khách sạn thành công')" value="Thêm khách sạn">
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