<?php
    require_once 'config.php';

    if (isset($_POST['insert_request'])) {
        $title = $_POST['title'];
        $detail = $_POST['detail'];
        InsertRequest($title, $detail, $MyID, $conn);
    }

    if (isset($_POST['delete_request'])) {
        $request = $_SESSION['request_id'];
        DeleteRequest($request, $conn);
    }

    function InsertRequest($title, $detail, $user, $conn) {
        try {
            $stmt = $conn->prepare("INSERT INTO request (title, detail, user)
                                    VALUES(:title, :detail, :user)");
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":detail", $detail);
            $stmt->bindParam(":user", $user);
            $stmt->execute();
            $_SESSION['success'] = "Create request complete.";
            echo "<script>window.location.href='../dash_request.php';</script>";
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../dash_request.php';</script>";
        }
    }

    function DeleteRequest($request, $conn) {
        try {
            $stmt = $conn->prepare("DELETE FROM request WHERE id=:id");
            $stmt->bindParam(":id", $request);
            $stmt->execute();
            unset($_SESSION['request_id']);
            $_SESSION['success'] = "Delete request complete.";
            echo "<script>window.location.href='../dash_request.php';</script>";
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../dash_request.php';</script>";
        }
    }
