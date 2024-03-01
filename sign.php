<?php require_once 'Backend/DBSession.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'head.php'; ?>

<body onload="set()">

    <?php require_once 'components/loading/loading.php'; ?>

    <div class="container">

        <?php include "components/layout/side.php" ?>

        <?php require_once 'components/layout/header.php'; ?>

        <section>

            <div class="section-group">

                <?php require_once 'components/layout/alert.php'; ?>

                <!-- Content here -->

                <?php if (isset($_GET['signin'])) { ?>

                    <form class="form" action="Backend/DBSign.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-head">
                            <h1><?= $welcome_back ?></h1>
                        </div>
                        <?php include 'components/input/user/username_email.php'; ?>
                        <?php include 'components/input/user/pass.php'; ?>
                        <div class="form-group">
                            <a class="text-link" href="sign.php?forget_pass"><?= $forget_your_password ?></a>
                        </div>
                        <div class="form-group">
                            <button id="SignIn" name="signin" class="btn-se" type="submit" disabled><?= $sign_in ?></button>
                        </div>
                        <div class="form-group">
                            <p><?= $Don_t_have_an_account ?> <a class="text-link" href="sign.php?signup"><?= $sign_up ?></a></p>
                        </div>
                    </form>

                    <script>
                        Username.addEventListener("keyup", SignIn)
                        Pass.addEventListener("keyup", SignIn)
                    </script>

                <?php } ?>

                <?php if (isset($_GET['signup'])) { ?>

                    <form class="form" action="Backend/DBVerifyEmail.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-head">
                            <h1><?= $create_account ?></h1>
                            <p><?= $create_account_detail ?></p>
                        </div>
                        <?php include 'components/input/user/username.php'; ?>
                        <?php include 'components/input/user/pass.php'; ?>
                        <?php include 'components/input/user/email.php'; ?>
                        <?php include 'components/input/user/tel.php'; ?>
                        <?php include 'components/input/user/access_policy.php'; ?>
                        <div class="form-group">
                            <button id="SignUp" name="signup" class="btn-se" type="submit" disabled><?= $sign_up ?></button>
                        </div>
                        <div class="form-group">
                            <p><?= $back_to_sign_in ?> <a class="text-link" href="sign.php?signin"><?= $sign_in ?></a></p>
                        </div>
                    </form>

                    <script>
                        Username.addEventListener("keyup", SignUp)
                        Pass.addEventListener("keyup", SignUp)
                        Tel.addEventListener("keyup", SignUp)
                        Email.addEventListener("keyup", SignUp)
                        AccessPolicy.addEventListener("change", SignUp)
                    </script>

                <?php } ?>

                <?php if (isset($_GET['forget_pass'])) { ?>

                    <form class="form" action="Backend/DBVerifyEmail.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <?php include 'components/layout/alert.php'; ?>
                        <div class="form-head">
                            <h1><?= $reset_your_password ?></h1>
                            <p><?= $reset_your_password_detail ?></p>
                        </div>
                        <?php include 'components/input/user/email.php'; ?>
                        <div class="form-group">
                            <button id="ForgetPass" class="btn-se" name="forget_pass" type="submit" disabled><?= $continue ?></button>
                            <div class="btn-se" onclick="window.location='sign.php?signin'"><?= $back_to_sign_in ?></div>
                        </div>
                    </form>

                    <script>
                        Email.addEventListener("keyup", CheckForgetPass)
                    </script>

                <?php } ?>

                <?php if (isset($_GET['reset_pass'])) { ?>

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
                            <a class="btn-te" href="sign.php?signin"><?= $back_to_sign_in ?></a>
                        </div>
                    </form>

                    <script>
                        document.getElementById('NewPass').addEventListener("keyup", CheckForGetResetPass)
                        document.getElementById('ConfirmPass').addEventListener("keyup", CheckForGetResetPass)
                    </script>


                <?php } ?>

                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

    </div>

</body>

</html>