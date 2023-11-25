<?php
    function CountTotalProjectType($conn) {
        $stmt = $conn->query("SELECT id FROM project_type");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountProjectInProjectType($id, $conn) {
        $stmt = $conn->query("SELECT id FROM project WHERE type = '$id'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
?>