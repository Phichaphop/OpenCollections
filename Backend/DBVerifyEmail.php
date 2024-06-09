<?php
require_once 'config.php';
use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['signup'])) {
    $header = "Email Verification Code";
    $email = $_POST['email'];
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['pass'] = $_POST['pass'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['tel'] = $_POST['tel'];
    CheckEmail($header, $email, $conn, $email_not_found_in_the_system, $this_email_address_is_already);
}

if (isset($_POST['forget_pass'])) {
    $header = "Reset Your Password";
    $email = $_POST['email'];
    $_SESSION['email'] = $_POST['email'];
    CheckEmail($header, $email, $conn, $email_not_found_in_the_system, $this_email_address_is_already);
}

if (isset($_POST['update_email'])) {
    $header = "Email Verification Code";
    $email = $_POST['email'];
    $_SESSION['email'] = $_POST['email'];
    CheckEmail($header, $email, $conn, $email_not_found_in_the_system, $this_email_address_is_already);
}

function CheckEmail($header, $email, $conn, $email_not_found_in_the_system, $this_email_address_is_already)
{
    try {
        $stmt = $conn->prepare("SELECT email FROM user WHERE email = :email");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchColumn();

        if (!$result) {

            if (isset($_POST['signup'])) {
                VerifyEmail($header, $email);
            } else if (isset($_POST['forget_pass'])) {
                $_SESSION['error'] = $email_not_found_in_the_system;
                echo "<script>window.location.href='../sign.php?forget_pass';</script>";
            }

        } else {

            if (isset($_POST['signup'])) {
                $_SESSION['error'] = $this_email_address_is_already;
                echo "<script>window.location.href='../sign.php?signup';</script>";
            } else if (isset($_POST['forget_pass'])) {
                VerifyEmail($header, $email);
            }

        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../sign.php?signin';</script>";
    }
}

function VerifyEmail($header, $email)
{
    try {
        $template = file_get_contents('../components/email/tmp_email_verify.php');
        $style = file_get_contents('../resource/css/tmp_email.css');
        $verify = sprintf("%06d", rand(0, 999999));
        $name = "Open Collections";

        $replacements = array(
            "{style}" => $style,
            "{header}" => $header,
            "{verify}" => $verify
        );

        $detail = str_replace(array_keys($replacements), array_values($replacements), $template);

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        $mail = new PHPMailer();

        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "phichaphop.b@gmail.com";
        $mail->Password = "mwme etlw zmsg xdnl";
        
        $mail->Port = 25;
        $mail->SMTPDebug = 2;

        // Email Settings
        $mail->isHTML(true);
        $mail->setFrom("opencollections.co@gmail.com", $name);
        $mail->addAddress($email);
        $mail->Subject = $header;
        $mail->Body = $detail;

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent";
        } else {
            $status = "failed";
            $response = "Something is wrong" . $mail->ErrorInfo;
        }
        if (isset($_POST['signup'])) {
            $_SESSION['VerifyCode'] = $verify;
            echo "<script>window.location.href='../VerifyEmail.php?signup';</script>";
        } else if (isset($_POST['forget_pass'])) {
            $_SESSION['VerifyCode'] = $verify;
            echo "<script>window.location.href='../VerifyEmail.php?forget_pass';</script>";
        } else if (isset($_POST['update_email'])) {
            $_SESSION['VerifyCode'] = $verify;
            echo "<script>window.location.href='../VerifyEmail.php?update_email';</script>";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        echo "<script>window.location.href='../sign.php?signup';</script>";
    }
}

?>