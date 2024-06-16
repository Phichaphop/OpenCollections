<?php
function CreMajorTable($dbname, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE major (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                major VARCHAR(50) NOT NULL,
                degree VARCHAR(50) NOT NULL,
                dept INT(11) UNSIGNED NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (dept) REFERENCES dept(id)
            )";
        $conn->exec($sql);
        SetupMajor($conn, "เทคโนโลยีธุรกิจดิจิทัล", "ประกาศนียบัตรวิชาชีพการขั้นสูง", 1);
        SetupMajor($conn, "เทคโนโลยีธุรกิจดิจิทัล", "เทคโนโลยีบัณฑิต", 1);
        SetupMajor($conn, "การบัญชี", "ประกาศนียบัตรวิชาชีพการขั้นสูง", 2);
        $_SESSION['success'] = "Setup success!.";
        /*header("location: ../../Setup.php");*/
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] =  $sql . "\n" . $e->getMessage();
        /*header("location: ../../Setup.php");*/
        exit();
    }
}

function SetupMajor($conn, $major, $degree, $dept)
{
    try {
        $stmt = $conn->prepare("INSERT INTO major (major, degree, dept) VALUES (:major, :degree, :dept)");
        $stmt->bindParam(":major", $major);
        $stmt->bindParam(":degree", $degree);
        $stmt->bindParam(":dept", $dept, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        /*header("location: ../../Setup.php");*/
        exit();
    }
}

function DelMajorTable($table, $conn)
{
    try {
        $sql = "DROP TABLE $table";
        $conn->exec($sql);
        $_SESSION['success'] = "Delete table success!.";
        header("location: ../../Setup.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = $sql . "\n" . $e->getMessage();
        header("location: ../../Setup.php");
        exit();
    }
}
?>