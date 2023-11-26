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

            <?php require_once 'components/layout/alert.php'; ?>

            <!-- Content here -->

            <div class="gallery">


                <?php
                $name = $_GET['name'] ?? '';
                $type = $_GET['type'] ?? '';
                $data = SearchFavorite($name, $MyID, $conn);
                include 'Backend/Other/GetPage.php';
                ?>

                <?php include 'components/input/search/search.php'; ?>
                <?php include 'components/layout/aside.php'; ?>

                <?php if (!$data) { ?>
                    <div class="gallery-group">
                        <div class="gallery-icon">
                            <?php include 'components/icon/favorite.php'; ?>
                            <h4><?= $no_data ?></h4>
                        </div>
                    </div>
                    <?php } else {

                    foreach ($currentPageData as $row) { ?>

                        <div class="gallery-group" onclick="window.location='frm_project.php?read&project=<?= $row['id'] ?>'">
                            <div class="gallery-cover">
                                <div class="gallery-cover-content">
                                    <img class="gallery-pic" src="resource/img/ins_logo/<?= $row['pic'] ?>">
                                    <p class="gallery-cover-text"><?= $row['type'] ?></p>
                                </div>
                                <div class="gallery-cover-content">
                                    <p class="gallery-cover-text"><?= $row['ins'] ?></p>
                                </div>
                            </div>
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

    </div>

</body>

</html>