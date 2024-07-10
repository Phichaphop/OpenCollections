<?php require_once 'backend/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'head.php'; ?>

<body onload="set()">

    <?php require_once 'components/loading/loading.php'; ?>

    <div class="container">

        <?php include "components/layout/aside.php" ?>

        <?php require_once 'components/layout/header.php'; ?>

        <section>

            <?php require_once 'components/layout/alert.php'; ?>

            <!-- Content here -->

            <div class="gallery full">


                <?php
                $name = isset($_GET['name']) ? $_GET['name'] : '';
                $type = isset($_GET['type']) ? $_GET['type'] : '';
                $major = isset($_GET['major']) ? $_GET['major'] : '';
                $data = SearchFavorite($name, $type, $major, $MyID, $conn);
                include 'backend/Other/GetPage.php';
                ?>

                <?php include 'components/input/search/search.php'; ?>
                <?php include 'components/layout/sub_menu.php'; ?>

                <?php if (!$data) { ?>
                    <div class="gallery-group">
                        <div class="gallery-icon">
                            <?php include 'components/icon/favorite.php'; ?>
                            <h4><?= $no_data ?></h4>
                        </div>
                    </div>
                    <?php } else {

                    foreach ($currentPageData as $row) { ?>

                        <div class="gallery-group" onclick="window.location='frm_project.php?detail&project=<?= $row['id'] ?>'">

                            <?php if (!$row['cover']) { ?>
                                <div class="gallery-cover">
                                    <div class="gallery-cover-content">
                                        <?php if (!$row['ins_pic']) { ?>
                                            <img class="gallery-pic" src="resource/img/logo/opc.png">
                                        <?php } else { ?>
                                            <img class="gallery-pic" src="resource/img/ins_logo/<?= $row['ins_pic'] ?>">
                                        <?php } ?>
                                        <p class="gallery-cover-text"><?= $row['type'] ?></p>
                                    </div>
                                    <div class="gallery-cover-content">
                                        <p class="gallery-cover-text"><?= $row['ins'] ?></p>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <img class="gallery-cover-pic" src="resource/img/project/<?= $row['cover'] ?>">
                            <?php } ?>


                            <div class="gallery-content">
                                <h4><?= $row['title'] ?></h4>
                                <p><?= $author ?> : <a class="text-link"><?= GetNameAuthorByID($row['author'], $conn) ?></a></p>
                                <p><?= $release ?> : <a class="text-link"><?= DateFormat($row['date']) ?></a></p>
                            </div>
                        </div>

                <?php }
                } ?>
                <?php include 'components/layout/menu_page.php'; ?>
            </div>

            <!-- End Content here -->

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

        <?php require_once 'components/layout/footer.php'; ?>

    </div>

</body>

</html>