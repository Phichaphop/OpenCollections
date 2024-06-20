<?php    
    function GetProjectStatusData($conn) {
        $stmt = $conn->query("SELECT * FROM opc_project_status");
        $stmt->execute();
        $GetProjectStatusData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetProjectStatusData;
    }

    function GetProjectStatusByID($id, $conn) {
        $stmt = $conn->query("SELECT id, status FROM opc_project_status WHERE id = $id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetNameStatusByID($id, $conn) {
        $stmt = $conn->query("SELECT status FROM opc_project_status WHERE id = $id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['status'];
    }

    function GetNameProjectStatusByID($id, $conn) {
        $stmt = $conn->query("SELECT status FROM opc_project_status WHERE id = '$id'");
        $stmt->execute();
        $GetNameProjectStatusByName = $stmt->fetch(PDO::FETCH_ASSOC);
        return $GetNameProjectStatusByName['status'];
    }

    function GetProjectStatusEx($id, $conn) {
        $stmt = $conn->query("SELECT id, status FROM opc_project_status WHERE id <> $id");
        $stmt->execute();
        $GetProjectStatusEx = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetProjectStatusEx;
    }
?>