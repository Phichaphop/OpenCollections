<?php
require_once 'Backend/DBSession.php';
if (isset($_GET['insert']) && isset($_GET['ins'])) {
    $title = $create_institute;
    $action = "Backend/DBMajor.php";
    $btn_id = "Insert";
    $btn_text = $insert;
    $submit = "insert_ins";
}
if (isset($_GET['update']) && isset($_GET['pic']) && isset($_GET['ins'])) {
    $data = GetInsByID($_GET['ins'], $conn);
    $_SESSION['ins_id'] = $_GET['ins'];

    $title = $update_institute;
    $action = "Backend/DBMajor.php";
    $btn_id = "Update";
    $btn_text = $update;
    $submit = "update_pic_ins";
}
if (isset($_GET['update']) && isset($_GET['detail']) && isset($_GET['ins'])) {
    $data = GetInsByID($_GET['ins'], $conn);
    $_SESSION['ins_id'] = $_GET['ins'];

    $title = $update_institute;
    $action = "Backend/DBMajor.php";
    $btn_id = "Update";
    $btn_text = $delete;
    $submit = "update_detail_ins";
}
if (isset($_GET['delete']) && isset($_GET['ins'])) {
    $title = $delete_institute;
    $action = "Backend/DBMajor.php";
    $btn_id = "Delete";
    $btn_text = "";
    $submit = "delete_ins";
    $_SESSION['ins_id'] = $_GET['ins'];
}
if (isset($_GET['read']) && isset($_GET['ins'])) {
    $data = GetInsByID($_GET['ins'], $conn);
    $ins_path = "ins_logo";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
    <?php include 'components/loading/loading.php'; ?>

    <div class="container">
        <?php include 'components/layout/header.php'; ?>
        <section>
            <div class="section-group">
                <?php include 'components/layout/alert.php'; ?>

                <?php if (isset($_GET['read'])) { ?>

                    <div class="frm-read">
                        <div class="frm-read-content">
                            <p><?= $last_update ?> <?= DateFormat($data['updated_at']) ?></p>
                            <h1><?= $data['ins'] ?></h1>
                        </div>
                    </div>

                    <div class="frm-read">
                        <div class="frm-read-group">
                            <div class="read-content-pic">
                                <?php if (!$data['pic']) { ?>
                                    <div onclick="window.location='frm_ins.php?update&pic&ins=<?= $_GET['ins'] ?>'">
                                        <?php include 'components/icon/add_pic.php'; ?>
                                    </div>
                                <?php } else { ?>
                                    <img class="read-pic" id="PreviewPic" src="./Backend/Picture/<?= $ins_path ?>/<?= $data['pic'] ?>">
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="frm-read">
                        <div class="frm-read-group">
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

                    <div class="frm-read">
                        <div class="btn-se" onclick="window.location='frm_ins.php?update&pic&ins=<?= $_GET['ins'] ?>'"><?= $edit_picture ?></div>
                        <div class="btn-se" onclick="window.location='frm_ins.php?update&detail&ins=<?= $_GET['ins'] ?>'"><?= $edit_detail ?></div>
                        <div class="btn-del" onclick="window.location='frm_ins.php?delete&ins=<?= $_GET['ins'] ?>'"><?= $delete ?></div>
                        <div class="btn-pr" onclick="window.location='dash_ins.php'"><?= $back ?></div>
                    </div>

                <?php } ?>

                <?php if (isset($_GET['insert']) || isset($_GET['update']) || isset($_GET['delete'])) { ?>

                    <form class="form" action="<?= $action ?>" method="post" enctype="multipart/form-data" autocomplete="off">

                        <div class="form-head">
                            <h1><?= $title ?></h1>
                        </div>

                        <?php if (isset($_GET['insert']) && isset($_GET['ins'])) { ?>
                            <?php include 'components/input/file/pic.php'; ?>
                            <?php include 'components/input/text/name.php'; ?>
                            <script>
                                document.getElementById("Pic").addEventListener("change", CheckInsertIns)
                                document.getElementById("Name").addEventListener("keyup", CheckInsertIns)
                            </script>
                        <?php } ?>

                        <?php if (isset($_GET['update']) && isset($_GET['pic']) && isset($_GET['ins'])) { ?>
                            <?php include 'components/input/file/pic.php'; ?>
                            <script>
                                document.getElementById("Pic").addEventListener("change", CheckUpdatePicIns)
                            </script>
                        <?php } ?>

                        <?php if (isset($_GET['update']) && isset($_GET['detail']) && isset($_GET['ins'])) { ?>
                            <?php include 'components/input/text/name.php'; ?>
                            <script>
                                document.getElementById("Name").addEventListener("keyup", CheckUpdateDetailIns)
                            </script>
                        <?php } ?>

                        <?php if (isset($_GET['delete']) && isset($_GET['ins'])) { ?>
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

            </div>
        </section>
        <?php include 'components/layout/nav.php'; ?>
    </div>
</body>

</html>