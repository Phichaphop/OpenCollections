<?php require_once 'backend/config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<?php include "components/layout/head.php" ?>

<body>

    <?php
    $data = GetProjectByID($_GET['id'], $conn);
    ?>

    <?php if ($_GET['print'] = "project") { ?>
        <div class="section-read">
            <div class="frm-read">

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
                </div>
            </div>
        <?php } ?>

        <div class="frm-read-content row">
            <button class="btn btn-pr" onclick="window.print()"><?= $print ?></button>
            <button class="btn btn-se" onclick="history.back()"><?= $cancel ?></button>
        </div>

        </div>

</body>

</html>