<?php 
    SESSION_START();
    include "../../models/binhluan.php";
    include "../../models/pdo.php";

    $id_phong = $_REQUEST['id_phong'];
    $id_useradmin = $_SESSION['user_admin']['id_useradmin'];

    $listbinhLuan = loadBinhLuan($id_phong);
    $countBinhLuan = countBinhLuan();
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận</title>
    <link rel="stylesheet" href="../../style.css">
</head>

<style>
.hotels-title table {
    width: 100%;
}

.hotels-title table tr td:nth-child(1) {
    width: 20%;
}
.hotels-title table tr td:nth-child(2) {
    width: 50%;
}
.hotels-title table tr td:nth-child(3) {
    width: 30%;
}


.comment ul {
    padding: 0;
    border-bottom: 1px solid #DCDCDC;
    width: 100%;
}
.comment ul li {
    display: inline-block;
    list-style: none;
    padding: 5px 5px;
    color: rgba(0, 135, 90, 1.00);
    font-weight: 500;
}
.hotels-title .btn-submit {
    margin-top: 10px;
    padding: 5px;
    background-color: #ef683a;
    border: none;
    border-radius: 5px;
    font-size: 15px;
    font-weight: 600;
}
.hotels-title .btn-submit:hover {
    background-color: #fff;
    color: #000;
    border: 1px solid #ef683a;
    transition: .5s;
}




#comment {
    width: 100%;
    border: 1px solid #DCDCDC;
    border-radius: 5px;
    margin-top: 10px;
    transition: border-color 0.3s, box-shadow 0.3s; 
}

#comment:focus {
    outline: none;
    border-color: #5cb85c; 
    box-shadow: 0 0 5px rgba(92, 184, 92, 0.5); 
}
</style>
<body>
<div class="container container-comment">
    <div class="comment">    
        <div id="hotels-title" class="hotels-title">
            <h6 style="display:inline-block">Khách nói gì về kì nghỉ của họ</h6><span style="margin-left: 200px" class="add"><a href="">Xem thêm <i class="fa fa-arrow-right" aria-hidden="true"></i></a></span>
            <ul>
                <li>Mô tả</li>
                <?php 
                    foreach ($countBinhLuan as $binhLuan) {
                        extract($binhLuan);
                        echo '<li>Đánh giá('.$binhLuan[0].')</li>';
                    }
                ?>
             </ul>
             <table>
                <?php 
                    foreach ($listbinhLuan as $binhLuan) {
                        extract($binhLuan);
                            echo '
                            <tr>
                                <td>'.$name_useradmin.'</td>
                                <td>'.$noidung_binhluan.'</td>
                                <td>'.$ngay_binhluan.'</td>
                            </tr>
                        
                        ';
                        
                    }
                ?>
            </table>
        </div>
        
    </div>
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
        <input type="hidden" name="id_phong" value="<?=$id_phong?>">
        <input type="hidden" name="id_taikhoan"value="<?=$id_useradmin?>" >
        <input type="text" name="noidung_binhluan" id="comment">
        <input type="submit" class="btn-submit" name="guibinhluan" value="Đánh giá">
    </form>
</div>
<?php
    if(isset($_POST['guibinhluan']) && $_POST['guibinhluan']) {
        $id_phong = $_POST['id_phong'];
        $noidung_binhluan = $_POST['noidung_binhluan'];
        $ngaybinhluan = date('Y-m-d H:i:s');
        $id_useradmin = $_POST['id_taikhoan'];

        try {
            // Kiểm tra xem tài khoản đã bình luận trước đó hay chưa
            if (hasCommented($id_useradmin)) {
                echo "Bạn chỉ được bình luận một lần!";
                header("Location: " . $_SERVER['HTTP_REFERER']); // Quay lại trang phòng
                exit;
            }
            
            insertBinhLuan($noidung_binhluan,$id_phong,$ngaybinhluan,$id_useradmin);

            // Cập nhật trạng thái đã bình luận cho tài khoản
            updateCommentStatus($id_useradmin);

            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
        }

?>
    
</body>
</html>