<?php
function CreateProjectTable($dbname, $table, $ref_project_type, $ref_major, $ref_project_status, $conn)
{
    try {
        // ใช้ฐานข้อมูลที่กำหนด
        $conn->exec("USE $dbname");

        // สร้างตารางหากยังไม่มี
        $sql = "CREATE TABLE IF NOT EXISTS $table (
                        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        title VARCHAR(100) NOT NULL,
                        author INT(11) UNSIGNED NOT NULL,
                        advisor INT(11) UNSIGNED NOT NULL,
                        type INT(11) UNSIGNED NOT NULL,
                        major INT(11) UNSIGNED NOT NULL,
                        abstract LONGTEXT NULL,
                        date DATE,
                        file LONGTEXT NULL,
                        pic LONGTEXT NULL,
                        approver INT(11) UNSIGNED NOT NULL,
                        status INT(11) UNSIGNED NULL,
                        note VARCHAR(100) NULL,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                        FOREIGN KEY (type) REFERENCES $ref_project_type(id),
                        FOREIGN KEY (major) REFERENCES $ref_major(id),
                        FOREIGN KEY (status) REFERENCES $ref_project_status(id)
                )";
        $conn->exec($sql);

        // แสดงข้อความสำเร็จ
        $_SESSION['success'] = "Setup success!";
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
