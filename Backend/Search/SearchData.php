<?php
function SearchUser($name, $type, $conn)
{
    $query = "SELECT * FROM opc_user WHERE 1=1";
    if (!empty($name)) {
        $query .= " AND (id LIKE '%" . $name . "%' OR username LIKE '%" . $name . "%' OR email LIKE '%" . $name . "%')";
    }
    if (!empty($type)) {
        $query .= " AND role = '" . $type . "'";
    }

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function SearchIns($name, $conn)
{
    $query = "SELECT * FROM opc_ins WHERE 1=1";
    if (!empty($name)) {
        $query .= " AND (id LIKE '%" . $name . "%' OR ins LIKE '%" . $name . "%')";
    }
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function SearchFaculty($name, $type, $conn)
{
    $query = "SELECT * FROM opc_faculty WHERE 1=1";
    if (!empty($name)) {
        $query .= " AND (id LIKE '%" . $name . "%' OR faculty LIKE '%" . $name . "%')";
    }
    if (!empty($type)) {
        $query .= " AND ins = '" . $type . "'";
    }
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function SearchDept($name, $type, $conn)
{
    $query = "SELECT * FROM opc_dept WHERE 1=1";
    if (!empty($name)) {
        $query .= " AND (id LIKE '%" . $name . "%' OR dept LIKE '%" . $name . "%')";
    }
    if (!empty($type)) {
        $query .= " AND faculty = '" . $type . "'";
    }
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function SearchMajor($name, $type, $conn)
{
    $query = "SELECT * FROM opc_major WHERE 1=1";
    if (!empty($name)) {
        $query .= " AND (id LIKE '%" . $name . "%' OR major LIKE '%" . $name . "%')";
    }
    if (!empty($type)) {
        $query .= " AND dept = '" . $type . "'";
    }
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function SearchProjectType($name, $conn)
{
    $query = "SELECT * FROM opc_project_type WHERE 1=1";
    if (!empty($name)) {
        $query .= " AND (id LIKE '%" . $name . "%' OR type LIKE '%" . $name . "%')";
    }
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function SearchFavorite($name, $type, $major, $MyID, $conn)
{
    $query = "SELECT opc_favorite.project, opc_opc_project.id, opc_opc_project.title, 
        opc_opc_project.author, opc_opc_project_type.type as type, opc_opc_project.major, opc_opc_project.date,
        opc_opc_ins.ins, opc_opc_ins.pic as ins_pic, opc_opc_project.pic as cover
        FROM opc_favorite 
        INNER JOIN opc_project ON opc_favorite.project = opc_opc_project.id
        INNER JOIN opc_project_type ON opc_opc_project.type = opc_opc_project_type.id
        INNER JOIN opc_major ON opc_opc_project.major = opc_opc_major.id
        INNER JOIN opc_dept ON opc_opc_major.dept = opc_opc_dept.id
        INNER JOIN opc_faculty ON opc_opc_dept.faculty = opc_opc_faculty.id
        INNER JOIN opc_ins ON opc_opc_faculty.ins = opc_opc_ins.id
        WHERE opc_favorite.user = $MyID";

    if (!empty($name)) {
        $query .= " AND (opc_opc_project.title LIKE '%" . $name . "%')";
    }
    if (!empty($type)) {
        $query .= " AND opc_opc_project.type = '" . $type . "'";
    }
    if (!empty($major)) {
        $query .= " AND opc_opc_project.major = '" . $major . "'";
    }

    $query .= " ORDER BY opc_favorite.created_at DESC";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function SearchRequest($name, $user, $conn)
{
    $query = "SELECT * FROM opc_request WHERE 1=1";
    $params = array();

    if (!empty($name)) {
        $query .= " AND (id LIKE :name OR title LIKE :name)";
        $params[':name'] = '%' . $name . '%';
    }
    if (!empty($user)) {
        $query .= " AND user = :user";
        $params[':user'] = $user;
    }

    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function SearchProject($name, $type, $major, $id, $approver, $status, $role, $conn)
{
    $conditions = [];

    if ($role != '1') {
        if (!empty($status)) {
            $conditions[] = "(status = :status OR status = :status2)";
        }
        if (!empty($id)) {
            $conditions[] = "$approver = :id";
        }
    }

    if (!empty($name)) {
        $conditions[] = "id LIKE :name OR title LIKE :name";
    }
    if (!empty($type)) {
        $conditions[] = "type = :type";
    }
    if (!empty($major)) {
        $conditions[] = "major = :major";
    }

    $query = "SELECT * FROM opc_project";

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $query .= " ORDER BY created_at DESC";

    $stmt = $conn->prepare($query);

    if (!empty($name)) {
        $stmt->bindValue(':name', '%' . $name . '%', PDO::PARAM_STR);
    }

    if ($role != '1') {
        if (!empty($status)) {
            $stmt->bindValue(':status', $status, PDO::PARAM_INT);
            if (isset($_SESSION['officer'])) {
                $stmt->bindValue(':status2', 1, PDO::PARAM_INT);
            } else {
                $stmt->bindValue(':status2', $status, PDO::PARAM_INT);
            }
        }
        if (!empty($id)) {
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        }
    }
    if (!empty($type)) {
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    }
    if (!empty($major)) {
        $stmt->bindValue(':major', $major, PDO::PARAM_STR);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function SearchMyProject($name, $type, $major, $user, $conn)
{
    $query = "SELECT * FROM opc_project WHERE 1=1";
    if (!empty($name)) {
        $query .= " AND (id LIKE '%" . $name . "%' OR title LIKE '%" . $name . "%')";
    }
    if (!empty($type)) {
        $query .= " AND type = '" . $type . "'";
    }
    if (!empty($major)) {
        $query .= " AND major = '" . $major . "'";
    }
    if (!empty($user)) {
        $query .= " AND author = '" . $user . "'";
    }

    $query .= " ORDER BY created_at DESC";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function SearchProjectApprove($name, $type, $major, $conn)
{
    try {
        $query = "SELECT opc_project.id as project_id, opc_project.title, opc_project.author,
        opc_project.advisor, opc_project_type.type as type, opc_project.major, opc_major.id,
        opc_project.abstract, opc_project.date,
        opc_project.file, opc_project.status, opc_project.note, opc_project.approver,
        opc_project.created_at, opc_project.updated_at,
        opc_ins.ins, opc_ins.pic as ins_pic, opc_project.pic as cover
        FROM opc_project 
        INNER JOIN opc_project_type ON opc_project.type = opc_project_type.id
        INNER JOIN opc_major ON opc_project.major = opc_major.id
        INNER JOIN opc_dept ON opc_major.dept = opc_dept.id
        INNER JOIN opc_faculty ON opc_dept.faculty = opc_faculty.id
        INNER JOIN opc_ins ON opc_faculty.ins = opc_ins.id
        WHERE 1=1 AND opc_project.status = '4'";

        $params = array();

        if (!empty($name)) {
            $query .= " AND (opc_project.id LIKE ? OR opc_project.title LIKE ?)";
            $params[] = "%" . $name . "%";
            $params[] = "%" . $name . "%";
        }
        if (!empty($type)) {
            $query .= " AND opc_project.type = ?";
            $params[] = $type;
        }
        if (!empty($major)) {
            $query .= " AND opc_major.id = ?";
            $params[] = $major;
        }

        $query .= " ORDER BY opc_project.updated_at DESC";

        $stmt = $conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

function SearchManual($name, $user, $conn)
{
    $query = "SELECT * FROM opc_manual WHERE 1=1";
    if (!empty($name)) {
        $query .= " AND (id LIKE '%" . $name . "%' OR title LIKE '%" . $name . "%')";
    }
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
