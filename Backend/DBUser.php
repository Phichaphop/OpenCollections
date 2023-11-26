<?php
require_once 'DBSession.php';

if (isset($_POST['update_username'])) {
    $id = $_SESSION['user_id'];
    $username = $_POST['username'];
    UpdateUsername($id, $username, $conn);
}
function UpdateUsername($id, $username, $conn)
{
    try {
        $stmt = $conn->prepare("UPDATE user SET username=:username WHERE id=:id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        unset($_SESSION['user_id']);
        $_SESSION['success'] = "Username updated complease.";
        echo "<script>window.location.href='../account.php?user_id=$id';</script>";
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../account.php?user_id=$id';</script>";
    }
}

if (isset($_POST['update_tel'])) {
    $id = $_SESSION['user_id'];
    $tel = $_POST['tel'];
    UpdateTel($id, $tel, $conn);
}

function UpdateTel($id, $tel, $conn)
{
    try {
        $stmt = $conn->prepare("UPDATE user SET tel=:tel WHERE id=:id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":tel", $tel);
        $stmt->execute();
        unset($_SESSION['user_id']);
        $_SESSION['success'] = "Tel. updated complease.";
        echo "<script>window.location.href='../account.php?user_id=$id';</script>";
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../account.php?user_id=$id';</script>";
    }
}

if (isset($_POST['update_ins'])) {
    $id = $_SESSION['user_id'];
    $ins = $_POST['ins'];
    UpdateIns($id, $ins, $conn);
}
function UpdateIns($id, $ins, $conn)
{
    try {
        $stmt = $conn->prepare("UPDATE user SET ins=:ins WHERE id=:id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":ins", $ins);
        $stmt->execute();
        unset($_SESSION['user_id']);
        $_SESSION['success'] = "ins updated complease.";
        echo "<script>window.location.href='../account.php?user_id=$id';</script>";
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../account.php?user_id=$id';</script>";
    }
}

if (isset($_POST['update_pass'])) {
    $id = $_SESSION['user_id'];
    $Pass = $_POST['pass'];
    $NewPass = $_POST['new_pass'];
    UpdatePass($id, $Pass, $NewPass, $conn);
}

function UpdatePass($id, $Pass, $NewPass, $conn)
{
    try {
        $stmt = $conn->prepare("SELECT password FROM user WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($Pass, $data['password'])) {
            $passwordHash = password_hash($NewPass, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE user SET password=:pass WHERE id=:id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":pass", $passwordHash);
            $stmt->execute();
            unset($_SESSION['user_id']);
            $_SESSION['success'] = "Password updated complease.";
            echo "<script>window.location.href='../account.php?user_id=$id';</script>";
        } else {
            $_SESSION['error'] = "Password is incorrect";
            echo "<script>window.location.href='../account.php?user_id=$id';</script>";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../account.php?user_id=$id';</script>";
    }
}

if (isset($_POST['update_pass_from_admin'])) {
    $id = $_SESSION['user_id'];
    $NewPass = $_POST['pass'];
    UpdatePassAdmin($id, $NewPass, $conn);
}

function UpdatePassAdmin($id, $NewPass, $conn)
{
    try {
        $passwordHash = password_hash($NewPass, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE user SET password=:pass WHERE id=:id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":pass", $passwordHash);
        $stmt->execute();
        unset($_SESSION['user_id']);
        $_SESSION['success'] = "Password updated complease.";
        echo "<script>window.location.href='../account.php?user_id=$id';</script>";
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../account.php?user_id=$id';</script>";
    }
}

if (isset($_GET['update_role'])) {
    $id = $_SESSION['user_id'];
    $role = $_SESSION['role_update'];
    UpdateRole($MyID, $id, $role, $conn);
}

function UpdateRole($MyID, $id, $role, $conn)
{
    try {
        $stmt = $conn->prepare("UPDATE user SET role=:role WHERE id=:id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":role", $role);
        $stmt->execute();
        unset($_SESSION['user_id']);
        unset($_SESSION['role']);
        $_SESSION['success'] = "Role updated complease.";

        if ($MyID != $id) {
            echo "<script>window.location.href='../account.php?user_id=$id';</script>";
        } else {
            echo "<script>window.location.href='DBSign.php?signout';</script>";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../account.php?user_id=$id';</script>";
    }
}

if (isset($_POST['update_role_from_admin'])) {
    $id = $_SESSION['user_id'];
    $role = $_POST['role'];
    UpdateRoleFormAdmin($MyID, $id, $role, $conn);
}

function UpdateRoleFormAdmin($MyID, $id, $role, $conn)
{
    try {
        $stmt = $conn->prepare("UPDATE user SET role=:role WHERE id=:id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":role", $role);
        $stmt->execute();
        unset($_SESSION['user_id']);
        $_SESSION['success'] = "Role updated complease.";

        if ($MyID != $id) {
            echo "<script>window.location.href='../account.php?user_id=$id';</script>";
        } else {
            echo "<script>window.location.href='DBSign.php?signout';</script>";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../account.php?user_id=$id';</script>";
    }
}

if (isset($_POST['update_email'])) {
    $id = $_SESSION['user_id'];
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else {
        $email = $_POST['email'];
    }
    UpdateEmail($id, $email, $conn);
}

function UpdateEmail($id, $email, $conn)
{
    try {
        $stmt = $conn->prepare("UPDATE user SET email=:email WHERE id=:id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        unset($_SESSION['user_id']);
        $_SESSION['success'] = "Email updated complease.";
        echo "<script>window.location.href='../account.php?user_id=$id';</script>";
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../account.php?user_id=$id';</script>";
    }
}

if (isset($_POST['update_user_pic'])) {
    $id = $_SESSION['user_id'];
    $pic = $_FILES['pic'];
    $allow = array('jpg', 'jpeg', 'png');
    $fileActExt = strtolower(pathinfo($pic['name'], PATHINFO_EXTENSION));
    $fileNew = rand() . "." . $fileActExt;
    $filePath = '../resource/img/profile/' . $fileNew;

    try {
        $stmt = $conn->prepare("SELECT pic FROM user WHERE id = :id");
        $stmt->execute([":id" => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && file_exists('../resource/img/profile/' . $result['pic'])) {
            unlink('../resource/img/profile/' . $result['pic']);
        }

        if (in_array($fileActExt, $allow) && $pic['size'] > 0 && $pic['error'] == 0) {
            if (move_uploaded_file($pic['tmp_name'], $filePath)) {
                $stmt = $conn->prepare("UPDATE user SET pic=:pic WHERE id=:id");
                $stmt->execute([":id" => $id, ":pic" => $fileNew]);
                $_SESSION['success'] = "Profile picture updated successfully.";
            } else {
                $_SESSION['error'] = "Failed to upload file.";
            }
        } else {
            $_SESSION['error'] = ($pic['size'] <= 0) ? "Please select a file." : "File format not supported. Please upload a PDF file.";
        }

    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    header("Location: ../account.php?user_id=$id");
    exit;
}


if (isset($_POST['insert_user'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $role = $_POST['role'];
    InsertUser($username, $pass, $email, $tel, $role, $conn);
}

function InsertUser($username, $pass, $email, $tel, $role, $conn)
{
    try {
        $stmt = $conn->prepare("SELECT email FROM user WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $_SESSION['error'] = "This Email is already in the system.";
            echo "<script>window.location.href='../dash_user.php';</script>";
        } else {
            $passHash = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO user (id, username, password, email, role, tel, pic)
                                        VALUES(NULL, :username, :password, :email, :role, :tel, NULL)");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $passHash);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":role", $role);
            $stmt->bindParam(":tel", $tel);
            $stmt->execute();
            $_SESSION['success'] = "Create user success!.";
            echo "<script>window.location.href='../dash_user.php';</script>";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../dash_user.php';</script>";
    }
}

if (isset($_GET['delete_user'])) {
    $id = $_SESSION['user_id'];
    DeleteFavorites($MyID, $id, $conn);
}

function DeleteFavorites($MyID, $id, $conn)
{
    try {
        $stmt = $conn->prepare("SELECT id FROM favorite WHERE user=:user");
        $stmt->bindParam(":user", $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $stmt = $conn->prepare("DELETE FROM favorite WHERE user=:user");
            $stmt->bindParam(":user", $id, PDO::PARAM_INT);
            $stmt->execute();
            DeleteUser($MyID, $id, $conn);
        } else {
            DeleteUser($MyID, $id, $conn);
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../account.php?user_id=$id';</script>";
    }
}

function DeleteUser($MyID, $id, $conn)
{
    try {
        $stmt = $conn->prepare("SELECT pic FROM user WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data != "") {
            $old_image_path = '../resource/img/profile/' . $data['pic'];
            unlink($old_image_path);
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../account.php?user_id=$id';</script>";
    }

    try {
        $stmt = $conn->prepare("DELETE FROM user WHERE id=:id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($MyID == $id) {
            unset($_SESSION['user_id']);
            $_SESSION['success'] = "Delete user complease.";
            echo "<script>window.location.href='DBSign.php?signout';</script>";
        } else {
            unset($_SESSION['user_id']);
            $_SESSION['success'] = "Delete user complease.";
            echo $id;
            echo "<script>window.location.href='../dash_user.php';</script>";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../account.php?user_id=$id';</script>";
    }
}
?>