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
            $data = SearchDept($name, $type, $conn);
            include 'Backend/Other/GetPage.php';
            ?>

            <?php include 'components/input/search/search.php'; ?>
            <?php include 'components/layout/aside.php'; ?>
            <?php include 'components/layout/alert.php'; ?>

            <div class="dash">
                <div class="dash-title">
                    <h1><?= $department_dashboard ?></h1>
                </div>
                <div class="dash-group">
                    <div class="dash-icon">
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
                        <div class="menu-icon">
                            <?php include 'components/icon/dept.php'; ?>
                        </div>
                        <div class="menu-content">
                            <h4><?= $no_data ?></h4>
                        </div>
                    </div>
                    <?php } else {

                    foreach ($data as $row) { ?>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/dept.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4><?= $row['dept'] ?> at <?= GetNameFacultyByID($row['faculty'], $conn) ?></h4>
                                <p>in <?= GetNameInsByFacultyID($row['faculty'], $conn) ?> <?= CountMajorInDept($row['id'], $conn) ?> Major</p>
                            </div>
                            <div class="menu-next" onclick="window.location='frm_dept.php?delete&dept=<?= $row['id'] ?>'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next" onclick="window.location='frm_dept.php?update&dept=<?= $row['id'] ?>'">
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