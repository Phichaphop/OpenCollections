<?php
function SearchUser($name, $type, $conn)
{
    $query = "SELECT * FROM user WHERE 1=1";
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
    $query = "SELECT * FROM ins WHERE 1=1";
    if (!empty($name)) {
        $query .= " AND (id LIKE '%" . $name . "%' OR ins LIKE '%" . $name . "%')";
    }
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function SearchFaculty($name, $type, $conn)
{
    $query = "SELECT * FROM faculty WHERE 1=1";
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
    $query = "SELECT * FROM dept WHERE 1=1";
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
    $query = "SELECT * FROM major WHERE 1=1";
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
    $query = "SELECT * FROM project_type WHERE 1=1";
    if (!empty($name)) {
        $query .= " AND (id LIKE '%" . $name . "%' OR type LIKE '%" . $name . "%')";
    }
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function SearchFavorite($name, $type, $major, $MyID, $conn)
{
    $query = "SELECT favorite.project, project.id, project.title, 
        project.author, project_type.type as type, project.major, project.date,
        ins.ins, ins.pic as ins_pic, project.pic as cover
        FROM favorite 
        INNER JOIN project ON favorite.project = project.id
        INNER JOIN project_type ON project.type = project_type.id
        INNER JOIN major ON project.major = major.id
        INNER JOIN dept ON major.dept = dept.id
        INNER JOIN faculty ON dept.faculty = faculty.id
        INNER JOIN ins ON faculty.ins = ins.id
        WHERE favorite.user = $MyID";

    if (!empty($name)) {
        $query .= " AND (project.title LIKE '%" . $name . "%')";
    }
    if (!empty($type)) {
        $query .= " AND project.type = '" . $type . "'";
    }
    if (!empty($major)) {
        $query .= " AND project.major = '" . $major . "'";
    }

    $query .= " ORDER BY favorite.created_at DESC";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function SearchRequest($name, $user, $conn)
{
    $query = "SELECT * FROM request WHERE 1=1";
    if (!empty($name)) {
        $query .= " AND (id LIKE '%" . $name . "%' OR title LIKE '%" . $name . "%')";
    }
    if (!empty($user)) {
        $query .= " AND user = '" . $user . "'";
    }
    $stmt = $conn->prepare($query);
    $stmt->execute();
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

    $query = "SELECT * FROM project";

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
    $query = "SELECT * FROM project WHERE 1=1";
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
        $query = "SELECT project.id as project_id, project.title, project.author,
        project.advisor, project_type.type as type, project.major, major.id, project.abstract, project.date,
        project.file, project.status, project.note, project.approver, project.created_at, project.updated_at,
        ins.ins, ins.pic as ins_pic, project.pic as cover
        FROM project 
        INNER JOIN project_type ON project.type = project_type.id
        INNER JOIN major ON project.major = major.id
        INNER JOIN dept ON major.dept = dept.id
        INNER JOIN faculty ON dept.faculty = faculty.id
        INNER JOIN ins ON faculty.ins = ins.id
        WHERE 1=1 AND project.status = '4'";

        $params = array();

        if (!empty($name)) {
            $query .= " AND (project.id LIKE ? OR project.title LIKE ?)";
            $params[] = "%" . $name . "%";
            $params[] = "%" . $name . "%";
        }
        if (!empty($type)) {
            $query .= " AND project.type = ?";
            $params[] = $type;
        }
        if (!empty($major)) {
            $query .= " AND major.id = ?";
            $params[] = $major;
        }

        $query .= " ORDER BY project.updated_at DESC";

        $stmt = $conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

function SearchManual($name, $user, $conn)
{
    $query = "SELECT * FROM manual WHERE 1=1";
    if (!empty($name)) {
        $query .= " AND (id LIKE '%" . $name . "%' OR title LIKE '%" . $name . "%')";
    }
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
