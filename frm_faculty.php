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
                if (isset($_GET['insert']) && isset($_GET['faculty'])) {
                    $title = $create_faculty;
                    $action = "Backend/DBMajor.php";
                    $btn_id = "Insert";
                    $btn_text = "$insert";
                    $submit = "insert_faculty";
                }
                if (isset($_GET['update']) && isset($_GET['faculty'])) {
                    $data = GetFacultyByID($_GET['faculty'], $conn);
                    $_SESSION['faculty_id'] = $_GET['faculty'];

                    $title = $update_faculty;
                    $action = "Backend/DBMajor.php";
                    $btn_id = "Update";
                    $btn_text = "$update";
                    $submit = "update_faculty";
                }
                if (isset($_GET['delete']) && isset($_GET['faculty'])) {
                    $title = $delete_faculty;
                    $action = "Backend/DBMajor.php";
                    $btn_id = "Delete";
                    $btn_text = "$delete";
                    $submit = "delete_faculty";
                    $_SESSION['faculty_id'] = $_GET['faculty'];
                }
                ?>

                <form class="form" action="<?= $action ?>" method="post" enctype="multipart/form-data" autocomplete="off">

                    <div class="form-head">
                        <h1><?= $title ?></h1>
                    </div>

                    <?php if (isset($_GET['insert']) && isset($_GET['faculty'])) { ?>
                        <?php include 'components/input/text/name.php'; ?>
                        <?php include 'components/input/select/institute.php'; ?>
                        <script>
                            document.getElementById("Name").addEventListener("keyup", CheckInsertFaculty)
                            document.getElementById("Ins").addEventListener("change", CheckInsertFaculty)
                        </script>
                    <?php } ?>

                    <?php if (isset($_GET['update']) && isset($_GET['faculty'])) { ?>
                        <?php include 'components/input/text/name.php'; ?>
                        <?php include 'components/input/select/institute.php'; ?>
                        <script>
                            document.getElementById("Name").addEventListener("keyup", CheckUpdateFaculty)
                            document.getElementById("Ins").addEventListener("change", CheckUpdateFaculty)
                        </script>
                    <?php } ?>

                    <?php if (isset($_GET['delete']) && isset($_GET['faculty'])) { ?>
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

                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

    </div>

</body>

</html>