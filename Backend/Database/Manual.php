<?php
function CreManualTable($dbname, $table, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE IF NOT EXISTS $table (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            file LONGTEXT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $conn->exec($sql);

        SetupManual($conn, $table, "คู่มือการใช้งานเว็บไซต์", "Manual.pdf");
        SetupManual($conn, $table, "แบบ ปน.1 Ivene.4 แบบเสนอขออนุมัติโครงร่างปริญญานิพนธ์ และแบบเสนอชื่อคณะกรรมการสอบปริญญานิพนธ์", "573981856.docx");
        SetupManual($conn, $table, "แบบ ปน.3 Ivene.4 แบบขออนุมัติแต่งตั้งอาจารย์ที่ปรึกษาปริญญานิพนธ์หลักอาจารย์ที่ปรึกษาปริญญานิพนธ์ร่ว", "686622534.docx");
        SetupManual($conn, $table, "แบบเสนอขออนุมัติโครงงาน (ปวช. และ ปวส.)", "1883304258.docx");

        $_SESSION['success'] = "Setup success!.";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
    } finally {
        header("location: ../../Setup.php");
        exit(); // Ensure script terminates after redirection
    }
}

function SetupManual($conn, $table, $title, $file)
{
    try {
        $stmt = $conn->prepare("INSERT INTO $table (title, file) VALUES (:title, :file)");
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":file", $file);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['warning'] = "Warning: " . $e->getMessage();
    }
}
?>
