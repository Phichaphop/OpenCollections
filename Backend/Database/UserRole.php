<?php
    if (isset($_GET['CreUserRoleTable'])) {
        CreUserRoleTable($dbname, $conn);
    }

    function CreUserRoleTable($dbname, $conn) {
        try {
            $conn->exec("USE $dbname");
            $sql = "CREATE TABLE user_role (
                        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        role VARCHAR(50) NOT NULL,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                    )";
            $conn->exec($sql);
            $_SESSION['success'] = "Create table success!.";
            header("location: ../../DBM.php");
            SetUserRole($conn, "Admin");
            SetUserRole($conn, "Officer");
            SetUserRole($conn, "User");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../DBM.php");
        }
    }

    function SetUserRole($conn, $role) {
        try {
            $stmt = $conn->prepare("INSERT INTO user_role (role)
                                            VALUES(:role)");
            $stmt->bindParam(":role", $role);
            $stmt->execute();
            $_SESSION['success'] = "Setup success!.";
            header("location: ../../DBM.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            header("location: ../../DBM.php");
        }
    }

    if (isset($_GET['DelUserRoleTable'])) {
        $table = "user_role";
        DelUserRoleTable($table, $conn);
    }

    function DelUserRoleTable($table, $conn) {
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