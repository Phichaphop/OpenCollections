<?php require_once 'Backend/DBSession.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'head.php'; ?>

<body>

    <?php require_once 'components/loading/loading.php'; ?>

    <div class="container">

        <?php include "components/layout/side.php" ?>

        <?php require_once 'components/layout/header.php'; ?>

        <section>

            <div class="section-group">

            <?php require_once 'components/layout/alert.php'; ?>

                <!-- Content here -->

                <?php
                if (isset($_GET['insert']) && isset($_GET['dept'])) {
                    $title = $create_department;
                    $action = "Backend/DBMajor.php";
                    $btn_id = "Insert";
                    $btn_text = $insert;
                    $submit = "insert_dept";
                }
                if (isset($_GET['update']) && isset($_GET['dept'])) {
                    $data = GetDeptByID($_GET['dept'], $conn);
                    $_SESSION['dept_id'] = $_GET['dept'];
                    $title = $update_department;
                    $action = "Backend/DBMajor.php";
                    $btn_id = "Update";
                    $btn_text = $update;
                    $submit = "update_dept";
                }
                if (isset($_GET['delete']) && isset($_GET['dept'])) {
                    $title = $delete_department;
                    $action = "Backend/DBMajor.php";
                    $btn_id = "Delete";
                    $btn_text = $delete;
                    $submit = "delete_dept";
                    $_SESSION['dept_id'] = $_GET['dept'];
                }
                ?>

                <form class="form" action="<?= $action ?>" method="post" enctype="multipart/form-data" autocomplete="off">

                    <div class="form-head">
                        <h1><?= $title ?></h1>
                    </div>

                    <?php if (isset($_GET['insert']) && isset($_GET['dept'])) { ?>
                        <?php include 'components/input/text/name.php'; ?>
                        <?php include 'components/input/select/faculty.php'; ?>
                        <script>
                            document.getElementById("Name").addEventListener("keyup", CheckInsertDept)
                            document.getElementById("Faculty").addEventListener("change", CheckInsertDept)
                        </script>
                    <?php } ?>

                    <?php if (isset($_GET['update']) && isset($_GET['dept'])) { ?>
                        <?php include 'components/input/text/name.php'; ?>
                        <?php include 'components/input/select/faculty.php'; ?>
                        <script>
                            document.getElementById("Name").addEventListener("keyup", CheckUpdateDept)
                            document.getElementById("Faculty").addEventListener("change", CheckUpdateDept)
                        </script>
                    <?php } ?>

                    <?php if (isset($_GET['delete']) && isset($_GET['dept'])) { ?>
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