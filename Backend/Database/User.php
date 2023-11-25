<?php
    if (isset($_GET['CreUserTable'])) {
        CreUserTable($dbname, $conn);
    }

    function CreUserTable($dbname, $conn) {
        try {
            $conn->exec("USE $dbname");
            $sql = "CREATE TABLE user (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            password LONGTEXT NOT NULL,
            email VARCHAR(50) NOT NULL,
            tel VARCHAR(10) NOT NULL,
            pic LONGTEXT NULL,
            role INT(11) UNSIGNED NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (role) REFERENCES user_role(id)
                    )";
            $conn->exec($sql);
            $_SESSION['success'] = "Setup success!.";
            header("location: ../../DBM.php");
            SetUser($conn);
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../DBM.php");
        }
    }

    function SetUser($conn) {
        $user = "OpenCollections";
        $pass = "486795132Op";
        $email = "opencollections.co@gmail.com";
        $tel = "0881039800";
        $role = "1";
        try {
            $passHash = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO user (username, password, email, tel, role)
                                                VALUES(:username, :password, :email, :tel, :role)");
            $stmt->bindParam(":username", $user);
            $stmt->bindParam(":password", $passHash);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":tel", $tel);
            $stmt->bindParam(":role", $role);
            $stmt->execute();
            $_SESSION['success'] = "Setup success!.";
            header("location: ../../DBM.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            header("location: ../../DBM.php");
        }
    }

    if (isset($_GET['DelUserTable'])) {
        $table = "user";
        DelUserTable($table, $conn);
    }

    function DelUserTable($table, $conn) {
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