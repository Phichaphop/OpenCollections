<?php
function CreFavoriteTable($dbname, $table, $ref_project, $ref_user, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE IF NOT EXISTS $table (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    project INT(11) UNSIGNED NOT NULL,
                    user INT(11) UNSIGNED NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (project) REFERENCES $ref_project(id),
                    FOREIGN KEY (user) REFERENCES $ref_user(id)
                )";
        $conn->exec($sql);
        $_SESSION['success'] = "Setup favorite success!.";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error creating favorite table: " . $e->getMessage();
    } finally {
        // Redirect to setup page (assuming this is the intended behavior)
        header("location: ../../Setup.php");
        exit(); // Ensure script terminates after redirection
    }
}
?>
