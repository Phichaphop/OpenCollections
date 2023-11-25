<?php
    function GetUserByID($id, $conn) {
        $stmt = $conn->prepare("SELECT user.id, user.username, user.email, user.pic, user.tel, user_role.role, user.created_at, user.updated_at	 FROM user INNER JOIN user_role on user.role=user_role.id WHERE user.id = :id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    function GetNameUserByID($id, $conn) {
        $stmt = $conn->query("SELECT username FROM user WHERE id = '$id'");
        $stmt->execute();
        $GetNameUserByID = $stmt->fetch(PDO::FETCH_ASSOC);
        return $GetNameUserByID['username'];
    }

    function UserPic($id) {
        $conn = DBConnect();
        $stmt = $conn->query("SELECT pic FROM user WHERE id = $id");
        $stmt->execute();
        $UserPic = $stmt->fetch(PDO::FETCH_ASSOC);
        return $UserPic['pic'];
    }

    function GetEmail($user_id) {
        $conn = DBConnect();
        $stmt = $conn->query("SELECT email FROM user WHERE id = $user_id");
        $stmt->execute();
        $GetEmail = $stmt->fetch(PDO::FETCH_ASSOC);
        return $GetEmail['email'];
    }

    function UserDuplicateEmail($email) {
        $conn = DBConnect();
        $stmt = $conn->prepare("SELECT email FROM user WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return false;
        } else {
            return true;
        }
    }

    function GetRoleData($conn) {
        $stmt = $conn->query("SELECT * FROM user_role");
        $stmt->execute();
        $GetRoleData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetRoleData;
    }

    function GetRoleByName($role, $conn) {
        $stmt = $conn->prepare("SELECT id, role FROM user_role WHERE role = '$role'");
        $stmt->execute();
        $GetRoleByName = $stmt->fetch(PDO::FETCH_ASSOC);
        return $GetRoleByName;
    }

    function GetRoleEx($id, $conn) {
        $stmt = $conn->query("SELECT id, role FROM user_role WHERE id <> $id");
        $stmt->execute();
        $GetRoleEx = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetRoleEx;
    }