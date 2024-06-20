<?php
function GetManualByID($id, $conn) {
    try {
        $stmt = $conn->prepare("SELECT * FROM opc_manual WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        // Handle exceptions if needed (log, throw, etc.)
        error_log("Error in GetManualByID: " . $e->getMessage());
        return false; // Or handle the error in another way
    }
}
?>
