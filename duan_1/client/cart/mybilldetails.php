<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đặt phòng</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<style>
    


.room img {
    width: 150px;
    height: auto;
    margin-right: 20px;
}

.room h3 {
    margin-top: 0;
}

.guest,
.booking-dates {
    flex-grow: 1;
}

.guest h3,
.booking-dates h3 {
    margin-top: 0;
    margin-bottom: 10px;
}

.guest p,
.booking-dates p {
    margin: 0;
    line-height: 1.5;
}

h2 {
    color: #333;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
}
#btns {
    background-color: #000;
    border: 1px solid #000;
    text-align: center;  

}
span {
    font-weight: bold;
    padding: 5px 0;
}

.line {
    border-bottom: 1px solid #99CC33;
}

</style>
<body >


    <div class="bodys container">
    <h6>Thông tin đặt phòng</h6>

        <div class="booking-info row">

        <?php 
        if(is_array($bills)) {
            foreach ($bills as $bill) {
                extract($bill);
                $imgPath = "../upload/img".$img;
                if(is_file($imgPath)) {
                    $image = "<img src=".$imgPath." style='width: 40px; height: 40px;'>";
                } else {
                    $image = "không ảnh";
                }
                echo '
                    <div class="room col-3">
                        <img src="'.$imgPath.'">
                        <p><span>Tên phòng:</span> '.$name.'</p>
                    </div>
                    <div class="guest col-3">
                        <h5>Thông tin người đặt:</h5>
                        <p><span>Tên:</span> '.$tentaikhoan.'</p>
                        <p><span>Số điện thoại:</span> '.$sodienthoai.'</p>
                        <p><span>Email:</span> '.$email_taikhoan.'</p>
                    </div>
                    <div class="booking-dates col-3">
                        <h5>Thông tin đặt phòng:</h5>
                        <p><span>Ngày đặt:</span> '.$ngay_dat_phong.'</p>
                        <p><span>Ngày trả:</span> '.$ngay_tra_phong.'</p>
                        <p><span>Loại phòng:</span> '.$ten_loaiphong.'</p>
                    </div>
                    <div class="booking-dates col-3">
                        <h5>Thông tin khách sạn:</h5>
                        <p><span>Khách sạn:</span> '.$name_khach_san.'</p>
                        <p><span>Hotline:</span> '.$sdt_khach_san.'</p>
                        <p><span>Địa chỉ:</span> '.$address.'</p>
                    </div>
                    <p class="line"></p>
                
                ';
            }
        }
            
         ?>
            

        </div> 
        <button type="submit" id="btns" name="check-out" class="btn btn-primary"><a href="index.php?act=lichsudatphong">Lịch sử đặt phòng</a></button>

    </div>



</body>
</html>
