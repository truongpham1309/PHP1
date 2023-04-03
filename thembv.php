<?php
require_once "ketnoi.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $images = $_FILES['images'];
    $name_image = $images['name'];
    $description = $_POST['descriptions'];
    $content = $_POST['content'];

    if ($images['size'] > 0) {
        $img = ['jpg', 'jpeg', 'png', 'gif'];

        $image_ext = pathinfo($name_image, PATHINFO_EXTENSION);

        if (!in_array($image_ext, $img)) {

            $test = false;
        } else {
            move_uploaded_file($image['tmp_name'], 'uploadlap6/' . $name_image);
            $test = true;
        }
    }
    else{
        $test = false;
    }

    if (strlen($title) == 0) {
        $thongBao = 'Mời nhập tiêu đề<br>';
    } else if ($test != true) {
        $thongBao2 = 'File không phải là ảnh hoặc chưa có file<br>';
    } else if (strlen($description) == 0) {
        $thongBao3 = 'Mời nhập mô tả<br>';
    } else if (strlen($content) == 0) {
        $thongBao4 = "Mời nhập nội dung<br>";
    } else {
        move_uploaded_file($images['tmp_name'], 'uploadlap6/' . $name_image);

        $sql = "INSERT INTO baiviet (title, images, descriptions, content) 
            VALUES('$title','$name_image','$description','$content')";

        $stmt = $connect->prepare($sql);

        $stmt->execute();

        $msg = 'Thêm bài viết thành công';

        header("location: baiviet.php?msg=$msg");

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
    <title>Thêm bài viết</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">Tiêu đề</label> <br>
        <input type="text" name="title" id="" value="<?= $title ?? '' ?>"> <br>
        <span>
            <?= $thongBao ?? '' ?>
        </span>

        <label for="">Ảnh</label> <br>
        <input type="file" name="images" id=""> <br>
        <span>
            <?= $thongBao2 ?? '' ?>
        </span>

        <label for="">Mô tả</label> <br>
        <input type="text" name="descriptions" id="" value="<?= $description ?? '' ?>"> <br>
        <span>
            <?= $thongBao3 ?? '' ?>
        </span>

        <label for="">Nội dung</label> <br>
        <textarea name="content" id="" cols="30" rows="10"><?= $content ?? '' ?></textarea> <br>
        <span>
            <?= $thongBao4 ?? '' ?>
        </span>

        <button type="submit">Thêm</button>
    </form>
</body>

</html>