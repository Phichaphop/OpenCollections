<?php
    function GetFacultyData($conn) {
        $stmt = $conn->query("SELECT faculty.id, faculty.faculty, ins.ins FROM faculty INNER JOIN ins on faculty.ins=ins.id");
        $stmt->execute();
        $GetFacultyData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetFacultyData;
    }

    function GetFacultyByDeptID($dept, $conn) {
        $stmt = $conn->query("SELECT faculty FROM dept WHERE id = $dept");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return GetFacultyByID($data['faculty'], $conn);
    }

    function GetFacultyByID($id, $conn) {
        $stmt = $conn->query("SELECT faculty.id, faculty.faculty, ins.ins, ins.id AS ins_id, faculty.created_at, faculty.updated_at FROM faculty INNER JOIN ins on faculty.ins=ins.id WHERE faculty.id = $id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function GetFacultyEx($id, $conn) {
        $stmt = $conn->query("SELECT faculty.id, faculty.faculty, ins.ins FROM faculty INNER JOIN ins on faculty.ins=ins.id WHERE faculty.id <> $id");
        $stmt->execute();
        $GetFacultyEx = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetFacultyEx;
    }

    function GetNameFacultyByID($id, $conn) {
        $stmt = $conn->query("SELECT faculty FROM faculty WHERE id = $id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['faculty'];
    }

    function SelectFacultyEx($id, $ins, $conn) {
        $stmt = $conn->query("SELECT faculty.id, faculty.faculty, ins.ins FROM faculty INNER JOIN ins on faculty.ins=ins.id WHERE faculty.id <> $id AND faculty.ins = '$ins'");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function FacultyByInsID($id, $conn) {
        $stmt = $conn->query("SELECT * FROM faculty WHERE ins = '$id'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function GetIDFacultyByDeptID($dept, $conn) {
        $stmt = $conn->query("SELECT faculty FROM dept WHERE id = $dept");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['faculty'];
    }

    function GetNameFacultyByMajorID($id, $conn) {
        $stmt = $conn->query("SELECT dept FROM major WHERE id = $id");
        $stmt->execute();
        $dept = $stmt->fetch(PDO::FETCH_ASSOC);
        $faculty = GetIDFacultyByDeptID($dept['dept'], $conn);
        return GetNameFacultyByID("$faculty", $conn);
    }
?>