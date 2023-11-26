<?php
    function CountTotalUser($conn) {
        $stmt = $conn->query("SELECT id FROM user");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
    function CountAdmin($conn) {
        $stmt = $conn->query("SELECT id FROM user WHERE role = '1'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }

    function CountPublisher($conn) {
        $stmt = $conn->prepare("SELECT id FROM user WHERE role = '2'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }

    function CountOfficer($conn) {
        $stmt = $conn->query("SELECT id FROM user WHERE role = '3'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }

    function CountNormalUser($conn) {
        $stmt = $conn->query("SELECT id FROM user WHERE role = '4'");
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }
?>