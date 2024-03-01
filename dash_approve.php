<?php require_once 'Backend/DBSession.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'head.php'; ?>

<body onload="set()">

    <?php require_once 'components/loading/loading.php'; ?>

    <div class="container">

        <?php include "components/layout/side.php" ?>

        <?php require_once 'components/layout/header.php'; ?>

        <section>

            <div class="section-group">

                <?php require_once 'components/layout/alert.php'; ?>

                <!-- Content here -->

                <?php

                $name = $_GET['name'] ?? '';
                $type = $_GET['type'] ?? '';
                $major = $_GET['major'] ?? '';

                if (isset($_SESSION['admin'])) {
                    $total = CountTotalApprove("", $conn);
                    $draft_num = CountTotalApprove("1", $conn);
                    $verify_num = CountTotalApprove("2", $conn);
                    $wait_num = CountTotalApprove("3", $conn);
                    $approve_num = CountTotalApprove("4", $conn);
                    $not_num = CountTotalApprove("5", $conn);
                    $data = SearchProject($name, $type, $major, "", "approver", "", "1", $conn);
                } else if (isset($_SESSION['publisher']) || isset($_SESSION['officer']) || isset($_SESSION['user'])) {
                    if (isset($_SESSION['officer'])) {
                        $person = "advisor";
                        $status = "2";
                    } else if (isset($_SESSION['publisher'])) {
                        $person = "approver";
                        $status = "3";
                    } else if (isset($_SESSION['user'])) {
                        $person = "author";
                        $status = "";
                    }
                    $total = CountProject($_SESSION['login'], $person, "", $conn);
                    $draft_num = CountProject($_SESSION['login'], $person, "1", $conn);
                    $verify_num = CountProject($_SESSION['login'], $person, "2", $conn);
                    $wait_num = CountProject($_SESSION['login'], $person, "3", $conn);
                    $approve_num = CountProject($_SESSION['login'], $person, "4", $conn);
                    $not_num = CountProject($_SESSION['login'], $person, "5", $conn);
                    $data = SearchProject($name, $type, $major, $_SESSION['login'], $person, $status, "", $conn);
                }

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
                        <div class="icon-body">
                            <?php include 'components/icon/draft.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $draft ?></h4>
                            <p><?= $draft_num ?> <?= $project ?></p>
                        </div>
                    </div>


                    <div class="dash-group">
                        <div class="icon-main">
                            <?php include 'components/icon/verify.php'; ?>
                        </div>
                        <div class="dash-content">
                            <h4><?= $wait_verify ?></h4>
                            <p><?= $verify_num ?> <?= $project ?></p>
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

                            <div class="menu-group" onclick="window.location='frm_project.php?read&project=<?= $row['id'] ?>'">
                                <div class="menu-content">

                                    <?php if ($row['status'] == "1") { ?>
                                        <div class="icon-body">
                                            <?php include 'components/icon/draft.php'; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($row['status'] == "2") { ?>
                                        <div class="icon-main">
                                            <?php include 'components/icon/verify.php'; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($row['status'] == "3") { ?>
                                        <div class="icon-orange">
                                            <?php include 'components/icon/wait.php'; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($row['status'] == "4") { ?>
                                        <div class="icon-green">
                                            <?php include 'components/icon/approve.php'; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($row['status'] == "5") { ?>
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