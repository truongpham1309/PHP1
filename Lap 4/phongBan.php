<?php
    require_once('connections.php');

    $sql = "SELECT * FROM phongBan";

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
    <title>Document</title>
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
        <table border="1">

            <tr>
                <th>Mã phòng ban</th>
                <th>Tên phòng ban</th>
                <th><a href="addPhongBan.php">Thêm mới</a></th>
            </tr>  

                <?php foreach($ketqua as $item) : ?>
                    <tr>
                        <td><?= $item['maPB'] ?></td>
                        <td><?= $item['tenPhong'] ?></td>
                    </tr>
                <?php endforeach ?>
        </table>
</body>
</html>