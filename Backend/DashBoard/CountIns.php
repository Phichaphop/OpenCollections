<?php
    function CountTotalIns($conn) {
        $stmt = $conn->query("SELECT id FROM institute");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountFacultyInIns($id, $conn) {
        $stmt = $conn->query("SELECT id FROM faculty WHERE ins = '$id'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
?>