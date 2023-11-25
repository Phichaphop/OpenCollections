<?php
    if (isset($_GET['CreDeptTable'])) {
        CreDeptTable($dbname, $conn);
    }
    
    function CreDeptTable($dbname, $conn) {
        try {
            $conn->exec("USE $dbname");
            $sql = "CREATE TABLE dept (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                dept VARCHAR(50) NOT NULL,
                faculty INT(11) UNSIGNED NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (faculty) REFERENCES faculty(id)
            )";
            $conn->exec($sql);
            $_SESSION['success'] = "Setup success!.";
            header("location: ../../DBM.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../DBM.php");
        }
    }

    if (isset($_GET['DelDeptTable'])) {
        $table = "dept";
        DelDeptTable($table, $conn);
    }

    function DelDeptTable($table, $conn) {
        try {
            $sql = "DROP TABLE $table";
            $conn->exec($sql);
            $_SESSION['success'] = "Delete table success!.";
            header("location: ../../DBM.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../DBM.php");
        }
    }
?>