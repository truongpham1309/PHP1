<?php
    $host = 'localhost';
    const username = "root";
    const password = "123456";
    $dbname = "ph30426_lap6";

    try{
        $connect = new PDO("mysql: host=$host; dbname=$dbname; charset=utf8",username,password);

        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // echo "ket noi thanh cong";
    }
    catch(PDOException $e){
        echo "Loi ket noi", $e->getMessage();
    }