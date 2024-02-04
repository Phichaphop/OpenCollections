<?php
    function GetManualByID($id, $conn) {
        $stmt = $conn->query("SELECT * FROM manual WHERE id = '$id'");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
?>