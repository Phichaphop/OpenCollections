<?php
require_once 'config.php';

if (isset($_POST['signup'])) {
    $username = $_SESSION['username'];
    $pass = $_SESSION['pass'];
    $email = $_SESSION['email'];
    $tel = $_SESSION['tel'];
    $role = 4;
    SignUp($username, $pass, $email, $tel, $role, $conn);
}
if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    SignIn($username, $pass, $conn);
}
if (isset($_POST['reset_pass'])) {
    $email = $_SESSION['email'];
    $NewPass = $_POST['pass'];
    ResetPass($email, $NewPass, $conn);
}
if (isset($_GET['signout'])) {
    session_destroy();
    echo "<script>window.location.href='../index.php';</script>";
}

function SignUp($username, $pass, $email, $tel, $role, $conn)
{
    try {
        $stmt = $conn->prepare("SELECT email FROM opc_user WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $_SESSION['error'] = "This user is already in the system.";
            echo "<script>window.location.href='../sign.php?signin';</script>";
        } else if (!isset($_SESSION['error'])) {
            $passHash = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO opc_user (id, username, password, email, tel, role)
                                    VALUES(NULL, :username, :password, :email, :tel, :role)");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $passHash);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":tel", $tel);
            $stmt->bindParam(":role", $role);
            $stmt->execute();
            unset($_SESSION['username']);
            unset($_SESSION['pass']);
            unset($_SESSION['email']);
            unset($_SESSION['tel']);
            unset($_SESSION['admin']);
            unset($_SESSION['VerifyCode']);
            $_SESSION['success'] = "Sign up complete.";
            echo "<script>window.location.href='../sign.php?signin';</script>";
        } else {
            $_SESSION['error'] = "something went wrong Please contact the administrator for correction.";
            echo "<script>window.location.href='../sign.php?signup';</script>";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../sign.php?signup';</script>";
    }
}
function SignIn($username, $pass, $conn)
{
    try {
        $stmt = $conn->prepare("SELECT id, username, email, role, password FROM opc_user WHERE username = :username or email = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            if ($username == $data['username'] || $username == $data['email']) {
                if (password_verify($pass, $data['password'])) {
                    if ($data['role'] == '1') {
                        $_SESSION['admin'] = $data['id'];
                        $_SESSION['login'] = $data['id'];
                        echo "<script>window.location.href='../index.php';</script>";
                    } else if ($data['role'] == '2') {
                        $_SESSION['publisher'] = $data['id'];
                        $_SESSION['login'] = $data['id'];
                        echo "<script>window.location.href='../index.php';</script>";
                    } else if ($data['role'] == '3') {
                        $_SESSION['officer'] = $data['id'];
                        $_SESSION['login'] = $data['id'];
                        echo "<script>window.location.href='../index.php';</script>";
                    } else {
                        $_SESSION['user'] = $data['id'];
                        $_SESSION['login'] = $data['id'];
                        echo "<script>window.location.href='../index.php';</script>";
                    }
                } else {
                    $_SESSION['error'] = 'Password is incorrect.';
                    echo "<script>window.location.href='../sign.php?signin';</script>";
                }
            } else {
                $_SESSION['error'] = 'Invalid email.';
                echo "<script>window.location.href='../sign.php?signin';</script>";
            }
        } else {
            $_SESSION['error'] = "This user does not exist.";
            echo "<script>window.location.href='../sign.php?signin';</script>";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../sign.php?signin';</script>";
    }
}
function ResetPass($email, $NewPass, $conn)
{
    try {
        $stmt = $conn->prepare("SELECT email FROM opc_user WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $passHash = password_hash($NewPass, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE opc_user SET password=:pass WHERE email=:email");
            $stmt->bindParam(":email", $email);
            $stmt->bindParam("pass", $passHash);
            $stmt->execute();
            unset($_SESSION['email']);
            $_SESSION['success'] = "Password updated complete.";
            echo "<script>window.location.href='../sign.php?signin';</script>";
        } else {
            $_SESSION['error'] = "This user does not exist.";
            echo "<script>window.location.href='../sign.php?signin';</script>";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../sign.php?signin';</script>";
    }
}
