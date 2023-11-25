<?php
    function GetProjectTypeData($conn) {
        $stmt = $conn->query("SELECT * FROM project_type");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetProjectTypeByID($id, $conn) {
        $stmt = $conn->query("SELECT id, type FROM project_type WHERE id = $id");
        $stmt->execute();
        $GetProjectTypeByName = $stmt->fetch(PDO::FETCH_ASSOC);
        return $GetProjectTypeByName;
    }

    function GetNameProjectTypeByID($id, $conn) {
        $stmt = $conn->query("SELECT type FROM project_type WHERE id = '$id'");
        $stmt->execute();
        $GetNameProjectTypeByName = $stmt->fetch(PDO::FETCH_ASSOC);
        return $GetNameProjectTypeByName['type'];
    }

    function GetProjectTypeEx($id, $conn) {
        $stmt = $conn->query("SELECT id, type FROM project_type WHERE id <> $id");
        $stmt->execute();
        $GetProjectTypeEx = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetProjectTypeEx;
    }
?>