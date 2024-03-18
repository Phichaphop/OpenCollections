<?php
require_once 'config.php';

if (isset($_POST['insert_manual'])) {
    $title = $_POST['title'];
    $file = $_FILES['file'];
    $file_allow = array('pdf', 'doc', 'docx');
    $file_fileActExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $file_fileNew = rand() . "." . $file_fileActExt;
    $file_filePath = '../resource/doc/manual/' . $file_fileNew;
    InsertManual($title, $file, $file_allow, $file_fileActExt, $file_fileNew, $file_filePath, $conn);
}

function InsertManual($title, $file, $file_allow, $file_fileActExt, $file_fileNew, $file_filePath, $conn)
{
    try {
        $stmt = $conn->prepare("SELECT title FROM manual WHERE title = :title");
        $stmt->bindParam(":title", $title);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $_SESSION['error'] = "This manual is already in the system.";
            echo "<script>window.location.href='../dash_manual.php';</script>";
        } else {
            if (in_array($file_fileActExt, $file_allow) && $file['size'] > 0 && $file['error'] == 0) {
                if (move_uploaded_file($file['tmp_name'], $file_filePath)) {
                    $stmt = $conn->prepare("INSERT INTO manual (id, title, file)
                    VALUES(NULL, :title, :file)");
                    $stmt->bindParam(":title", $title);
                    $stmt->bindParam(":file", $file_fileNew);
                    $stmt->execute();
                    $_SESSION['success'] = "Create manual type complete.";
                    echo "<script>window.location.href='../dash_manual.php';</script>";
                } else {
                    $_SESSION['error'] = "Failed to update manual file.";
                    echo "<script>window.location.href='../dash_manual.php';</script>";
                }
            } else {
                $_SESSION['error'] = "Can't upload file (only pdf, doc, docx).";
                echo "<script>window.location.href='../dash_manual.php';</script>";
            }
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../dash_manual.php';</script>";
    }
}

if (isset($_POST['update_detail_manual'])) {
    $id = $_SESSION['manual_id'];
    $title = $_POST['title'];
    UpdateManualDetail($id, $title, $conn);
}

function UpdateManualDetail($id, $title, $conn)
{
    try {
        $stmt = $conn->prepare("UPDATE manual SET title=:title WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":title", $title);
        $stmt->execute();
        unset($_SESSION['manual_id']);
        $_SESSION['success'] = "manual updated complete.";
        echo "<script>window.location.href='../frm_manual.php?read&manual=$id';</script>";
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../frm_manual.php?read&manual=$id';</script>";
    }
}

if (isset($_POST['update_file_manual'])) {
    $id = $_SESSION['manual_id'];
    $file = $_FILES['file'];
    $file_allow = array('pdf', 'doc', 'docx');
    $file_fileActExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $file_fileNew = rand() . "." . $file_fileActExt;
    $file_filePath = '../resource/doc/manual/' . $file_fileNew;

    UpdateManualFile($id, $file, $file_allow, $file_fileActExt, $file_fileNew, $file_filePath, $conn);
}

function UpdateManualFile($id, $file, $file_allow, $file_fileActExt, $file_fileNew, $file_filePath, $conn)
{
    if (in_array($file_fileActExt, $file_allow) && $file['size'] > 0 && $file['error'] == 0) {
        $stmt = $conn->prepare("SELECT file FROM manual WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data && file_exists('../resource/doc/manual/' . $data['file'])) {
            unlink('../resource/doc/manual/' . $data['file']);
        }

        if (move_uploaded_file($file['tmp_name'], $file_filePath)) {
            try {
                $stmt = $conn->prepare("UPDATE manual SET file=:file WHERE id=:id");
                $stmt->bindParam(":id", $id);
                $stmt->bindParam(":file", $file_fileNew);
                $stmt->execute();
                $_SESSION['success'] = "manual file updated successfully.";
            } catch (PDOException $e) {
                $_SESSION['error'] = $e->getMessage();
            }
        } else {
            $_SESSION['error'] = "Failed to update manual file.";
        }
    } else {
        $_SESSION['error'] = "Can't upload file (only pdf, doc, docx).";
    }

    echo "<script>window.location.href='../frm_manual.php?read&manual=$id';</script>";
    exit;
}

if (isset($_POST['delete_manual'])) {
    $id = $_SESSION['manual_id'];
    DeleteManual($id, $conn);
}

function DeleteManual($id, $conn)
{
    try {
        $stmt = $conn->prepare("SELECT file FROM manual WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $old_file_path = '../resource/doc/manual/' . $data['file'];
        file_exists($old_file_path);
        unlink($old_file_path);
        try {
            $stmt = $conn->prepare("DELETE FROM manual WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            unset($_SESSION['manual_id']);
            $_SESSION['success'] = "Delete manual complete.";
            echo "<script>window.location.href='../dash_manual.php';</script>";
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../dash_manual.php';</script>";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../dash_manual.php';</script>";
    }
}

?>