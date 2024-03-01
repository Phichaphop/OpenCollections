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

                <?php
                $name = $_GET['name'] ?? '';
                $type = $_GET['type'] ?? '';
                $data = SearchUser($name, $type, $conn);
                include 'Backend/Other/GetPage.php';
                ?>

                <?php include 'components/input/search/search.php'; ?>
                <?php include 'components/layout/aside.php'; ?>

                <div class="dash">
                    <div class="dash-title">
                        <h1><?= $user_dashboard ?></h1>
                    </div>
                    <div class="dash-group">
                        <div class="icon">
                            <?php include 'components/icon/profile.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $total_user ?></h4>
                            <p><?= CountTotalUser($conn) ?> <?= $account ?></p>
                        </div>
                    </div>

                    <div class="dash-group">
                        <div class="icon">
                            <?php include 'components/icon/admin.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $admin ?></h4>
                            <p><?= CountAdmin($conn) ?> <?= $account ?></p>
                        </div>
                    </div>

                    <div class="dash-group">
                        <div class="icon">
                            <?php include 'components/icon/publisher.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $publisher ?></h4>
                            <p><?= CountPublisher($conn) ?> <?= $account ?></p>
                        </div>
                    </div>

                    <div class="dash-group">
                        <div class="icon">
                            <?php include 'components/icon/officer.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $officer ?></h4>
                            <p><?= CountOfficer($conn) ?> <?= $account ?></p>
                        </div>
                    </div>

                    <div class="dash-group">
                        <div class="icon">
                            <?php include 'components/icon/user.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $normal_user ?></h4>
                            <p><?= CountNormalUser($conn) ?> <?= $account ?></p>
                        </div>
                    </div>
                </div>

                <div class="menu">
                    <div class="menu-title">
                        <h1><?= $user_list ?></h1>
                    </div>
                    <?php if (!$data) { ?>
                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/user.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4><?= $no_data ?></h4>
                                </div>
                            </div>
                        </div>
                        <?php } else {
                        foreach ($currentPageData as $row) { ?>
                            <div class="menu-group" onclick="window.location='account.php?update&user_id=<?= $row['id'] ?>'">
                                <div class="menu-content">
                                    <?php if ($row['pic'] != "") { ?>
                                        <img class="menu-pic" src="resource/img/profile/<?= $row['pic'] ?>">
                                    <?php } else { ?>
                                        <div class="icon">
                                            <?php include 'components/icon/profile.php'; ?>
                                        </div>
                                    <?php } ?>
                                    <div class="menu-title">
                                        <h4><?= $row['username'] ?></h4>
                                        <p class="menu-sub-title"><?= $row['email'] ?></p>
                                    </div>
                                </div>
                                <div class="menu-content">
                                    <div class="icon"><?php include 'components/icon/next.php'; ?></div>
                                </div>
                            </div>

                    <?php }
                    } ?>
                    <?php include 'components/layout/menu_page.php'; ?>
                </div>

                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

    </div>

</body>

</html>