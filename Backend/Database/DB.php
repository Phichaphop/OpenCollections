<?php
    if (isset($_GET['CreDB'])) {
        CreDB($dbname, $servername, $username, $password);
    }

    function CreDB($dbname, $servername, $username, $password) {
        try {
            $conn = new PDO("mysql:host=$servername", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE DATABASE $dbname";
            $conn->exec($sql);
            $_SESSION['success'] = "Setup database success!.";
            header("location: ../../Setup.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../Setup.php");
        }
    }

    if (isset($_GET['DelDatabase'])) {
        DelDatabase($dbname, $conn);
    }

    function DelDatabase($dbname, $conn) {
        try {
            $sql = "DROP DATABASE $dbname";
            $conn->exec($sql);
            $_SESSION['success'] = "Delete database success!.";
            header("location: ../../Setup.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../Setup.php");
        }
    }
?>