<?php
if (isset($_GET['CreateFavoriteTable'])) {
    CreateApproveTable($DatabaseName, $conn);
}

function CreateApproveTable($DatabaseName, $conn)
{
    try {
        $conn->exec("USE $DatabaseName");
        $sql = "CREATE TABLE approve (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    user INT(11) NOT NULL,
                    project INT(11) NOT NULL,
                    approver INT(11) NOT NULL,
                    note VARCHAR(100) NOT NULL,
                    status VARCHAR(50) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                )";
        $conn->exec($sql);
        $_SESSION['success'] = "Setup success!.";
        header("location: ../../Setup.php");
    } catch (PDOException $e) {
        $_SESSION['error'] = $sql . "\n" . $e->getMessage();
        header("location: ../../Setup.php");
    }
}

if (isset($_GET['DelApproveTable'])) {
    $table = "approve";
    DelApproveTable($table, $conn);
}

function DelApproveTable($table, $conn)
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