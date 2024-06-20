<?php
function CreCounterTable($dbname, $table, $ref_user, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE IF NOT EXISTS $table (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    user INT(11) UNSIGNED NOT NULL,
                    ip VARCHAR(100) NOT NULL,
                    action VARCHAR(100) NOT NULL,
                    page VARCHAR(100) NOT NULL,
                    visit VARCHAR(100) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (user) REFERENCES $ref_user(id)
                )";
        $conn->exec($sql);
        $_SESSION['success'] = "Setup success!.";
    } catch (PDOException $e) {
        $_SESSION['error'] = $sql . "\n" . $e->getMessage();
    } finally {
        header("location: ../../Setup.php");
    }
}
