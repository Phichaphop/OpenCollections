<?php
    function CountTotalDepartment($conn) {
        $stmt = $conn->query("SELECT id FROM dept");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountMajorInDept($id, $conn) {
        $stmt = $conn->query("SELECT id FROM major WHERE dept = '$id'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
?>