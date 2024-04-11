<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../product_details.css">
    <link rel="stylesheet" href="../cart.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../themicon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <header>
        <section class="header-main-top ">

            <div class="section-main container d-flex">
                <!-- shipping -->
                <section class=" section-ship">
                    <a href="">Free shipping</a> <span>orders from all item !</span>
                </section>
                <!-- header icon -->
                <section class="header-icon">
                    <ul>
                        <li>
                            <a href=""><i class="ti-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="ti-twitter-alt" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="ti-youtube" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="ti-instagram" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="ti-google" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </section>
            </div>

        </section>
        <!-- phần logo và thông tin các mặt hàng -->
        <div class="header-nav container">
            <section class="nav-main d-flex align-items-center">
                <section class="nav-logo">
                    <img src="../img/logo-noi-that (5).jpg" alt="">
                </section>

                <section class="nav">
                    <ul>
                        <li><a href="index.php?act=phong">Trang chủ</a></li>
                        <li><a href="index.php?act=phong">Khách sạn</a></li>
                        <li><a href="index.php?act=gioithieu">Giới thiệu</a></li>
                        <li><a href="index.php?act=tintuc">Tin tức</a></li>
                        <li><a href="index.php?act=lienhe">Liên hệ</a></li>
                    </ul>
                </section>

                <section class="nav-icon">
                    <?php
                        if(isset($_SESSION['user_admin'])) {
                            extract($_SESSION['user_admin']);
                        }   
                    ?>
                    <ul>
                        <li>
                            <form action="index.php?act=phong" method="POST">
                                <input type="text" name="kyw" id="">
                                <input type="submit" name="timkiem" value=""><i class="fa fa-search"
                                    aria-hidden="true"></i>
                            </form>
                        </li>
                        <li>
                            <a href="index.php?act=dangky"><i class="fa fa-user" aria-hidden="true"></i></a>
                            <ul class="sub-nav">
                                <li><a href="index.php?act=dangky">Đăng ký</a></li> <br>
                                <?php if(isset($_SESSION['user_admin'])) { ?>
                                    <li><?php echo $name_useradmin ?></li>
                                    <?php if(isset($role_admin) && $role_admin == 1) { ?>
                                        <li><a href="../admin/index.php">Đăng nhập quản trị</a></li>
                                    <?php } ?>
                                    <li><a href="index.php?act=thoat">Thoát</a></li>
                                <?php } else { ?>
                                    <li><a href="index.php?act=dangnhap">Đăng nhập</a></li>
                                <?php } ?>
                                <li><a href="index.php?act=lichsudatphong">Lịch sử đặt phòng</a></a></li>

                            </ul>

                        </li>
                        <!-- <li>
                            <a href="index.php?act=addcart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                        </li> -->
                    </ul>
                </section>
            </section>
        </div>
        <!-- phần banner -->