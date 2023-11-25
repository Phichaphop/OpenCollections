<?php
    function GetInsData($conn) {
        $stmt = $conn->query("SELECT * FROM institute");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function GetInsByID($id, $conn) {
        $stmt = $conn->query("SELECT * FROM institute WHERE id = '$id'");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    function GetNameInsByID($id, $conn) {
        $stmt = $conn->query("SELECT ins FROM institute WHERE id = $id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['ins'];
    }
    function GetNameInsByFacultyID($id, $conn) {
        $stmt = $conn->query("SELECT ins FROM faculty WHERE id = $id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return GetNameInsByID($data['ins'], $conn);
    }
    function GetNameInsByDeptID($id, $conn) {
        $stmt = $conn->query("SELECT faculty FROM dept WHERE id = $id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return GetNameInsByFacultyID($data['faculty'], $conn);
    }
    function GetInsByFacultyID($faculty, $conn) {
        $stmt = $conn->query("SELECT ins FROM faculty WHERE id = $faculty");
        $stmt->execute();
        $Data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $Data['ins'];
    }
    function GetInsEx($id, $conn) {
        $stmt = $conn->query("SELECT id, ins FROM institute WHERE id <> $id");
        $stmt->execute();
        $GetInsEx = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetInsEx;
    }
    function GetIDInsByFacultyID($id, $conn) {
        $stmt = $conn->query("SELECT ins FROM faculty WHERE id = $id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['ins'];
    }
    function GetNameInsByMajorID($id, $conn) {
        $stmt = $conn->query("SELECT dept FROM major WHERE id = $id");
        $stmt->execute();
        $dept = $stmt->fetch(PDO::FETCH_ASSOC);
        $faculty = GetIDFacultyByDeptID($dept['dept'], $conn);
        $ins = GetIDInsByFacultyID($faculty, $conn);
        return GetNameInsByID($ins, $conn);
    }
?>