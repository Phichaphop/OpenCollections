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
                if (isset($_SESSION['admin'])) {
                    $id = "";
                    $total = CountTotalApprove($conn);
                    $draft_num = CountTotalApproveDraft($conn);
                    $wait_num = CountTotalApproveWait($conn);
                    $approve_num = CountTotalApproveApprove($conn);
                    $not_num = CountTotalApproveNot($conn);
                } else {
                    $id = $MyID;
                    $total = CountMyApprove($MyID, $conn);
                    $draft_num = CountMyApproveDraft($MyID, $conn);
                    $wait_num = CountMyApproveWait($MyID, $conn);
                    $approve_num = CountMyApproveApprove($MyID, $conn);
                    $not_num = CountMyApproveNot($MyID, $conn);
                }
                $name = $_GET['name'] ?? '';
                $type = $_GET['type'] ?? '';
                $data = SearchProjectWait($name, $type, $id, $conn);
                include 'Backend/Other/GetPage.php';
                ?>

                <?php include 'components/input/search/search.php'; ?>
                <?php include 'components/layout/aside.php'; ?>

                <div class="dash">
                    <div class="dash-title">
                        <h1><?= $approve_dashboard ?></h1>
                    </div>
                    <div class="dash-group">
                        <div class="icon">
                            <?php include 'components/icon/project.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $project ?></h4>
                            <p><?= $total ?> <?= $project ?></p>
                        </div>
                    </div>

                    <div class="dash-group">
                        <div class="icon-main">
                            <?php include 'components/icon/draft.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $draft ?></h4>
                            <p><?= $draft_num ?> <?= $project ?></p>
                        </div>
                    </div>

                    <div class="dash-group">
                        <div class="icon-orange">
                            <?php include 'components/icon/wait.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $wait ?></h4>
                            <p><?= $wait_num ?> <?= $project ?></p>
                        </div>
                    </div>

                    <div class="dash-group">
                        <div class="icon-green">
                            <?php include 'components/icon/approve.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $approve ?></h4>
                            <p><?= $approve_num ?> <?= $project ?></p>
                        </div>
                    </div>

                    <div class="dash-group">
                        <div class="icon-red">
                            <?php include 'components/icon/not_approve.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $not_approve ?></h4>
                            <p><?= $not_num ?> <?= $project ?></p>
                        </div>
                    </div>

                </div>

                <div class="menu">
                    <div class=" menu-title">
                        <h1><?= $approve_list ?></h1>
                    </div>
                    <?php if (!$data) { ?>
                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/project.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4><?= $no_data ?></h4>
                                </div>
                            </div>
                        </div>
                        <?php } else {

                        foreach ($currentPageData as $row) { ?>

                            <div class="menu-group" onclick="window.location='frm_read.php?project=<?= $row['id'] ?>'">
                                <div class="menu-content">

                                    <?php if ($row['status'] == "1") { ?>
                                        <div class="icon-main">
                                            <?php include 'components/icon/draft.php'; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($row['status'] == "2") { ?>
                                        <div class="icon-orange">
                                            <?php include 'components/icon/wait.php'; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($row['status'] == "3") { ?>
                                        <div class="icon-green">
                                            <?php include 'components/icon/approve.php'; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($row['status'] == "4") { ?>
                                        <div class="icon-red">
                                            <?php include 'components/icon/not_approve.php'; ?>
                                        </div>
                                    <?php } ?>

                                    <div class="menu-title">
                                        <h4><?= $row['title'] ?></h4>
                                        <p class="menu-sub-title"><?= GetNameStatusByID($row['status'], $conn) ?></p>
                                    </div>
                                </div>
                                <div class="menu-content">
                                    <div class="icon" onclick="window.location='frm_project.php?update&project=<?= $row['id'] ?>'">
                                        <?php include 'components/icon/edit.php'; ?>
                                    </div>
                                </div>
                            </div>

                    <?php }
                    } ?>
                    <?php include 'components/layout/menu_page.php'; ?>
                </div>

                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

    </div>

</body>

</html>