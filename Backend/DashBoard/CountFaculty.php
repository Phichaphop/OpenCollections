<?php
    function CountTotalFaculty($conn) {
        $stmt = $conn->query("SELECT id FROM faculty");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountDeptInFaculty($id, $conn) {
        $stmt = $conn->query("SELECT id FROM dept WHERE faculty = '$id'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
?>