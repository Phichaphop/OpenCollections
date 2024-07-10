<?php
function CreDeptTable($dbname, $table, $ref_faculty, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE IF NOT EXISTS $table (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                dept VARCHAR(50) NOT NULL,
                faculty INT(11) UNSIGNED NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (faculty) REFERENCES $ref_faculty(id)
            )";
        $conn->exec($sql);

        // เพิ่มการสร้างแถวต่างๆในตาราง
        SetupDept($conn, $table, "คอมพิวเตอร์ธุรกิจและเทคโนโลยีธุรกิจดิจิทัล", 1);
        SetupDept($conn, $table, "การบัญชี", 1);
        SetupDept($conn, $table, "การตลาด", 1);
        SetupDept($conn, $table, "ไฟฟ้ากำลัง", 2);
        SetupDept($conn, $table, "แฟชั่นและสิ่งทอ", 3);

        $_SESSION['success'] = "Setup success!.";
    } catch (PDOException $e) {
        $_SESSION['error'] = $sql . "\n" . $e->getMessage();
    } finally {
        // แนะนำให้ใช้หน้าจอเพื่อแสดงข้อความ
        header("location: ../../Setup.php");
        exit();
    }
}

function SetupDept($conn, $table, $dept, $faculty)
{
    try {
        $sql = "INSERT INTO $table (dept, faculty) VALUES (:dept, :faculty)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":dept", $dept, PDO::PARAM_STR);
        $stmt->bindParam(":faculty", $faculty, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['warning'] = $e->getMessage();
    }
}
?>
