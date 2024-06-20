<?php
function CreDB($dbname, $servername, $username, $password)
{
    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE $dbname";
        $conn->exec($sql);
        $_SESSION['success'] = "Database setup successfully.";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error creating database: " . $sql . "\n" . $e->getMessage();
    } finally {
        header("location: ../../Setup.php");
    }
}

function DeleteDB($dbname, $conn)
{
    try {
        $sql = "DROP DATABASE IF EXISTS $dbname";
        $conn->exec($sql);
        $_SESSION['success'] = "Database deleted successfully.";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error deleting database: " . $sql . "\n" . $e->getMessage();
    } finally {
        header("location: ../../Setup.php");
    }
}

function CheckTable($table, $conn)
{
    try {
        $stmt = $conn->prepare("SHOW TABLES LIKE :table");
        $stmt->bindParam(':table', $table, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else {
            return false; // Return false instead of "error"
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error checking table: " . $e->getMessage();
        return false; // Return false instead of "error"
    }
}

function DeleteTable($table, $conn)
{
    try {
        $sql = "DROP TABLE IF EXISTS $table";
        $conn->exec($sql);
        $_SESSION['done'] = "Table deleted successfully.";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error deleting table: " . $sql . "\n" . $e->getMessage();
    } finally {
        header("location: ../../Setup.php");
    }
}
?>
