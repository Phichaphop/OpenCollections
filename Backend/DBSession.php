<?php
    session_start();
    require_once 'Database/DBConnect.php';
    require_once 'Other/ChangeDate.php';
    require_once 'Other/CutText.php';
    require_once 'Search/SearchData.php';
    require_once 'GetData/GetUser.php';
    require_once 'GetData/GetIns.php';
    require_once 'GetData/GetFaculty.php';
    require_once 'GetData/GetMajor.php';
    require_once 'GetData/GetDept.php';
    require_once 'GetData/GetFavorite.php';
    require_once 'GetData/GetRequest.php';
    require_once 'GetData/GetProject.php';
    require_once 'GetData/GetProjectStatus.php';
    require_once 'GetData/GetProjectType.php';
    require_once 'DashBoard/CountUser.php';
    require_once 'DashBoard/CountRequest.php';
    require_once 'DashBoard/CountIns.php';
    require_once 'DashBoard/CountFaculty.php';
    require_once 'DashBoard/CountDept.php';
    require_once 'DashBoard/CountMajor.php';
    require_once 'DashBoard/CountProjectType.php';
    require_once 'DashBoard/CountProject.php';
    require_once 'DashBoard/CountApprove.php';
    require_once 'language/lang.php';

    $conn = DBConnect();
    $page = basename($_SERVER['PHP_SELF'], ".php");
    $public_page = array("DBM", "index", "frm_read","DBDownload","signin", "signup", "policy", "DBSign", "DBVerifyEmail", "VerifyEmail", "ResetPass");
    $private_page = array("");
    
    if (in_array($page, $public_page)) {
        if (isset($_SESSION['login'])) {
            $MyID = $_SESSION['login'];
            echo "<script>" . " var MyID = '" . $MyID . "' </script>";
        }else {

        }
    } else {
        if (isset($_SESSION['login'])) {
            $MyID = $_SESSION['login'];
            echo "<script>" . " var MyID = '" . $MyID . "' </script>";
        } else {
            $_SESSION['error'] = "Please sign in.";
            header("location: signin.php");
        }
    }

?>