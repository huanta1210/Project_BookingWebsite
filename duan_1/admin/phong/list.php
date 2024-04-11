<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Quản lí phòng</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Quản lí phòng
                </p>
                <form style="padding: 10px 20px;" action="index.php?act=quanliphong" method="POST">
                    <input style="border: 1px solid #CCCCCC; padding:5px; border-radius:5px" type="search" name="search" id="">
                    <span>
                    <select style="border: 1px solid #CCCCCC; padding:5px; border-radius:5px" name="id_loaiphong" id="">
                        <option value="0" selected>Tất cả</option>
                        <?php 
                            foreach ($listLoaiPhong as $loaiPhong) {
                                extract($loaiPhong);
                                echo '
                                    <option value='.$id_loaiphong.'>'.$ten_loaiphong.'</option>;
                                ';
                            }
                        ?>
                    </select>
                    </span>
                    <input style="border: 1px solid #CCCCCC; padding:5px; border-radius:5px" name="timkiemtheodanhmuc" type="submit" value="Tìm kiếm">
                </form>
             
                
            </div>

            <div class="main-table">
                <div class="main-table-title">
                    <!-- <a href="index.php?act=addphong"><i class="fa fa-plus-circle" aria-hidden="true"></i> <input
                            type="button" value="Thêm phòng"></a>
                    <p class="line"></p> -->
                </div>
                <table>
                    <tr>
                        <th>Tên phòng</th>
                        <th>Giá phòng</th>
                        
                        <th>Ảnh phòng</th>
                        <th>Mô tả phòng</th>
                        <th>Sức chứa</th>
                        <th>ID loại phòng</th>
                        <th></th>
                        <th></th>
                    </tr>

                    <?php 
                        foreach($listPhong as $phong ) {
                            extract($phong);
                            $imgPath = "../upload/img".$img;
                            if(is_file($imgPath)) {
                                $image = "<img src=".$imgPath." style='width: 40px; height: 40px;'>";
                            } else {
                                $image = "không ảnh";
                            }
                            $updatePhong = "index.php?act=updatephong&id=".$id_phong;
                            $deletePhong = "index.php?act=deletephong&id=".$id_phong;
                            $thongbao = "Bạn có chắc chắn muốn xoá tiêu đề". $name;

                            
                            echo '
                                <tr>
                                    <td>'.$name.'</td>
                                    <td>'.$price.'</td>
            
                                    <td>'.$image.'</td>
                                    <td>'.$mo_ta.'</td>
                                    <td>'.$suc_chua.'</td>
                                    <td>'.$id_loaiphong.'</td>
                                    <td><a class="update" href="'.$updatePhong.'"> <i class="fa fa-wrench" aria-hidden="true"></i>
                                            <input type="button" value="Sửa"></a></td>
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