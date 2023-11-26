<?php
    function GetMajorData($conn) {
        $stmt = $conn->query("SELECT major.id, major.major, dept.dept, faculty.faculty, ins.ins FROM major INNER JOIN dept  ON major.dept = dept.id INNER JOIN faculty ON dept.faculty = faculty.id INNER JOIN ins ON faculty.ins = ins.id");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetMajorByID($major, $conn) {
        $stmt = $conn->query("SELECT major.id, major.major, major.degree, dept.dept, faculty.faculty, ins.ins FROM major 
        INNER JOIN dept  ON major.dept = dept.id 
        INNER JOIN faculty ON dept.faculty = faculty.id 
        INNER JOIN ins ON faculty.ins = ins.id 
        WHERE major.id = '$major'");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetNameMajorByID($id, $conn) {
        $stmt = $conn->query("SELECT major FROM major WHERE id = $id");
        $stmt->execute();
        $GetNameMajorByID = $stmt->fetch(PDO::FETCH_ASSOC);
        return $GetNameMajorByID['major'];
    }

    function GetDegreeByMajorID($id, $conn) {
        $stmt = $conn->query("SELECT degree FROM major WHERE id = $id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['degree'];
    }

    function GetMajorEx($major, $conn) {
        $stmt = $conn->query("SELECT major.id, major.major, dept.dept, faculty.faculty, ins.ins FROM major INNER JOIN dept  ON major.dept = dept.id INNER JOIN faculty ON dept.faculty = faculty.id INNER JOIN ins ON faculty.ins = ins.id WHERE dept.id <> '$major'");
        $stmt->execute();
        $GetMajorEx = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetMajorEx;
    }
?>