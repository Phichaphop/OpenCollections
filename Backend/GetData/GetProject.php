<?php
    function GetProjectData($conn) {
        $stmt = $conn->query("SELECT * FROM project");
        $stmt->execute();
        $GetProjectData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetProjectData;
    }

    function GetProjectEx($id, $conn) {
        $stmt = $conn->query("SELECT id, type FROM project WHERE id <> $id");
        $stmt->execute();
        $GetProjectEx = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetProjectEx;
    }

    function GetAuthorByID($id, $conn) {
        $stmt = $conn->query("SELECT id, username FROM user WHERE id = $id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetNameAuthorByID($id, $conn) {
        $stmt = $conn->query("SELECT username FROM user WHERE id = $id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['username'];
    }

    function GetAuthorEx($id, $conn) {
        $stmt = $conn->query("SELECT id, username FROM user WHERE id <> $id");
        $stmt->execute();
        $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetAdvisor($conn) {
        $stmt = $conn->query("SELECT id, username FROM user WHERE role = '1' OR role = '2'");
        $stmt->execute();
        $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetAdvisorByID($id, $conn) {
        $stmt = $conn->query("SELECT id, username FROM user WHERE id = $id");
        $stmt->execute();
        $data= $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetAdvisorEx($id, $conn) {
        $stmt = $conn->query("SELECT id, username FROM user WHERE id <> $id");
        $stmt->execute();
        $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetProjectWait($conn) {
        $stmt = $conn->query("SELECT * FROM project_status");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetApprove($conn) {
        $stmt = $conn->query("SELECT * FROM project_status");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetProject($conn) {
        $stmt = $conn->prepare("SELECT project.id, project.title, project.author,
        project.advisor,project.type, project.major, project.abstract, project.date,
        project.file, project.status, project.note, project.created_at, project.updated_at,
        ins.ins, ins.pic FROM project 
        INNER JOIN major on project.major = major.id
        INNER JOIN dept on major.dept = dept.id
        INNER JOIN faculty on dept.faculty = faculty.id
        INNER JOIN ins on faculty.ins = ins.id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetProjectByID($id, $conn) {
        $stmt = $conn->prepare("SELECT project.id, project.title, project.author as author_id, 
        author.username as author, advisor.username as advisor, approver.username as approver,
        project_type.type as type, major.major, project.abstract, project.pic,
        project.date, project.file, project.status as status, project.note, project.created_at, project.updated_at,
        ins.ins, ins.pic 
        FROM project 
        INNER JOIN user as author on project.author = author.id
        INNER JOIN user as advisor on project.advisor = advisor.id
        INNER JOIN user as approver on project.approver = approver.id
        INNER JOIN project_type on project.type = project_type.id
        INNER JOIN project_status on project.status = project_status.id
        INNER JOIN major on project.major = major.id
        INNER JOIN dept on major.dept = dept.id
        INNER JOIN faculty on dept.faculty = faculty.id
        INNER JOIN ins on faculty.ins = ins.id
        WHERE project.id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetProjectPicByID($id, $conn) {
        $stmt = $conn->prepare("SELECT id, pic FROM project WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function GetProjectDataByID($id, $conn) {
        $stmt = $conn->query("SELECT * FROM project WHERE id = $id");
        $stmt->execute();
        $GetProjectByName = $stmt->fetch(PDO::FETCH_ASSOC);
        return $GetProjectByName;
    }

    function GetApprover($conn) {
        $stmt = $conn->query("SELECT id, username FROM user WHERE role = '1' OR role = '3'");
        $stmt->execute();
        $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetApproverByID($id, $conn) {
        $stmt = $conn->query("SELECT id, username FROM user WHERE id = $id");
        $stmt->execute();
        $data= $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetApproverEx($id, $conn) {
        $stmt = $conn->query("SELECT id, username FROM user WHERE id <> $id");
        $stmt->execute();
        $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
?>