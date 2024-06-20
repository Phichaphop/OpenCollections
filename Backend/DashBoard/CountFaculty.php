<?php
    function CountTotalFaculty($conn) {
        $stmt = $conn->query("SELECT id FROM opc_faculty");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountDeptInFaculty($id, $conn) {
        $stmt = $conn->query("SELECT id FROM opc_dept WHERE faculty = '$id'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
?>