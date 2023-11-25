<?php
require_once 'Backend/DBSession.php';
if (isset($_GET['insert']) && isset($_GET['project'])) {
    $title = $create_project;
    $action = "Backend/DBProject.php";
    $btn_id = "Draft";
    $btn_text = $draft;
    $submit = "insert_project";
}
/*if (isset($_GET['update']) && isset($_GET['pic']) && isset($_GET['project'])) {
    $data = GetProjectByID($_GET['project'], $conn);
    $_SESSION['project_id'] = $data['id'];

    $title = "Update Project Cover";
    $action = "Backend/DBProject.php";
    $btn_id = "Update";
    $submit = "update_project_cover";
}*/
if (isset($_GET['update']) && isset($_GET['detail']) && isset($_GET['project'])) {
    $data = GetProjectDataByID($_GET['project'], $conn);
    $_SESSION['project_id'] = $data['id'];

    $title = $update_project;
    $action = "Backend/DBProject.php";
    $btn_id = "Update";
    $btn_text = $update;
    $submit = "update_project";
}
if (isset($_GET['update']) && isset($_GET['file']) && isset($_GET['project'])) {
    $data = GetProjectByID($_GET['project'], $conn);
    $_SESSION['project_id'] = $data['id'];

    $title = $update_project_file;
    $action = "Backend/DBProject.php";
    $btn_id = "Update";
    $btn_text = $update;
    $submit = "update_project_file";
}
if (isset($_GET['update']) && isset($_GET['cancel']) && isset($_GET['project'])) {
    $data = GetProjectByID($_GET['project'], $conn);
    $_SESSION['project_id'] = $data['id'];

    $title = $not_approve_detail;
    $action = "Backend/DBApprove.php";
    $btn_id = "Update";
    $btn_text = $update;
    $submit = "cancel";
}

if (isset($_GET['insert']) && isset($_GET['project_type'])) {
    $title = $create_project_type;
    $action = "Backend/DBProject.php";
    $btn_id = "Insert";
    $btn_text = $insert;
    $submit = "insert_project_type";
}
if (isset($_GET['update']) && isset($_GET['project_type'])) {
    $data = GetProjectTypeByID($_GET['project_type'], $conn);
    $_SESSION['project_type_id'] = $data['id'];

    $title = $update_project_type;
    $action = "Backend/DBProject.php";
    $btn_id = "Update";
    $btn_text = $update;
    $submit = "update_project_type";
}
if (isset($_GET['delete']) && isset($_GET['project_type'])) {
    $title = $delete_project_type;
    $action = "Backend/DBProject.php";
    $btn_id = "Delete";
    $btn_text = $delete;
    $submit = "delete_project_type";
    $_SESSION['project_type_id'] = $_GET['project_type'];
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
    <?php include 'components/loading/loading.php'; ?>

    <div class="container">
        <?php include 'components/view/header.php'; ?>
        <section>
            <div class="section-group">
                <?php include 'components/view/alert.php'; ?>

                <form class="form" action="<?= $action ?>" method="post" enctype="multipart/form-data" autocomplete="off">

                    <div class="form-head">
                        <h1><?= $title ?></h1>
                    </div>

                    <?php if (isset($_GET['insert']) && isset($_GET['project'])) { ?>
                        <div class="form-section">
                            <div class="form-sub">
                                <?php include 'components/input/project/title.php'; ?>
                                <?php include 'components/input/project/author.php'; ?>
                                <?php include 'components/input/project/advisor.php'; ?>
                                <?php include 'components/input/project/project_type.php'; ?>
                                <?php include 'components/input/select/major.php'; ?>
                                <?php include 'components/input/project/date.php'; ?>
                                <?php include 'components/input/project/file.php'; ?>
                            </div>
                            <div class="form-sub">
                                <?php include 'components/input/project/abstract.php'; ?>
                            </div>
                        </div>
                        <script>
                            document.getElementById("Title").addEventListener("keyup", CheckInsertProject)
                            document.getElementById("Author").addEventListener("change", CheckInsertProject)
                            document.getElementById("Advisor").addEventListener("change", CheckInsertProject)
                            document.getElementById("ProjectType").addEventListener("change", CheckInsertProject)
                            document.getElementById("Major").addEventListener("change", CheckInsertProject)
                            document.getElementById("Abstract").addEventListener("keyup", CheckInsertProject)
                            document.getElementById("Date").addEventListener("change", CheckInsertProject)
                            document.getElementById("ProjectFile").addEventListener("change", CheckInsertProject)
                        </script>
                    <?php } ?>

                    <?php if (isset($_GET['update']) && isset($_GET['detail']) && isset($_GET['project'])) { ?>
                        <?php include 'components/input/project/title.php'; ?>
                        <?php include 'components/input/project/author.php'; ?>
                        <?php include 'components/input/project/advisor.php'; ?>
                        <?php include 'components/input/project/project_type.php'; ?>
                        <?php include 'components/input/select/major.php'; ?>
                        <?php include 'components/input/project/abstract.php'; ?>
                        <?php include 'components/input/project/date.php'; ?>
                        <script>
                            document.getElementById("Title").addEventListener("keyup", CheckUpdateProjectDetail)
                            document.getElementById("Author").addEventListener("change", CheckUpdateProjectDetail)
                            document.getElementById("Advisor").addEventListener("change", CheckUpdateProjectDetail)
                            document.getElementById("ProjectType").addEventListener("change", CheckUpdateProjectDetail)
                            document.getElementById("Major").addEventListener("change", CheckUpdateProjectDetail)
                            document.getElementById("Abstract").addEventListener("keyup", CheckUpdateProjectDetail)
                            document.getElementById("Date").addEventListener("change", CheckUpdateProjectDetail)
                        </script>
                    <?php } ?>

                    <?php if (isset($_GET['update']) && isset($_GET['file']) && isset($_GET['project'])) { ?>
                        <?php include 'components/input/project/file.php'; ?>
                        <script>
                            document.getElementById("ProjectFile").addEventListener("change", CheckUpdateProjectFile)
                        </script>
                    <?php } ?>

                    <?php if (isset($_GET['update']) && isset($_GET['cancel']) && isset($_GET['project'])) { ?>
                        <?php include 'components/input/project/note.php'; ?>
                        <script>
                            document.getElementById("Note").addEventListener("keyup", CheckUpdateProjectNote)
                        </script>
                    <?php } ?>

                    <?php if (isset($_GET['insert']) && isset($_GET['project_type'])) { ?>
                        <?php include 'components/input/text/name.php'; ?>
                        <script>
                            document.getElementById("Name").addEventListener("keyup", CheckInsertProjectType)
                        </script>
                    <?php } ?>

                    <?php if (isset($_GET['update']) && isset($_GET['project_type'])) { ?>
                        <?php include 'components/input/text/name.php'; ?>
                        <script>
                            document.getElementById("Name").addEventListener("keyup", CheckUpdateProjectType)
                        </script>
                    <?php } ?>

                    <?php if (isset($_GET['delete']) && isset($_GET['project_type'])) { ?>
                        <script>
                            window.onload = function() {
                                document.getElementById("Delete").disabled = false
                                document.getElementById("Delete").classList = "btn-pr";
                            }
                        </script>
                    <?php } ?>

                    <div class="form-group">
                        <button id="<?= $btn_id ?>" name="<?= $submit ?>" class="btn-se" type="submit" disabled><?= $btn_text ?></button>
                        <div class="btn-te" onclick="history.back()"><?= $cancel ?></div>
                    </div>

                </form>
            </div>
        </section>
        <?php include 'components/view/nav.php'; ?>
    </div>
</body>

</html>