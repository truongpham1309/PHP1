<?php
require_once "ketnoi.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $images = $_FILES['images'];
    $name_image = $images['name'];
    $description = $_POST['descriptions'];
    $content = $_POST['content'];
    $sql = "UPDATE baiviet SET 
    title='$title',images='$name_image',descriptions='$description',content='$content' WHERE id_bv=$id";

    if ($images['size'] > 0) {
        $img = ['jpg', 'jpeg', 'png', 'gif'];

        $image_ext = pathinfo($name_image, PATHINFO_EXTENSION);
        if (!in_array($image_ext, $img)) {

            $test = false;
        } else {
            $test = true;
        }
    } else {
        $test = false;
    }
    if (strlen($title) == 0) {
        $thongBao = 'Mời nhập tiêu đề<br>';
    } else if ($test != true) {
        $thongBao2 = 'File không phải là ảnh hoặc chưa có file <br>';
    } else if (strlen($description) == 0) {
        $thongBao3 = 'Mời nhập mô tả<br>';
    } else if (strlen($content) == 0) {
        $thongBao4 = "Mời nhập nội dung<br>";
    } else {
        move_uploaded_file($images['tmp_name'], 'uploadlap6/' . $name_image);

        $stmt = $connect->prepare($sql);

        $stmt->execute();

        $msg = 'Sửa bài viết thành công';

        header("location: baiviet.php?msg=$msg");

        exit;
    }
}
$id = $_GET['id'];

$sql2 = "SELECT * FROM baiviet WHERE id_bv = $id";

$stmt2 = $connect->prepare($sql2);

$stmt2->execute();

$ketqua = $stmt2->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa bài viết</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $ketqua['id_bv'] ?? '' ?>">
        <label for="">Tiêu đề</label> <br>
        <input type="text" name="title" id="" value="<?= $ketqua['title'] ?? '' ?>"> <br>
        <span>
            <?= $thongBao ?? '' ?>
        </span>

        <label for="">Ảnh</label> <br>
        <input type="file" name="images" id="" value="<?= $ketqua['images'] ?? '' ?>"> <br>
        <span>
            <?= $thongBao2 ?? '' ?>
        </span>

        <label for="">Mô tả</label> <br>
        <input type="text" name="descriptions" id="" value="<?= $ketqua['descriptions'] ?? '' ?>"> <br>
        <span>
            <?= $thongBao3 ?? '' ?>
        </span>

        <label for="">Nội dung</label> <br>
        <textarea name="content" id="" cols="30" rows="10"><?= $ketqua['content'] ?? '' ?></textarea> <br>
        <span>
            <?= $thongBao4 ?? '' ?>
        </span>

        <button type="submit">Sửa</button>
    </form>
</body>

</html>