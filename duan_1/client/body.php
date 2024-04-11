<section class="header-banner">

    <section class="banner">
        <img src="../img/modern-interior-design-grey-living-room2.webp" alt="">
    </section>

    <section class="banner-angle-left">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
    </section>

    <section class="banner-angle-right">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    </section>

    <section class="section-text">
        <div>
            <h3>WOODEN</h3>
            <h4>LEIBAL PLAIN SOFA</h4>
            <p>A goodlooking and comfortable</p>
        </div>
    </section>
    <section class="section-shop-now">
        <a href="">SHOP NOW</a>
    </section>

</section>

</header>
<main>
    <section class="container section-main">
        <h3>WE LOVE TREND</h3>
        <p class="p-line"></p>
        <section class="section-product-portfolio d-flex justify-content-center">
            <?php 
                foreach ($danhMucPhong as $loaiPhong) {
                    extract($loaiPhong);
                    $linkLoaiPhong = "index.php?act=phong&id_loaiphong=".$id_loaiphong;
                    echo '
                        <div class="product-portfolio">
                            <a href="'.$linkLoaiPhong.'">'.$ten_loaiphong.'</a>
                        </div>
            
                    ';
                }
            ?>
        </section>
        <section class="product-lists container ">
            <?php 
            $i = 0;
                foreach ($rooms as $room) {
                    extract($room);
                    $image = $imgPath.$img;
                    $linksp = "index.php?act=phongct&idphong=".$id_phong;
                    echo '
                            <div class="product-items">
                            <a href="'.$linksp.'"><img src="'.$image.'" alt="Ảnh ghế"></a>
                            <div class="rating">
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                            </div>
                            <p class="product-text"><a href="'.$linksp.'">'.$name.'</a></p>
                            <p class="product-price"><a href="'.$linksp.'">$ '.$price.'</a></p>
                            
                        </div>
                    ';
                }   
                $i++; 
            ?>

        </section>

        <section class="section-slider d-flex">
            <div class="slider-left">
                <div class="slider-left-text">
                    <h3>New Arrivals</h3>
                    <p>Furturne Collection</p>
                    <button>Buy Now</button>
                </div>
            </div>
            <div class="slider-right">
                <div class="slider-right-text">
                    <h3>Elegants Design</h3>
                    <p>Furturne Collection</p>
                    <button>Buy Now</button>
                </div>
            </div>
        </section>

    </section>

</main>