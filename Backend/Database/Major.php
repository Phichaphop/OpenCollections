<?php
    if (isset($_GET['CreMajorTable'])) {
        CreMajorTable($dbname, $conn);
    }
    function CreMajorTable($dbname, $conn) {
        try {
            $conn->exec("USE $dbname");
            $sql = "CREATE TABLE major (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    major VARCHAR(50) NOT NULL,
                    degree VARCHAR(50) NOT NULL,
                    dept INT(11) UNSIGNED NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (dept) REFERENCES dept(id)
                )";
            $conn->exec($sql);
            $_SESSION['success'] = "Setup success!.";
            header("location: ../../DBM.php");
        } catch (PDOException $e) {
            $_SESSION['error'] =  $sql . "\n" . $e->getMessage();
            header("location: ../../DBM.php");
        }
    }

    if (isset($_GET['DelMajorTable'])) {
        $table = "major";
        DelMajorTable($table, $conn);
    }

    function DelMajorTable($table, $conn) {
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