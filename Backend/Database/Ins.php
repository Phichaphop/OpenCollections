<?php
function CreInsTable($dbname, $table, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE IF NOT EXISTS $table (
                    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    ins VARCHAR(100) NOT NULL,
                    pic LONGTEXT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
        $conn->exec($sql);

        SetupIns($conn, $table, "สถาบันการศึกษาอาชีวศึกษา : ภาคตะวันออกเฉียงเหนือ 4");
        SetupIns($conn, $table, "วิทยาลัยเทคนิคอุบลราชธานี");
        SetupIns($conn, $table, "วิทยาลัยอาชีวศึกษาอุบลราชธานี");
        SetupIns($conn, $table, "วิทยาลัยเทคนิคเดชอุดม");
        SetupIns($conn, $table, "วิทยาลัยเทคนิคอำนาจเจริญ");
        SetupIns($conn, $table, "วิทยาลัยเทคนิคยโสธร");
        SetupIns($conn, $table, "วิทยาลัยเทคนิคศรีสะเกษ");
        SetupIns($conn, $table, "วิทยาลัยอาชีวศึกษาศรีสะเกษ");

        $_SESSION['success'] = "Setup success!.";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error creating institution table: " . $e->getMessage();
    } finally {
        header("location: ../../Setup.php");
        exit(); // Ensure script terminates after redirection
    }
}

function SetupIns($conn, $table, $ins)
{
    try {
        $stmt = $conn->prepare("INSERT INTO $table (ins) VALUES (:ins)");
        $stmt->bindValue(":ins", $ins, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['warning'] = "Warning: " . $e->getMessage();
    }
}
?>
