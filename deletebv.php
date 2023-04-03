<?php

    require_once "ketnoi.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM baiviet WHERE id_bv = $id";

    $stmt = $connect->prepare($sql);

    $stmt->execute();

    $msg = "Xóa bài viết thành công";

    header("location: baiviet.php?msg=$msg");

    exit;

    ?>