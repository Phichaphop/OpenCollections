<?php
    if (isset($_GET['CreateProjectTable'])) {
        $table = "project";
        CreateProjectTable($dbname, $table, $conn);
    }

    function CreateProjectTable($dbname, $table, $conn) {
        try {
            $conn->exec("USE $dbname");
            $sql = "CREATE TABLE $table (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    title VARCHAR(50) NOT NULL,
                    author INT(11) UNSIGNED NOT NULL,
                    advisor INT(11) UNSIGNED NOT NULL,
                    type INT(11) UNSIGNED NOT NULL,
                    major INT(11) UNSIGNED NOT NULL,
                    abstract LONGTEXT,
                    date DATE DEFAULT CURRENT_DATE,
                    file LONGTEXT,
                    approver INT(11) UNSIGNED NOT NULL,
                    status INT(11) UNSIGNED NULL,
                    note VARCHAR(100) NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (type) REFERENCES project_type(id),
                    FOREIGN KEY (major) REFERENCES major(id),
                    FOREIGN KEY (status) REFERENCES project_status(id)
                )";
            $conn->exec($sql);
            $_SESSION['success'] = "Setup success!.";
            header("location: ../../Setup.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../Setup.php");
        }
    }

    if (isset($_GET['DelProjectTable'])) {
        $table = "project";
        DelProjectTable($table, $conn);
    }

    function DelProjectTable($table, $conn) {
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