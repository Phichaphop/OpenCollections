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

            SetUser("OpenCollections", "123456789Op", "opencollections.co@gmail.com", "0123456789", "1", $conn);

            SetUser("IVENE4", "123456789Iv", "IVENE4@gmail.com", "0881039800", "2", $conn);
            SetUser("URTC", "123456789Iv", "URTC@gmail.com", "0123456789", "2", $conn);
            SetUser("URVC", "123456789Iv", "URVC@gmail.com", "0123456789", "2", $conn);
            SetUser("DUTC", "123456789Iv", "DUTC@gmail.com", "0123456789", "2", $conn);
            SetUser("ACTC", "123456789Iv", "ACTC@gmail.com", "0123456789", "2", $conn);
            SetUser("YTC", "123456789Iv", "YTC@gmail.com", "0123456789", "2", $conn);
            SetUser("SSKTC", "123456789Iv", "SSKTC@gmail.com", "0123456789", "2", $conn);
            SetUser("SVC", "123456789Iv", "SVC@gmail.com", "0123456789", "2", $conn);

            SetUser("Phichaphop.b", "486795132Pb", "phichaphop.b@gmail.com", "0123456789", "3", $conn);
            SetUser("Tester", "123456789Iv", "Tester@gmail.com", "0123456789", "3", $conn);

            $_SESSION['success'] = "Setup success!.";
            header("location: ../../Setup.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../Setup.php");
        }
    }

    function SetUser($user, $pass, $email, $tel, $role, $conn) {
        try {
            $passHash = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO user (username, password, email, tel, role)
                                                VALUES(:username, :password, :email, :tel, :role)");
            $stmt->bindParam(":username", $user, PDO::PARAM_STR);
            $stmt->bindParam(":password", $passHash, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":tel", $tel, PDO::PARAM_STR);
            $stmt->bindParam(":role", $role, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            header("location: ../../Setup.php");
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
            header("location: ../../Setup.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../Setup.php");
        }
    }
?>