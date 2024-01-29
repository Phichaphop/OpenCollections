<?php require_once 'Backend/DBSession.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'head.php'; ?>

<body>

    <?php require_once 'components/loading/loading.php'; ?>

    <div class="container">

        <?php include "components/layout/side.php" ?>

        <?php require_once 'components/layout/header.php'; ?>

        <section>

            <div class="section-group">

                <?php require_once 'components/layout/alert.php'; ?>

                <!-- Content here -->


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

                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

    </div>

</body>

</html>