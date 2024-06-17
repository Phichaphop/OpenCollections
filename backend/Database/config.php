<?php
require_once "Connect.php";
require_once "DBM.php";
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

if (isset($_GET['CreDB'])) {
    CreDB($dbname, $servername, $username, $password);
}
if (isset($_GET['CreUserRoleTable'])) {
    CreUserRoleTable($dbname, $conn);
}
if (isset($_GET['CreUserTable'])) {
    CreUserTable($dbname, $conn);
}
if (isset($_GET['CreInsTable'])) {
    CreInsTable($dbname, $conn);
}
if (isset($_GET['CreFacultyTable'])) {
    CreFacultyTable($dbname, $conn);
}
if (isset($_GET['CreDeptTable'])) {
    CreDeptTable($dbname, $conn);
}
if (isset($_GET['CreMajorTable'])) {
    CreMajorTable($dbname, $conn);
}
if (isset($_GET['CreProjectTypeTable'])) {
    CreProjectTypeTable($dbname, $conn);
}
if (isset($_GET['CreProjectStatusTable'])) {
    $table = "project_status";
    CreProjectStatusTable($dbname, $table, $conn);
}
if (isset($_GET['CreateProjectTable'])) {
    $table = "project";
    CreateProjectTable($dbname, $table, $conn);
}
if (isset($_GET['CreFavoriteTable'])) {
    $table = "favorite";
    CreFavoriteTable($dbname, $table, $conn);
}
if (isset($_GET['CreRequestStatusTable'])) {
    CreRequestStatusTable($dbname, $conn);
}
if (isset($_GET['CreRequestTable'])) {
    CreRequestTable($dbname, $conn);
}
if (isset($_GET['CreCounterTable'])) {
    CreCounterTable($dbname, $conn);
}
if (isset($_GET['CreManualTable'])) {
    CreManualTable($dbname, $conn);
}

if (isset($_GET['DeleteDB'])) {
    DeleteDB($dbname, $conn);
}
if (isset($_GET['DelUserRoleTable'])) {
    $table = "user_role";
    DeleteTable($table, $conn);
}
if (isset($_GET['DelUserTable'])) {
    $table = "user";
    DeleteTable($table, $conn);
}
if (isset($_GET['DelInsTable'])) {
    $table = "ins";
    DeleteTable($table, $conn);
}
if (isset($_GET['DelFacultyTable'])) {
    $table = "faculty";
    DeleteTable($table, $conn);
}
if (isset($_GET['DelDeptTable'])) {
    $table = "dept";
    DeleteTable($table, $conn);
}
if (isset($_GET['DelMajorTable'])) {
    $table = "major";
    DeleteTable($table, $conn);
}
if (isset($_GET['DelProjectTypeTable'])) {
    $table = "project_type";
    DeleteTable($table, $conn);
}
if (isset($_GET['DelProjectStatusTable'])) {
    $table = "project_status";
    DeleteTable($table, $conn);
}
if (isset($_GET['DelProjectTable'])) {
    $table = "project";
    DeleteTable($table, $conn);
}
if (isset($_GET['DelFavoriteTable'])) {
    $table = "favorite";
    DeleteTable($table, $conn);
}
if (isset($_GET['DelRequestStatusTable'])) {
    $table = "request_status";
    DeleteTable($table, $conn);
}
if (isset($_GET['DelRequestTable'])) {
    $table = "request";
    DeleteTable($table, $conn);
}
if (isset($_GET['DelCounterTable'])) {
    $table = "counter";
    DeleteTable($table, $conn);
}
if (isset($_GET['DelManualTable'])) {
    $table = "manual";
    DeleteTable($table, $conn);
}