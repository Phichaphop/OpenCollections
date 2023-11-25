<?php require_once 'Backend/DBSession.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'head.php';
?>

<body>
    <?php include 'components/loading/loading.php'; ?>

    <div class="container">
        <?php include 'components/layout/header.php'; ?>
        <section>

            <?php
            $name = $_GET['name'] ?? '';
            $type = $_GET['type'] ?? '';
            $data = SearchMajor($name, $type, $conn);
            include 'Backend/Other/GetPage.php';
            ?>

            <?php include 'components/input/search/search.php'; ?>
            <?php include 'components/layout/aside.php'; ?>
            <?php include 'components/layout/alert.php'; ?>

            <div class="dash">
                <div class="dash-title">
                    <h1><?= $major_dashboard ?></h1>
                </div>
                <div class="dash-group">
                    <div class="dash-icon">
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
                        <div class="menu-icon">
                            <?php include 'components/icon/major.php'; ?>
                        </div>
                        <div class="menu-content">
                            <h4><?= $no_data ?></h4>
                        </div>
                    </div>
                    <?php } else {

                    foreach ($currentPageData as $row) { ?>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/major.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4><?= $row['major'] ?> / <?= $row['degree'] ?> at <?= GetNameDeptByID($row['dept'], $conn) ?></h4>
                                <p>in <?= GetNameInsByDeptID($row['dept'], $conn) ?> has <?= CountProjectInMajor($row['id'], $conn) ?> Project</p>
                            </div>
                            <div class="menu-next" onclick="window.location='frm_major.php?delete&major=<?= $row['id'] ?>'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next" onclick="window.location='frm_major.php?update&major=<?= $row['id'] ?>'">
                                <?php include 'components/icon/edit.php'; ?>
                            </div>
                        </div>

                <?php }
                } ?>
                <?php include 'components/layout/menu_page.php'; ?>
            </div>
        </section>
        <?php include 'components/layout/nav.php'; ?>
    </div>
</body>

</html>