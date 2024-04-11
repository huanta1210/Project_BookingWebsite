<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="scss/pay.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="themicon/themify-icons-font/themify-icons/themify-icons.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<style>
p {
    margin: 0;
}
.main {
    display: inline-block;
}

.form-message {
    color:red;
}

.btn-submit {
    width: 100%;
    padding: 10px;
    border: 1px solid #FF6600;
    border-radius: 5px;
    background-color: #FF6600;
    font-size: 15px;
    font-weight: 600;
}
.btn-submit:hover, 
.submit:hover {
    background-color: #fff;
    color: #000;
    border: 1px solid #ef683a;
    transition: .5s;
}


</style>



<body>
    <section class="section-content container">

        <div class="row">
        <div class="main col-5">
            <div class="main-header">
                <a class="logo" href="">
                    <h2>Moko Furturne</h2>
                </a>
                <ul>
                    <li class="payments-method">Phương thức thanh toán</li>
                </ul>
            </div>
            <div class="main-content">
                <div class="step">
                    <div class="step-section">
                        <div class="section-header">
                            <h2>Thông tin thanh toán</h2>
                        </div>
                        <div class="sections-form">
                            
                            <div class="main">
                        
                            <form action="index.php?act=billconfirm" method="POST" enctype="multipart/form-data" class="form" id="form-1">
                                <div class="form-group">
                                    <label for="fullname" class="form-label">Họ và tên:</label>
                                    <input id="fullname" name="fullname"  type="text" placeholder="Họ và tên" class="form-control">
                                    <?php if (!empty($_SESSION["error"]["fullname"])) : ?>
                                        <span style="color:red;" class="form-message"><?php echo $_SESSION["error"]["fullname"]; ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-label">Email:</label>
                                    <input id="email" name="email" type="text" placeholder="Email" class="form-control">
                                    <?php if (!empty($_SESSION["error"]["fullname"])) : ?>
                                        <span style="color:red;" class="form-message"><?php echo $_SESSION["error"]["fullname"]; ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="text" class="form-label">Số điện thoại:</label>
                                    <input id="number" name="tell_taikhoan" type="text" placeholder="Số điện thoại" class="form-control">
                                    <?php if (!empty($_SESSION["error"]["fullname"])) : ?>
                                        <span style="color:red;" class="form-message"><?php echo $_SESSION["error"]["fullname"]; ?></span>
                                    <?php endif; ?>
                                </div>
                                <input type="submit" class="btn-submit" value="Tiếp tục thanh toán" name="dongydathang">
                            </form>
                            

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="side-bar col-6">
            <table class="product-table">
                <thead>
                    <tr>
                        <th><span class="visual-hiden">Hình ảnh</span></th>
                        <th><span class="visual-hiden"></span></th>
                        <th><span class="visual-hiden">Số lượng</span></th>
                        <th><span class="visual-hiden">Giá</span></th>
                    </tr>
                </thead>

                <?php 
                    foreach ($_SESSION['cart'] as $cart) {
                        extract($cart);      
                        $image = $imgPath.$cart[2];
                    }  
                ?>
                <tbody>
                    <td>
                        <div class="thumb">
                            <img src="<?=$image?>" alt="">
                           
                        </div>
                    </td>
                    <td class="product-text">
                        <span><?=$cart[1]?></span>
                        <p><?=$cart[4]?></p>
                        <p><?=$cart[5]?></p>
                        <p>Ngày nhận phòng: <?=$cart[6]?></p>
                        <p>Ngày trả phòng: <?=$cart[7]?></p>
                    </td>
                    <td class="product-price"><span>$<?=$cart[3]?></span></td>
                </tbody>

            </table>
            <hr>
            <div class="order">
                <form action="">
                    <div class="form-group">
                        <input id="text-sale" name="text-sale" type="text" placeholder="Mã giảm giá" class="text-sale">
                        <span><button class="submit">Sử dụng</button></span>
                    </div>
                </form>
            </div>
            <hr>
            <div class="total-title">
                <table>
                    <thead>
                        <tr>
                            <td>Tạm tính:</td>
                            <td><span>$<?=$cart[3]?></span></td>
                        </tr>
                        <tr>
                            <td>Thuế & Phí:</td>
                            <td><span>-</span></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tổng tiền</td>
                            <td><span>$<?=$cart[3]?></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        </div>
    </section>
    
</body>


</html>