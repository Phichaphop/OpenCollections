<?php
function reportProject($conn) {
    try {

        // เตรียมคำสั่ง SQL
        $stmt = $conn->prepare("SELECT p.id, p.title, u1.username AS author, 
        u2.username AS advisor, mj.major, dp.dept, fc.faculty, 
        ins.ins, pt.type, ps.status, p.date, p.note
        FROM opc_project p
        JOIN opc_user u1 ON p.author = u1.id
        JOIN opc_user u2 ON p.advisor = u2.id
        JOIN opc_major mj ON p.major = mj.id
        JOIN opc_dept dp ON mj.dept = dp.id
        JOIN opc_faculty fc ON dp.faculty = fc.id
        JOIN opc_ins ins ON fc.ins = ins.id
        JOIN opc_project_type pt ON p.type = pt.id
        JOIN opc_project_status ps ON p.status = ps.id");

        // execute query
        $stmt->execute();

        // ตรวจสอบผลลัพธ์ ถ้ามีผลลัพธ์ก็ให้ส่งกลับเป็นอาร์เรย์
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            return $results;
        } else {
            throw new Exception("No records found.");
        }
        
    } catch (PDOException $e) {
        // log ข้อความข้อผิดพลาดของ PDO
        error_log("PDO Error: " . $e->getMessage());
    } catch (Exception $e) {
        // log ข้อความข้อผิดพลาดทั่วไป
        error_log("General Error: " . $e->getMessage());
    }
}
?>
