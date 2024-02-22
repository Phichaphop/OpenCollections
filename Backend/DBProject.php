<?php
require_once 'DBSession.php';

if (isset($_POST['insert_project_type'])) {
    $name = $_POST['name'];
    InsertProjectType($name, $conn);
}

function InsertProjectType($name, $conn)
{
    try {
        $stmt = $conn->prepare("SELECT type FROM project_type WHERE type = :type");
        $stmt->bindParam(":type", $name);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $_SESSION['error'] = "This Project type is already in the system.";
            echo "<script>window.location.href='../dash_project_type.php';</script>";
        } else {
            $stmt = $conn->prepare("INSERT INTO project_type (type)
                                        VALUES(:type)");
            $stmt->bindParam(":type", $name);
            $stmt->execute();
            $_SESSION['success'] = "Create project type complete.";
            echo "<script>window.location.href='../dash_project_type.php';</script>";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../dash_project_type.php';</script>";
    }
}

if (isset($_POST['update_project_type'])) {
    $id = $_SESSION['project_type_id'];
    $name = $_POST['name'];
    UpdateProjectType($id, $name, $conn);
}

function UpdateProjectType($id, $name, $conn)
{
    try {
        $stmt = $conn->prepare("UPDATE project_type SET type=:type WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":type", $name);
        $stmt->execute();
        unset($_SESSION['project_type_id']);
        $_SESSION['success'] = "Project type updated complete.";
        echo "<script>window.location.href='../dash_project_type.php';</script>";
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../dash_project_type.php';</script>";
    }
}

if (isset($_POST['delete_project_type'])) {
    $id = $_SESSION['project_type_id'];
    DeleteProjectType($id, $conn);
}

function DeleteProjectType($id, $conn)
{
    try {
        $stmt = $conn->prepare("DELETE FROM project_type WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        unset($_SESSION['project_type_id']);
        $_SESSION['success'] = "Delete project type complete.";
        echo "<script>window.location.href='../dash_project_type.php';</script>";
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../dash_project_type.php';</script>";
    }
}

if (isset($_POST['insert_project'])) {
    $status = "1";

    $title = $_POST['title'];
    $author = $_POST['author'];
    $advisor = $_POST['advisor'];
    $approver = $_POST['approver'];
    $project_type = $_POST['project_type'];
    $major = $_POST['major'];
    $abstract = $_POST['abstract'];
    $date = $_POST['date'];
    InsertProject($title, $author, $advisor, $approver, $project_type, $major, $abstract, $date, $status, $conn);
}

function InsertProject($title, $author, $advisor, $approver, $project_type, $major, $abstract, $date, $status, $conn)
{
    try {
        $stmt = $conn->prepare("SELECT title FROM project WHERE title = :title");
        $stmt->bindParam(":title", $title);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $_SESSION['error'] = "This Project is already in the system.";
            echo "<script>window.location.href='../dash_project.php';</script>";
        } else {

            $stmt = $conn->prepare("INSERT INTO project (id, title, author, advisor, type, major, abstract, date, approver, status)
                                        VALUES(NULL, :title, :author, :advisor, :type, :major, :abstract, :date, :approver, :status)");
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":author", $author);
            $stmt->bindParam(":advisor", $advisor);
            $stmt->bindParam(":approver", $approver);
            $stmt->bindParam(":type", $project_type);
            $stmt->bindParam(":major", $major);
            $stmt->bindParam(":abstract", $abstract);
            $stmt->bindParam(":date", $date);
            $stmt->bindParam(":status", $status);
            $stmt->execute();
            $_SESSION['success'] = "Create project type complete.";
            echo "<script>window.location.href='../dash_project.php';</script>";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../dash_project.php';</script>";
    }
}

if (isset($_POST['update_project_cover'])) {
    $id = $_SESSION['project_id'];
    $pic = $_FILES['pic'];
    $allow = array('jpg', 'jpeg', 'png');
    $fileActExt = strtolower(pathinfo($pic['name'], PATHINFO_EXTENSION));
    $fileNew = rand() . "." . $fileActExt;
    $filePath = '../resource/img/project/' . $fileNew;

    UpdateProjectCover($id, $pic, $allow, $fileActExt, $fileNew, $filePath, $conn);
}

function UpdateProjectCover($id, $pic, $allow, $fileActExt, $fileNew, $filePath, $conn)
{
    if (in_array($fileActExt, $allow) && $pic['size'] > 0 && $pic['error'] == 0) {
        $stmt = $conn->prepare("SELECT pic FROM project WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data && file_exists('../resource/img/project/' . $data['pic'])) {
            unlink('../resource/img/project/' . $data['pic']);
        }

        if (move_uploaded_file($pic['tmp_name'], $filePath)) {
            try {
                $stmt = $conn->prepare("UPDATE project SET pic=:pic WHERE id=:id");
                $stmt->bindParam(":id", $id);
                $stmt->bindParam(":pic", $fileNew);
                $stmt->execute();
                $_SESSION['success'] = "Project cover updated successfully.";
            } catch (PDOException $e) {
                $_SESSION['error'] = $e->getMessage();
            }
        } else {
            $_SESSION['error'] = "Failed to update project cover.";
        }
    } else {
        $_SESSION['error'] = "Can't upload file (only png, jpg, jpeg).";
    }

    echo "<script>window.location.href='../frm_project.php?read&project=$id';</script>";
    exit;
}

if (isset($_POST['update_project'])) {
    $id = $_SESSION['project_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $advisor = $_POST['advisor'];
    $approver = $_POST['approver'];
    $project_type = $_POST['project_type'];
    $major = $_POST['major'];
    $abstract = $_POST['abstract'];
    $date = $_POST['date'];
    UpdateProjectDetail($id, $title, $author, $advisor, $approver, $project_type, $major, $abstract, $date, $conn);
}

function UpdateProjectDetail($id, $title, $author, $advisor, $approver, $project_type, $major, $abstract, $date, $conn)
{
    try {
        $stmt = $conn->prepare("UPDATE project SET title=:title, author=:author, advisor=:advisor, approver=:approver, type=:type, major=:major, abstract=:abstract, date=:date WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":author", $author);
        $stmt->bindParam(":advisor", $advisor);
        $stmt->bindParam(":approver", $approver);
        $stmt->bindParam(":type", $project_type);
        $stmt->bindParam(":major", $major);
        $stmt->bindParam(":abstract", $abstract);
        $stmt->bindParam(":date", $date);
        $stmt->execute();
        unset($_SESSION['project_id']);
        $_SESSION['success'] = "Project updated complete.";
        echo "<script>window.location.href='../frm_project.php?read&project=$id';</script>";
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../frm_project.php?read&project=$id';</script>";
    }
}

if (isset($_POST['update_project_file'])) {
    $id = $_SESSION['project_id'];
    $file = $_FILES['file'];
    $file_allow = array('pdf');
    $file_fileActExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $file_fileNew = rand() . "." . $file_fileActExt;
    $file_filePath = '../resource/doc/' . $file_fileNew;

    UpdateProjectFile($id, $file, $file_allow, $file_fileActExt, $file_fileNew, $file_filePath, $conn);
}

function UpdateProjectFile($id, $file, $file_allow, $file_fileActExt, $file_fileNew, $file_filePath, $conn)
{
    if (in_array($file_fileActExt, $file_allow) && $file['size'] > 0 && $file['error'] == 0) {
        $stmt = $conn->prepare("SELECT file FROM project WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data && file_exists('../resource/doc/' . $data['file'])) {
            unlink('../resource/doc/' . $data['file']);
        }

        if (move_uploaded_file($file['tmp_name'], $file_filePath)) {
            try {
                $stmt = $conn->prepare("UPDATE project SET file=:file WHERE id=:id");
                $stmt->bindParam(":id", $id);
                $stmt->bindParam(":file", $file_fileNew);
                $stmt->execute();
                $_SESSION['success'] = "Project file updated successfully.";
            } catch (PDOException $e) {
                $_SESSION['error'] = $e->getMessage();
            }
        } else {
            $_SESSION['error'] = "Failed to update project file.";
        }
    } else {
        $_SESSION['error'] = "Can't upload file (only pdf).";
    }

    echo "<script>window.location.href='../frm_project.php?read&project=$id';</script>";
    exit;
}

if (isset($_GET['DeleteProject'])) {
    $id = $_SESSION['project'];
    DeleteProject($id, $conn);
}

function DeleteProject($id, $conn)
{
    try {
        $stmt = $conn->prepare("SELECT file FROM project WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $old_file_path = '../resource/doc/' . $data['file'];
        file_exists($old_file_path);
        unlink($old_file_path);
        try {
            $stmt = $conn->prepare("DELETE FROM project WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            unset($_SESSION['project_id']);
            $_SESSION['success'] = "Delete project complete.";
            echo "<script>window.location.href='../dash_project.php';</script>";
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../dash_project.php';</script>";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../dash_project.php';</script>";
    }
}
