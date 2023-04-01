<?php

    require_once('connections.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $tennv = $_POST['tennv'];
        $ngaysinh = $_POST['ngaysinh'];
        $gioitinh = $_POST['gioitinh'];
        $luong = $_POST['luong'];
        $maPB = $_POST['maPB'];

        $sql = "INSERT INTO nhanVien (tennv,ngaysinh,phai,luong,maPB) VALUES('$tennv','$ngaysinh','$gioitinh','$luong','$maPB')";
        

        if(strlen($tennv) == 0){
            $thongBao1 = 'Mời nhập thông tin phòng ban';
        }else if(strlen($ngaysinh) == 0){
            $thongBao2 = 'Mời nhập thông tin ngày sinh';
        }
        else if(strlen($gioitinh) == 0){
            $thongBao3 = 'Mời nhập lại giới tính';
        }
        else if($luong < 5000000){
            $thongBao4 = 'Mời nhập lại lương';
        }
        else if($maPB < 0){
            $thongBao5 = 'Mời nhập lại mã phòng ban';
        }
        else{
            $stmt1 = $connection->prepare($sql);

            $stmt1->execute();

            header('location: NhanVien.php');

            exit;
        }
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <form action="" method="post">

    <label for="">Name</label><br>
    <input type="text" name="tennv" id="" value="<?= $tennv ?? ''?>"><br>
    <span><?= $thongBao1 ?? ''?></span><br>

    <label for="">NgaySinh</label><br>
    <input type="date" name="ngaysinh" id="" value="<?= $ngaysinh ?? ''?>"><br>
    <span><?= $thongBao2 ?? ''?></span><br>


    <label for="">Gioi Tinh</label><br>
    <input type="text" name="gioitinh" id="" value="<?= $gioitinh ?? ''?>"><br>
    <span><?= $thongBao3 ?? ''?></span><br>


    <label for="">Luong</label><br>
    <input type="text" name="luong" id="" value="<?= $luong ?? ''?>"><br>
    <span><?= $thongBao4 ?? ''?></span><br>


    <label for="">maPB</label><br>
    <input type="text" name="maPB" id="" value="<?= $maPB ?? ''?>"><br>
    <span><?= $thongBao5 ?? ''?></span><br>


    <button type="submit">Thêm</button>
    </form>
</body>
</html>