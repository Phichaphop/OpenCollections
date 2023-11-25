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

            <?php
            $name = $_GET['name'] ?? '';
            $type = $_GET['type'] ?? '';
            $data = SearchUser($name, $type, $conn);
            include 'Backend/Other/GetPage.php';
            ?>

            <?php include 'components/input/search/search.php'; ?>
            <?php include 'components/view/aside.php'; ?>
            <?php include 'components/view/alert.php'; ?>

            <div class="dash">
                <div class="dash-title">
                    <h1><?= $user_dashboard ?></h1>
                </div>
                <div class="dash-group">
                    <div class="dash-icon">
                        <?php include 'components/icon/profile.php'; ?>
                    </div>
                    <div class="dash-content">
                        <h4><?= $total_user ?></h4>
                        <p><?= CountTotalUser($conn) ?> <?= $account ?></p>
                    </div>
                </div>

                <div class="dash-group">
                    <div class="dash-icon">
                        <?php include 'components/icon/admin.php'; ?>
                    </div>
                    <div class="dash-content">
                        <h4><?= $admin ?></h4>
                        <p><?= CountAdmin($conn) ?> <?= $account ?></p>
                    </div>
                </div>

                <div class="dash-group">
                    <div class="dash-icon">
                        <?php include 'components/icon/officer.php'; ?>
                    </div>
                    <div class="dash-content">
                        <h4><?= $officer ?></h4>
                        <p><?= CountOfficer($conn) ?> <?= $account ?></p>
                    </div>
                </div>

                <div class="dash-group">
                    <div class="dash-icon">
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
                        <div class="menu-icon">
                            <?php include 'components/icon/profile.php'; ?>
                        </div>
                        <div class="menu-content">
                            <h4><?= $no_data ?></h4>
                        </div>
                    </div>
                    <?php } else {
                    foreach ($currentPageData as $row) { ?>
                        <div class="menu-group" onclick="window.location='account.php?update&user_id=<?= $row['id'] ?>'">
                            <?php if ($row['pic'] != "") { ?>
                                <img class="menu-pic" src="./Backend/Picture/profile/<?= $row['pic'] ?>">
                            <?php } else { ?>
                                <div class="menu-icon">
                                    <?php include 'components/icon/profile.php'; ?>
                                </div>
                            <?php } ?>
                            <div class="menu-content">
                                <h4><?= $row['username'] ?></h4>
                                <p><?= $row['email'] ?></p>
                            </div>
                            <div class="menu-next"><?php include 'components/icon/next.php'; ?></div>
                        </div>

                <?php }
                } ?>
                <?php include 'components/view/menu_page.php'; ?>
            </div>
        </section>
        <?php include 'components/view/nav.php'; ?>
    </div>
</body>

</html>