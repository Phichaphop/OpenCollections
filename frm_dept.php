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
                if (isset($_GET['insert']) && isset($_GET['dept'])) {
                    $title = $create_department;
                    $action = "backend/DBMajor.php";
                    $btn_id = "Insert";
                    $btn_text = $insert;
                    $submit = "insert_dept";
                }
                if (isset($_GET['detail']) && isset($_GET['dept'])) {
                    $data = GetDeptByID($_GET['dept'], $conn);
                }
                if (isset($_GET['update']) && isset($_GET['dept'])) {
                    $data = GetDeptByID($_GET['dept'], $conn);
                    $_SESSION['dept_id'] = $_GET['dept'];
                    $title = $update_department;
                    $action = "backend/DBMajor.php";
                    $btn_id = "Update";
                    $btn_text = $update;
                    $submit = "update_dept";
                }
                if (isset($_GET['delete']) && isset($_GET['dept'])) {
                    $title = $delete_department;
                    $action = "backend/DBMajor.php";
                    $btn_id = "Delete";
                    $btn_text = $delete;
                    $submit = "delete_dept";
                    $_SESSION['dept_id'] = $_GET['dept'];
                }
                ?>

                <?php if (isset($_GET['detail'])) { ?>

                    <div class="frm-read">
                        <div class="frm-read-content">
                            <p><?= $created_at ?> <?= DateFormat($data['created_at']) ?></p>
                            <h1><?= $data['dept'] ?></h1>
                        </div>
                    </div>

                    <div class="frm-read">
                        <div class="frm-read-group">
                            <div class="frm-read-content">
                                <h4><?= $dept ?></h4>
                                <p><?= $data['dept'] ?></p>
                            </div>
                            <div class="frm-read-content">
                                <h4><?= $faculty ?></h4>
                                <p><?= $data['faculty'] ?></p>
                            </div>
                            <div class="frm-read-content">
                                <h4><?= $institute ?></h4>
                                <p><?= $data['ins'] ?></p>
                            </div>
                            <div class="frm-read-content">
                                <h4><?= $created_at ?></h4>
                                <p><?= DateFormat($data['created_at']) ?></p>
                            </div>
                            <div class="frm-read-content">
                                <h4><?= $last_update ?></h4>
                                <p><?= DateFormat($data['updated_at']) ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="frm-control">
                        <div class="frm-control-group">
                            <div class="btn-se" onclick="window.location='frm_dept.php?update&dept=<?= $_GET['dept'] ?>'"><?= $update ?></div>
                            <div class="btn-del" onclick="window.location='frm_dept.php?delete&dept=<?= $_GET['dept'] ?>'"><?= $delete ?></div>
                            <div class="btn-pr" onclick="history.back()"><?= $cancel ?></div>
                        </div>
                    </div>

                <?php } ?>

                <?php if (isset($_GET['insert']) || isset($_GET['update']) || isset($_GET['delete'])) { ?>

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

                        <div class="frm-control">
                            <div class="frm-control-group">
                                <button id="<?= $btn_id ?>" name="<?= $submit ?>" class="btn-se" type="submit" disabled><?= $btn_text ?></button>
                                <div class="btn-te" onclick="history.back()"><?= $cancel ?></div>
                            </div>
                        </div>

                    </form>

                <?php } ?>

                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

        <?php require_once 'components/layout/footer.php'; ?>

    </div>

</body>

</html>