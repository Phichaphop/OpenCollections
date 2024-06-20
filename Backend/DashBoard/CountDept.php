<?php
    function CountTotalDepartment($conn) {
        $stmt = $conn->query("SELECT id FROM opc_dept");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountMajorInDept($id, $conn) {
        $stmt = $conn->query("SELECT id FROM opc_major WHERE dept = '$id'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
?>