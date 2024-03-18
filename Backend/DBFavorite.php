<?php
    require_once 'config.php';

    if(isset($_GET['project']) && isset($_GET['favorite'])) {
        $project = $_GET['project'];
        CheckFavoriteData($project, $MyID, $conn);
    }
    
        function CheckFavoriteData($project, $user, $conn) {
            try {
                $stmt = $conn->prepare("SELECT * FROM favorite WHERE project = :project AND user = :user");
                $stmt->bindParam(":project", $project);
                $stmt->bindParam(":user", $user);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($stmt->rowCount() <= 0) {
                    AddFavorite($project, $user, $conn);
                } else {
                    UnFavorite($data['id'], $conn);
                }
            } catch (PDOException $e) {
                $_SESSION['error'] = $e->getMessage();
                echo "<script>window.location.href='../dash_favorite.php';</script>";
            }
        }

        function AddFavorite($project, $user, $conn) {
            try {
                $stmt = $conn->prepare("INSERT INTO favorite (project, user) VALUES (:project, :user)");
                $stmt->bindParam(":project", $project);
                $stmt->bindParam(":user", $user);
                $stmt->execute();
                $_SESSION['success'] = "Project have favorite.";
                echo "<script>window.location.href='../dash_favorite.php';</script>";
            } catch (PDOException $e) {
                $_SESSION['error'] = $e->getMessage();
                echo "<script>window.location.href='../dash_favorite.php';</script>";
            }
        }

        function UnFavorite($id, $conn) {
            try {
                $stmt = $conn->prepare("DELETE FROM favorite WHERE id=:id");
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                $_SESSION['warning'] = "Unfavorite complete.";
                echo "<script>window.location.href='../dash_favorite.php';</script>";
            } catch (PDOException $e) {
                $_SESSION['error'] = $e->getMessage();
                echo "<script>window.location.href='../dash_favorite.php';</script>";
            }
        }
?>