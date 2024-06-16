<?php
function CreDeptTable($dbname, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE dept (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                dept VARCHAR(50) NOT NULL,
                faculty INT(11) UNSIGNED NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (faculty) REFERENCES faculty(id)
            )";
        $conn->exec($sql);
        SetupDept($conn, "ตอมพิวเตอร์ธุรกิจและเทคโนโลยีธุรกิจดิจิทัล", "1");
        SetupDept($conn, "การบัญชี", "1");
        SetupDept($conn, "การตลาด", "1");
        SetupDept($conn, "ไฟฟ้ากำลัง", "2");
        SetupDept($conn, "แฟชั่นและสิ่งทอ", "3");
        $_SESSION['success'] = "Setup success!.";
        header("location: ../../Setup.php");
    } catch (PDOException $e) {
        $_SESSION['error'] = $sql . "\n" . $e->getMessage();
        header("location: ../../Setup.php");
    }
}

function SetupDept($conn, $dept, $faculty)
{
    try {
        $stmt = $conn->prepare("INSERT INTO dept (dept, faculty)
                                            VALUES(:dept, :faculty)");
        $stmt->bindParam(":dept", $dept);
        $stmt->bindParam(":faculty", $faculty);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("location: ../../Setup.php");
    }
}

function DelDeptTable($table, $conn)
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