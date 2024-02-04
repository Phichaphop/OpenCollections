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
                if (isset($_GET['read']) && isset($_GET['manual'])) {
                    $data = GetManualByID($_GET['manual'], $conn);
                }
                if (isset($_GET['insert']) && isset($_GET['manual'])) {
                    $title = $create_manual;
                    $action = "Backend/DBManual.php";
                    $btn_id = "Insert";
                    $btn_text = $insert;
                    $submit = "insert_manual";
                }
                if (isset($_GET['update']) && isset($_GET['detail']) && isset($_GET['manual'])) {
                    $data = GetManualByID($_GET['manual'], $conn);
                    $_SESSION['manual_id'] = $_GET['manual'];
                    $title = $update_manual;
                    $action = "Backend/DBManual.php";
                    $btn_id = "Update";
                    $btn_text = $update;
                    $submit = "update_detail_manual";
                }
                if (isset($_GET['update']) && isset($_GET['file']) && isset($_GET['manual'])) {
                    $title = $update_manual;
                    $action = "Backend/DBManual.php";
                    $btn_id = "Update";
                    $btn_text = $update;
                    $submit = "update_file_manual";
                    $_SESSION['manual_id'] = $_GET['manual'];
                }
                if (isset($_GET['delete']) && isset($_GET['manual'])) {
                    $title = $delete_manual;
                    $action = "Backend/DBManual.php";
                    $btn_id = "Delete";
                    $btn_text = "$delete";
                    $submit = "delete_manual";
                    $_SESSION['manual_id'] = $_GET['manual'];
                }
                ?>

                <?php if (isset($_GET['read'])) { ?>

                    <div class="frm-read">
                        <div class="frm-read-content">
                            <p><?= $last_update ?> <?= DateFormat($data['updated_at']) ?></p>
                            <h1><?= $data['title'] ?></h1>
                        </div>
                    </div>

                    <div class="frm-read">
                        <div class="frm-read-group">
                            <div class="frm-read-content">
                                <h4><?= $title ?></h4>
                                <p><?= $data['title'] ?></p>
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
                            <div class="btn-se" onclick="window.location='frm_manual.php?update&detail&manual=<?= $_GET['manual'] ?>'"><?= $edit_detail ?></div>
                            <div class="btn-se" onclick="window.location='frm_manual.php?update&file&manual=<?= $_GET['manual'] ?>'"><?= $edit_file ?></div>
                            <div class="btn-del" onclick="window.location='frm_manual.php?delete&manual=<?= $_GET['manual'] ?>'"><?= $delete ?></div>
                            <div class="btn-pr" onclick="window.location='dash_manual.php'"><?= $back ?></div>
                        </div>
                    </div>

                <?php } ?>

                <?php if (isset($_GET['insert']) || isset($_GET['update']) || isset($_GET['delete'])) { ?>

                    <form class="form" action="<?= $action ?>" method="post" enctype="multipart/form-data" autocomplete="off">

                        <div class="form-head">
                            <h1><?= $title ?></h1>
                        </div>

                        <?php if (isset($_GET['insert']) && isset($_GET['manual'])) { ?>
                            <?php include 'components/input/text/title.php'; ?>
                            <?php include 'components/input/file/doc.php'; ?>
                            <script>
                                document.getElementById("Title").addEventListener("keyup", CheckInsertManual)
                                document.getElementById("File").addEventListener("change", CheckInsertManual)
                            </script>
                        <?php } ?>

                        <?php if (isset($_GET['update']) && isset($_GET['detail']) && isset($_GET['manual'])) { ?>
                            <?php include 'components/input/text/title.php'; ?>
                            <script>
                                document.getElementById("Title").addEventListener("keyup", CheckUpdateDetailManual)
                            </script>
                        <?php } ?>

                        <?php if (isset($_GET['update']) && isset($_GET['file']) && isset($_GET['manual'])) { ?>
                            <?php include 'components/input/file/doc.php'; ?>
                            <script>
                                document.getElementById("File").addEventListener("change", CheckUpdateFileManual)
                            </script>
                        <?php } ?>

                        <?php if (isset($_GET['delete']) && isset($_GET['manual'])) { ?>
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

                <?php } ?>

                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

    </div>

</body>

</html>