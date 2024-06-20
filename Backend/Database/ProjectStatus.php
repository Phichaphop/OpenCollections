<?php
function CreProjectStatusTable($dbname, $table, $conn)
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

        // เพิ่มค่าเริ่มต้นให้กับตาราง
        $statuses = [
            "ร่าง", // Draft
            "กำลังตรวจสอบ", // Wait Verification
            "รออนุมัติ", // Wait Approve
            "อนุมัติ", // Approve
            "ไม่ผ่านการอนุมัติ" // Not Approve
        ];

        foreach ($statuses as $status) {
            SetupStatus($conn, $table, $status);
        }

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

function SetupStatus($conn, $table, $status)
{
    try {
        $stmt = $conn->prepare("INSERT INTO $table (status) VALUES (:status)");
        $stmt->bindParam(":status", $status);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['warning'] = $e->getMessage();
    }
}
?>
