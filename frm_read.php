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

            <div class="section-read">

            <?php require_once 'components/layout/alert.php'; ?>

                <!-- Content here -->

                <?php if (isset($_GET['project'])) { ?>
                    <?php $data = GetProjectByID($_GET['project'], $conn); ?>

                    <div id="title-top" class="frm-read">
                        <div class="frm-read-content">
                            <p><?= $data['type'] ?> / <?= $release_date ?> <?= DateFormat($data['date']) ?></p>
                            <h1><?= $data['title'] ?></h1>
                        </div>
                    </div>

                    <div class="frm-read">

                        <div class="frm-read-group">

                            <div class="project-cover">

                                <div class="project-cover-content">
                                    <img class="cover-pic" src="resource/img/ins_logo/<?= $data['pic'] ?>">
                                    <p class="cover-text"><?= $data['title'] ?></p>
                                </div>
                                <div class="project-cover-content">
                                    <p class="cover-text"><?= $data['ins'] ?></p>
                                </div>

                            </div>

                        </div>

                        <div class="frm-read-group">


                            <div class="frm-read-content" id="title-detail">
                                <p><?= $data['type'] ?> / <?= $release_date ?> <?= DateFormat($data['date']) ?></p>
                                <h1><?= $data['title'] ?></h1>
                            </div>


                            <div class="frm-read-content">
                                <h4><?= $title ?></h4>
                                <p><?= $data['title'] ?></p>
                            </div>
                            <div class="frm-read-content">
                                <h4><?= $author ?></h4>
                                <p><?= $data['author'] ?></p>
                            </div>
                            <div class="frm-read-content">
                                <h4><?= $advisor ?></h4>
                                <p><?= $data['advisor'] ?></p>
                            </div>
                            <div class="frm-read-content">
                                <h4><?= $project_type ?></h4>
                                <p><?= $data['type'] ?></p>
                            </div>
                            <div class="frm-read-content">
                                <h4><?= $major ?></h4>
                                <p><?= $data['major'] ?></p>
                            </div>
                            <div class="frm-read-content">
                                <h4><?= $abstract ?></h4>
                                <p><?= $data['abstract']/*CutAbstract($data['abstract'])*/ ?></p>
                            </div>

                            <?php
                            if (isset($_SESSION['login'])) {
                                $favorite = CheckFavorite($_GET['project'], $MyID, $conn);
                                if (!$favorite) {
                                    $favorite_text = $addfavorite;
                                    $favorite_icon = "font-variation-settings:'FILL' 0;";
                                } else {
                                    $favorite_text = $unfavorite;
                                    $favorite_icon = "font-variation-settings:'FILL' 1;";
                                }
                            } else {
                                $favorite_text = $favorite;
                                $favorite_icon = "font-variation-settings:'FILL' 0;";
                            }
                            ?>

                            <div class="frm-read-content row">
                                <?php if (isset($_SESSION['login'])) { ?>

                                    <div class="btn-normal-pr" onclick="window.location='Backend/DBFavorite.php?project=<?= $data['id'] ?>&favorite'">
                                        <span class="material-symbols-outlined" style="<?= $favorite_icon ?>">favorite</span>
                                        <?= $favorite_text ?>
                                    </div>

                                <?php } else { ?>

                                    <div class="btn-normal-pr" onclick="window.location='signin.php'">
                                        <span class="material-symbols-outlined" style="<?= $favorite_icon ?>">favorite</span>
                                        <?= $favorite_text ?>
                                    </div>

                                <?php } ?>

                                <div class="btn-normal-se" onclick="window.location='Backend/DBDownload.php?file=<?= $data['file'] ?>'">
                                    <?php include 'components/icon/download.php'; ?>
                                    <?= $download ?>
                                </div>
                                <a class="btn-normal-se" href="resource/doc/<?= $data['file'] ?>" target="_blank" ?>
                                    <?php include 'components/icon/View.php'; ?>
                                    <?= $view ?>
                                </a>

                            </div>

                        </div>

                    </div>


                    <?php if (($data['author'] == isset($_SESSION['login'])) && ($data['status'] == "1" || $data['status'] == "4")) { ?>
                        <div class="frm-read">
                            <div class="frm-read-content">
                                <h4><?= $status ?></h4>
                                <p><?= GetNameProjectStatusByID($data['status'], $conn) ?></p>
                            </div>
                            <div class="frm-read-content">
                                <h4><?= $note ?></h4>
                                <p><?= $data['note'] ?></p>
                            </div>
                        </div>
                        <div class="frm-read">
                            <div class="btn-pr" onclick="window.location='Backend/DBApprove.php?draft&project=<?= $_GET['project'] ?>'"><?= $sent ?></div>
                            <div class="btn-se" onclick="window.location='frm_project.php?update&detail&project=<?= $_GET['project'] ?>'"><?= $edit_project_detail ?></div>
                            <div class="btn-se" onclick="window.location='frm_project.php?update&file&project=<?= $_GET['project'] ?>'"><?= $edit_project_file ?></div>
                            <div class="btn-del" onclick="window.location='VerifyPass.php?project=<?= $_GET['project'] ?>'">><?= $delete ?></div>
                            <div class="btn-se" onclick="history.back()"><?= $cancel ?></div>
                        </div>
                    <?php } ?>

                    <?php if ((isset($_SESSION['admin']) || isset($_SESSION['officer']) == $data['advisor']) && $data['status'] == "2") { ?>
                        <div class="frm-read">
                            <div class="btn-del" onclick="window.location='frm_project.php?update&cancel&project=<?= $_GET['project'] ?>&cancel'"><?= $not_approve ?></div>
                            <div class="btn-pr" onclick="window.location='Backend/DBApprove.php?project=<?= $_GET['project'] ?>&approve'"><?= $approve ?></div>
                            <div class="btn-se" onclick="history.back()"><?= $cancel ?></div>
                        </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['admin']) && $data['status'] == "3") { ?>
                        <div class="frm-read">
                            <div class="btn-se" onclick="window.location='frm_project.php?update&detail&project=<?= $_GET['project'] ?>'"><?= $update ?></div>
                            <div class="btn-del" onclick="window.location='VerifyPass.php?project=<?= $_GET['project'] ?>'"><?= $delete ?></div>
                            <div class="btn-se" onclick="history.back()"><?= $cancel ?></div>
                        </div>
                    <?php } ?>

                <?php } ?>

                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

    </div>

</body>

</html>