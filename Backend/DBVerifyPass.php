<?php
    require_once 'DBSession.php';

    if (isset($_POST['update_role'])) {
        $user_id = $_SESSION['user_id'];
        $Pass = $_POST['pass'];
        VerifyPassUpdateRole($MyID, $user_id, $Pass, $conn);
    }
    
    function VerifyPassUpdateRole($MyID, $user_id, $Pass, $conn) {
        try {
            $stmt = $conn->prepare("SELECT password FROM user WHERE id = :id");
            $stmt->bindParam(":id", $MyID);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($Pass, $data['password'])) {
                echo "<script>window.location.href='DBUpdateUser.php?update_role';</script>";
            } else {
                $_SESSION['error'] = "Password is incorrect.";
                echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        }
    }

    if (isset($_POST['delete_user'])) {
        $user_id = $_SESSION['user_id'];
        $Pass = $_POST['pass'];
        VerifyPassDeleteUser($MyID, $user_id, $Pass, $conn);
    }
    
    function VerifyPassDeleteUser($MyID, $user_id, $Pass, $conn) {
        try {
            $stmt = $conn->prepare("SELECT password FROM user WHERE id = :id");
            $stmt->bindParam(":id", $MyID);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($Pass, $data['password'])) {
                echo "<script>window.location.href='DBUser.php?delete_user';</script>";
            } else {
                $_SESSION['error'] = "Password is incorrect.";
                echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        }
    }

    if (isset($_POST['DeleteProject'])) {
        $id = $_SESSION['project'];
        $Pass = $_POST['pass'];
        VerifyPassDeleteProject($MyID, $id, $Pass, $conn);
    }
    
    function VerifyPassDeleteProject($MyID, $id, $Pass, $conn) {
        try {
            $stmt = $conn->prepare("SELECT password FROM user WHERE id = :id");
            $stmt->bindParam(":id", $MyID);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($Pass, $data['password'])) {
                echo "<script>window.location.href='DBProject.php?DeleteProject';</script>";
            } else {
                $_SESSION['error'] = "Password is incorrect.";
                echo "<script>window.location.href='../frm_project.php?read&project=$id';</script>";
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../frm_project.php?read&project=$id';</script>";
        }
    }
?>