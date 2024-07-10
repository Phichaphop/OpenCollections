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

            <div class="section-group">

                <?php require_once 'components/layout/alert.php'; ?>

                <!-- Content here -->

                <?php
                $name = isset($_GET['name']) ? $_GET['name'] : '';
                $type = isset($_GET['type']) ? $_GET['type'] : '';
                $data = SearchMajor($name, $type, $conn);
                include 'backend/Other/GetPage.php';
                ?>

                <?php include 'components/input/search/search.php'; ?>
                <?php include 'components/layout/sub_menu.php'; ?>

                <div class="dash">
                    <div class="dash-title">
                        <h1><?= $major_dashboard ?></h1>
                    </div>
                    <div class="dash-group">
                        <div class="icon">
                            <?php include 'components/icon/major.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $major ?></h4>
                            <p><?= CountTotalMajor($conn) ?> <?= $major ?></p>
                        </div>
                    </div>
                </div>

                <div class="menu">
                    <div class=" menu-title">
                        <h1><?= $major_list ?></h1>
                    </div>

                    <?php if (!$data) { ?>
                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/major.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4><?= $no_data ?></h4>
                                </div>
                            </div>
                        </div>
                        <?php } else {

                        foreach ($currentPageData as $row) { ?>

                            <div class="menu-group" onclick="window.location='frm_major.php?detail&major=<?= $row['id'] ?>'">
                                <div class="menu-content">
                                    <div class="icon">
                                        <?php include 'components/icon/major.php'; ?>
                                    </div>
                                    <div class="menu-title">
                                        <h4><?= $row['major'] ?> / <?= $row['degree'] ?></h4>
                                        <p class="menu-sub-title"><?= $at ?> <?= GetNameDeptByID($row['dept'], $conn) ?></p>
                                        <p class="menu-sub-title"><?= $in ?> <?= GetNameInsByDeptID($row['dept'], $conn) ?> <?= $has ?> <?= CountProjectInMajor($row['id'], $conn) ?> <?= $project ?></p>
                                    </div>
                                </div>
                                <div class="menu-content">
                                    <div class="icon">
                                        <?php include 'components/icon/next.php'; ?>
                                    </div>
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

        <?php require_once 'components/layout/footer.php'; ?>

    </div>

</body>

</html>