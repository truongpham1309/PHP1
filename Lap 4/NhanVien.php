<?php
    require_once('connections.php');

    $sql = "SELECT * FROM nhanVien";

    $stmt = $connection->prepare($sql);

    $stmt->execute();

    $ketqua = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NhanVien</title>
    <style>
        table{
            border-collapse: collapse;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>

<h3>Nhân Viên</h3>

    <table border="1">
        <tr>
            <th>Mã nhân viên</th>
            <th>Tên nhân viên</th>
            <th>Ngày Sinh</th>
            <th>Giới tính</th>
            <th>Lương</th>
            <th>Mã phòng ban</th>
            <th><a href="addNhanVien.php">Thêm mới</a></th>
        </tr>

        <?php foreach($ketqua as $item) : ?>
            <tr>
                <td><?= $item['manv']?></td>
                <td><?= $item['tennv']?></td>
                <td><?= $item['ngaysinh']?></td>
                <td><?= $item['phai']?></td>
                <td><?= $item['luong']?></td>
                <td><?= $item['maPB']?></td>
            </tr>
        <?php endforeach?>

    </table>
    
</body>
</html>