<?php
    if (isset($_GET['CreInsTable'])) {
        CreInsTable($dbname, $conn);
    }

    function CreInsTable($dbname, $conn) {
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
            SetupIns($conn, "Vocational Education Institute, Section 4");
            SetupIns($conn, "Ubon Ratchathani Technical College");
            SetupIns($conn, "Ubon Ratchathani Vocational College");
            SetupIns($conn, "Det Udom Technical College");
            SetupIns($conn, "Amnat Charoen Technical College)");
            SetupIns($conn, "Yasothon Technical College)");
            SetupIns($conn, "Sisaket Technical College");
            SetupIns($conn, "Sisaket Vocational College");
            $_SESSION['success'] = "Setup success!.";
            header("location: ../../DBM.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../DBM.php");
        }
    }

    function SetupIns($conn, $ins) {
        try {
            $stmt = $conn->prepare("INSERT INTO ins (ins)
                                            VALUES(:ins)");
            $stmt->bindParam(":ins", $ins);
            $stmt->execute();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            header("location: ../../DBM.php");
        }
    }

    if (isset($_GET['DelInsTable'])) {
        $table = "ins";
        DelInsTable($table, $conn);
    }

    function DelInsTable($table, $conn) {
        try {
            $sql = "DROP TABLE $table";
            $conn->exec($sql);
            $_SESSION['success'] = "Delete table success!.";
            header("location: ../../DBM.php");
        } catch (PDOException $e) {
            $_SESSION['error'] = $sql . "\n" . $e->getMessage();
            header("location: ../../DBM.php");
        }
    }
?>