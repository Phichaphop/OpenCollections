<?php
function CreUserTable($dbname, $table, $ref_user_role, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE IF NOT EXISTS $table (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100) NOT NULL,
            password LONGTEXT NOT NULL,
            email VARCHAR(50) NOT NULL,
            tel VARCHAR(10) NOT NULL,
            pic LONGTEXT NULL,
            role INT(11) UNSIGNED NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (role) REFERENCES $ref_user_role(id)
                    )";
        $conn->exec($sql);

        // Set users
        SetUser("OpenCollections", "123456789Op", "opencollections.co@gmail.com", "0123456789", "1", $table, $conn);
        SetUser("IVENE4", "123456789Op", "IVENE4@gmail.com", "0123456789", "2", $table, $conn);
        SetUser("URTC", "123456789Op", "URTC@gmail.com", "0123456789", "2", $table, $conn);
        SetUser("URVC", "123456789Op", "URVC@gmail.com", "0123456789", "2", $table, $conn);
        SetUser("DUTC", "123456789Op", "DUTC@gmail.com", "0123456789", "2", $table, $conn);
        SetUser("ACTC", "123456789Op", "ACTC@gmail.com", "0123456789", "2", $table, $conn);
        SetUser("YTC", "123456789Op", "YTC@gmail.com", "0123456789", "2", $table, $conn);
        SetUser("SSKTC", "123456789Op", "SSKTC@gmail.com", "0123456789", "2", $table, $conn);
        SetUser("SVC", "123456789Op", "SVC@gmail.com", "0123456789", "2", $table, $conn);
        SetUser("Tester1", "123456789Op", "Tester@gmail.com", "0123456789", "3", $table, $conn);
        SetUser("Tester2", "123456789Op", "Tester2@gmail.com", "0123456789", "3", $table, $conn);
        SetUser("Tester3", "123456789Op", "Tester3@gmail.com", "0123456789", "3", $table, $conn);
        
        $_SESSION['success'] = "Setup success!";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error creating table: " . $e->getMessage();
    } finally {
        header("location: ../../Setup.php");
        exit(); // Ensure script terminates after redirection
    }
}

function SetUser($user, $pass, $email, $tel, $role, $table, $conn)
{
    try {
        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO $table (username, password, email, tel, role)
                VALUES(:username, :password, :email, :tel, :role)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":username", $user, PDO::PARAM_STR);
        $stmt->bindParam(":password", $passHash, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":tel", $tel, PDO::PARAM_STR);
        $stmt->bindParam(":role", $role, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error inserting user: " . $e->getMessage();
    }
}
?>
