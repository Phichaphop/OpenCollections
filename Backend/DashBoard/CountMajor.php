<?php
    function CountTotalMajor($conn) {
        $stmt = $conn->query("SELECT id FROM major");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountProjectInMajor($id, $conn) {
        $stmt = $conn->query("SELECT id FROM project WHERE major = '$id'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
?>