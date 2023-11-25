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
            $data = SearchProjectType($name, $conn);
            include 'Backend/Other/GetPage.php';
            ?>

            <?php include 'components/input/search/search.php'; ?>
            <?php include 'components/view/aside.php'; ?>
            <?php include 'components/view/alert.php'; ?>

            <div class="dash">
                <div class="dash-title">
                    <h1><?= $project_type_dashboard ?></h1>
                </div>
                <div class="dash-group">
                    <div class="dash-icon">
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
                        <div class="menu-icon">
                            <?php include 'components/icon/project_type.php'; ?>
                        </div>
                        <div class="menu-content">
                            <h4><?= $no_data ?></h4>
                        </div>
                    </div>
                    <?php } else {

                    foreach ($currentPageData as $row) { ?>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/project_type.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4><?= $row['type'] ?></h4>
                                <p><?= CountProjectInProjectType($row['id'], $conn) ?> Project</p>
                            </div>
                            <div class="menu-next" onclick="window.location='frm_project.php?delete&project_type=<?= $row['id'] ?>'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next" onclick="window.location='frm_project.php?update&project_type=<?= $row['id'] ?>'">
                                <?php include 'components/icon/edit.php'; ?>
                            </div>
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