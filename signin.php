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
                <?php include 'components/view/alert.php'; ?>

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
                        <p><?= $Don_t_have_an_account ?> <a class="text-link" href="signup.php"><?= $sign_up ?></a></p>
                    </div>
                    <script>
                        Username.addEventListener("keyup", SignIn)
                        Pass.addEventListener("keyup", SignIn)
                    </script>
                </form>

            </div>
        </section>
        <?php include 'components/view/nav.php'; ?>
    </div>
</body>

</html>