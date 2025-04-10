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
        SetupDept($conn, $table, "โลจิสติก", 1);
        SetupDept($conn, $table, "สามัญสัมพันธ์", 4);
        SetupDept($conn, $table, "อาหารและโภชนาการ", 3);
        SetupDept($conn, $table, "การโรงเเรมเเละการท่องเที่ยว", 3);
        SetupDept($conn, $table, "เทคโนโลยีคอมพิวเตอร์", 5);
        SetupDept($conn, $table, "เทคโนโลยีสารสนเทศ", 5);
        SetupDept($conn, $table, "ช่างเชื่อมโลหะ", 2);
        SetupDept($conn, $table, "ช่างโยธา", 2);
        SetupDept($conn, $table, "ช่างยนต์", 2);
        SetupDept($conn, $table, "ช่างกลโรงงาน", 2);
        SetupDept($conn, $table, "ช่างก่อสร้าง", 2);
        SetupDept($conn, $table, "ช่างอิเล็กทรอนิกส์", 2);
        SetupDept($conn, $table, "เทคนิคการผลิต", 2);
        SetupDept($conn, $table, "สถาปัตยกรรม", 2);

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
