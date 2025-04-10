<?php
function CreMajorTable($dbname, $table, $ref_dept, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE IF NOT EXISTS $table (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                major VARCHAR(50) NOT NULL,
                degree VARCHAR(50) NOT NULL,
                dept INT(11) UNSIGNED NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (dept) REFERENCES $ref_dept(id)
            )";
        $conn->exec($sql);

        SetupMajor($conn, $table, "คอมพิวเตอร์ธุรกิจ", "ประกาศนียบัตรวิชาชีพ (ปวช.)", 1);
        SetupMajor($conn, $table, "เทคโนโลยีธุรกิจดิจิทัล", "ประกาศนียบัตรวิชาชีพการขั้นสูง (ปวส.)", 1);
        SetupMajor($conn, $table, "เทคโนโลยีธุรกิจดิจิทัล", "เทคโนโลยีบัณฑิต", 1);
        
        SetupMajor($conn, $table, "โลจิสติก", "ประกาศนียบัตรวิชาชีพการขั้นสูง (ปวส.)", 6);
        SetupMajor($conn, $table, "โลจิสติก", "ประกาศนียบัตรวิชาชีพการ (ปวช.)", 6);

        SetupMajor($conn, $table, "การขายและการตลาด", "ประกาศนียบัตรวิชาชีพการขั้นสูง (ปวส.)", 3);
        SetupMajor($conn, $table, "การขายและการตลาด", "ประกาศนียบัตรวิชาชีพการ (ปวช.)", 3);

        SetupMajor($conn, $table, "อาหารและโภชนาการ", "ประกาศนียบัตรวิชาชีพการขั้นสูง (ปวส.)", 8);
        SetupMajor($conn, $table, "อาหารและโภชนาการ", "ประกาศนียบัตรวิชาชีพการ (ปวช.)", 8);

        SetupMajor($conn, $table, "การโรงเเรมเเละการท่องเที่ยว", "ประกาศนียบัตรวิชาชีพการขั้นสูง (ปวส.)", 9);
        SetupMajor($conn, $table, "การโรงเเรมเเละการท่องเที่ยว", "ประกาศนียบัตรวิชาชีพการ (ปวช.)", 9);
        
        SetupMajor($conn, $table, "การบัญชี", "ประกาศนียบัตรวิชาชีพขั้นสูง (ปวส.)", 2);
        SetupMajor($conn, $table, "การบัญชี", "ประกาศนียบัตรวิชาชีพการขั้นสูง (ปวส.)", 2);

        SetupMajor($conn, $table, "เทคโนโลยีคอมพิวเตอร์", "ประกาศนียบัตรวิชาชีพขั้นสูง (ปวส.)", 10);
        SetupMajor($conn, $table, "เทคโนโลยีคอมพิวเตอร์", "ประกาศนียบัตรวิชาชีพการขั้นสูง (ปวส.)", 10);

        SetupMajor($conn, $table, "เทคโนโลยีสารสนเทศ", "ประกาศนียบัตรวิชาชีพขั้นสูง (ปวส.)", 11);
        SetupMajor($conn, $table, "เทคโนโลยีสารสนเทศ", "ประกาศนียบัตรวิชาชีพการขั้นสูง (ปวส.)", 11);

        SetupMajor($conn, $table, "ช่างเชื่อมโลหะ", "ประกาศนียบัตรวิชาชีพขั้นสูง (ปวส.)", 12);
        SetupMajor($conn, $table, "ช่างเชื่อมโลหะ", "ประกาศนียบัตรวิชาชีพการขั้นสูง (ปวส.)", 12);

        SetupMajor($conn, $table, "ช่างโยธา", "ประกาศนียบัตรวิชาชีพขั้นสูง (ปวส.)", 13);
        SetupMajor($conn, $table, "ช่างโยธา", "ประกาศนียบัตรวิชาชีพการขั้นสูง (ปวส.)", 13);

        SetupMajor($conn, $table, "ช่างยนต์", "ประกาศนียบัตรวิชาชีพขั้นสูง (ปวส.)", 14);
        SetupMajor($conn, $table, "ช่างยนต์", "ประกาศนียบัตรวิชาชีพการขั้นสูง (ปวส.)", 14);

        SetupMajor($conn, $table, "ช่างกลโรงงาน", "ประกาศนียบัตรวิชาชีพขั้นสูง (ปวส.)", 15);
        SetupMajor($conn, $table, "ช่างกลโรงงาน", "ประกาศนียบัตรวิชาชีพการขั้นสูง (ปวส.)", 15);

        SetupMajor($conn, $table, "ช่างก่อสร้าง", "ประกาศนียบัตรวิชาชีพขั้นสูง (ปวส.)", 16);
        SetupMajor($conn, $table, "ช่างก่อสร้าง", "ประกาศนียบัตรวิชาชีพการขั้นสูง (ปวส.)", 16);

        SetupMajor($conn, $table, "ช่างอิเล็กทรอนิกส์", "ประกาศนียบัตรวิชาชีพขั้นสูง (ปวส.)", 17);
        SetupMajor($conn, $table, "ช่างอิเล็กทรอนิกส์", "ประกาศนียบัตรวิชาชีพการขั้นสูง (ปวส.)", 17);

        SetupMajor($conn, $table, "เทคนิคการผลิต", "ประกาศนียบัตรวิชาชีพขั้นสูง (ปวส.)", 18);
        SetupMajor($conn, $table, "เทคนิคการผลิต", "ประกาศนียบัตรวิชาชีพการขั้นสูง (ปวส.)", 18);

        SetupMajor($conn, $table, "สถาปัตยกรรม", "ประกาศนียบัตรวิชาชีพขั้นสูง (ปวส.)", 19);
        SetupMajor($conn, $table, "สถาปัตยกรรม", "ประกาศนียบัตรวิชาชีพการขั้นสูง (ปวส.)", 19);


        $_SESSION['success'] = "Setup success!.";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error creating major table: " . $e->getMessage();
    } finally {
        header("location: ../../Setup.php");
        exit(); // Ensure script terminates after redirection
    }
}

function SetupMajor($conn, $table, $major, $degree, $dept)
{
    try {
        $stmt = $conn->prepare("INSERT INTO $table (major, degree, dept) VALUES (:major, :degree, :dept)");
        $stmt->bindValue(":major", $major, PDO::PARAM_STR);
        $stmt->bindValue(":degree", $degree, PDO::PARAM_STR);
        $stmt->bindValue(":dept", $dept, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['warning'] = "Warning: " . $e->getMessage();
    }
}
