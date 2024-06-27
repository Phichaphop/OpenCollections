<?php
function GetInsData($conn) {
    $stmt = $conn->query("SELECT * FROM opc_ins");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function GetInsByID($id, $conn) {
    $stmt = $conn->prepare("SELECT * FROM opc_ins WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function GetNameInsByID($id, $conn) {
    $stmt = $conn->prepare("SELECT ins FROM opc_ins WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($data) {
        return $data['ins'];
    }
    return null;
}

function GetNameInsByFacultyID($id, $conn) {
    $stmt = $conn->prepare("SELECT i.ins FROM opc_faculty f
                            INNER JOIN opc_ins i ON f.ins = i.id
                            WHERE f.id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($data) {
        return $data['ins'];
    }
    return null;
}

function GetNameInsByDeptID($id, $conn) {
    $stmt = $conn->prepare("SELECT f.ins FROM opc_dept d
                            INNER JOIN opc_faculty f ON d.faculty = f.id
                            WHERE d.id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($data) {
        return GetNameInsByFacultyID($data['ins'], $conn);
    }
    return null;
}

function GetInsByFacultyID($faculty, $conn) {
    $stmt = $conn->prepare("SELECT ins FROM opc_faculty
                            WHERE id = :faculty");
    $stmt->bindParam(':faculty', $faculty, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($data) {
        return $data['ins'];
    }
    return null;
}

function GetInsEx($id, $conn) {
    $stmt = $conn->prepare("SELECT id, ins FROM opc_ins WHERE id <> :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $GetInsEx = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $GetInsEx;
}

function GetIDInsByFacultyID($id, $conn) {
    $stmt = $conn->prepare("SELECT i.ins FROM opc_faculty f
                            INNER JOIN opc_ins i ON f.ins = i.id
                            WHERE f.id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($data) {
        return $data['ins'];
    }
    return null;
}

function GetNameInsByMajorID($id, $conn) {
    $stmt = $conn->prepare("SELECT dept FROM opc_major WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $dept = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($dept) {
        $faculty = GetIDFacultyByDeptID($dept['dept'], $conn);
        if ($faculty) {
            $opc_ins = GetIDInsByFacultyID($faculty, $conn);
            if ($opc_ins) {
                return GetNameInsByID($opc_ins, $conn);
            }
        }
    }
    return null;
}
?>
