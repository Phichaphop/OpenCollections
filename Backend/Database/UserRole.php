<?php
function CreUserRoleTable($dbname, $table, $conn)
{
    try {
        // ใช้ฐานข้อมูล
        $conn->exec("USE $dbname");

        // สร้างตารางหากยังไม่มี
        $sql = "CREATE TABLE IF NOT EXISTS $table (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    role VARCHAR(50) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
        $conn->exec($sql);

        // ตั้งค่าบทบาทผู้ใช้
        SetUserRole($conn, $table, "ผู้ดูแล"); /*Admin*/
        SetUserRole($conn, $table, "ผู้ตรวจสอบ"); /*Editor*/
        SetUserRole($conn, $table, "ที่ปรึกษา"); /*Advisor*/
        SetUserRole($conn, $table, "ผู้ใช้"); /*User*/

        $_SESSION['success'] = "Setup success!";
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    } finally {
        header("location: ../../Setup.php");
    }
}

function SetUserRole($conn, $table, $role)
{
    try {
        // ใช้ dynamic SQL statement สำหรับชื่อ table
        $stmt = $conn->prepare("INSERT INTO $table (role) VALUES (:role)");
        $stmt->bindParam(":role", $role);
        $stmt->execute();
    } catch (PDOException $e) {
        // ใช้ warning ในกรณีเกิดข้อผิดพลาดขณะเพิ่มบทบาท
        $_SESSION['warning'] = $e->getMessage();
    }
}
?>
