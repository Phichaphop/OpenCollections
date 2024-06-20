<?php
    function CountTotalIns($conn) {
        $stmt = $conn->query("SELECT id FROM opc_ins");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountFacultyInIns($id, $conn) {
        $stmt = $conn->query("SELECT id FROM opc_faculty WHERE ins = '$id'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
?>