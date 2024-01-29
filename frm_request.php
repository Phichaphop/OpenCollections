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
                if (isset($_GET['insert']) && isset($_GET['request'])) {
                    $title = $create_request;
                    $action = "Backend/DBRequest.php";
                    $btn_id = "Insert";
                    $btn_text = $insert;
                    $submit = "insert_request";
                }
                if (isset($_GET['detail']) && isset($_GET['request'])) {
                    $data = GetRequestByID($_GET['request'], $conn);
                }
                if (isset($_GET['delete']) && isset($_GET['request'])) {
                    $title = $delete_request;
                    $action = "Backend/DBRequest.php";
                    $btn_id = "Delete";
                    $btn_text = $delete;
                    $submit = "delete_request";
                    $_SESSION['request_id'] = $_GET['request'];
                }
                ?>

                <?php if (isset($_GET['detail'])) { ?>

                    <div class="frm-read">
                        <div class="frm-read-content">
                            <p><?= $created_at ?> <?= DateFormat($data['created_at']) ?></p>
                            <h1><?= $data['title'] ?></h1>
                        </div>
                    </div>

                    <div class="frm-read">
                        <div class="frm-read-group">
                            <div class="frm-read-content">
                                <h4><?= $detail ?></h4>
                                <p><?= $data['detail'] ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="frm-control">
                        <div class="frm-control-group">
                            <div class="btn-del" onclick="window.location='frm_request.php?delete&request=<?= $_GET['request'] ?>'"><?= $delete ?></div>
                            <div class="btn-pr" onclick="history.back()"><?= $cancel ?></div>
                        </div>
                    </div>

                <?php } ?>

                <?php if (isset($_GET['insert']) || isset($_GET['update']) || isset($_GET['delete'])) { ?>

                    <form class="form" action="<?= $action ?>" method="post" enctype="multipart/form-data" autocomplete="off">

                        <div class="form-head">
                            <h1><?= $title ?></h1>
                        </div>

                        <?php if (isset($_GET['insert']) && isset($_GET['request'])) { ?>
                            <?php include 'components/input/text/title.php'; ?>
                            <?php include 'components/input/text/detail.php'; ?>
                            <script>
                                document.getElementById("Title").addEventListener("keyup", CheckInsertRequest)
                                document.getElementById("Detail").addEventListener("keyup", CheckInsertRequest)
                            </script>
                        <?php } ?>

                        <?php if (isset($_GET['delete']) && isset($_GET['request'])) { ?>
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

    </div>

</body>

</html>