<?php
    function GetRequestByID($id, $conn) {
        $stmt = $conn->query("SELECT opc_request.id, opc_request.title, opc_request.detail, 
        opc_request.user, opc_request.created_at, opc_request.updated_at/*,
        user.username, user_role.role*/ FROM opc_request
        /*INNER JOIN user on opc_request.user = user.id
        INNER JOIN user_role on user.role = user_role.id*/
        WHERE opc_request.id = $id");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
?>