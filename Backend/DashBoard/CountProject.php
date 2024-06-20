<?php
    function CountTotalProject($conn) {
        $stmt = $conn->query("SELECT id FROM opc_project");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountMyProject($id, $conn) {
        $stmt = $conn->query("SELECT id FROM opc_project WHERE author = '$id'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountMyProjectDraft($id, $conn) {
        $stmt = $conn->query("SELECT id FROM opc_project WHERE author = '$id' AND status = '1'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountMyProjectWaitVerifi($id, $conn) {
        $stmt = $conn->query("SELECT id FROM opc_project WHERE author = '$id' AND status = '2'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountMyProjectWait($id, $conn) {
        $stmt = $conn->query("SELECT id FROM opc_project WHERE author = '$id' AND status = '3'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountMyProjectApprove($id, $conn) {
        $stmt = $conn->query("SELECT id FROM opc_project WHERE author = '$id' AND status = '4'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountMyProjectNot($id, $conn) {
        $stmt = $conn->query("SELECT id FROM opc_project WHERE author = '$id' AND status = '5'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
?>