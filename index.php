<?php

    require_once "ketnoi.php";

    $sql = "SELECT * FROM baiviet";

    $stmt = $connect->prepare($sql);

    $stmt->execute();

    $ketqua = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài viết</title>
    <style>
        body{
            margin: 0 40px;
        }
        
        nav{
            text-align: right;
            margin-top: 30px;
        }
        nav a{
            text-decoration: none;
            color: black;
            
            font-weight: 600;
        }
        nav a:hover{
            border-bottom: 2px blue  solid;
        }
        h3{
            font-weight: 700;
            font-size: 48px;
            text-align: center;
        }
        img{
            width: 80%;
            margin-bottom: 20px;
        }
        .image{
            display: flex;
            justify-content: center;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>

    <nav>
        <a href="thembv.php">Thêm bài viết</a>
    </nav>
    <?php foreach($ketqua as $item) : ?>
        <div class="container">
            <div>
                <h3><?= $item['title'] ?></h3>
                <a href="editbv.php?id=<?= $item['id_bv'] ?>">Sửa bài viết</a>
            </div>
            
            <div class="image">
                <img src="./uploadlap6/<?= $item['images'] ?>" alt="">
            </div>
            <span><?= $item['descriptions'] ?></span>
            <p><?= $item['content'] ?></p>

            <h4>View: <?= $item['views'] ?> <br> Ngày đăng: <?= $item['ngaydang'] ?></h4>
            <a href="deletebv.php?id=<?= $item['id_bv'] ?>">Xóa</a>
            <hr>
        </div>
    <?php endforeach ?>

</body>
</html>
