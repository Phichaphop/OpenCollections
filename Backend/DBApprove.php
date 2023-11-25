<?php
require_once 'DBSession.php';

if (isset($_GET['draft'])) {
    $id = $_GET['project'];
    $status = "2";
    SentDraftProject($id, $status, $conn);
}

function SentDraftProject($id, $status, $conn) {
    try {
        $stmt = $conn->prepare("UPDATE project SET status=:status WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":status", $status);
        $stmt->execute();
        $_SESSION['success'] = "Sent draft project success!.";
        echo "<script>window.location.href='../dash_project.php';</script>";
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../dash_project.php';</script>";
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
