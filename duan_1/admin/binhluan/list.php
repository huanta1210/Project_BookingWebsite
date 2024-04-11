<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Quản lí bình luận</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Quản lí bình luận
                </p>
            </div>

            <div class="main-table">
                
                <table>
                    <tr>
                        <th>Tên tài khoản</th>
                        <th>Tên phòng</th>
                        <th>Nội dung bình luận</th>
                        <th>Ngày bình luận</th>
                        <th></th>
                    </tr>

                    <?php 
                        foreach($listBinhLuan as $binhLuan ) {
                            extract($binhLuan);
                            // $update = "index.php?act=update&id=".$id_binhluan;
                            $delete = "index.php?act=deletebinhluan&id_binhluan=".$id_binhluan;
                            $thongbao = "Bạn có chắc chắn muốn xoá tiêu đề ". $noidung_binhluan;
                            echo '
                                <tr>
                                <td>'.$user_taikhoan.'</td>
                                <td>'.$name.'</td>
                                <td>'.$noidung_binhluan.'</td>
                                <td>'.$ngay_binhluan.'</td>
                                <td><a class="delete" href="'.$delete.'" onclick="return confirm(\''.$thongbao.'\')" role="button"><i class="fa fa-trash" aria-hidden="true"></i><input type="button" value="Xoá "></a></td>
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