<?php require_once 'backend/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'head.php'; ?>

<body onload="set()">

    <?php require_once 'components/loading/loading.php'; ?>

    <div class="container">

        <?php include "components/layout/aside.php" ?>

        <?php require_once 'components/layout/header.php'; ?>

        <section>

            <div class="section-group full">

                <?php require_once 'components/layout/alert.php'; ?>

                <!-- Content here -->

                <?php if (isset($_GET['signin'])) { ?>

                    <form class="form" action="backend/DBSign.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-head">
                            <h1><?= $welcome_back ?></h1>
                        </div>
                        <?php include 'components/input/text/username_email.php'; ?>
                        <?php include 'components/input/text/pass.php'; ?>
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

                    <form class="form" action="backend/DBVerifyEmail.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-head">
                            <h1><?= $create_account ?></h1>
                            <p><?= $create_account_detail ?></p>
                        </div>
                        <?php include 'components/input/text/username.php'; ?>
                        <?php include 'components/input/text/pass.php'; ?>
                        <?php include 'components/input/text/email.php'; ?>
                        <?php include 'components/input/text/tel.php'; ?>
                        <?php include 'components/input/text/policy.php'; ?>
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
                        Policy.addEventListener("change", SignUp)
                    </script>

                <?php } ?>

                <?php if (isset($_GET['forget_pass'])) { ?>

                    <form class="form" action="backend/DBVerifyEmail.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <?php include 'components/layout/alert.php'; ?>
                        <div class="form-head">
                            <h1><?= $reset_your_password ?></h1>
                            <p><?= $reset_your_password_detail ?></p>
                        </div>
                        <?php include 'components/input/text/email.php'; ?>
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

                    <form class="form" action="backend/DBSign.php" method="post" enctype="multipart/form-data">
                        <div class="form-head">
                            <h1><?= $reset_your_password ?></h1>
                        </div>
                        <?php include 'components/input/text/reset_pass.php'; ?>
                        <?php include 'components/input/text/confirm_pass.php'; ?>
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

                <?php if (isset($_GET['policy'])) { ?>
                    <div class="form">
                        <h1><?= $policy_title ?></h1>

                        <p><?= $policy_sub ?></p>

                        <h4><?= $policy_1 ?></h4>
                        <p>
                            <?= $policy_11 ?><br>
                            <?= $policy_12 ?>
                        </p>

                        <h4><?= $policy_2 ?></h4>
                        <p>
                            <?= $policy_21 ?><br>
                            <?= $policy_22 ?>
                        </p>

                        <h4><?= $policy_3 ?></h4>
                        <p>
                            <?= $policy_31 ?><br>
                            <?= $policy_32 ?>
                        </p>

                        <h4><?= $policy_4 ?></h4>
                        <p>
                            <?= $policy_41 ?><br>
                            <?= $policy_42 ?>
                        </p>

                        <p><?= $policy_end ?></p>

                        <div class="btn-pr" onclick="window.location='sign.php?signup'"><?= $back_to_signup ?></div>
                    </div>
                <?php } ?>
                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

        <?php require_once 'components/layout/footer.php'; ?>

    </div>

</body>

</html>