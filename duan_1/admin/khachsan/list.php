<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Quản lí khách sạn</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Quản lí khách sạn
                </p>
            </div>

            <div class="main-table">
                <div class="main-table-title">
                    <a href="index.php?act=addkhachsan"><i class="fa fa-plus-circle" aria-hidden="true"></i> <input
                            type="button" value="Thêm khách sạn"></a>
                    <p class="line"></p>
                </div>
                <table>
                    <tr>
                        <th>Tên khách sạn</th>
                        <th>Ảnh khách sạn</th>
                        <th>Holine khách sạn</th>
                        <th>Địa chỉ khách sạn</th>
                        <th></th>

                    </tr>

                    <?php 
                        foreach($listKhachSan as $khachSan ) {
                            extract($khachSan);
                            $imgPath = "../upload/img".$anh_khach_san;
                            if(is_file($imgPath)) {
                                $image = "<img src=".$imgPath." style='width: 100px; height: 100px;'>";
                            } else {
                                $image = "không ảnh";
                            }
                            $update = "index.php?act=updatekhachsan&id=".$id_khach_san;
                            $delete = "index.php?act=deletekhachsan&id=".$id_khach_san;
                            $thongbao = "Bạn có chắc chắn muốn xoá tiêu đề". $name_khach_san;
                            echo '
                                <tr>
                                    <td>'.$name_khach_san.'</td>
                                    <td>'.$image.'</td>
                                    <td>'.$sdt_khach_san.'</td>
                                    <td>'.$address.'</td>
                                    <td><a class="update" href="'.$update.'"><i class="fa fa-wrench" aria-hidden="true"></i><input type="button" value="Sửa"></a></td>
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