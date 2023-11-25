<?php
    session_start();
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

    $conn = DBConnect($servername, $username, $password, $dbname);

    function DBConnect($servername, $username, $password, $dbname) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    }
    
    require_once "DB.php";

    require_once "UserRole.php";
    require_once "User.php";

    require_once "Ins.php";
    require_once "Faculty.php";
    require_once "Dept.php";
    require_once "Major.php";

    require_once "ProjectType.php";
    require_once "ProjectStatus.php";
    require_once "Project.php";

    require_once "Favorite.php";
    require_once "RequestStatus.php";
    require_once "Request.php";
    
    require_once "Approve.php";
    require_once "Counter.php";
?>