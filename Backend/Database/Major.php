<?php
function CreMajorTable($dbname, $table, $ref_dept, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE IF NOT EXISTS $table (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                major VARCHAR(50) NOT NULL,
                degree VARCHAR(50) NOT NULL,
                dept INT(11) UNSIGNED NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (dept) REFERENCES $ref_dept(id)
            )";
        $conn->exec($sql);

        SetupMajor($conn, $table, "เทคโนโลยีธุรกิจดิจิทัล", "ประกาศนียบัตรวิชาชีพการขั้นสูง", 1);
        SetupMajor($conn, $table, "เทคโนโลยีธุรกิจดิจิทัล", "เทคโนโลยีบัณฑิต", 1);
        SetupMajor($conn, $table, "การบัญชี", "ประกาศนียบัตรวิชาชีพการขั้นสูง", 2);

        $_SESSION['success'] = "Setup success!.";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error creating major table: " . $e->getMessage();
    } finally {
        header("location: ../../Setup.php");
        exit(); // Ensure script terminates after redirection
    }
}

function SetupMajor($conn, $table, $major, $degree, $dept)
{
    try {
        $stmt = $conn->prepare("INSERT INTO $table (major, degree, dept) VALUES (:major, :degree, :dept)");
        $stmt->bindValue(":major", $major, PDO::PARAM_STR);
        $stmt->bindValue(":degree", $degree, PDO::PARAM_STR);
        $stmt->bindValue(":dept", $dept, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['warning'] = "Warning: " . $e->getMessage();
    }
}
