<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Danh mục phòng</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Danh mục phòng
                </p>
            </div>

            <div class="main-table">
                <div class="main-table-title">
                    <a href="index.php?act=adddm"><i class="fa fa-plus-circle" aria-hidden="true"></i> <input
                            type="button" value="Thêm danh mục phòng"></a>
                    <p class="line"></p>
                </div>
                <table>
                    <tr>
                        <th>Mã loại phòng</th>
                        <th>Tên loại phòng</th>
                        <th></th>
                        <th></th>
                    </tr>

                    <?php 
                        foreach($listLoaiPhong as $loaiPhong ) {
                            extract($loaiPhong);
                            $update = "index.php?act=update&id=".$id_loaiphong;
                            $delete = "index.php?act=delete&id=".$id_loaiphong;
                            $thongbao = "Bạn có chắc chắn muốn xoá tiêu đề". $ten_loaiphong;
                            echo '
                                <tr>
                                    <td>'.$id_loaiphong.'</td>
                                    <td>'.$ten_loaiphong.'</td>
                                    
                                    <td><a class="update" href="'.$update.'"> <i class="fa fa-wrench" aria-hidden="true"></i>
                                            <input type="button" value="Sửa "></a></td>
                                    
        
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