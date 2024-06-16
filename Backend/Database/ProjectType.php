<?php
function CreProjectTypeTable($dbname, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE project_type (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    type VARCHAR(50) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
        $conn->exec($sql);
        SetupProjectType($conn, "โครงงาน"); /*Project*/
        SetupProjectType($conn, "สหกิจศึกษา"); /*Cooperative Education*/
        SetupProjectType($conn, "วิทยานิพนธ์"); /*Thesis*/
        SetupProjectType($conn, "การดำเนินการประชุม"); /*Conference Proceedings*/
        SetupProjectType($conn, "รายงานการวิจัย (ทุนสนับสนุนการวิจัยภายใน)"); /*Research Report (Internal Research Funding)*/
        SetupProjectType($conn, "รายงานการวิจัย (ทุนสนับสนุนการวิจัยภายนอก)"); /*Research Report (External Research Funding)*/
        SetupProjectType($conn, "ภาคนิพนธ์"); /*Term Paper*/
        SetupProjectType($conn, "บทความวิชาการ"); /*Academic Article*/
        SetupProjectType($conn, "การศึกษาอิสระ"); /*Independent Study*/
        SetupProjectType($conn, "ทุนวิจัยภายใน"); /*Internal Research Funding*/
        $_SESSION['success'] = "Setup success!.";
        header("location: ../../Setup.php");
    } catch (PDOException $e) {
        $_SESSION['error'] = $sql . "\n" . $e->getMessage();
        header("location: ../../Setup.php");
    }
}

function SetupProjectType($conn, $type)
{
    try {
        $stmt = $conn->prepare("INSERT INTO project_type (type)
                                            VALUES(:type)");
        $stmt->bindParam(":type", $type);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("location: ../../Setup.php");
    }
}

function DelProjectTypeTable($table, $conn)
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