<?php
    function GetProjectData($conn) {
        $stmt = $conn->query("SELECT * FROM opc_project");
        $stmt->execute();
        $GetProjectData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetProjectData;
    }

    function GetProjectEx($id, $conn) {
        $stmt = $conn->query("SELECT id, type FROM opc_project WHERE id <> $id");
        $stmt->execute();
        $GetProjectEx = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetProjectEx;
    }

    function GetAuthorByID($id, $conn) {
        $stmt = $conn->query("SELECT id, username FROM opc_user WHERE id = $id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetNameAuthorByID($id, $conn) {
        $stmt = $conn->query("SELECT username FROM opc_user WHERE id = $id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['username'];
    }

    function GetAuthorEx($id, $conn) {
        $stmt = $conn->query("SELECT id, username FROM opc_user WHERE id <> $id");
        $stmt->execute();
        $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetAdvisor($conn) {
        $stmt = $conn->query("SELECT id, username FROM opc_user WHERE role = '1' OR role = '3'");
        $stmt->execute();
        $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetAdvisorByID($id, $conn) {
        $stmt = $conn->query("SELECT id, username FROM opc_user WHERE id = $id");
        $stmt->execute();
        $data= $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetAdvisorEx($id, $conn) {
        $stmt = $conn->query("SELECT id, username FROM opc_user WHERE id <> $id");
        $stmt->execute();
        $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetProjectWait($conn) {
        $stmt = $conn->query("SELECT * FROM opc_project_status");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetApprove($conn) {
        $stmt = $conn->query("SELECT * FROM opc_project_status");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetProject($conn) {
        $stmt = $conn->prepare("SELECT opc_project.id, opc_project.title, opc_project.author,
        opc_project.advisor,opc_project.type, opc_project.major, opc_project.abstract, opc_project.date,
        opc_project.file, opc_project.status, opc_project.note, opc_project.created_at, opc_project.updated_at,
        opc_ins.ins, opc_ins.pic FROM opc_project 
        INNER JOIN opc_major on opc_project.major = opc_major.id
        INNER JOIN opc_dept on opc_major.dept = opc_dept.id
        INNER JOIN opc_faculty on opc_dept.faculty = opc_faculty.id
        INNER JOIN opc_ins on opc_faculty.ins = opc_ins.id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetProjectByID($id, $conn) {
        try {
            $stmt = $conn->prepare("SELECT opc_project.id, opc_project.title, opc_project.author as author_id, 
            author.username as author, advisor.username as advisor, advisor.id as advisor_id, approver.username as approver,
            project_type.type as type, opc_major.major, opc_project.abstract, opc_project.pic as cover,
            opc_project.date, opc_project.file, opc_project.status as status, opc_project.note, opc_project.created_at, opc_project.updated_at,
            opc_ins.ins, opc_ins.pic as ins_pic
            FROM opc_project 
            INNER JOIN opc_user as author on opc_project.author = author.id
            INNER JOIN opc_user as advisor on opc_project.advisor = advisor.id
            INNER JOIN opc_user as approver on opc_project.approver = approver.id
            INNER JOIN opc_project_type on opc_project.type = project_type.id
            INNER JOIN opc_project_status on opc_project.status = project_status.id
            INNER JOIN opc_major on opc_project.major = opc_major.id
            INNER JOIN opc_dept on opc_major.dept = opc_dept.id
            INNER JOIN opc_faculty on opc_dept.faculty = opc_faculty.id
            INNER JOIN opc_ins on opc_faculty.ins = opc_ins.id
            WHERE opc_project.id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if(empty($data)) {
                return "No project found with ID: $id";
            } else {
                return $data;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function GetProjectPicByID($id, $conn) {
        $stmt = $conn->prepare("SELECT id, pic FROM opc_project WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function GetProjectDataByID($id, $conn) {
        $stmt = $conn->query("SELECT * FROM opc_project WHERE id = $id");
        $stmt->execute();
        $GetProjectByName = $stmt->fetch(PDO::FETCH_ASSOC);
        return $GetProjectByName;
    }

    function GetApprover($conn) {
        $stmt = $conn->query("SELECT id, username FROM opc_user WHERE role = '1' OR role = '2'");
        $stmt->execute();
        $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetApproverByID($id, $conn) {
        $stmt = $conn->query("SELECT id, username FROM opc_user WHERE id = $id");
        $stmt->execute();
        $data= $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetApproverEx($id, $conn) {
        $stmt = $conn->query("SELECT id, username FROM opc_user WHERE id <> $id");
        $stmt->execute();
        $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
?>