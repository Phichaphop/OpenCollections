<?php

function CreFacultyTable($dbname, $table, $ref_ins, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE IF NOT EXISTS $table (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    faculty VARCHAR(50) NOT NULL,
                    ins INT(11) UNSIGNED NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (ins) REFERENCES $ref_ins(id)
                )";
        $conn->exec($sql);

        // เพิ่มข้อมูลคณะ
        SetupFaculty($conn, $table, "พาณิชยกรรม", 7);
        SetupFaculty($conn, $table, "อุสหกรรม", 7);
        SetupFaculty($conn, $table, "คหกรรม", 7);
        SetupFaculty($conn, $table, "สามัญสัมพันธ์", 7);
        SetupFaculty($conn, $table, "เทคโนโลยีสารสนเทศและการสื่อสาร", 7);

        $_SESSION['success'] = "Setup success!.";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error creating faculty table: " . $e->getMessage();
    } finally {
        // Redirect to setup page (assuming this is the intended behavior)
        header("location: ../../Setup.php");
        exit(); // Ensure script terminates after redirection
    }
}

function SetupFaculty($conn, $table, $faculty, $ins)
{
    try {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO $table (faculty, ins) VALUES (:faculty, :ins)");

        // Bind parameters and execute
        $stmt->bindParam(":faculty", $faculty, PDO::PARAM_STR);
        $stmt->bindParam(":ins", $ins, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['warning'] = "Warning: " . $e->getMessage();
    }
}

?>
