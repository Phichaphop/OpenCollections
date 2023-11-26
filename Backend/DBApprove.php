<?php
require_once 'DBSession.php';

if (isset($_GET['draft'])) {
    $id = $_GET['project'];
    $status = "2";
    SentDraftProject($id, $status, $conn);
}

function SentDraftProject($id, $status, $conn) {
    try {
        $fileStmt = $conn->prepare("SELECT file FROM project WHERE id=:id");
        $fileStmt->bindParam(":id", $id);
        $fileStmt->execute();
        $data = $fileStmt->fetch(PDO::FETCH_ASSOC);

        if (empty($data['file'])) {
            $_SESSION['error'] = "Please upload a file.";
            header("Location: ../frm_project.php?read&project=$id");
            exit;
        } else {
            $updateStmt = $conn->prepare("UPDATE project SET status=:status WHERE id=:id");
            $updateStmt->bindParam(":id", $id);
            $updateStmt->bindParam(":status", $status);
            $updateStmt->execute();
            $_SESSION['success'] = "Sent draft project successfully.";
            header("Location: ../dash_project.php");
            exit;
        }

    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("Location: ../dash_project.php");
        exit;
    }
}

if (isset($_GET['approve'])) {
    $id = $_GET['project'];
    $note = "";
    $status = "3";
    ApproveProject($id, $note, $status, $conn);
}

function ApproveProject($id, $note, $status, $conn) {
    try {
        $stmt = $conn->prepare("UPDATE project SET status=:status, note=:note WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":note", $note);
        $stmt->bindParam(":status", $status);
        $stmt->execute();
        $_SESSION['success'] = "Approve project success!.";
        echo "<script>window.location.href='../dash_approve.php';</script>";
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../dash_approve.php';</script>";
    }
}
if (isset($_POST['cancel'])) {
    $id = $_SESSION['project_id'];
    $note = $_POST['Note'];
    $status = "4";
    echo "test";
    NotApproveProject($id, $note, $status, $conn);
}

function NotApproveProject($id, $note, $status, $conn) {
    try {
        $stmt = $conn->prepare("UPDATE project SET status=:status, note=:note WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":note", $note);
        $stmt->bindParam(":status", $status);
        $stmt->execute();
        unset($_SESSION['project_id']);
        $_SESSION['success'] = "Not Approve project success!.";
        echo "<script>window.location.href='../dash_approve.php';</script>";
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../dash_approve.php';</script>";
    }
}
