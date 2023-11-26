<?php
    function GetDeptData($conn) {
        $stmt = $conn->query("SELECT dept.id, dept.dept, faculty.faculty, ins.ins FROM dept INNER JOIN faculty ON dept.faculty = faculty.id INNER JOIN ins ON faculty.ins = ins.id");
        $stmt->execute();
        $GetDeptData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetDeptData;
    }
    function GetDeptByMajorID($major, $conn) {
        $stmt = $conn->query("SELECT dept FROM major WHERE id = $major");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return GetDeptByID($data['dept'], $conn);
    }
    function GetDeptByID($dept, $conn) {
        $stmt = $conn->query("SELECT dept.id, dept.dept, faculty.faculty, ins.ins FROM dept INNER JOIN faculty ON dept.faculty = faculty.id INNER JOIN ins ON faculty.ins = ins.id WHERE dept.id = $dept");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    function GetDeptEx($dept, $conn) {
        $stmt = $conn->query("SELECT dept.id, dept.dept, faculty.faculty, ins.ins FROM dept INNER JOIN faculty ON dept.faculty = faculty.id INNER JOIN ins ON faculty.ins = ins.id WHERE dept.id <> $dept");
        $stmt->execute();
        $GetDeptEx = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetDeptEx;
    }
    function GetNameDeptByID($id, $conn) {
        $stmt = $conn->query("SELECT dept FROM dept WHERE id = $id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['dept'];
    }
    function SelectDeptEx($id, $faculty, $conn) {
        $stmt = $conn->query("SELECT dept.id, dept.dept ,faculty.faculty, ins.ins FROM dept INNER JOIN faculty ON dept.faculty = faculty.id INNER JOIN ins ON faculty.ins = ins.id WHERE dept.id <> $id AND dept.faculty = '$faculty'");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function GetNameDeptByMajorID($id, $conn) {
        $stmt = $conn->query("SELECT dept FROM major WHERE id = $id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return GetNameDeptByID($data['dept'], $conn);
    }
?>