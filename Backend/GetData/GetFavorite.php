<?php
    function GetFavorite($MyID, $conn) {
        $stmt = $conn->prepare("SELECT favorite.project, favorite.user, project.id, project.title, project.updated_at FROM favorite INNER JOIN  on favorite.project=project.id  WHERE favorite.user = :id");
        $stmt->bindParam(":id",$MyID);
        $stmt->execute();
        $GetFavorite = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $GetFavorite;
    }

    function CheckFavorite($project, $user, $conn) {
        $stmt = $conn->prepare("SELECT * FROM favorite WHERE project = :project AND user = :user");
        $stmt->bindParam(":project", $project);
        $stmt->bindParam(":user", $user);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
?>