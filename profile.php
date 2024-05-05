<?php require_once 'backend/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'head.php'; ?>

<body onload="set(), GenerateQRcode()">

    <?php require_once 'components/loading/loading.php'; ?>

    <div class="container">

        <?php include "components/layout/aside.php" ?>

        <?php require_once 'components/layout/header.php'; ?>

        <section>

            <div class="section-group">

                <?php require_once 'components/layout/alert.php'; ?>

                <!-- Content here -->

                <?php $UserData = GetUserByID($_SESSION['login'], $conn); ?>

                <div class="profile">

                    <div class="card-container">
                        <div class="card">
                            <div class="card-group">
                                <div class="card-content">
                                    <?php if ($UserData['pic'] != "") { ?>
                                        <img class="card-profile" src="resource/img/profile/<?php echo $UserData['pic']; ?>">
                                    <?php } else {  ?>
                                        <span class="material-symbols-outlined card-profile">account_circle</span>
                                    <?php } ?>
                                </div>
                                <div class="card-content">
                                    <p><?= $UserData['role']; ?> #<?php echo $UserData['id'] ?></p>
                                    <p><?= $UserData['username']; ?></p>
                                </div>
                            </div>
                            <div class="card-group">
                                <div id="Qrcode" class="card-qrcode"></div>
                            </div>
                        </div>
                        <div class="card-menu">
                            <!--<div class="btn-pr">Login QR</div>-->
                            <div class="btn-pr" onclick="window.location='account.php?update&user_id=<?= $UserData['id'] ?>'"><?= $view ?></div>
                        </div>
                    </div>

                    <?php include 'components/layout/menu_p.php'; ?>
                </div>

                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

    </div>

</body>

</html>