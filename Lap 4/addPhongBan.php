<?php

    require_once('connections.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $phongBan = $_POST['phongBan'];

        $sql = "INSERT INTO phongBan (tenPhong) VALUES('$phongBan')";
        
        $thongBao1 = '';

        if(strlen($phongBan) == 0){
            $thongBao1 = 'Mời nhập thông tin phòng ban';
        }
        else{
            $stmt = $connection->prepare($sql);

            $stmt->execute();

            header('location: phongBan.php');

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
    <title>Thêm phòng ban</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Tên phòng ban</label> <br> <br>
        <input type="text" name="phongBan" id=""><br><br>

        <span><?= $thongBao1 ?? '' ?></span> <br>

        <button type="submit">Thêm</button>
    </form>
</body>
</html>