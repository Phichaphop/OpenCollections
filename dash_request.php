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
            if (isset($_SESSION['admin'])) {
                $id = "";
            } else {
                $id = $MyID;
            }
            $name = $_GET['name'] ?? '';
            $data = SearchRequest($name, $id, $conn);
            include 'Backend/Other/GetPage.php';
            ?>

            <?php include 'components/input/search/search.php'; ?>
            <?php include 'components/layout/aside.php'; ?>

            <div class="dash">
                <div class="dash-title">
                    <h1><?= $request_dashboard ?></h1>
                </div>
                <div class="dash-group">
                    <div class="dash-icon">
                        <?php include 'components/icon/contact_web.php'; ?>
                    </div>
                    <div class="dash-content">
                        <h4><?= $request_user ?></h4>
                        <p><?= CountRequest($id, $conn) ?> <?= $request ?></p>
                    </div>
                </div>
            </div>

            <div class="menu">
                <div class=" menu-title">
                    <h1><?= $request_list ?></h1>
                </div>

                <?php if (!$data) { ?>
                    <div class="menu-group">
                        <div class="menu-icon">
                            <?php include 'components/icon/contact_web.php'; ?>
                        </div>
                        <div class="menu-content">
                            <h4><?= $no_data ?></h4>
                        </div>
                    </div>
                    <?php } else {

                    foreach ($currentPageData as $row) { ?>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/contact_web.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4><?= $row['title'] ?></h4>
                                <p><?= $created_at ?> <?= DateFormat($row['created_at']) ?></p>
                            </div>

                            <div class="menu-next" onclick="window.location='frm_request.php?delete&request=<?= $row['id'] ?>'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>

                            <div class="menu-next" onclick="window.location='frm_request.php?detail&request=<?= $row['id'] ?>'">
                                <?php include 'components/icon/next.php'; ?>
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