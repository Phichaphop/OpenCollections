<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "opc";

/*
$servername = "localhost";
$username = "id20961732_opencollections";
$password = "486795132#Op";
$dbname = "id20961732_opc";
*/

$conn = DBConnect($servername, $username, $password, $dbname);
if ($conn != "error") {
    $check_user_role = CheckTable("user_role", $conn);
    $check_user = CheckTable("user", $conn);
    $check_ins = CheckTable("ins", $conn);
    $check_faculty = CheckTable("faculty", $conn);
    $check_dept = CheckTable("dept", $conn);
    $check_major = CheckTable("major", $conn);
    $check_project_type = CheckTable("project_type", $conn);
    $check_project_status = CheckTable("project_status", $conn);
    $check_project = CheckTable("project", $conn);
    $check_favorite = CheckTable("favorite", $conn);
    $check_request_status = CheckTable("request_status", $conn);
    $check_request = CheckTable("request", $conn);
    $check_counter = CheckTable("counter", $conn);
    $check_manual = CheckTable("manual", $conn);
}

function DBConnect($servername, $username, $password, $dbname)
{
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        return "error";
    }
}
function CheckTable($table, $conn) {
    try {
        $stmt = $conn->prepare("SHOW TABLES LIKE :table");
        $stmt->bindParam(':table', $table, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else {
            return "error";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        return "error";
    }
}


require_once "DB.php";

require_once "UserRole.php";
require_once "User.php";

require_once "Ins.php";
require_once "Faculty.php";
require_once "Dept.php";
require_once "Major.php";

require_once "ProjectType.php";
require_once "ProjectStatus.php";
require_once "Project.php";

require_once "Favorite.php";
require_once "RequestStatus.php";
require_once "Request.php";

require_once "Approve.php";
require_once "Counter.php";

require_once "Manual.php";
?>