<?php
    function CountTotalApprove($conn) {
        $stmt = $conn->query("SELECT id FROM project WHERE status = '1' OR status = '2' OR status = '3' OR status = '4'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountTotalApproveDraft($conn) {
        $stmt = $conn->query("SELECT id FROM project WHERE status = '1'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountTotalApproveWait($conn) {
        $stmt = $conn->query("SELECT id FROM project WHERE status = '2'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountTotalApproveApprove($conn) {
        $stmt = $conn->query("SELECT id FROM project WHERE status = '3'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountTotalApproveNot($conn) {
        $stmt = $conn->query("SELECT id FROM project WHERE status = '4'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }

    function CountMyApprove($id, $conn) {
        $stmt = $conn->query("SELECT id FROM project WHERE approver = '$id' AND status = '1' OR status = '2' OR status = '3' OR status = '4'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountMyApproveDraft($id, $conn) {
        $stmt = $conn->query("SELECT id FROM project WHERE approver = '$id' OR status = '1'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountMyApproveWait($id, $conn) {
        $stmt = $conn->query("SELECT id FROM project WHERE approver = '$id' OR status = '2'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountMyApproveApprove($id, $conn) {
        $stmt = $conn->query("SELECT id FROM project WHERE approver = '$id' OR status = '3'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountMyApproveNot($id, $conn) {
        $stmt = $conn->query("SELECT id FROM project WHERE approver = '$id' OR status = '4'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
?>