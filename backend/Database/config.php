<?php
session_start();
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

$table_name_user_role = "opc_user_role";
$table_name_user = "opc_user";
$table_name_ins = "opc_ins";
$table_name_faculty = "opc_faculty";
$table_name_dept = "opc_dept";
$table_name_major = "opc_major";
$table_name_project_type = "opc_project_type";
$table_name_project_status = "opc_project_status";
$table_name_project = "opc_project";
$table_name_favorite = "opc_favorite";
$table_name_request_status = "opc_request_status";
$table_name_request = "opc_request";
$table_name_counter = "opc_counter";
$table_name_manual = "opc_manual";

$conn = DBConnect($servername, $username, $password, $dbname);

if ($conn != false) {
    $check_user_role = CheckTable($table_name_user_role, $conn);
    $check_user = CheckTable($table_name_user, $conn);
    $check_ins = CheckTable($table_name_ins, $conn);
    $check_faculty = CheckTable($table_name_faculty, $conn);
    $check_dept = CheckTable($table_name_dept, $conn);
    $check_major = CheckTable($table_name_major, $conn);
    $check_project_type = CheckTable($table_name_project_type, $conn);
    $check_project_status = CheckTable($table_name_project_status, $conn);
    $check_project = CheckTable($table_name_project, $conn);
    $check_favorite = CheckTable($table_name_favorite, $conn);
    $check_request_status = CheckTable($table_name_request_status, $conn);
    $check_request = CheckTable($table_name_request, $conn);
    $check_counter = CheckTable($table_name_counter, $conn);
    $check_manual = CheckTable($table_name_manual, $conn);
}

if (isset($_GET['CreDB'])) {
    CreDB($dbname, $servername, $username, $password);
}
if (isset($_GET['CreUserRoleTable'])) {
    CreUserRoleTable($dbname, $table_name_user_role, $conn);
}
if (isset($_GET['CreUserTable'])) {
    CreUserTable($dbname, $table_name_user, $table_name_user_role, $conn);
}
if (isset($_GET['CreInsTable'])) {
    CreInsTable($dbname, $table_name_ins, $conn);
}
if (isset($_GET['CreFacultyTable'])) {
    CreFacultyTable($dbname, $table_name_faculty, $table_name_ins, $conn);
}
if (isset($_GET['CreDeptTable'])) {
    CreDeptTable($dbname, $table_name_dept, $table_name_faculty, $conn);
}
if (isset($_GET['CreMajorTable'])) {
    CreMajorTable($dbname, $table_name_major, $table_name_dept, $conn);
}
if (isset($_GET['CreProjectTypeTable'])) {
    CreProjectTypeTable($dbname, $table_name_project_type, $conn);
}
if (isset($_GET['CreProjectStatusTable'])) {
    CreProjectStatusTable($dbname, $table_name_project_status, $conn);
}
if (isset($_GET['CreateProjectTable'])) {
    CreateProjectTable($dbname, $table_name_project, $table_name_project_type, $table_name_major, $table_name_project_status, $conn);
}
if (isset($_GET['CreFavoriteTable'])) {
    CreFavoriteTable($dbname, $table_name_favorite, $table_name_project, $table_name_user, $conn);
}
if (isset($_GET['CreRequestStatusTable'])) {
    CreRequestStatusTable($dbname, $table_name_request_status, $conn);
}
if (isset($_GET['CreRequestTable'])) {
    CreRequestTable($dbname, $table_name_request, $conn);
}
if (isset($_GET['CreCounterTable'])) {
    CreCounterTable($dbname, $table_name_counter, $table_name_user, $conn);
}
if (isset($_GET['CreManualTable'])) {
    CreManualTable($dbname, $table_name_manual, $conn);
}

if (isset($_GET['DeleteDB'])) {
    DeleteDB($dbname, $conn);
}
if (isset($_GET['DelUserRoleTable'])) {
    DeleteTable($table_name_user_role, $conn);
}
if (isset($_GET['DelUserTable'])) {
    DeleteTable($table_name_user, $conn);
}
if (isset($_GET['DelInsTable'])) {
    DeleteTable($table_name_ins, $conn);
}
if (isset($_GET['DelFacultyTable'])) {
    DeleteTable($table_name_faculty, $conn);
}
if (isset($_GET['DelDeptTable'])) {
    DeleteTable($table_name_dept, $conn);
}
if (isset($_GET['DelMajorTable'])) {
    DeleteTable($table_name_major, $conn);
}
if (isset($_GET['DelProjectTypeTable'])) {
    DeleteTable($table_name_project_type, $conn);
}
if (isset($_GET['DelProjectStatusTable'])) {
    DeleteTable($table_name_project_status, $conn);
}
if (isset($_GET['DelProjectTable'])) {
    DeleteTable($table_name_project, $conn);
}
if (isset($_GET['DelFavoriteTable'])) {
    DeleteTable($table_name_favorite, $conn);
}
if (isset($_GET['DelRequestStatusTable'])) {
    DeleteTable($table_name_request_status, $conn);
}
if (isset($_GET['DelRequestTable'])) {
    DeleteTable($table_name_request, $conn);
}
if (isset($_GET['DelCounterTable'])) {
    DeleteTable($table_name_counter, $conn);
}
if (isset($_GET['DelManualTable'])) {
    DeleteTable($table_name_manual, $conn);
}
?>
