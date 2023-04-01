<?php
    // File connection ket noi CSDL

    //

    $host = 'localhost';
    $username = 'root';
    $password = '123456';
    $dbname = 'quanLiDuAn';

    try {
        // chuoi ket noi den csdl

        $connection = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // echo "Ket noi du kieu thanh cong";

    }catch(PDOException $e){
        echo "Loi ket noi co so du lieu <br>", $e->getMessage();
    }


?>