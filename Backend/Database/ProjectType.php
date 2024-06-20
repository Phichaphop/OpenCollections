<?php
function CreProjectTypeTable($dbname, $table, $conn)
{
    try {
        // ใช้ฐานข้อมูลที่กำหนด
        $conn->exec("USE $dbname");

        // สร้างตารางหากยังไม่มี
        $sql = "CREATE TABLE IF NOT EXISTS $table (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    type VARCHAR(50) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
        $conn->exec($sql);

        // เพิ่มประเภทของโครงการเริ่มต้นให้กับตาราง
        $projectTypes = [
            "โครงงาน", // Project
            "สหกิจศึกษา", // Cooperative Education
            "วิทยานิพนธ์", // Thesis
            "การดำเนินการประชุม", // Conference Proceedings
            "รายงานการวิจัย (ทุนสนับสนุนการวิจัยภายใน)", // Research Report (Internal Research Funding)
            "รายงานการวิจัย (ทุนสนับสนุนการวิจัยภายนอก)", // Research Report (External Research Funding)
            "ภาคนิพนธ์", // Term Paper
            "บทความวิชาการ", // Academic Article
            "การศึกษาอิสระ", // Independent Study
            "ทุนวิจัยภายใน" // Internal Research Funding
        ];

        foreach ($projectTypes as $type) {
            SetupProjectType($conn, $table, $type);
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

function SetupProjectType($conn, $table, $type)
{
    try {
        $stmt = $conn->prepare("INSERT INTO $table (type) VALUES (:type)");
        $stmt->bindParam(":type", $type);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['warning'] = $e->getMessage();
    }
}
?>
