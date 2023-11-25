<?php require_once 'Backend/DBSession.php'; ?>
<?php
if (isset($_GET['signup'])) {
    $action = "Backend/DBSign.php";
    $submit = "signup";
}
if (isset($_GET['forget_pass'])) {
    $action = "ResetPass.php";
    $submit = "forget_pass";
}
if (isset($_GET['update_email'])) {
    $action = "Backend/DBUser.php";
    $submit = "update_email";
}
$email = $_SESSION['email'];
$VerifyCode = $_SESSION['VerifyCode'];
echo "<script>" . " var VerifyCode = '" . $VerifyCode . "' </script>";
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
    <?php include 'components/loading/loading.php'; ?>
    <div class="container">
        <?php include 'components/layout/header.php'; ?>
        <section>
            <div class="section-group">
                <form class="form" action="<?= $action ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                    <?php include 'components/layout/alert.php'; ?>
                    <div class="form-head">
                        <h1><?= $verification ?></h1>
                        <p><?= $verification_detail ?><br>
                            <a class="text-link" target="_blank" href="https://mail.google.com/mail/u/0/#inbox"><?= $email ?></a>
                        </p>
                    </div>

                    <?php include 'components/input/verify.php'; ?>

                    <div class="form-group">
                        <div class="form-input">
                            <button id="Verify" name="<?= $submit ?>" class="btn-se" type="submit" disabled><?= $verify_email ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <?php include 'components/layout/nav.php'; ?>
    </div>
</body>

</html>