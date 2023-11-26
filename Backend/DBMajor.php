<?php
    require_once 'DBSession.php';

    if (isset($_POST['insert_ins'])) {
        $name = $_POST['name'];
        $pic = $_FILES['pic'];
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $pic['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;
        $filePath = '../resource/img/ins_logo/' . $fileNew;
        InsertIns($name, $pic, $allow, $fileActExt, $fileNew, $filePath, $conn);
    }

    function InsertIns($name, $pic, $allow, $fileActExt, $fileNew, $filePath, $conn) {
        try {
            $stmt = $conn->prepare("SELECT ins FROM ins WHERE ins = :ins");
            $stmt->bindParam(":ins", $name);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $_SESSION['error'] = "This ins is already in the system.";
                echo "<script>window.location.href='../dash_ins.php';</script>";
            } else {
                if (in_array($fileActExt, $allow)) {
                    if ($pic['size'] > 0 && $pic['error'] == 0) {
                        if (move_uploaded_file($pic['tmp_name'], $filePath)) {
                                $stmt = $conn->prepare("INSERT INTO ins (id, ins, pic)
                                                        VALUES(NULL, :ins, :pic)");
                                $stmt->bindParam(":ins", $name);
                                $stmt->bindParam("pic", $fileNew);
                                $stmt->execute();
                                $_SESSION['success'] = "Create ins success!.";
                                echo "<script>window.location.href='../dash_ins.php';</script>";
                        } else {
                            $_SESSION['warning'] = "This path not found.";
                            echo "<script>window.location.href='../dash_ins.php';</script>";
                        }
                    } else {
                        $_SESSION['warning'] = "Please upload file.";
                        echo "<script>window.location.href='../dash_ins.php';</script>";
                    }
                } else {
                    $_SESSION['warning'] = "This file type is not supported.";
                    echo "<script>window.location.href='../dash_ins.php';</script>";
                }
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../dash_ins.php';</script>";
        }
    }

    if (isset($_POST['update_pic_ins'])) {
        $id = $_SESSION['ins_id'];
        unset($_SESSION['ins_id']);
        $pic = $_FILES['pic'];
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $pic['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;
        $filePath = '../resource/img/ins_logo/' . $fileNew;
        CheckDelPicIns($id, $pic, $allow, $fileActExt, $fileNew, $filePath, $conn);
    }

    function CheckDelPicIns($id, $pic, $allow, $fileActExt, $fileNew, $filePath, $conn) {
        try {
            $stmt = $conn->prepare("SELECT pic FROM ins WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data['pic'] != "") {
                $old_image_path = '../resource/img/ins_logo/' . $data['pic'];
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                    UpdatePicIns($id, $pic, $allow, $fileActExt, $fileNew, $filePath, $conn);
                } else {
                    $_SESSION['error'] = "Can't delete old picture.";
                    echo "<script>window.location.href='../frm_ins.php?read&ins=$id';</script>";
                }
            } else {
                UpdatePicIns($id, $pic, $allow, $fileActExt, $fileNew, $filePath, $conn);
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../frm_ins.php?read&ins=$id';</script>";
        }
    }

    function UpdatePicIns($id, $pic, $allow, $fileActExt, $fileNew, $filePath, $conn) {
        try {
            if (in_array($fileActExt, $allow)) {
                if ($pic['size'] > 0 && $pic['error'] == 0) {
                    if (move_uploaded_file($pic['tmp_name'], $filePath)) {
                            $stmt = $conn->prepare("UPDATE ins SET pic=:pic WHERE id=:id");
                            $stmt->bindParam("id", $id);
                            $stmt->bindParam("pic", $fileNew);
                            $stmt->execute();
                            $_SESSION['success'] = "Update ins success!.";
                            echo "<script>window.location.href='../frm_ins.php?read&ins=$id';</script>";
                    } else {
                        $_SESSION['warning'] = "This path not found.";
                        echo "<script>window.location.href='../frm_ins.php?read&ins=$id';</script>";
                    }
                } else {
                    $_SESSION['warning'] = "Please upload file.";
                    echo "<script>window.location.href='../frm_ins.php?read&ins=$id';</script>";
                }
            } else {
                $_SESSION['warning'] = "This file type is not supported.";
                echo "<script>window.location.href='../frm_ins.php?read&ins=$id';</script>";
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../frm_ins.php?read&ins=$id';</script>";
        }
    }

    if (isset($_POST['update_detail_ins'])) {
        $id = $_SESSION['ins_id'];
        unset($_SESSION['ins_id']);
        $name = $_POST['name'];
        UpdateDetailIns($id, $name, $conn);
    }

    function UpdateDetailIns($id, $name, $conn) {
        try {
            $stmt = $conn->prepare("UPDATE ins SET ins=:ins WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":ins", $name);
            $stmt->execute();
            unset($_SESSION['ins_id']);
            $_SESSION['success'] = "ins updated successfully.";
            echo "<script>window.location.href='../frm_ins.php?read&ins=$id';</script>";
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../frm_ins.php?read&ins=$id';</script>";
        }
    }

    if (isset($_POST['delete_ins'])) {
        $id = $_SESSION['ins_id'];
        unset($_SESSION['ins_id']);
        DelPicIns($id, $conn);
    }
    
    function DelPicIns($id, $conn) {
        try {
            $stmt = $conn->prepare("SELECT pic FROM ins WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data['pic'] != "") {
                $old_image_path = '../resource/img/ins_logo/' . $data['pic'];
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                    DelIns($id, $conn);
                } else {
                    $_SESSION['error'] = "Can't delete old picture.";
                    echo "<script>window.location.href='../frm_ins.php?read&ins=$id';</script>";
                }
            } else {
                DelIns($id, $conn);
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../frm_ins.php?read&ins=$id';</script>";
        }
    }

    function DelIns($id, $conn) {
        try {
            $stmt = $conn->prepare("DELETE FROM ins WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $_SESSION['success'] = "Delete ins successfully.";
            echo "<script>window.location.href='../dash_ins.php';</script>";
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../dash_ins.php';</script>";
        }
    }

    if (isset($_POST['insert_faculty'])) {
        $name = $_POST['name'];
        $ins = $_POST['ins'];
        InsertFaculty($name, $ins, $conn);
    }

    function InsertFaculty($name, $ins, $conn) {
        try {
            $stmt = $conn->prepare("SELECT faculty FROM faculty WHERE faculty = :faculty AND ins = :ins");
            $stmt->bindParam(":faculty", $name);
            $stmt->bindParam(":ins", $ins);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $_SESSION['error'] = "This Faculty is already in the system.";
                echo "<script>window.location.href='../dash_faculty.php';</script>";
            } else {
                $stmt = $conn->prepare("INSERT INTO faculty (id, faculty, ins)
                                        VALUES(NULL, :faculty, :ins)");
                $stmt->bindParam(":faculty", $name);
                $stmt->bindParam(":ins", $ins);
                $stmt->execute();
                $_SESSION['success'] = "Create faculty success!.";
                echo "<script>window.location.href='../dash_faculty.php';</script>";
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../dash_faculty.php';</script>";
        }
    }

    if (isset($_POST['update_faculty'])) {
        $id = $_SESSION['faculty_id'];
        $name = $_POST['name'];
        $ins = $_POST['ins'];
        UpdateFaculty($id, $name, $ins, $conn);
    }

    function UpdateFaculty($id, $name, $ins, $conn) {
        try {
            $stmt = $conn->prepare("SELECT faculty FROM faculty WHERE faculty = :faculty AND ins = :ins");
            $stmt->bindParam(":faculty", $name);
            $stmt->bindParam(":ins", $ins);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $_SESSION['error'] = "This Faculty is already in the system.";
                echo "<script>window.location.href='../dash_faculty.php';</script>";
            } else {
                $stmt = $conn->prepare("UPDATE faculty SET faculty=:faculty, ins=:ins WHERE id=:id");
                $stmt->bindParam(":id", $id);
                $stmt->bindParam(":faculty", $name);
                $stmt->bindParam(":ins", $ins);
                $stmt->execute();
                unset($_SESSION['faculty_id']);
                $_SESSION['success'] = "Faculty updated successfully.";
                echo "<script>window.location.href='../dash_faculty.php';</script>";
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../dash_faculty.php';</script>";
        }
    }

    if (isset($_POST['delete_faculty'])) {
        $faculty_id = $_SESSION['faculty_id'];
        DeleteFaculty($faculty_id, $conn);
    }
    
    function DeleteFaculty($faculty_id, $conn) {
        try {
            $stmt = $conn->prepare("DELETE FROM faculty WHERE id=:id");
            $stmt->bindParam(":id", $faculty_id);
            $stmt->execute();
            unset($_SESSION['faculty_id']);
            $_SESSION['success'] = "Delete faculty successfully.";
            echo "<script>window.location.href='../dash_faculty.php';</script>";
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../dash_faculty.php';</script>";
        }
    }

    if (isset($_POST['insert_dept'])) {
        $name = $_POST['name'];
        $faculty = $_POST['faculty'];
        InsertDept($name, $faculty, $conn);
    }

    function InsertDept($name, $faculty, $conn) {
        try {
            $stmt = $conn->prepare("SELECT dept FROM dept WHERE dept = :dept AND faculty = :faculty");
            $stmt->bindParam(":dept", $name);
            $stmt->bindParam(":faculty", $faculty);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $_SESSION['error'] = "This Department is already in the system.";
                echo "<script>window.location.href='../dash_dept.php';</script>";
            } else {
                $stmt = $conn->prepare("INSERT INTO dept (id, dept, faculty)
                                        VALUES(NULL, :dept, :faculty)");
                $stmt->bindParam(":dept", $name);
                $stmt->bindParam(":faculty", $faculty);
                $stmt->execute();
                $_SESSION['success'] = "Create Department success!.";
                echo "<script>window.location.href='../dash_dept.php';</script>";
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../dash_dept.php';</script>";
        }
    }

    if (isset($_POST['update_dept'])) {
        $id = $_SESSION['dept_id'];
        $name = $_POST['name'];
        $faculty = $_POST['faculty'];
        UpdateDept($id, $name, $faculty, $conn);
    }

    function UpdateDept($id, $name, $faculty, $conn) {
        try {
            $stmt = $conn->prepare("SELECT dept FROM dept WHERE dept = :dept AND faculty = :faculty");
            $stmt->bindParam(":dept", $name);
            $stmt->bindParam(":faculty", $faculty);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $_SESSION['error'] = "This Department is already in the system.";
                echo "<script>window.location.href='../dash_dept.php';</script>";
            } else {
                $stmt = $conn->prepare("UPDATE dept SET dept=:dept, faculty=:faculty WHERE id=:id");
                $stmt->bindParam(":id", $id);
                $stmt->bindParam(":dept", $name);
                $stmt->bindParam(":faculty", $faculty);
                $stmt->execute();
                unset($_SESSION['dept_id']);
                $_SESSION['success'] = "Department updated successfully.";
                echo "<script>window.location.href='../dash_dept.php';</script>";
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../dash_dept.php';</script>";
        }
    }

    if (isset($_POST['delete_dept'])) {
        $dept_id = $_SESSION['dept_id'];
        DeleteDept($dept_id, $conn);
    }
    
    function DeleteDept($dept_id, $conn) {
        try {
            $stmt = $conn->prepare("DELETE FROM dept WHERE id=:id");
            $stmt->bindParam(":id", $dept_id);
            $stmt->execute();
            unset($_SESSION['dept_id']);
            $_SESSION['success'] = "Delete department successfully.";
            echo "<script>window.location.href='../dash_dept.php';</script>";
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../dash_dept.php';</script>";
        }
    }

    if (isset($_POST['insert_major'])) {
        $name = $_POST['name'];
        $degree = $_POST['degree'];
        $dept = $_POST['dept'];
        InsertMajor($name, $degree, $dept, $conn);
    }

    function InsertMajor($name, $degree, $dept, $conn) {
        try {
            $stmt = $conn->prepare("SELECT major FROM major WHERE major = :major AND degree = :degree AND dept = :dept");
            $stmt->bindParam(":major", $name);
            $stmt->bindParam(":degree", $degree);
            $stmt->bindParam(":dept", $dept);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $_SESSION['error'] = "This Major is already in the system.";
                echo "<script>window.location.href='../dash_major.php';</script>";
            } else {
                $stmt = $conn->prepare("INSERT INTO major (id, major, degree, dept)
                                        VALUES(NULL, :major, :degree ,:dept)");
                $stmt->bindParam(":major", $name);
                $stmt->bindParam(":degree", $degree);
                $stmt->bindParam(":dept", $dept);
                $stmt->execute();
                $_SESSION['success'] = "Create Major success!.";
                echo "<script>window.location.href='../dash_major.php';</script>";
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../dash_major.php';</script>";
        }
    }

    if (isset($_POST['update_major'])) {
        $id = $_SESSION['major_id'];
        $name = $_POST['name'];
        $degree = $_POST['degree'];
        $dept = $_POST['dept'];
        UpdateMajor($id, $name, $degree, $dept, $conn) ;
    }

    function UpdateMajor($id, $name, $degree, $dept, $conn) {
        try {
            $stmt = $conn->prepare("SELECT major FROM major WHERE major = :major AND degree = :degree AND dept = :dept");
            $stmt->bindParam(":major", $name);
            $stmt->bindParam(":degree", $degree);
            $stmt->bindParam(":dept", $dept);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $_SESSION['error'] = "This Major is already in the system.";
                echo "<script>window.location.href='../dash_major.php';</script>";
            } else {
            $stmt = $conn->prepare("UPDATE major SET major=:major, degree=:degree, dept=:dept WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":major", $name);
            $stmt->bindParam(":degree", $degree);
            $stmt->bindParam(":dept", $dept);
            $stmt->execute();
            unset($_SESSION['major_id']);
            $_SESSION['success'] = "Major updated successfully.";
            echo "<script>window.location.href='../dash_major.php';</script>";
        } 
    }catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../dash_major.php';</script>";
        }
    }

    if (isset($_POST['delete_major'])) {
        $major_id = $_SESSION['major_id'];
        DeleteMajor($major_id, $conn);
    }
    
    function DeleteMajor($major_id, $conn) {
        try {
            $stmt = $conn->prepare("DELETE FROM major WHERE id=:id");
            $stmt->bindParam(":id", $major_id);
            $stmt->execute();
            unset($_SESSION['major_id']);
            $_SESSION['success'] = "Delete Major successfully.";
            echo "<script>window.location.href='../dash_major.php';</script>";
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../dash_major.php';</script>";
        }
    }
?>