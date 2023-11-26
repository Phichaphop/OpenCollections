<?php
    if (isset($_GET['CreCounterTable'])) {
        CreCounterTable($dbname, $conn);
    }

    function CreCounterTable($dbname, $conn) {
        try {
            $conn->exec("USE $dbname");
            $sql = "CREATE TABLE counter (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    user INT(11) UNSIGNED NOT NULL,
                    ip VARCHAR(100) NOT NULL,
                    action VARCHAR(100) NOT NULL,
                    page VARCHAR(100) NOT NULL,
                    visit VARCHAR(100) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (user) REFERENCES user(id)
                )";
            $conn->exec($sql);
            $_SESSION['success'] = "Setup success!.";
            header("location: ../../Setup.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../Setup.php");
        }
    }

    if (isset($_GET['DelCounterTable'])) {
        $table = "counter";
        DelCounterTable($table, $conn);
    }

    function DelCounterTable($table, $conn) {
        try {
            $sql = "DROP TABLE $table";
            $conn->exec($sql);
            $_SESSION['success'] = "Delete table success!.";
            header("location: ../../Setup.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../Setup.php");
        }
    }
?>