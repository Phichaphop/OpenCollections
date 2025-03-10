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
                $name = isset($_GET['name']) ? $_GET['name'] : '';
                $type = isset($_GET['type']) ? $_GET['type'] : '';
                $data = SearchDept($name, $type, $conn);
                include 'backend/Other/GetPage.php';
                ?>

                <?php include 'components/input/search/search.php'; ?>
                <?php include 'components/layout/sub_menu.php'; ?>

                <div class="dash">
                    <div class="dash-title">
                        <h1><?= $department_dashboard ?></h1>
                    </div>
                    <div class="dash-group">
                        <div class="icon">
                            <?php include 'components/icon/dept.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $department ?></h4>
                            <p><?= CountTotalDepartment($conn) ?> <?= $department ?></p>
                        </div>
                    </div>
                </div>

                <div class="menu">
                    <div class=" menu-title">
                        <h1><?= $department_list ?></h1>
                    </div>

                    <?php if (!$data) { ?>
                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/dept.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4><?= $no_data ?></h4>
                                </div>
                            </div>
                        </div>
                        <?php } else {

                        foreach ($data as $row) { ?>

                            <div class="menu-group" onclick="window.location='frm_dept.php?detail&dept=<?= $row['id'] ?>'">
                                <div class="menu-content">
                                    <div class="icon">
                                        <?php include 'components/icon/dept.php'; ?>
                                    </div>
                                    <div class="menu-title">
                                        <h4><?= $row['dept'] ?></h4>
                                        <p class="menu-sub-title"><?= $at ?> <?= GetNameFacultyByID($row['faculty'], $conn) ?></p>
                                        <p class="menu-sub-title"><?= $in ?> <?= GetNameInsByFacultyID($row['faculty'], $conn) ?> <?= CountMajorInDept($row['id'], $conn) ?> Major</p>
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