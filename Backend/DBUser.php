<?php
    require_once 'DBSession.php';
    
    if (isset($_POST['update_username'])) {
        $user_id = $_SESSION['user_id'];
        $username = $_POST['username'];
        UpdateUsername($user_id, $username, $conn);
    }
    function UpdateUsername($user_id, $username, $conn) {
        try {
            $stmt = $conn->prepare("UPDATE user SET username=:username WHERE id=:id");
            $stmt->bindParam(":id", $user_id);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            unset($_SESSION['user_id']);
            $_SESSION['success'] = "Username updated complease.";
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        }
    }

    if (isset($_POST['update_tel'])) {
        $user_id = $_SESSION['user_id'];
        $tel = $_POST['tel'];
        UpdateTel($user_id, $tel, $conn);
    }

    function UpdateTel($user_id, $tel, $conn) {
        try {
            $stmt = $conn->prepare("UPDATE user SET tel=:tel WHERE id=:id");
            $stmt->bindParam(":id", $user_id);
            $stmt->bindParam(":tel", $tel);
            $stmt->execute();
            unset($_SESSION['user_id']);
            $_SESSION['success'] = "Tel. updated complease.";
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        }
    }

    if (isset($_POST['update_ins'])) {
        $user_id = $_SESSION['user_id'];
        $ins = $_POST['ins'];
        UpdateIns($user_id, $ins, $conn);
    }
    function UpdateIns($user_id, $ins, $conn) {
        try {
            $stmt = $conn->prepare("UPDATE user SET ins=:ins WHERE id=:id");
            $stmt->bindParam(":id", $user_id);
            $stmt->bindParam(":ins", $ins);
            $stmt->execute();
            unset($_SESSION['user_id']);
            $_SESSION['success'] = "Institute updated complease.";
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        }
    }

    if (isset($_POST['update_pass'])) {
        $user_id = $_SESSION['user_id'];
        $Pass = $_POST['pass'];
        $NewPass = $_POST['new_pass'];
        UpdatePass($user_id, $Pass, $NewPass, $conn);
    }
    
    function UpdatePass($user_id, $Pass, $NewPass, $conn) {
        try {
            $stmt = $conn->prepare("SELECT password FROM user WHERE id = :id");
            $stmt->bindParam(":id", $user_id);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($Pass, $data['password'])) {
                $passwordHash = password_hash($NewPass, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("UPDATE user SET password=:pass WHERE id=:id");
                $stmt->bindParam(":id", $user_id);
                $stmt->bindParam(":pass", $passwordHash);
                $stmt->execute();
                unset($_SESSION['user_id']);
                $_SESSION['success'] = "Password updated complease.";
                echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
            } else {
                $_SESSION['error'] = "Password is incorrect";
                echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        }
    }

    if (isset($_POST['update_pass_from_admin'])) {
        $user_id = $_SESSION['user_id'];
        $NewPass = $_POST['pass'];
        UpdatePassAdmin($user_id, $NewPass, $conn);
    }

    function UpdatePassAdmin($user_id, $NewPass, $conn) {
        try {
            $passwordHash = password_hash($NewPass, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE user SET password=:pass WHERE id=:id");
            $stmt->bindParam(":id", $user_id);
            $stmt->bindParam(":pass", $passwordHash);
            $stmt->execute();
            unset($_SESSION['user_id']);
            $_SESSION['success'] = "Password updated complease.";
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        }
    }

    if (isset($_GET['update_role'])) {
        $user_id = $_SESSION['user_id'];
        $role = $_SESSION['role_update'];
        UpdateRole($MyID, $user_id, $role, $conn);
    }

    function UpdateRole($MyID, $user_id, $role, $conn) {
        try {
            $stmt = $conn->prepare("UPDATE user SET role=:role WHERE id=:id");
            $stmt->bindParam(":id", $user_id);
            $stmt->bindParam(":role", $role);
            $stmt->execute();
            unset($_SESSION['user_id']);
            unset($_SESSION['role']);
            $_SESSION['success'] = "Role updated complease.";

            if ($MyID != $user_id) {
                echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
            } else {
                echo "<script>window.location.href='DBSign.php?signout';</script>";
            }

        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        }
    }

    if (isset($_POST['update_role_from_admin'])) {
        $user_id = $_SESSION['user_id'];
        $role = $_POST['role'];
        UpdateRoleFormAdmin($MyID, $user_id, $role, $conn);
    }

    function UpdateRoleFormAdmin($MyID, $user_id, $role, $conn) {
        try {
            $stmt = $conn->prepare("UPDATE user SET role=:role WHERE id=:id");
            $stmt->bindParam(":id", $user_id);
            $stmt->bindParam(":role", $role);
            $stmt->execute();
            unset($_SESSION['user_id']);
            $_SESSION['success'] = "Role updated complease.";

            if ($MyID != $user_id) {
                echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
            } else {
                echo "<script>window.location.href='DBSign.php?signout';</script>";
            }

        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        }
    }

    if (isset($_POST['update_email'])) {
        $user_id = $_SESSION['user_id'];
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        } else {
            $email = $_POST['email'];
        }
        UpdateEmail($user_id, $email, $conn);
    }

    function UpdateEmail($user_id, $email, $conn) {
        try {
            $stmt = $conn->prepare("UPDATE user SET email=:email WHERE id=:id");
            $stmt->bindParam(":id", $user_id);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            unset($_SESSION['user_id']);
            $_SESSION['success'] = "Email updated complease.";
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        }
    }

    if (isset($_POST['update_user_pic'])) {
        $user_id = $_SESSION['user_id'];
        $pic = $_FILES['pic'];
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $pic['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;
        $filePath = '../resource/img/profile/' . $fileNew;
        UpdateUserPicture($user_id, $pic, $allow, $fileActExt, $fileNew, $filePath, $conn);
    }

    function UpdateUserPicture($user_id, $pic, $allow, $fileActExt, $fileNew, $filePath, $conn) {
        if (in_array($fileActExt, $allow)) {
            if ($pic['size'] > 0 && $pic['error'] == 0) {
                $stmt = $conn->prepare("SELECT pic FROM user WHERE id = :id");
                $stmt->bindParam(":id", $user_id);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                $old_image_path = '../resource/img/profile/' . $data['pic'];
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                    if (move_uploaded_file($pic['tmp_name'], $filePath)) {
                        try {
                            $stmt = $conn->prepare("UPDATE user SET pic=:pic WHERE id=:id");
                            $stmt->bindParam(":id", $user_id);
                            $stmt->bindParam("pic", $fileNew);
                            $stmt->execute();
                            $_SESSION['success'] = "Profile picture updated complease.";
                            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
                        } catch (PDOException $e) {
                            $_SESSION['error'] = $e->getMessage();
                            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
                        }
                    }
                } else {
                    if (move_uploaded_file($pic['tmp_name'], $filePath)) {
                        try {
                            $stmt = $conn->prepare("UPDATE user SET pic=:pic WHERE id=:id");
                            $stmt->bindParam(":id", $user_id);
                            $stmt->bindParam("pic", $fileNew);
                            $stmt->execute();
                            $_SESSION['success'] = "Profile picture updated complease.";
                            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
                        } catch (PDOException $e) {
                            $_SESSION['error'] = $e->getMessage();
                            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
                        }
                    }
                }
            }
        }
    }

    if (isset($_POST['insert_user'])) {
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $role = $_POST['role'];
        InsertUser($username, $pass, $email, $tel, $role, $conn);
    }

    function InsertUser($username, $pass, $email, $tel, $role, $conn) {
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
        $user_id = $_SESSION['user_id'];
        DeleteFavorites($MyID, $user_id, $conn);
    }

    function DeleteFavorites($MyID, $user_id, $conn) {
        try {
            $stmt = $conn->prepare("SELECT id FROM favorite WHERE user=:user");
            $stmt->bindParam(":user", $user_id);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $stmt = $conn->prepare("DELETE FROM favorite WHERE user=:user");
                $stmt->bindParam(":user", $user_id);
                $stmt->execute();
                DeleteUser($MyID, $user_id, $conn);
            }else {
                DeleteUser($MyID, $user_id, $conn);
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        }
        
    }
        
    function DeleteUser($MyID, $user_id, $conn) {
        try {
            $stmt = $conn->prepare("SELECT pic FROM user WHERE id = :id");
            $stmt->bindParam(":id", $user_id);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($data != "") {
                $old_image_path = '../resource/img/profile/' . $data['pic'];
                unlink($old_image_path);
            } 

        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        }
        
        try {
            $stmt = $conn->prepare("DELETE FROM user WHERE id=:id");
            $stmt->bindParam(":id", $user_id);
            $stmt->execute();
    
            if ($MyID == $user_id) {
                unset($_SESSION['user_id']);
                $_SESSION['success'] = "Delete user complease.";
                echo "<script>window.location.href='DBSign.php?signout';</script>";
            } else {
                unset($_SESSION['user_id']);
                $_SESSION['success'] = "Delete user complease.";
                echo $user_id;
                echo "<script>window.location.href='../dash_user.php';</script>";
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            echo "<script>window.location.href='../account.php?user_id=$user_id';</script>";
        }
    }

?>