<?php
function CreFavoriteTable($dbname, $table, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE $table (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    project INT(11) UNSIGNED NOT NULL,
                    user INT(11) UNSIGNED NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (project) REFERENCES project(id),
                    FOREIGN KEY (user) REFERENCES user(id)
                )";
        $conn->exec($sql);
        $_SESSION['success'] = "Setup favorite success!.";
        header("location: ../../Setup.php");
    } catch (PDOException $e) {
        $_SESSION['error'] = $sql . "\n" . $e->getMessage();
        header("location: ../../Setup.php");
    }
}

function DelFavoriteTable($table, $conn)
{
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