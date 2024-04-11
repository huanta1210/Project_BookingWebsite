<style>
.body-content .alert {
    margin: auto;
    text-align: center;
}

.body-content .check i {
    font-size: 100px;
}

.body-content .check p {
    font-size: 30px;
    font-weight: bold;
}
.header-content {
    background-color: rgb(0, 113, 206);
    padding: 15px;
    text-align: center;
    border-top-left-radius: 10px; 
    border-top-right-radius: 10px; 
    margin-bottom: 5px;
}
.header-title p {
    margin:0;
    color: #fff;
}
.mb {
    margin-bottom:20px;
}
.header-pay h3 {
    display: inline-block;
    margin-left: 20px;
}

.header-pay span {
    float: right;
    margin-right: 20px;

}

.qr h4 {
    margin-left: 20px;
}
.img img {
    margin-right: 20px;
}
.header-support {
   
}
.header-support ul {
    border: 1px solid rgb(0, 113, 206);
    border-radius:10px;
    margin-left: 50px;
}
.header-support ul li {
    font-size: 15px;
    font-weight: 500;
}
.pay-atm {
    padding: 10px 10px;
}
.pay-atm .checkbox {
   
    appearance: none;
    -webkit-appearance: none; 
    -moz-appearance: none; 
    width: 20px; 
    height: 20px; 
    background-color: #fff; 
    border: 1px solid rgb(0, 113, 206); 
    border-radius: 50%; /
    cursor: pointer; 
}
.checkbox:checked {
    background-color: #0071CE; /* Màu nền khi ô checkbox được chọn */
}
.checkbox-wrapper {
    display: flex; /* Sử dụng flexbox để hai phần tử nằm cùng một hàng */
    align-items: center; /* Căn giữa các phần tử theo chiều dọc */
}
.checkbox-wrapper label {
    font-weight: 500;
    color: rgb(3, 18, 26);
    font-size: 15px;
}



.checkbox + label {
    margin-left: 5px; 
}
.line {
    border-top: 1px solid #DDDDDD; 
    margin-top: 10px; 
    margin-bottom: 10px; 
}

.order .form-group {
    display: inline-block;

}
.order .submit {
    padding: 3px;
    border-radius: 5px;
    border: 1px solid #CCFFCC;
    color: #777777;
    /* background-color:#CCFFCC; */
}

.order .text-sale {
    width: 200px; 
    padding: 3px;
    border-radius: 5px;
    border: 1px solid #CCFFCC;
}
.order .text-sale:hover,
.order .submit:hover,
.order .text-sale:focus {
    outline: none;
    border: 1px solid #99FF33;
}
.btn-submit {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border:none;
    background-color: #FF6600;
    font-size: 15px;
    font-weight: 600;
}

.header-hotel {
    background-color: rgb(0, 113, 206);
    padding: 15px;
    border-top-left-radius: 10px; 
    border-top-right-radius: 10px; 
    margin-bottom: 5px;
}
.header-hotel p {
    color: rgb(104, 113, 118);
}
.header-hotel-title {
    float: right;
    margin-right: 100px;
    line-height:20px
}
h6 {
    margin:0;
}
.header-hotel-title span {
    font-size: 15px;
    color:#fff;
}
.header-hotel-title h6 {
    color: #fff;
}
.name-hotel {
    margin: 10px 0;
}
p {
    margin-bottom:0;
}

.box-recived {
    border: 1px solid #CCCCCC;
    border-radius: 7px;
    text-align:center;
    padding: 3px;
}
.box-recived span {
    font-size: 14px;
}
.box-recived p {
    font-size: 16px;
    font-weight: bold;
}

.title-room {
    margin: 10px 0;
}
.title-room li {
    margin-left: 20px;
    list-style:none;
    padding: 5px;
    color:#BBBBBB;
    font-size:16px;
}
.title-room p {
    padding: 2px;
    font-size: 15px;
}
.btn-submits {
    border: none;
}
.btn-submit:hover, 
.submit:hover {
    background-color: #fff;
    color: #000;
    border: 1px solid #ef683a;
    transition: .5s;
}


<?php 
     if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        $users = $_SESSION['user'];
        foreach ($users as $user) {
            $name = $user['user_taikhoan'];
            $email = $user['email_taikhoan'];
            $dienthoai = $user['tell_taikhoan'];

        }
    }
    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $carts = $_SESSION['cart'];
        foreach ($carts as $cart) {
          extract($cart);
        }
    }

?>

</style>
<div class="body-content container">
   <div class="row">
        <div class="content-right col-7">
            <div class="header-content">
                <div class="header-title">
                    <p>Đừng lo lắng, giá vẫn giữ nguyên. Hoàn tất thanh toán của bạn bằng</p>
                </div>
            </div>
            <div class="header-pay mb">  
                <h3>Bạn muốn thanh toán thế nào ?</h3>
                <span><img importance="low" loading="lazy" src="https://ik.imagekit.io/tvlk/image/imageResource/2023/12/12/1702364449716-d0093df3166e4ba84c56ad9dd75afcda.webp?tr=h-23,q-75" srcset="https://ik.imagekit.io/tvlk/image/imageResource/2023/12/12/1702364449716-d0093df3166e4ba84c56ad9dd75afcda.webp?tr=h-23,q-75 1x, https://ik.imagekit.io/tvlk/image/imageResource/2023/12/12/1702364449716-d0093df3166e4ba84c56ad9dd75afcda.webp?tr=dpr-2,h-23,q-75 2x, https://ik.imagekit.io/tvlk/image/imageResource/2023/12/12/1702364449716-d0093df3166e4ba84c56ad9dd75afcda.webp?tr=dpr-3,h-23,q-75 3x" decoding="async" width="auto" height="23" style="object-fit: contain; object-position: 50% 50%;"></span>
            </div>
            <div class="header-qr d-flex justify-content-between">
                <div class="qr">
                    <h4>VietQR</h4>
                </div>
                <div class="img">
                    <img importance="low" loading="lazy" src="https://ik.imagekit.io/tvlk/image/imageResource/2024/03/12/1710225192565-14c2ea75fea49e7275568da5178454f5.png?tr=h-24,q-75" srcset="https://ik.imagekit.io/tvlk/image/imageResource/2024/03/12/1710225192565-14c2ea75fea49e7275568da5178454f5.png?tr=h-24,q-75 1x, https://ik.imagekit.io/tvlk/image/imageResource/2024/03/12/1710225192565-14c2ea75fea49e7275568da5178454f5.png?tr=dpr-2,h-24,q-75 2x, https://ik.imagekit.io/tvlk/image/imageResource/2024/03/12/1710225192565-14c2ea75fea49e7275568da5178454f5.png?tr=dpr-3,h-24,q-75 3x" decoding="async" width="auto" height="24" class="r-5kp9u6" style="object-fit: contain; object-position: 50% 50%;">
                </div>
            </div>

            <div class="header-support">
                <ul>
                    <li>Đảm bảo bạn có ví điện tử hoặc ứng dụng ngân hàng di động hỗ trợ thanh toán bằng VietQR.</li>
                    <li>Mã QR sẽ xuất hiện sau khi bạn nhấp vào nút 'Thanh toán'. Chỉ cần lưu hoặc chụp màn hình mã QR để hoàn tất thanh toán của bạn trong thời hạn.n tử/m-banking của bạn.</li>
                    <li>Vui lòng sử dụng mã QR mới nhất được cung cấp để hoàn tất thanh toán của bạn.</li>
                </ul>
            </div>
            <form action="index.php?act=tienhanhthanhtoan" method="POST">
            <div class="pay-atm d-flex justify-content-between">
                <div class="checkbox-wrapper">
                    <input type="checkbox" name="checkbox" value="1" class="checkbox" id="checkbox1">
                    <label for="checkbox1">Thẻ ATM nội địa</label>
                </div>
                <div>
                    <img importance="low" loading="lazy" src="https://ik.imagekit.io/tvlk/image/imageResource/2017/03/20/1489981839102-323bf608171cfdf6e5ab2b6c9f1ecb78.png?tr=h-24,q-75" srcset="https://ik.imagekit.io/tvlk/image/imageResource/2017/03/20/1489981839102-323bf608171cfdf6e5ab2b6c9f1ecb78.png?tr=h-24,q-75 1x, https://ik.imagekit.io/tvlk/image/imageResource/2017/03/20/1489981839102-323bf608171cfdf6e5ab2b6c9f1ecb78.png?tr=dpr-2,h-24,q-75 2x, https://ik.imagekit.io/tvlk/image/imageResource/2017/03/20/1489981839102-323bf608171cfdf6e5ab2b6c9f1ecb78.png?tr=dpr-3,h-24,q-75 3x" decoding="async" width="auto" height="24" class="r-5kp9u6" style="object-fit: contain; object-position: 50% 50%;">
                </div>
            </div>
            <div class="line"></div>
            <div class="pay-atm d-flex justify-content-between">
                <div class="checkbox-wrapper">
                    <input type="checkbox" name="checkbox" value="2" class="checkbox" id="checkbox1">
                    <label for="checkbox1">Thẻ thanh toán</label>
                </div>

                <div>
                    <img importance="low" loading="lazy" src="https://ik.imagekit.io/tvlk/image/imageResource/2017/01/06/1483707776912-1abb188266f6d5b3f2e27f4733ca32e9.png?tr=h-24,q-75" srcset="https://ik.imagekit.io/tvlk/image/imageResource/2017/01/06/1483707776912-1abb188266f6d5b3f2e27f4733ca32e9.png?tr=h-24,q-75 1x, https://ik.imagekit.io/tvlk/image/imageResource/2017/01/06/1483707776912-1abb188266f6d5b3f2e27f4733ca32e9.png?tr=dpr-2,h-24,q-75 2x, https://ik.imagekit.io/tvlk/image/imageResource/2017/01/06/1483707776912-1abb188266f6d5b3f2e27f4733ca32e9.png?tr=dpr-3,h-24,q-75 3x" decoding="async" width="auto" height="24" class="r-5kp9u6" style="object-fit: contain; object-position: 50% 50%;">
                    <img importance="low" loading="lazy" src="https://ik.imagekit.io/tvlk/image/imageResource/2017/01/06/1483707787206-abc175b224ab92a6967e24bc17c30f45.png?tr=h-24,q-75" srcset="https://ik.imagekit.io/tvlk/image/imageResource/2017/01/06/1483707787206-abc175b224ab92a6967e24bc17c30f45.png?tr=h-24,q-75 1x, https://ik.imagekit.io/tvlk/image/imageResource/2017/01/06/1483707787206-abc175b224ab92a6967e24bc17c30f45.png?tr=dpr-2,h-24,q-75 2x, https://ik.imagekit.io/tvlk/image/imageResource/2017/01/06/1483707787206-abc175b224ab92a6967e24bc17c30f45.png?tr=dpr-3,h-24,q-75 3x" decoding="async" width="auto" height="24" class="r-5kp9u6" style="object-fit: contain; object-position: 50% 50%;">
                    <img importance="low" loading="lazy" src="https://ik.imagekit.io/tvlk/image/imageResource/2017/07/10/1499673365437-1e1522e5cc323e7e8a7b57b90e81dbc9.png?tr=h-24,q-75" srcset="https://ik.imagekit.io/tvlk/image/imageResource/2017/07/10/1499673365437-1e1522e5cc323e7e8a7b57b90e81dbc9.png?tr=h-24,q-75 1x, https://ik.imagekit.io/tvlk/image/imageResource/2017/07/10/1499673365437-1e1522e5cc323e7e8a7b57b90e81dbc9.png?tr=dpr-2,h-24,q-75 2x, https://ik.imagekit.io/tvlk/image/imageResource/2017/07/10/1499673365437-1e1522e5cc323e7e8a7b57b90e81dbc9.png?tr=dpr-3,h-24,q-75 3x" decoding="async" width="auto" height="24" class="r-5kp9u6" style="object-fit: contain; object-position: 50% 50%;">
                </div>
            </div>
            <div class="line"></div>

            <div class="pay-atm d-flex justify-content-between">
                <div class="checkbox-wrapper">
                    <input type="checkbox" name="checkbox" value="3" class="checkbox" id="checkbox1">
                    <label for="checkbox1">Tại khách sạn</label>
                </div>
                <div>
                    <img importance="low" loading="lazy" src="https://ik.imagekit.io/tvlk/image/imageResource/2018/03/06/1520331138317-d7f665fedcf7c5248b9c5bcf5f61e34f.png?tr=h-24,q-75" srcset="https://ik.imagekit.io/tvlk/image/imageResource/2018/03/06/1520331138317-d7f665fedcf7c5248b9c5bcf5f61e34f.png?tr=h-24,q-75 1x, https://ik.imagekit.io/tvlk/image/imageResource/2018/03/06/1520331138317-d7f665fedcf7c5248b9c5bcf5f61e34f.png?tr=dpr-2,h-24,q-75 2x, https://ik.imagekit.io/tvlk/image/imageResource/2018/03/06/1520331138317-d7f665fedcf7c5248b9c5bcf5f61e34f.png?tr=dpr-3,h-24,q-75 3x" decoding="async" width="auto" height="24" class="r-5kp9u6" style="object-fit: contain; object-position: 50% 50%;">
                    <img importance="low" loading="lazy" src="https://ik.imagekit.io/tvlk/image/imageResource/2018/03/06/1520330979731-ad654b152072fada96f6350a806635b1.png?tr=h-24,q-75" srcset="https://ik.imagekit.io/tvlk/image/imageResource/2018/03/06/1520330979731-ad654b152072fada96f6350a806635b1.png?tr=h-24,q-75 1x, https://ik.imagekit.io/tvlk/image/imageResource/2018/03/06/1520330979731-ad654b152072fada96f6350a806635b1.png?tr=dpr-2,h-24,q-75 2x, https://ik.imagekit.io/tvlk/image/imageResource/2018/03/06/1520330979731-ad654b152072fada96f6350a806635b1.png?tr=dpr-3,h-24,q-75 3x" decoding="async" width="auto" height="24" class="r-5kp9u6" style="object-fit: contain; object-position: 50% 50%;">
                    <img importance="low" loading="lazy" src="https://ik.imagekit.io/tvlk/image/imageResource/2018/03/06/1520304846164-ae92ae0d8a22e3a1a3332622775bee9a.png?tr=h-24,q-75" srcset="https://ik.imagekit.io/tvlk/image/imageResource/2018/03/06/1520304846164-ae92ae0d8a22e3a1a3332622775bee9a.png?tr=h-24,q-75 1x, https://ik.imagekit.io/tvlk/image/imageResource/2018/03/06/1520304846164-ae92ae0d8a22e3a1a3332622775bee9a.png?tr=dpr-2,h-24,q-75 2x, https://ik.imagekit.io/tvlk/image/imageResource/2018/03/06/1520304846164-ae92ae0d8a22e3a1a3332622775bee9a.png?tr=dpr-3,h-24,q-75 3x" decoding="async" width="auto" height="24" class="r-5kp9u6" style="object-fit: contain; object-position: 50% 50%;">
                    <img importance="low" loading="lazy" src="https://ik.imagekit.io/tvlk/image/imageResource/2018/03/02/1519987829006-3209c072c38c9efa9c03ffcd6e347a33.png?tr=h-24,q-75" srcset="https://ik.imagekit.io/tvlk/image/imageResource/2018/03/02/1519987829006-3209c072c38c9efa9c03ffcd6e347a33.png?tr=h-24,q-75 1x, https://ik.imagekit.io/tvlk/image/imageResource/2018/03/02/1519987829006-3209c072c38c9efa9c03ffcd6e347a33.png?tr=dpr-2,h-24,q-75 2x, https://ik.imagekit.io/tvlk/image/imageResource/2018/03/02/1519987829006-3209c072c38c9efa9c03ffcd6e347a33.png?tr=dpr-3,h-24,q-75 3x" decoding="async" width="auto" height="24" class="r-5kp9u6" style="object-fit: contain; object-position: 50% 50%;">
                </div>
            </div>
            <div class="line"></div>
          
            <div class="order">
                <!-- <form action="">
                    <div class="form-group">
                        <input id="text-sale" name="text-sale" type="text" placeholder="Mã giảm giá" class="text-sale">
                        <span><button class="submit">Sử dụng</button></span>
                    </div>
                </form> -->
            </div>
            <div class="tottal-pay d-flex justify-content-between">
                <h4>Tổng giá tiền</h4>
                <p class="price"><?=$cart[3]?>$</p>
            </div>
            <div>  
                <input type="submit" class="btn-submit" value="Tiếp tục thanh toán" name="tienhanhthanhtoan">
            </div>
            </form>
        </div>

        <div class="content-left col-4">
            <div class="header-hotel">
                <img src="https://d1785e74lyxkqq.cloudfront.net/_next/static/v2/6/6cf973b0aa7b1d2d5df2b1786233056c.svg" width="24" height="24">
                <div class="header-hotel-title">
                    <h6>Tóm tắt khách sạn</h6>
                    <span>Mã đặt chỗ: <?=$cart[0]?> </span>
                </div>
            </div>
            <div class="name-hotel">
                <h6><?=$cart[1]?></h6>
            </div>
            <div class="box d-flex justify-content-around">
                <div class="box-recived">
                    <span>Nhận phòng</span>
                    <p>T7, <?=$cart[6]?></p>
                    <span>Từ 14:00</span>
                </div>
                <div class="box-recived">
                    <span>Trả phòng</span>
                    <p>T7, <?=$cart[7]?></p>
                    <span>Từ 14:00</span>
                </div>
            </div>
            <div class="rooms">
                <div class="title-room">
                    <h6><?=$cart[1]?></h6>
                    <li><i class="fa fa-user-circle" aria-hidden="true"></i> 2 khách</li>
                    <li><i class="fa fa-bed" aria-hidden="true"></i> <?=$cart[5]?></li>
                    <li><i class="fa fa-wifi" aria-hidden="true"></i> Miễn phí wifi</li>
                </div>
            </div>
            <div class="rooms">
                <div class="title-room">
                    <h6>Tên khách</h6>
                    <p><?=$name?></p>
                    <li><i class="fa fa-check" aria-hidden="true"></i> Miễn phí huỷ phòng</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i> Có thể đổi lịch</li>
                </div>
            </div>
            <div class="rooms">
                <div class="title-room">
                    <h6>Chi tiết người liên lạc</h6>
                    <p><?=$name?></p>
                    <li><i class="fa fa-mobile" aria-hidden="true"></i> <?=$email?></li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i> <?=$dienthoai?></li>
                     
                </div>
            </div>
        </div>
   </div>

</div>