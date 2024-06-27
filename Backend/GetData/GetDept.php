<?php
function GetDeptData($conn)
{
    $stmt = $conn->query("SELECT d.id, d.dept, f.faculty, i.ins
                          FROM opc_dept d
                          INNER JOIN opc_faculty f ON d.faculty = f.id
                          INNER JOIN opc_ins i ON f.ins = i.id");
    $stmt->execute();
    $GetDeptData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $GetDeptData;
}

function GetDeptByMajorID($major, $conn)
{
    $stmt = $conn->prepare("SELECT d.id, d.dept, f.faculty, i.ins
    FROM opc_major m
    INNER JOIN opc_dept d ON m.dept = d.id
    INNER JOIN opc_faculty f ON d.faculty = f.id
    INNER JOIN opc_ins i ON f.ins = i.id 
    WHERE m.id = :major");
    $stmt->bindParam(':major', $major, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($data) {
        return $data;
    }
    return null;
}


function GetDeptByID($opc_dept, $conn)
{
    $stmt = $conn->prepare("SELECT d.id, d.dept, f.faculty, i.ins, d.created_at, d.updated_at
                            FROM opc_dept d
                            INNER JOIN opc_faculty f ON d.faculty = f.id
                            INNER JOIN opc_ins i ON f.ins = i.id
                            WHERE d.id = :opc_dept");
    $stmt->bindParam(':opc_dept', $opc_dept, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function GetDeptEx($opc_dept, $conn)
{
    $stmt = $conn->prepare("SELECT d.id, d.dept, f.faculty, i.ins
                            FROM opc_dept d
                            INNER JOIN opc_faculty f ON d.faculty = f.id
                            INNER JOIN opc_ins i ON f.ins = i.id
                            WHERE d.id <> :opc_dept");
    $stmt->bindParam(':opc_dept', $opc_dept, PDO::PARAM_INT);
    $stmt->execute();
    $GetDeptEx = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $GetDeptEx;
}

function GetNameDeptByID($id, $conn)
{
    $stmt = $conn->prepare("SELECT dept FROM opc_dept WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($data) {
        return $data['dept'];
    }
    return null;
}

function SelectDeptEx($id, $conn)
{
    $stmt = $conn->prepare("SELECT d.id, d.dept, f.faculty, i.ins
                            FROM opc_dept d
                            INNER JOIN opc_faculty f ON d.faculty = f.id
                            INNER JOIN opc_ins i ON f.ins = i.id
                            WHERE d.id <> :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function GetNameDeptByMajorID($id, $conn)
{
    $stmt = $conn->prepare("SELECT opc_dept FROM major WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($data) {
        return GetNameDeptByID($data['opc_dept'], $conn);
    }
    return null;
}
?>
