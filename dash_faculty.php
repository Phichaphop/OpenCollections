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
                $type = $_GET['type'] ?? '';
                $data = SearchFaculty($name, $type, $conn);
                include 'Backend/Other/GetPage.php';
                ?>

                <?php include 'components/input/search/search.php'; ?>
                <?php include 'components/layout/aside.php'; ?>

                <div class="dash">
                    <div class="dash-title">
                        <h1><?= $faculty_dashboard ?></h1>
                    </div>
                    <div class="dash-group">
                        <div class="dash-icon">
                            <?php include 'components/icon/faculty.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $faculty ?></h4>
                            <p><?= CountTotalFaculty($conn) ?> <?= $faculty ?></p>
                        </div>
                    </div>
                </div>

                <div class="menu">
                    <div class=" menu-title">
                        <h1><?= $faculty_list ?></h1>
                    </div>

                    <?php if (!$data) { ?>
                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/faculty.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4><?= $no_data ?></h4>
                            </div>
                        </div>
                        <?php } else {

                        foreach ($currentPageData as $row) { ?>

                            <div class="menu-group">
                                <div class="menu-icon">
                                    <?php include 'components/icon/faculty.php'; ?>
                                </div>
                                <div class="menu-content">
                                    <h4><?= $row['faculty'] ?> at <?= GetNameInsByID($row['ins'], $conn) ?></h4>
                                    <p><?= CountDeptInFaculty($row['id'], $conn) ?> Dept</p>
                                </div>
                                <div class="menu-next" onclick="window.location='frm_faculty.php?delete&faculty=<?= $row['id'] ?>'">
                                    <?php include 'components/icon/delete.php'; ?>
                                </div>
                                <div class="menu-next" onclick="window.location='frm_faculty.php?update&faculty=<?= $row['id'] ?>'">
                                    <?php include 'components/icon/edit.php'; ?>
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