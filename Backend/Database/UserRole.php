<?php

function CreUserRoleTable($dbname, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE user_role (
                        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        role VARCHAR(50) NOT NULL,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                    )";
        $conn->exec($sql);

        SetUserRole($conn, "ผู้ดูแล"); /*Admin*/
        SetUserRole($conn, "ผู้ตรวจสอบ"); /*Editor*/
        SetUserRole($conn, "ที่ปรึกษา"); /*Advisor*/
        SetUserRole($conn, "ผู้ใช้"); /*User*/

        $_SESSION['success'] = "Create table success!.";
        header("location: ../../Setup.php");
    } catch (PDOException $e) {
        $_SESSION['error'] = $sql . "\n" . $e->getMessage();
        header("location: ../../Setup.php");
    }
}

function SetUserRole($conn, $role)
{
    try {
        $stmt = $conn->prepare("INSERT INTO user_role (role)
                                            VALUES(:role)");
        $stmt->bindParam(":role", $role);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("location: ../../Setup.php");
    }
}

function DelUserRoleTable($table, $conn)
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