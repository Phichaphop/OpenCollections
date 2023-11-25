<?php
    function GetRequestByID($id, $conn) {
        $stmt = $conn->query("SELECT request.id, request.title, request.detail, 
        request.user, request.created_at, request.updated_at/*,
        user.username, user_role.role*/ FROM request
        /*INNER JOIN user on request.user = user.id
        INNER JOIN user_role on user.role = user_role.id*/
        WHERE request.id = $id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
?>