<?php require_once 'Backend/DBSession.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'head.php';
?>

<body>
    <?php include 'components/loading/loading.php'; ?>
    <div class="container">
        <?php include 'components/view/header.php'; ?>
        <section>
            <div class="section-group">
                <?php if (isset($_POST['forget_pass'])) { ?>
                    <form class="form" action="Backend/DBSign.php" method="post" enctype="multipart/form-data">
                        <div class="form-head">
                            <h1><?= $reset_your_password ?></h1>
                        </div>
                        <?php include 'components/input/user/reset_pass.php'; ?>
                        <?php include 'components/input/user/confirm_pass.php'; ?>
                        <div class="form-group">
                            <button id="ResetPass" class="btn-se" name="reset_pass" type="submit" disabled><?= $reset_your_password ?></button>
                        </div>
                        <div class="form-group">
                            <a class="btn-te" href="signin.php"><?= $back_to_sign_in ?></a>
                        </div>
                        <script>
                            document.getElementById('NewPass').addEventListener("keyup", CheckForGetResetPass)
                            document.getElementById('ConfirmPass').addEventListener("keyup", CheckForGetResetPass)
                        </script>
                    </form>
                <?php } else { ?>
                    <form class="form" action="Backend/DBVerifyEmail.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <?php include 'components/view/alert.php'; ?>
                        <div class="form-head">
                            <h1><?= $reset_your_password ?></h1>
                            <p><?= $reset_your_password_detail ?></p>
                        </div>
                        <?php include 'components/input/user/email.php'; ?>
                        <div class="form-group">
                            <button id="ForgetPass" class="btn-se" name="forget_pass" type="submit" disabled><?= $continue ?></button>
                            <div class="form-group">
                                <a class="btn-te" href="signin.php"><?= $back_to_sign_in ?></a>
                            </div>
                            <script>
                                Email.addEventListener("keyup", CheckForgetPass)
                            </script>
                    </form>
                <?php } ?>
            </div>
        </section>
        <?php include 'components/view/nav.php'; ?>
    </div>
</body>

</html>