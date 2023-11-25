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
                        <p><?= $back_to_sign_in ?> <a class="text-link" href="signin.php"><?= $sign_in ?></a></p>
                    </div>
                    <script>
                        Username.addEventListener("keyup", SignUp)
                        Pass.addEventListener("keyup", SignUp)
                        Tel.addEventListener("keyup", SignUp)
                        Email.addEventListener("keyup", SignUp)
                        AccessPolicy.addEventListener("change", SignUp)
                    </script>
                </form>

            </div>
        </section>
        <?php include 'components/view/nav.php'; ?>
    </div>
</body>

</html>