<?php

function GetMajorData($conn)
{
    try {
        $stmt = $conn->query("SELECT opc_major.id, opc_major.major, opc_major.degree, opc_dept.dept, opc_faculty.faculty, opc_ins.ins 
        FROM major INNER JOIN dept  ON opc_major.dept = opc_dept.id 
        INNER JOIN opc_faculty ON opc_dept.faculty = opc_faculty.id 
        INNER JOIN opc_ins ON opc_faculty.ins = opc_ins.id");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

function GetMajorByID($opc_major, $conn)
{
    try {
        $stmt = $conn->prepare("SELECT opc_major.id, opc_major.major, opc_major.degree, opc_dept.dept, opc_faculty.faculty, opc_ins.ins, opc_major.created_at, opc_major.updated_at 
                               FROM opc_major 
                               INNER JOIN opc_dept  ON opc_major.dept = opc_dept.id 
                               INNER JOIN opc_faculty ON opc_dept.faculty = opc_faculty.id 
                               INNER JOIN opc_ins ON opc_faculty.ins = opc_ins.id 
                               WHERE opc_major.id = :opc_major");
        $stmt->bindParam(':opc_major', $opc_major, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        // Log or handle the error appropriately
        error_log("Error in GetMajorByID: " . $e->getMessage());
        return false; // Or handle the error in another way
    }
}

function GetMajorEx($opc_major, $conn)
{
    try {
        $stmt = $conn->prepare("SELECT opc_major.id, opc_major.major, opc_major.degree, opc_dept.dept, opc_faculty.faculty, opc_ins.ins 
                               FROM opc_major 
                               INNER JOIN opc_dept  ON opc_major.dept = opc_dept.id 
                               INNER JOIN opc_faculty ON opc_dept.faculty = opc_faculty.id 
                               INNER JOIN opc_ins ON opc_faculty.ins = opc_ins.id 
                               WHERE opc_dept.id <> :opc_major");
        $stmt->bindParam(':opc_major', $opc_major, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        // Log or handle the error appropriately
        error_log("Error in GetMajorEx: " . $e->getMessage());
        return false; // Or handle the error in another way
    }
}