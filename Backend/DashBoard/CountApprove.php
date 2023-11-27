<?php
function CountTotalApprove($status, $conn)
{
    try {
        if (!$status) {
            $stmt = $conn->query("SELECT id FROM project");
        } else {
            $stmt = $conn->prepare("SELECT id FROM project WHERE status = :status");
            $stmt->bindParam(":status", $status, PDO::PARAM_INT);
        }
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function CountProject($id, $person, $status, $conn)
{
    try {
        if (!$status) {
            $stmt = $conn->prepare("SELECT id FROM project WHERE $person = :id");
        } else {
            $stmt = $conn->prepare("SELECT id FROM project WHERE $person = :id AND status = :status");
            $stmt->bindParam(":status", $status, PDO::PARAM_INT);
        }
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>