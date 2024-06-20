<?php
function CreRequestStatusTable($dbname, $table, $conn)
{
    try {
        // ใช้ฐานข้อมูลที่กำหนด
        $conn->exec("USE $dbname");

        // สร้างตารางหากยังไม่มี
        $sql = "CREATE TABLE IF NOT EXISTS $table (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    status VARCHAR(50) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
        $conn->exec($sql);

        // เพิ่มข้อมูลเริ่มต้นในตาราง
        SetupRStatus($conn, $table, "ร่าง"); // Draft
        SetupRStatus($conn, $table, "รอตรวจสอบ"); // Wait
        SetupRStatus($conn, $table, "กำลังตรวจสอบ"); // Inprocess
        SetupRStatus($conn, $table, "ต้องแก้ไข"); // Fixed
        SetupRStatus($conn, $table, "ไม่ผ่าน"); // Cancel
        
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

function SetupRStatus($conn, $table, $status)
{
    try {
        $stmt = $conn->prepare("INSERT INTO $table (status) VALUES (:status)");
        $stmt->bindParam(":status", $status);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['warning'] = "Error inserting status: " . $e->getMessage();
    }
}
?>
