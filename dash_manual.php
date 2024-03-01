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
                $data = SearchManual($name, "", $conn);
                include 'Backend/Other/GetPage.php';
                ?>

                <?php include 'components/layout/aside.php'; ?>

                <div class="menu">
                    <div class=" menu-title">
                        <h1><?= $manual_list ?></h1>
                    </div>

                    <?php if (!$data) { ?>
                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/help.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4><?= $no_data ?></h4>
                                </div>
                            </div>
                        </div>
                        <?php } else {

                        foreach ($data as $row) { ?>

                            <div class="menu-group">
                                <div class="menu-content">
                                    <div class="icon">
                                        <?php include 'components/icon/doc.php'; ?>
                                    </div>
                                    <div class="menu-title">
                                        <h4><?= $row['title'] ?></h4>
                                        <p class="menu-sub-title"><?= $created_at ?> <?= DateFormat($row['created_at']) ?></p>
                                    </div>
                                </div>
                                <div class="menu-content">
                                    <div class="icon" onclick="window.location='Backend/DBDownload.php?manual&file=<?= $row['file'] ?>'">
                                        <?php include 'components/icon/download.php'; ?>
                                    </div>
                                
                                    <?php if(isset($_SESSION['admin'])) { ?>
                                        <div class="icon" onclick="window.location='frm_manual.php?read&manual=<?= $row['id'] ?>'">
                                            <?php include 'components/icon/next.php'; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                    <?php }
                    } ?>
                </div>

                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

    </div>

</body>

</html>