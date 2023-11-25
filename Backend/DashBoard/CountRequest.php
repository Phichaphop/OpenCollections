<?php
    function CountTotalRequest($conn) {
        $stmt = $conn->query("SELECT id FROM request");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountRequest($id, $conn) {
        if (!$id) {
            $stmt = $conn->query("SELECT id FROM request WHERE 1=1");
            $stmt->execute();
            $data = $stmt->rowCount();
            return $data;
        } else {
            $stmt = $conn->query("SELECT id FROM request WHERE user = '$id'");
            $stmt->execute();
            $data = $stmt->rowCount();
            return $data;
        }
    }
?>