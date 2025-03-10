<?php require_once 'backend/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include "components/layout/head.php" ?>

<body onload="set()">

    <?php require_once 'components/loading/loading.php'; ?>
    <?php require_once 'components/layout/header.php'; ?>
    <?php include "components/layout/aside.php" ?>
    <?php require_once 'components/layout/alert.php'; ?>

    <!-- Content here -->

    <div class="home">

        <div class="home-content">

            <!--<img class="home-title" src="resource/img/logo/opc.png">-->
            <h1 class="home-title">Open Collections</h1>

            <form class="search" action="gallery.php" method="get">
                <button class="search-filter">
                    <?php include 'components/icon/search.php'; ?>
                </button>
                <input name="name" class="search-input" type="text" placeholder="<?= $search_some_thing ?>">
                <div class="search-filter">
                    <?php include 'components/icon/search_type.php'; ?>
                    <select name="type" class="search-select">
                        <option value="">All</option>
                        <?php
                        $TypeData = GetProjectTypeData($conn);
                        foreach ($TypeData  as $TypeDataRow) { ?>
                            <option value="<?= $TypeDataRow['id'] ?>"><?= $TypeDataRow['type'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="search-filter">
                    <?php include 'components/icon/major.php'; ?>
                    <select name="major" class="search-select">
                        <option value="">All</option>

                        <?php
                        $MajorData = GetMajorData($conn);
                        foreach ($MajorData  as $MajorDataRow) { ?>
                            <option value="<?= $MajorDataRow['id'] ?>"><?= $MajorDataRow['major'] ?></option>
                        <?php } ?>

                    </select>
                </div>

            </form>

            <div class="menu-box">

                <?php

                $data = SearchMajor("", "", $conn);
                $itemsPerPage = 3;
                if (isset($_GET['page'])) {
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : '';
                    $page_no = isset($_GET['name']) ? $_GET['name'] : '';
                } else {
                    $currentPage = 1;
                    $page_no = "1";
                }

                $chunks = array_chunk($data, $itemsPerPage);

                if (!$data) {
                } else {
                    $currentPageData = $chunks[$currentPage - 1];
                }


                if (!$data) { ?>
                    <div class="menu-box-group">
                        <div class="menu-box-content">
                            <div class="icon">
                                <?php include 'components/icon/major.php'; ?>
                            </div>
                            <div class="menu-box-title">
                                <h4><?= $no_data ?></h4>
                            </div>
                        </div>
                    </div>
                    <?php } else {

                    foreach ($currentPageData as $row) { ?>

                        <div class="menu-box-group" onclick="window.location='gallery.php?major=<?= $row['id'] ?>'">

                            <div class="menu-box-content">
                                <div class="icon on-off">
                                    <?php include 'components/icon/major.php'; ?>
                                </div>
                                <div class="menu-box-title">
                                    <h4><?= $row['major'] ?></h4>
                                    <p class="menu-box-sub-title"><?= $row['degree'] ?></p>
                                </div>
                            </div>

                            <div class="menu-box-content on-off">
                                <div class="icon">
                                    <?php include 'components/icon/next.php'; ?>
                                </div>
                            </div>
                        </div>

                <?php }
                } ?>
                <?php include 'components/layout/menu_page.php'; ?>

            </div>

        </div>

    </div>

    <!-- End Content here -->

    <?php require_once 'components/layout/nav.php'; ?>

    <?php require_once 'components/layout/footer.php'; ?>

</body>

</html>