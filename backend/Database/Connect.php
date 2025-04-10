<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "opc";

function DBConnect($servername, $username, $password, $dbname)
{
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        // บันทึกข้อผิดพลาดลงใน session เพื่อทำการแสดงผลหรือจัดการในภายหลัง
        $_SESSION['error'] = "Connection failed: " . $e->getMessage();
        return false;
    }
}
