<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "opc";

/*
$servername = "localhost";
$username = "id20961732_opencollections";
$password = "486795132#Op";
$dbname = "id20961732_opc";
*/
function DBConnect($servername, $username, $password, $dbname)
{
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        return "error";
    }
}
?>