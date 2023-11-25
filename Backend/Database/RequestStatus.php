<?php
    if (isset($_GET['CreRequestStatusTable'])) {
        CreRequestStatusTable($dbname, $conn);
    }

    function CreRequestStatusTable($dbname, $conn) {
        try {
            $conn->exec("USE $dbname");
            $sql = "CREATE TABLE request_status (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    status VARCHAR(50) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
            $conn->exec($sql);
            SetupRStatus($conn, "Draft");
            SetupRStatus($conn, "Wait");
            SetupRStatus($conn, "Inproces");
            SetupRStatus($conn, "Fixed");
            SetupRStatus($conn, "Cancel");
            $_SESSION['success'] = "Create request status table complete!.";
            header("location: ../../DBM.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../DBM.php");
        }
    }

    function SetupRStatus($conn, $status) {
        try {
            $stmt = $conn->prepare("INSERT INTO request_status (status)
                                            VALUES(:status)");
            $stmt->bindParam(":status", $status);
            $stmt->execute();
            $_SESSION['success'] = "Insert request status complete!.";
            header("location: ../../DBM.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            header("location: ../../DBM.php");
        }
    }

    if (isset($_GET['DelRequestStatusTable'])) {
        $table = "request_status";
        DelRequestStatusTable($table, $conn);
    }

    function DelRequestStatusTable($table, $conn) {
        try {
            $sql = "DROP TABLE $table";
            $conn->exec($sql);
            $_SESSION['success'] = "Delete request status table complete!.";
            header("location: ../../DBM.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../DBM.php");
        }
    }
?>