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
                if (isset($_GET['insert']) && isset($_GET['major'])) {
                    $title = $create_major;
                    $action = "backend/DBMajor.php";
                    $btn_id = "Insert";
                    $btn_text = $insert;
                    $submit = "insert_major";
                }
                if (isset($_GET['detail']) && isset($_GET['major'])) {
                    $data = GetMajorByID($_GET['major'], $conn);
                }
                if (isset($_GET['update']) && isset($_GET['major'])) {
                    $data = GetMajorByID($_GET['major'], $conn);
                    $_SESSION['major_id'] = $_GET['major'];
                    $title = $update_major;
                    $action = "backend/DBMajor.php";
                    $btn_id = "Update";
                    $btn_text = $update;
                    $submit = "update_major";
                }
                if (isset($_GET['delete']) && isset($_GET['major'])) {
                    $title = $delete_major;
                    $action = "backend/DBMajor.php";
                    $btn_id = "Delete";
                    $btn_text = $delete;
                    $submit = "delete_major";
                    $_SESSION['major_id'] = $_GET['major'];
                }
                ?>

                <?php if (isset($_GET['detail'])) { ?>

                    <div class="frm-read">
                        <div class="frm-read-content">
                            <p><?= $created_at ?> <?= DateFormat($data['created_at']) ?></p>
                            <h1><?= $data['major'] ?></h1>
                        </div>
                    </div>

                    <div class="frm-read">
                        <div class="frm-read-group">
                            <div class="frm-read-content">
                                <h4><?= $major ?></h4>
                                <p><?= $data['major'] ?></p>
                            </div>
                            <div class="frm-read-content">
                                <h4><?= $degree ?></h4>
                                <p><?= $data['degree'] ?></p>
                            </div>
                            <div class="frm-read-content">
                                <h4><?= $dept ?></h4>
                                <p><?= $data['dept'] ?></p>
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
                            <div class="btn-se" onclick="window.location='frm_major.php?update&major=<?= $_GET['major'] ?>'"><?= $update ?></div>
                            <div class="btn-del" onclick="window.location='frm_major.php?delete&major=<?= $_GET['major'] ?>'"><?= $delete ?></div>
                            <div class="btn-pr" onclick="history.back()"><?= $cancel ?></div>
                        </div>
                    </div>

                <?php } ?>

                <?php if (isset($_GET['insert']) || isset($_GET['update']) || isset($_GET['delete'])) { ?>

                    <form class="form" action="<?= $action ?>" method="post" enctype="multipart/form-data" autocomplete="off">

                        <div class="form-head">
                            <h1><?= $title ?></h1>
                        </div>

                        <?php if (isset($_GET['insert']) && isset($_GET['major'])) { ?>
                            <?php include 'components/input/text/name.php'; ?>
                            <?php include 'components/input/text/degree.php'; ?>
                            <?php include 'components/input/select/dept.php'; ?>
                            <script>
                                document.getElementById("Name").addEventListener("keyup", CheckInsertMajor)
                                document.getElementById("Degree").addEventListener("keyup", CheckInsertMajor)
                                document.getElementById("Dept").addEventListener("change", CheckInsertMajor)
                            </script>
                        <?php } ?>

                        <?php if (isset($_GET['update']) && isset($_GET['major'])) { ?>
                            <?php include 'components/input/text/name.php'; ?>
                            <?php include 'components/input/text/degree.php'; ?>
                            <?php include 'components/input/select/dept.php'; ?>
                            <script>
                                document.getElementById("Name").addEventListener("keyup", CheckUpdateMajor)
                                document.getElementById("Degree").addEventListener("keyup", CheckUpdateMajor)
                                document.getElementById("Dept").addEventListener("change", CheckUpdateMajor)
                            </script>
                        <?php } ?>

                        <?php if (isset($_GET['delete']) && isset($_GET['major'])) { ?>
                            <script>
                                window.onload = function() {
                                    document.getElementById("Delete").disabled = false
                                    document.getElementById("Delete").classList = "btn-pr";
                                }
                            </script>
                        <?php } ?>

                        <div class="form-group">
                            <div class="form-set">
                                <div id="MsgBoxFrmMajor" class="validation-msg">
                                    <div class="MsgContent">
                                        <span id="MsgIconFrmMajor" class="material-symbols-outlined icon"></span>
                                    </div>
                                    <p id="MsgFrmMajor" class="validation-message"></p>
                                </div>
                            </div>
                        </div>

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