<?php
function CreFacultyTable($dbname, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE faculty (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    faculty VARCHAR(50) NOT NULL,
                    ins INT(11) UNSIGNED NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (ins) REFERENCES ins(id)
                )";
        $conn->exec($sql);
        SetupFaculty($conn, "พาณิชยกรรม", "8");
        SetupFaculty($conn, "อุสหกรรม", "8");
        SetupFaculty($conn, "คหกรรม", "8");
        $_SESSION['success'] = "Setup success!.";
        header("location: ../../Setup.php");
    } catch (PDOException $e) {
        $_SESSION['error'] = $sql . "\n" . $e->getMessage();
        header("location: ../../Setup.php");
    }
}

function SetupFaculty($conn, $faculty, $ins)
{
    try {
        $stmt = $conn->prepare("INSERT INTO faculty (faculty, ins)
                                            VALUES(:faculty, :ins)");
        $stmt->bindParam(":faculty", $faculty);
        $stmt->bindParam(":ins", $ins);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("location: ../../Setup.php");
    }
}

function DelFacultyTable($table, $conn)
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