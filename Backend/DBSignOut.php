<?php
    require_once 'Database/DBConnect.php';
    if(isset($_GET['SignOut'])) {
        SignOut();
    }
    function SignOut() {
            session_start();
            session_destroy();
            $_SESSION['success'] = "Logout";
            echo "<script>window.location.href='../index.php';</script>";
    }
?>