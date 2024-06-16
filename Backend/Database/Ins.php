<?php
function CreInsTable($dbname, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE ins (
                        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        ins VARCHAR(100) NOT NULL,
                        pic LONGTEXT NULL,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                    )";
        $conn->exec($sql);
        SetupIns($conn, "สถาบันการศึกษาอาชีวศึกษา : ภาคตะวันออกเฉียงเหนือ 4"); /*Institute of Vocational education : Northeastern Region 4*/
        SetupIns($conn, "วิทยาลัยเทคนิคอุบลราชธานี"); /*Ubon Ratchathani Technical College*/
        SetupIns($conn, "วิทยาลัยอาชีวศึกษาอุบลราชธานี"); /*Ubon Ratchathani Vocational College*/
        SetupIns($conn, "วิทยาลัยเทคนิคเดชอุดม"); /*Det Udom Technical College*/
        SetupIns($conn, "วิทยาลัยเทคนิคอำนาจเจริญ"); /*Amnat Charoen Technical College*/
        SetupIns($conn, "วิทยาลัยเทคนิคยโสธร"); /*Yasothon Technical College*/
        SetupIns($conn, "วิทยาลัยเทคนิคศรีสะเกษ"); /*Sisaket Technical College*/
        SetupIns($conn, "วิทยาลัยอาชีวศึกษาศรีสะเกษ"); /*Sisaket Vocational College*/
        $_SESSION['success'] = "Setup success!.";
        header("location: ../../Setup.php");
    } catch (PDOException $e) {
        $_SESSION['error'] = $sql . "\n" . $e->getMessage();
        header("location: ../../Setup.php");
    }
}

function SetupIns($conn, $ins)
{
    try {
        $stmt = $conn->prepare("INSERT INTO ins (ins)
                                            VALUES(:ins)");
        $stmt->bindParam(":ins", $ins);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("location: ../../Setup.php");
    }
}

function DelInsTable($table, $conn)
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