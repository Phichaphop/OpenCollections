<?php require_once 'Backend/DBSession.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'head.php'; ?>

<body>

    <?php require_once 'components/loading/loading.php'; ?>

    <div class="container">

        <?php require_once 'components/layout/header.php'; ?>

        <section>

            <div class="section-group">

                <?php require_once 'components/layout/alert.php'; ?>

                <!-- Content here -->

                <?php if(isset($_GET['signin'])) { ?>

                    <form class="form" action="Backend/DBSign.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-head">
                            <h1><?= $welcome_back ?></h1>
                        </div>
                        <?php include 'components/input/user/username_email.php'; ?>
                        <?php include 'components/input/user/pass.php'; ?>
                        <div class="form-group">
                            <a class="text-link" href="ResetPass.php"><?= $forget_your_password ?></a>
                        </div>
                        <div class="form-group">
                            <button id="SignIn" name="signin" class="btn-se" type="submit" disabled><?= $sign_in ?></button>
                        </div>
                        <div class="form-group">
                            <p><?= $Don_t_have_an_account ?> <a class="text-link" href="sign.php?signup"><?= $sign_up ?></a></p>
                        </div>
                        <script>
                            Username.addEventListener("keyup", SignIn)
                            Pass.addEventListener("keyup", SignIn)
                        </script>
                    </form>

                <?php } ?>

                <?php if(isset($_GET['signup'])) { ?>

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
                    <script>
                        Username.addEventListener("keyup", SignUp)
                        Pass.addEventListener("keyup", SignUp)
                        Tel.addEventListener("keyup", SignUp)
                        Email.addEventListener("keyup", SignUp)
                        AccessPolicy.addEventListener("change", SignUp)
                    </script>
                </form>

                <?php } ?>

                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

    </div>

</body>

</html>