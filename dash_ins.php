<?php require_once 'Backend/DBSession.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'head.php'; ?>

<body>

    <?php require_once 'components/loading/loading.php'; ?>

    <div class="container">

        <?php require_once 'components/layout/header.php'; ?>

        <section>

            <div class="section-group">

                <?php require_once 'components/layout/alert.php'; ?>

                <!-- Content here -->

                <?php
                $name = $_GET['name'] ?? '';
                $data = SearchIns($name, $conn);
                include 'Backend/Other/GetPage.php';
                ?>

                <?php include 'components/input/search/search.php'; ?>
                <?php include 'components/layout/aside.php'; ?>

                <div class="dash">
                    <div class="dash-title">
                        <h1><?= $institute_dashboard ?></h1>
                    </div>
                    <div class="dash-group">
                        <div class="icon">
                            <?php include 'components/icon/ins.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $institute ?></h4>
                            <p><?= CountTotalIns($conn) ?> <?= $institute ?></p>
                        </div>
                    </div>
                </div>

                <div class="menu">
                    <div class=" menu-title">
                        <h1><?= $institute_list ?></h1>
                    </div>

                    <?php if (!$data) { ?>
                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/ins.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4><?= $no_data ?></h4>
                                </div>
                            </div>
                        </div>
                        <?php } else {

                        foreach ($currentPageData as $row) { ?>

                            <div class="menu-group" onclick="window.location='frm_ins.php?read&ins=<?= $row['id'] ?>'">
                                <div class="menu-content">
                                    <div class="icon">
                                        <?php include 'components/icon/ins.php'; ?>
                                    </div>
                                    <div class="menu-title">
                                        <h4><?= $row['ins'] ?></h4>
                                        <p class="menu-sub-title"><?= CountFacultyInIns($row['id'], $conn) ?> Faculty</p>
                                    </div>
                                </div>
                                <div class="menu-content">
                                    <div class="icon" onclick="window.location='frm_ins.php?delete&ins=<?= $row['id'] ?>'">
                                        <?php include 'components/icon/delete.php'; ?>
                                    </div>
                                    <div class="icon" onclick="window.location='frm_ins.php?update&detail&ins=<?= $row['id'] ?>'">
                                        <?php include 'components/icon/edit.php'; ?>
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

    </div>

</body>

</html>