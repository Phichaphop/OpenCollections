<?php require_once 'Backend/DBSession.php'; ?>
<?php

if (isset($_POST['update_role'])) {
    $submit = "update_role";
    $_SESSION['role_update'] = $_POST['role'];
}

if (isset($_POST['delete_user'])) {
    $submit = "delete_user";
}

if (isset($_GET['project'])) {
    $submit = "DeleteProject";
    $_SESSION['project'] = $_GET['project'];
}

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
                <form class="form" action="Backend/DBVerifyPass.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-head">
                        <h1><?= $confirm_password ?></h1>
                    </div>

                    <?php include 'components/input/user/pass.php'; ?>
                    <script>
                        document.getElementById("Pass").addEventListener("keyup", CheckVerifyPass)
                    </script>

                    <div class="form-group">
                        <button id="Update" name="<?= $submit ?>" class="btn-se" type="submit" disabled><?= $update ?></button>
                        <div class="btn-se" onclick="history.back()"><?= $cancel ?></div>
                    </div>
                </form>
            </div>
        </section>
        <?php include 'components/layout/nav.php'; ?>
    </div>
</body>

</html>