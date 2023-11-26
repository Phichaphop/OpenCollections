<?php
    if (isset($_GET['CreRequestTable'])) {
        CreRequestTable($dbname, $conn);
    }

    function CreRequestTable($dbname, $conn) {
        try {
            $conn->exec("USE $dbname");
            $sql = "CREATE TABLE request (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    title VARCHAR(50) NOT NULL,
                    detail LONGTEXT NOT NULL,
                    user INT(11) UNSIGNED NOT NULL,
                    status INT(11) UNSIGNED NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (status) REFERENCES request_status(id)
                )";
            $conn->exec($sql);
            $_SESSION['success'] = "Create request table success!.";
            header("location: ../../Setup.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../Setup.php");
        }
    }

    if (isset($_GET['DelRequestTable'])) {
        $table = "request";
        DelRequestTable($table, $conn);
    }

    function DelRequestTable($table, $conn) {
        try {
            $sql = "DROP TABLE $table";
            $conn->exec($sql);
            $_SESSION['success'] = "Delete request table complete!.";
            header("location: ../../Setup.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../Setup.php");
        }
    }
?>