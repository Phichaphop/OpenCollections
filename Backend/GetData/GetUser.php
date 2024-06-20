<?php
    function GetUserByID($id, $conn) {
        $stmt = $conn->prepare("SELECT opc_user.id, opc_user.username, opc_user.email,
        opc_user.pic, opc_user.tel, opc_user_role.role, opc_user.created_at, opc_user.updated_at
        FROM opc_user
        INNER JOIN opc_user_role ON opc_user.role=opc_user_role.id
        WHERE opc_user.id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    function GetNameUserByID($id, $conn) {
        $stmt = $conn->prepare("SELECT username FROM opc_user WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $GetNameUserByID = $stmt->fetch(PDO::FETCH_ASSOC);
        return $GetNameUserByID['username'];
    }

    function UserPic($id, $conn) {
        $stmt = $conn->prepare("SELECT pic FROM opc_user WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $UserPic = $stmt->fetch(PDO::FETCH_ASSOC);
        return $UserPic['pic'];
    }

    function GetEmail($id, $conn) {
        $stmt = $conn->prepare("SELECT email FROM opc_user WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $GetEmail = $stmt->fetch(PDO::FETCH_ASSOC);
        return $GetEmail['email'];
    }

    function UserDuplicateEmail($email, $conn) {
        $stmt = $conn->prepare("SELECT email FROM opc_user WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return !$result; // Return true if no duplicate, false if duplicate
    }

    function GetRoleData($conn) {
        $stmt = $conn->query("SELECT * FROM opc_user_role");
        $stmt->execute();
        $GetRoleData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetRoleData;
    }

    function GetRoleByName($role, $conn) {
        $stmt = $conn->prepare("SELECT id, role FROM opc_user_role WHERE role = :role");
        $stmt->bindParam(":role", $role, PDO::PARAM_STR);
        $stmt->execute();
        $GetRoleByName = $stmt->fetch(PDO::FETCH_ASSOC);
        return $GetRoleByName;
    }

    function GetRoleEx($id, $conn) {
        $stmt = $conn->prepare("SELECT id, role FROM opc_user_role WHERE id <> :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $GetRoleEx = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetRoleEx;
    }
?>
