<?php require_once 'backend/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include "components/layout/head.php" ?>

<body onload="set()">

    <?php require_once 'components/loading/loading.php'; ?>

    <div class="container">
    
        <?php include "components/layout/aside.php" ?>

        <?php require_once 'components/layout/header.php'; ?>

        <section>

            <div class="section-group">

                <?php require_once 'components/layout/alert.php'; ?>

                <!-- Content here -->

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

                <form class="form" action="backend/DBVerifyPass.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-head">
                        <h1><?= $confirm_password ?></h1>
                    </div>

                    <?php include 'components/input/text/pass.php'; ?>
                    <script>
                        document.getElementById("Pass").addEventListener("keyup", CheckVerifyPass)
                    </script>

                    <div class="form-group">
                        <button id="Update" name="<?= $submit ?>" class="btn-se" type="submit" disabled><?= $update ?></button>
                        <div class="btn-se" onclick="history.back()"><?= $cancel ?></div>
                    </div>
                </form>

                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

        <?php require_once 'components/layout/footer.php'; ?>

    </div>

</body>

</html>