<?php
function CreUserTable($dbname, $table, $ref_user_role, $conn)
{
    try {
        $conn->exec("USE $dbname");
        $sql = "CREATE TABLE IF NOT EXISTS $table (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100) NOT NULL,
            password LONGTEXT NOT NULL,
            email VARCHAR(50) NOT NULL,
            tel VARCHAR(10) NOT NULL,
            pic LONGTEXT NULL,
            role INT(11) UNSIGNED NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (role) REFERENCES $ref_user_role(id)
                    )";
        $conn->exec($sql);

        // Set users
        SetUser("OpenCollections", "123456789Op", "opencollections.co@gmail.com", "0123456789", "1", $table, $conn);
        SetUser("IVENE4", "123456789Op", "IVENE4@gmail.com", "0123456789", "2", $table, $conn);
        SetUser("URTC", "123456789Op", "URTC@gmail.com", "0123456789", "2", $table, $conn);
        SetUser("URVC", "123456789Op", "URVC@gmail.com", "0123456789", "2", $table, $conn);
        SetUser("DUTC", "123456789Op", "DUTC@gmail.com", "0123456789", "2", $table, $conn);
        SetUser("ACTC", "123456789Op", "ACTC@gmail.com", "0123456789", "2", $table, $conn);
        SetUser("YTC", "123456789Op", "YTC@gmail.com", "0123456789", "2", $table, $conn);
        SetUser("SSKTC", "123456789Op", "SSKTC@gmail.com", "0123456789", "2", $table, $conn);
        SetUser("SVC", "123456789Op", "SVC@gmail.com", "0123456789", "2", $table, $conn);

        SetUser("นางกาญจนา ถามุลเลศ", "123456789Op", "kanjana.t@gmail.com", "0123456789", "3", $table, $conn);
        SetUser("นายพัชณพงศกรณ์ สุดประเสริฐ", "123456789Op", "patchanaphongskorn.s@gmail.com", "0123456789", "3", $table, $conn);
        SetUser("นางสาววิไล ไชยหงษ์", "123456789Op", "wilai.c@gmail.com", "0123456789", "3", $table, $conn);
        SetUser("นายคำพา ขันตี", "123456789Op", "kumpa.k@gmail.com", "0123456789", "3", $table, $conn);
        SetUser("นางพีรรัชฎากรณ์ สุดประเสริฐ", "123456789Op", "peerarachdagorn.s@gmail.com", "0123456789", "3", $table, $conn);
        SetUser("นางวราดา ขันตี", "123456789Op", "warada.k@gmail.com", "0123456789", "3", $table, $conn);
        SetUser("นางสาววิภาวี ณ นิมิตร", "123456789Op", "Wiphawee.n@gmail.com", "0123456789", "3", $table, $conn);
        SetUser("นางสาวปัทมพร สุฤทธิ์", "123456789Op", "pattama.s@gmail.com", "0123456789", "3", $table, $conn);
        SetUser("นายพรธิวา วงษ์พิทักษ์", "123456789Op", "porntiwa.v@gmail.com", "0123456789", "3", $table, $conn);
        SetUser("นางสาวนลินี เดชวัน", "123456789Op", "nalinee.w@gmail.com", "0123456789", "3", $table, $conn);
        SetUser("นางสาวบุณณดา คำเสียง", "123456789Op", "boonnada2010@hotmail.com", "0123456789", "3", $table, $conn);
        SetUser("นางสาวกณิกนันต์ ไกรวิเศษ", "123456789Op", "kanikkanan.k@gmail.com", "0123456789", "3", $table, $conn);

        SetUser("นางสาวกนกกานต์ เพิ่มฉลาด", "123456789Op", "klanokkan.p@gmail.com", "0123456789", "4", $table, $conn);
        SetUser("นางสาวกรพินธุ์ เพ็งแจ์ม", "123456789Op", "korpin.p@gmail.com", "0123456789", "4", $table, $conn);
        SetUser("นายกฤษณะ โพศรี", "123456789Op", "kitsana.p@gmail.com", "0123456789", "4", $table, $conn);
        SetUser("นายเจษฎา สุขใจ", "123456789Op", "chetsada.s@gmail.com", "0123456789", "4", $table, $conn);
        SetUser("นางสาวธิดารัตน์ รัตนะวัน", "123456789Op", "Tthidarat.r@gmail.com", "0123456789", "4", $table, $conn);
        SetUser("นายพิชาภพ บุญฑล", "123456789Op", "phichaphop.b@gmail.com", "0123456789", "4", $table, $conn);
        SetUser("นางสาวมัลลิกา เงาศรี", "123456789Op", "mallika.n@gmail.com", "0123456789", "4", $table, $conn);
        SetUser("นางสาวรุ่งทิวา บุตรชาติ", "123456789Op", "rungthiwa.b@gmail.com", "0123456789", "4", $table, $conn);
        SetUser("นางสาววนัสนันท์ สังวาลย์", "123456789Op", "wanatsanan.s@gmail.com", "0123456789", "4", $table, $conn);
        SetUser("นางสาวสุกัญญา บรรเทิงใจ", "123456789Op", "sukanya.b@gmail.com", "0123456789", "4", $table, $conn);
        SetUser("นายอภิเชษฐ์ บุญมา", "123456789Op", "apichet.b@gmail.com", "0123456789", "4", $table, $conn);
        SetUser("นายอภิรักษ์ ดรุณ", "123456789Op", "aphirak.d@gmail.com", "0123456789", "4", $table, $conn);
        SetUser("นางสาวอรชร พิมพ์ศร", "123456789Op", "orachon.p@gmail.com", "0123456789", "4", $table, $conn);


        
        $_SESSION['success'] = "Setup success!";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error creating table: " . $e->getMessage();
    } finally {
        header("location: ../../Setup.php");
        exit(); // Ensure script terminates after redirection
    }
}

function SetUser($user, $pass, $email, $tel, $role, $table, $conn)
{
    try {
        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO $table (username, password, email, tel, role)
                VALUES(:username, :password, :email, :tel, :role)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":username", $user, PDO::PARAM_STR);
        $stmt->bindParam(":password", $passHash, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":tel", $tel, PDO::PARAM_STR);
        $stmt->bindParam(":role", $role, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error inserting user: " . $e->getMessage();
    }
}
?>
