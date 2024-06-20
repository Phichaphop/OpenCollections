<?php
function GetFavorite($MyID, $conn)
{
    // ปรับคำสั่ง SQL ให้ถูกต้อง
    $sql = "SELECT opc_favorite.project, opc_favorite.user, opc_project.id, opc_project.title, opc_project.updated_at
            FROM opc_favorite
            INNER JOIN opc_project ON opc_favorite.project = opc_project.id 
            WHERE opc_favorite.user = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $MyID, PDO::PARAM_INT);
    $stmt->execute();
    $GetFavorite = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $GetFavorite;
}

function CheckFavorite($opc_project, $user, $conn)
{
    $sql = "SELECT * FROM opc_favorite WHERE project = :project AND user = :user";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":project", $opc_project, PDO::PARAM_INT);
    $stmt->bindParam(":user", $user, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}
