<?php
function CreProjectStatusTable($dbname, $table, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE $table (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    status VARCHAR(50) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
        $conn->exec($sql);
        SetupStatus($conn, $table, "ร่าง"); /*Draft*/
        SetupStatus($conn, $table, "กำลังตรวจสอบ"); /*Wait Verification*/
        SetupStatus($conn, $table, "รออนุมัติ"); /*Wait Approve*/
        SetupStatus($conn, $table, "อนุมัติ"); /*Approve*/
        SetupStatus($conn, $table, "ไม่ผ่านการอนุมัติ"); /*Not Approve*/
        $_SESSION['success'] = "Setup status success!.";
        header("location: ../../Setup.php");
    } catch (PDOException $e) {
        $_SESSION['error'] = $sql . "\n" . $e->getMessage();
        header("location: ../../Setup.php");
    }
}

function SetupStatus($conn, $table, $status)
{
    try {
        $stmt = $conn->prepare("INSERT INTO $table (status)
                                            VALUES(:status)");
        $stmt->bindParam(":status", $status);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("location: ../../Setup.php");
    }
}

function DelProjectStatusTable($table, $conn)
{
    try {
        $sql = "DROP TABLE $table";
        $conn->exec($sql);
        $_SESSION['success'] = "Delete table success!.";
        header("location: ../../Setup.php");
    } catch (PDOException $e) {
        $_SESSION['error'] = $sql . "\n" . $e->getMessage();
        header("location: ../../Setup.php");
    }
}
?>