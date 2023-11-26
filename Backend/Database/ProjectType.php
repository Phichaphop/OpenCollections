<?php
    if (isset($_GET['CreProjectTypeTable'])) {
        CreProjectTypeTable($dbname, $conn);
    }

    function CreProjectTypeTable($dbname, $conn) {
        try {
            $conn->exec("USE $dbname");
            $sql = "CREATE TABLE project_type (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    type VARCHAR(50) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
            $conn->exec($sql);
            SetupProjectType($conn, "Project");
            SetupProjectType($conn, "Cooperative Education");
            SetupProjectType($conn, "Thesis");
            SetupProjectType($conn, "Conference Proceedings");
            SetupProjectType($conn, "Research Report (Internal Research Funding)");
            SetupProjectType($conn, "Research Report (External Research Funding)");
            SetupProjectType($conn, "Term Paper");
            SetupProjectType($conn, "Academic Article");
            SetupProjectType($conn, "Independent Study");
            SetupProjectType($conn, "Internal Research Funding");
            $_SESSION['success'] = "Setup success!.";
            header("location: ../../Setup.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../Setup.php");
        }
    }

    function SetupProjectType($conn, $type) {
        try {
            $stmt = $conn->prepare("INSERT INTO project_type (type)
                                            VALUES(:type)");
            $stmt->bindParam(":type", $type);
            $stmt->execute();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            header("location: ../../Setup.php");
        }
    }

    if (isset($_GET['DelProjectTypeTable'])) {
        $table = "project_type";
        DelProjectTypeTable($table, $conn);
    }

    function DelProjectTypeTable($table, $conn) {
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