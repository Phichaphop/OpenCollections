<?php
    if (isset($_GET['CreFacultyTable'])) {
        CreFacultyTable($dbname, $conn);
    }

    function CreFacultyTable($dbname, $conn) {
        try {
            $conn->exec("USE $dbname");
            $sql = "CREATE TABLE faculty (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    faculty VARCHAR(50) NOT NULL,
                    ins INT(11) UNSIGNED NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (ins) REFERENCES institute(id)
                )";
            $conn->exec($sql);
            $_SESSION['success'] = "Setup success!.";
            header("location: ../../DBM.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../DBM.php");
        }
    }

    if (isset($_GET['DelFacultyTable'])) {
        $table = "faculty";
        DelFacultyTable($table, $conn);
    }

    function DelFacultyTable($table, $conn) {
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