<?php
function CreRequestStatusTable($dbname, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE request_status (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    status VARCHAR(50) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
        $conn->exec($sql);
        SetupRStatus($conn, "ร่าง"); /*Draft*/
        SetupRStatus($conn, "รอตรวจสอบ"); /*Wait*/
        SetupRStatus($conn, "กำลังตรวจสอบ"); /*Inproces*/
        SetupRStatus($conn, "ต้องแก้ไข"); /*Fixed*/
        SetupRStatus($conn, "ไม่ผ่าน"); /*Cancel*/
        $_SESSION['success'] = "Create table complete!.";
        header("location: ../../Setup.php");
    } catch (PDOException $e) {
        $_SESSION['error'] = $sql . "\n" . $e->getMessage();
        header("location: ../../Setup.php");
    }
}

function SetupRStatus($conn, $status)
{
    try {
        $stmt = $conn->prepare("INSERT INTO request_status (status)
                                            VALUES(:status)");
        $stmt->bindParam(":status", $status);
        $stmt->execute();
        $_SESSION['success'] = "Insert complete!.";
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("location: ../../Setup.php");
    }
}

function DelRequestStatusTable($table, $conn)
{
    try {
        $sql = "DROP TABLE $table";
        $conn->exec($sql);
        $_SESSION['success'] = "Delete table complete!.";
        header("location: ../../Setup.php");
    } catch (PDOException $e) {
        $_SESSION['error'] = $sql . "\n" . $e->getMessage();
        header("location: ../../Setup.php");
    }
}
?>