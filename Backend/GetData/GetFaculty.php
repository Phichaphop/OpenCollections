<?php
    function GetFacultyData($conn) {
        $stmt = $conn->query("SELECT faculty.id, faculty.faculty, institute.ins FROM faculty INNER JOIN institute on faculty.ins=institute.id");
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
        $stmt = $conn->query("SELECT faculty.id, faculty.faculty, institute.ins, institute.id AS ins_id FROM faculty INNER JOIN institute on faculty.ins=institute.id WHERE faculty.id = $id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function GetFacultyEx($id, $conn) {
        $stmt = $conn->query("SELECT faculty.id, faculty.faculty, institute.ins FROM faculty INNER JOIN institute on faculty.ins=institute.id WHERE faculty.id <> $id");
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
        $stmt = $conn->query("SELECT faculty.id, faculty.faculty, institute.ins FROM faculty INNER JOIN institute on faculty.ins=institute.id WHERE faculty.id <> $id AND faculty.ins = '$ins'");
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