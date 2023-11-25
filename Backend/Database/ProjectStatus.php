<?php
    if (isset($_GET['CreProjectStatusTable'])) {
        $table = "project_status";
        CreProjectStatusTable($dbname, $table, $conn);
    }

    function CreProjectStatusTable($dbname, $table, $conn) {
        try {
            $conn->exec("USE $dbname");
            $sql = "CREATE TABLE $table (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    status VARCHAR(50) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
            $conn->exec($sql);
            SetupStatus($conn, $table, "Draft");
            SetupStatus($conn, $table, "Wait Approve");
            SetupStatus($conn, $table, "Approve");
            SetupStatus($conn, $table, "Not Approve");
            $_SESSION['success'] = "Setup status success!.";
            header("location: ../../DBM.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../DBM.php");
        }
    }

    function SetupStatus($conn, $table, $status) {
        try {
            $stmt = $conn->prepare("INSERT INTO $table (status)
                                            VALUES(:status)");
            $stmt->bindParam(":status", $status);
            $stmt->execute();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            header("location: ../../DBM.php");
        }
    }

    if (isset($_GET['DelProjectStatusTable'])) {
        $table = "project_status";
        DelProjectStatusTable($table, $conn);
    }

    function DelProjectStatusTable($table, $conn) {
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