
<style>
    .info-promotion-span {
        position: relative;
    }
    .info-promotion-span p span {
        color: red;
     
    }
    .add a {
        /* color: rgba(1, 148, 243, 1.00); */
        text-decoration: none;
        font-size:16px;
        font-weight: 700;
    }
    .hotels-title h6, 
    .hotels-title .span-checkin{
        font-weight: 700;
        font-size:17px; 
    }
    .hotels-title p {
        font-size: 15px;
    }
    .hotels-title li {
        list-style: none;
        font-size: 15px;
        padding: 5px 0;
    }
    .hotels-title span {
        font-size: 15px;
        font-weight: 500;
    }
    form .btn-submit {
        background-color: #fff;
        color: #000;
        border: 1px solid #ef683a;
        transition: .5s;
    }

</style>

<p class="line"></p>
<section class="container d-flex justify-content-between product-details">
    <div class="product-colum row">
        <div class="product-details-image col-5">
            <?php 
                extract($loadOnePhong);
                $image = $imgPath.$img;
                    echo '
                        <h3 style="margin:0 0 10px 0" class="product-details-heading">'.$name. ' - Hotel: ' .$name_khach_san.'</h3>
                        <img style="height:500px ; width:500px; padding-right:20px "  src="'.$image.'" alt="">
                    ';
                ?>

        </div>
        <div class="product-details-text col-7">
            <?php
            echo '
            <div class="product-heading">
            <h3 class="heading-text" style="margin:0 0 10px 0">'.$name.' - Hotel: ' .$name_khach_san.'</h3>
            <div class="rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span><small>(22)</small></span>
            </div>
            <span class="sold-text">Share:<i class=" facebook-icons ti-facebook" aria-hidden="true"></i></span>
            <span class="sold-out">Sold: <small>(389)</small></span>
            <div class="price">
                <span class="product-price">$'.$price.'</span> <span><del class="del">$1500.00</del></span>
            </div>
            <form action="index.php?act=addcart" method="post">
                <div class="port-short">
                    <p>
                        <strong><i class="fa fa-users" aria-hidden="true"></i></strong>
                        <span>'.$suc_chua.'</span>
                    </p>
                    <p>
                        <strong><i class="fa fa-users" aria-hidden="true"></i></strong>
                        <span>2 khách</span>
                    </p>
                    <p>
                        <strong>Địa chỉ khách sạn:</strong>
                        <span>'.$address.'</span>
                    </p>
                    <p>
                        <strong>Loại phòng:</strong>
                        <span>'.$ten_loaiphong.'</span>
                    </p>
                    <p>
                        <strong>Ngày nhận phòng:</strong>
                        <span><input type="date" name="ngay_dat_phong" id=""></span>
                    </p>
                    <p>
                        <strong>Ngày trả phòng:</strong>
                        <span><input type="date" name="ngay_tra_phong" id=""></span>
                    </p>
            
                </div>
                <div class="select-actions clearfix">
                    <div class="warp-cart">
                                                   
                    </div>
                    </div>
                </div>
                <input type="hidden" name="idphong" value="'.$id_phong.'">
                <input type="hidden" name="name" value="'.$name.' - Hotel: ' .$name_khach_san.'">
                <input type="hidden" name="loaiphong" value="'.$ten_loaiphong.'">
                <input type="hidden" name="price" value="'.$price.'">
                <input type="hidden" name="succhua" value="'.$suc_chua.'">
                <input type="hidden" name="ngaydatphong" value="'.$ngay_dat_phong.'">
                <input type="hidden" name="ngaytraphong" value="'.$ngay_tra_phong.'">

                <input type="hidden" name="img" value="'.$img.'">
                
                <input type="submit" class="btn-submit" id="add-to-cart" name="addcart" value="Chọn phòng" style="border-radius: 5px; width: 100%; padding: 5px; background-color: #ef683a; color: #fff; border: 1px solid #ef683a; transition: background-color 0.5s, color 0.5s, border-color 0.5s;">
                
            
                </form>
            <!-- phần text miễn phí ship -->
            <div class="info-promotion d-flex justify-content-between">
               <div class="info-promotion-span">
                    <p>
                        <i class="fa fa-map-marker" aria-hidden="true"></i> Sân bay quốc tế Tân Sơn Nhất <span class="address">2.24 km</span>
                    </p>
                    <p>
                        <i class="fa fa-map-marker" aria-hidden="true"></i> Bảo tàng Phụ nữ Nam Bộ <span>2.33 km</span>
                    <p>
                        <i class="fa fa-map-marker" aria-hidden="true"></i> Trung tâm Triển lãm và Hội chợ Tân Bình <span>1.73 km</span>
                    </p>
                    <p>
                        <i class="fa fa-map-marker" aria-hidden="true"></i> Jamiul Muslimin Mosque <span>266m</span>   
                    </p>
               </div>
               <div class="info-promotion-span">
                    <p>
                        <i class="fa fa-map-marker" aria-hidden="true"></i> Chợ Bến Thành / Chợ đêm Bến Thành <span class="address">645 m</span>
                    </p>
                    <p>
                        <i class="fa fa-map-marker" aria-hidden="true"></i> Nhà thờ Đức Bà <span>737 m</span>
                    <p>
                        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Khu mua sắm <span></span>
                    </p>
                   
               </div>
            </div>
        </div>
            ';
        ?>
        </div>

    </div>
    
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#hotels-title").load("binhluan/binhluan.php", {id_phong: <?=$id_phong?>});
});
</script>
<div class="introduce container">
    <div class="row">
        <div class="introduce-hotels col-6">
            <div class="hotels-title" style="margin-bottom:10px">
                <h6 style="display:inline-block">Giới thiệu sơ sở lưu trú</h6><span style="margin-left: 250px" class="add"><a href="">Xem thêm <i class="fa fa-arrow-right" aria-hidden="true"></i></a></span>
                <p style="margin:0 0 5px 0">Lưu trú tại Palace Hotel Saigon là một lựa chọn đúng đắn khi quý khách đến thăm Bến Nghé.
                khách sạn sở hữu vị trí đắc địa cách sân bay Sân bay Tân Sơn Nhất 6,93 km.
                khách sạn nằm cách Saigon Waterbus Station 0,38 km.
                khách sạn này rất dễ tìm bởi vị trí đắc địa, nằm gần với nhiều tiện ích công cộng.</p>
                <img importance="low" loading="lazy" src="https://ik.imagekit.io/tvlk/image/imageResource/2020/09/16/1600230311275-f30969b143bc86d71360de0818f3e9c4.png?tr=h-16,q-75,w-16" srcset="https://ik.imagekit.io/tvlk/image/imageResource/2020/09/16/1600230311275-f30969b143bc86d71360de0818f3e9c4.png?tr=h-16,q-75,w-16 1x, https://ik.imagekit.io/tvlk/image/imageResource/2020/09/16/1600230311275-f30969b143bc86d71360de0818f3e9c4.png?tr=dpr-2,h-16,q-75,w-16 2x, https://ik.imagekit.io/tvlk/image/imageResource/2020/09/16/1600230311275-f30969b143bc86d71360de0818f3e9c4.png?tr=dpr-3,h-16,q-75,w-16 3x" decoding="async" width="16" height="16" style="object-fit: fill; object-position: 50% 50%;">
                <span class="span-checkin">Đã có Check-In trực tuyến</span>
            </div>
            <div class="hotels-title">
                <h6 style="display:inline-block">Tiện ích chính</h6><span style="margin-left: 325px" class="add"><a href="">Xem thêm <i class="fa fa-arrow-right" aria-hidden="true"></i></a></span>
                <li><img src="https://s3-ap-southeast-1.amazonaws.com/cntres-assets-ap-southeast-1-250226768838-cf675839782fd369/imageResource/2016/12/21/1482301285653-0a04df7d3f807b32484ceec10d9681c6.png" width="20" height="20"><span> Máy lạnh</span></li>
                <li><img src="https://s3-ap-southeast-1.amazonaws.com/cntres-assets-ap-southeast-1-250226768838-cf675839782fd369/imageResource/2017/06/07/1496833794378-eb51eee62d46110b712e327108299ea6.png" width="20" height="20"><span> Nhà hàng</span></li>
                <li><img src="https://s3-ap-southeast-1.amazonaws.com/cntres-assets-ap-southeast-1-250226768838-cf675839782fd369/imageResource/2017/06/07/1496833772013-929572dff57d1755878aa79dc46e6be5.png" width="20" height="20"><span> Hồ bơi</span></li>
                <li><img src="https://s3-ap-southeast-1.amazonaws.com/cntres-assets-ap-southeast-1-250226768838-cf675839782fd369/imageResource/2016/12/21/1482301381776-c014a3111a6de5236d903c93b7647e4c.png" width="20" height="20"><span> Lễ tân 24h</span></li>
                <li><img src="https://s3-ap-southeast-1.amazonaws.com/cntres-assets-ap-southeast-1-250226768838-cf675839782fd369/imageResource/2017/06/07/1496833714411-48c9b7565018d02dc32837738df1c917.png" width="20" height="20"><span> Thang máy</span></li>
                <li><img src="https://s3-ap-southeast-1.amazonaws.com/cntres-assets-ap-southeast-1-250226768838-cf675839782fd369/imageResource/2017/06/07/1496833833458-7b6ab67bc5df6ef9f2caee150aae1f43.png" width="20" height="20"><span> Wifi</span></li>

            </div>
        </div>
        <div class="introduce-sevrice col-6">
            <div class="comment">
                <div id="hotels-title" class="hotels-title">
                    <h6 style="display:inline-block">Khách nói gì về kì nghỉ của họ</h6><span style="margin-left: 325px" class="add"><a href="">Xem thêm <i class="fa fa-arrow-right" aria-hidden="true"></i></a></span>

                </div>
            </div> 
        </div>
</div>
</div>



   
    