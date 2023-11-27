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

function SearchFavorite($name, $MyID, $conn)
{
    $query = "SELECT favorite.project, project.id, project.title, 
        project.author, project_type.type as type, project.major, project.date,
        ins.ins, ins.pic as ins_pic, project.pic as cover
        FROM favorite 
        INNER JOIN project on favorite.project = project.id
        INNER JOIN project_type on project.type = project_type.id
        INNER JOIN major on project.major = major.id
        INNER JOIN dept on major.dept = dept.id
        INNER JOIN faculty on dept.faculty = faculty.id
        INNER JOIN ins on faculty.ins = ins.id
        WHERE favorite.user = $MyID";
    if (!empty($name)) {
        $query .= " AND (project.title LIKE '%" . $name . "%')";
    }
    if (!empty($type)) {
        $query .= " AND project.type = '" . $type . "'";
    }
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

function SearchProject($name, $type, $id, $approver, $status, $role, $conn)
{
    $conditions = [];

    if ($role != '1') {
        $conditions[] = "status = :status";
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

    $query = "SELECT * FROM project";

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = $conn->prepare($query);

    if (!empty($name)) {
        $stmt->bindValue(':name', '%' . $name . '%', PDO::PARAM_STR);
    }

    if ($role != '1') {
        $stmt->bindValue(':status', $status, PDO::PARAM_INT);
        if (!empty($id)) {
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        }
    }

    if (!empty($type)) {
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function SearchMyProject($name, $type, $user, $conn)
{
    $query = "SELECT * FROM project WHERE 1=1";
    if (!empty($name)) {
        $query .= " AND (id LIKE '%" . $name . "%' OR title LIKE '%" . $name . "%')";
    }
    if (!empty($type)) {
        $query .= " AND type = '" . $type . "'";
    }
    if (!empty($user)) {
        $query .= " AND author = '" . $user . "'";
    }
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function SearchProjectApprove($name, $type, $conn)
{
    $query = "SELECT project.id, project.title, project.author,
        project.advisor, project_type.type as type, project.major, project.abstract, project.date,
        project.file, project.status, project.note, project.approver, project.created_at, project.updated_at,
        ins.ins, ins.pic as ins_pic, project.pic as cover
        FROM project 
        INNER JOIN project_type on project.type = project_type.id
        INNER JOIN major on project.major = major.id
        INNER JOIN dept on major.dept = dept.id
        INNER JOIN faculty on dept.faculty = faculty.id
        INNER JOIN ins on faculty.ins = ins.id
        WHERE 1=1 AND status = '4'";
    if (!empty($name)) {
        $query .= " AND (id LIKE '%" . $name . "%' OR title LIKE '%" . $name . "%')";
    }
    if (!empty($type)) {
        $query .= " AND type = '" . $type . "'";
    }
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>