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
                $data = SearchProjectType($name, $conn);
                include 'backend/Other/GetPage.php';
                ?>

                <?php include 'components/input/search/search.php'; ?>
                <?php include 'components/layout/sub_menu.php'; ?>

                <div class="dash">
                    <div class="dash-title">
                        <h1><?= $project_type_dashboard ?></h1>
                    </div>
                    <div class="dash-group">
                        <div class="icon">
                            <?php include 'components/icon/project_type.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $project_type ?></h4>
                            <p><?= CountTotalProjectType($conn) ?> <?= $type ?></p>
                        </div>
                    </div>
                </div>

                <div class="menu">
                    <div class=" menu-title">
                        <h1><?= $project_type_list ?></h1>
                    </div>

                    <?php if (!$data) { ?>
                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/project_type.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4><?= $no_data ?></h4>
                                </div>
                            </div>
                        </div>
                        <?php } else {

                        foreach ($currentPageData as $row) { ?>

                            <div class="menu-group" onclick="window.location='frm_project.php?detail&project_type=<?= $row['id'] ?>'">
                                <div class="menu-content">
                                    <div class="icon">
                                        <?php include 'components/icon/project_type.php'; ?>
                                    </div>
                                    <div class="menu-title">
                                        <h4><?= $row['type'] ?></h4>
                                        <p class="menu-sub-title"><?= CountProjectInProjectType($row['id'], $conn) ?> <?= $project ?></p>
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