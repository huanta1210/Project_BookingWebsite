<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Quản lí người dùng</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Quản lí người dùng
                </p>
            </div>

            <div class="main-table">
                <div class="main-table-title">
                    <!-- <a href="index.php?act=addphong"><i class="fa fa-plus-circle" aria-hidden="true"></i> <input
                            type="button" value="Thêm phòng"></a>
                    <p class="line"></p> -->
                </div>
                <table>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Email khách hàng</th>
                        <th>Số điện thoại</th>
                    </tr>


                    <?php 
                        foreach($listTaiKhoan as $user ) {
                            extract($user);
                            // $imgPath = "../upload/img".$img;
                            // if(is_file($imgPath)) {
                            //     $image = "<img src=".$imgPath." style='width: 40px; height: 40px;'>";
                            // } else {
                            //     $image = "không ảnh";
                            // }
                           
                            echo '
                                <tr>
                                    <td>'.$user_taikhoan.'</td>
                                    <td>'.$email_taikhoan.'</td>
                                    <td>'.$tell_taikhoan.'</td>
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