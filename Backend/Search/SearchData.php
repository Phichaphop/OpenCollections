<?php
    function SearchUser($name, $type, $conn) {
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

    function SearchIns($name, $conn) {
        $query = "SELECT * FROM institute WHERE 1=1";
        if (!empty($name)) {
            $query .= " AND (id LIKE '%" . $name . "%' OR ins LIKE '%" . $name . "%')";
        }
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function SearchFaculty($name, $type, $conn) {
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

    function SearchDept($name, $type, $conn) {
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

    function SearchMajor($name, $type, $conn) {
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

    function SearchProjectType($name, $conn) {
        $query = "SELECT * FROM project_type WHERE 1=1";
        if (!empty($name)) {
            $query .= " AND (id LIKE '%" . $name . "%' OR type LIKE '%" . $name . "%')";
        }
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function SearchProject($name, $type, $user, $conn) {
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

    function SearchProjectWait($name, $type, $id, $conn) {
        $query = "SELECT * FROM project WHERE 1=1 AND status = '2'";
        if (!empty($name)) {
            $query .= " AND (id LIKE '%" . $name . "%' OR title LIKE '%" . $name . "%)";
        }
        if (!empty($type)) {
            $query .= " AND type = '" . $type . "'";
        }
        if (!empty($id)) {
            $query .= " AND advisor = '" . $id . "'";
        }
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function SearchProjectApprove($name, $type, $conn) {
        $query = "SELECT project.id, project.title, project.author,
        project.advisor, project_type.type as type, project.major, project.abstract, project.date,
        project.file, project.status, project.note, project.created_at, project.updated_at,
        institute.ins, institute.pic FROM project 
        INNER JOIN project_type on project.type = project_type.id
        INNER JOIN major on project.major = major.id
        INNER JOIN dept on major.dept = dept.id
        INNER JOIN faculty on dept.faculty = faculty.id
        INNER JOIN institute on faculty.ins = institute.id
        WHERE 1=1 AND status = '3'";
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

    function SearchFavorite($name, $MyID, $conn) {
        $query = "SELECT favorite.project, project.id, project.title, 
        project.author, project_type.type as type, project.major, project.date,
        institute.ins, institute.pic
        FROM favorite 
        INNER JOIN project on favorite.project = project.id
        INNER JOIN project_type on project.type = project_type.id
        INNER JOIN major on project.major = major.id
        INNER JOIN dept on major.dept = dept.id
        INNER JOIN faculty on dept.faculty = faculty.id
        INNER JOIN institute on faculty.ins = institute.id
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

    function SearchRequest($name, $user, $conn) {
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
?>