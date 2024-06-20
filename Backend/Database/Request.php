<?php
function CreRequestTable($dbname, $table, $conn)
{
    try {
        // ใช้ฐานข้อมูลที่กำหนด
        $conn->exec("USE $dbname");

        // สร้างตารางหากยังไม่มี
        $sql = "CREATE TABLE IF NOT EXISTS $table (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    title VARCHAR(100) NOT NULL,
                    detail LONGTEXT NOT NULL,
                    user INT(11) UNSIGNED NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
        $conn->exec($sql);

        // แสดงข้อความสำเร็จ
        $_SESSION['success'] = "Create request table success!";
    } catch (PDOException $e) {
        // แสดงข้อความ error
        $_SESSION['error'] = "Error creating table: " . $e->getMessage();
    } finally {
        // เปลี่ยนที่อยู่ไปยังหน้า Setup.php
        header("location: ../../Setup.php");
        exit(); // Ensure script terminates after redirection
    }
}
?>
