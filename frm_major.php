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
                if (isset($_GET['insert']) && isset($_GET['major'])) {
                    $title = $create_major;
                    $action = "Backend/DBMajor.php";
                    $btn_id = "Insert";
                    $btn_text = $insert;
                    $submit = "insert_major";
                }
                if (isset($_GET['update']) && isset($_GET['major'])) {
                    $data = GetMajorByID($_GET['major'], $conn);
                    $_SESSION['major_id'] = $_GET['major'];
                    $title = $update_major;
                    $action = "Backend/DBMajor.php";
                    $btn_id = "Update";
                    $btn_text = $update;
                    $submit = "update_major";
                }
                if (isset($_GET['delete']) && isset($_GET['major'])) {
                    $title = $delete_major;
                    $action = "Backend/DBMajor.php";
                    $btn_id = "Delete";
                    $btn_text = $delete;
                    $submit = "delete_major";
                    $_SESSION['major_id'] = $_GET['major'];
                }
                ?>

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