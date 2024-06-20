<?php
function GetFacultyData($conn) {
    $stmt = $conn->query("SELECT opc_faculty.id, opc_faculty.faculty, opc_ins.ins 
                          FROM opc_faculty 
                          INNER JOIN opc_ins ON opc_faculty.ins = opc_ins.id");
    $stmt->execute();
    $GetFacultyData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $GetFacultyData;
}

function GetFacultyByDeptID($opc_dept, $conn) {
    $stmt = $conn->prepare("SELECT opc_faculty FROM opc_dept WHERE id = :opc_dept");
    $stmt->bindParam(':opc_dept', $opc_dept, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return GetFacultyByID($data['opc_faculty'], $conn);
}

function GetFacultyByID($id, $conn) {
    $stmt = $conn->prepare("SELECT opc_faculty.id, opc_faculty.faculty, opc_ins.ins, opc_ins.id AS opc_ins_id, opc_faculty.created_at, opc_faculty.updated_at
                            FROM opc_faculty 
                            INNER JOIN opc_ins ON opc_faculty.ins = opc_ins.id 
                            WHERE opc_faculty.id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function GetFacultyEx($id, $conn) {
    $stmt = $conn->prepare("SELECT opc_faculty.id, opc_faculty.faculty, opc_ins.ins 
                            FROM opc_faculty 
                            INNER JOIN opc_ins ON opc_faculty.ins = opc_ins.id 
                            WHERE opc_faculty.id <> :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $GetFacultyEx = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $GetFacultyEx;
}

function GetNameFacultyByID($id, $conn) {
    $stmt = $conn->prepare("SELECT faculty FROM opc_faculty WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data['faculty'];
}

function SelectFacultyEx($id, $opc_ins, $conn) {
    $stmt = $conn->prepare("SELECT opc_faculty.id, opc_faculty.faculty, opc_ins.ins 
                            FROM opc_faculty 
                            INNER JOIN opc_ins ON opc_faculty.ins = opc_ins.id 
                            WHERE opc_faculty.id <> :id AND opc_faculty.ins = :opc_ins");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':opc_ins', $opc_ins, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function FacultyByInsID($id, $conn) {
    $stmt = $conn->prepare("SELECT * FROM opc_faculty WHERE ins = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function GetIDFacultyByDeptID($opc_dept, $conn) {
    $stmt = $conn->prepare("SELECT opc_faculty FROM opc_dept WHERE id = :opc_dept");
    $stmt->bindParam(':opc_dept', $opc_dept, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data['opc_faculty'];
}

function GetNameFacultyByMajorID($id, $conn) {
    $stmt = $conn->prepare("SELECT opc_dept FROM major WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $opc_dept = $stmt->fetch(PDO::FETCH_ASSOC);
    $opc_faculty = GetIDFacultyByDeptID($opc_dept['opc_dept'], $conn);
    return GetNameFacultyByID($opc_faculty, $conn);
}
?>
