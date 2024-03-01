<?php require_once 'Backend/DBSession.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'head.php'; ?>

<body onload="set()">

    <?php require_once 'components/loading/loading.php'; ?>
    <?php require_once 'components/layout/header.php'; ?>
    <?php include "components/layout/side.php" ?>
    <?php require_once 'components/layout/alert.php'; ?>

    <!-- Content here -->

    <div class="home">

        <div class="home-content">

            <!--<img class="home-title" src="resource/img/logo/opc.png">-->
            <h1 class="home-title">OpenCollections</h1>

            <form class="search" action="gallery.php" method="get">
                <button class="search-icon">
                    <?php include 'components/icon/search.php'; ?>
                </button>
                <input name="name" class="search-input" type="text" placeholder="<?= $search_some_thing ?>">
                <div class="search-icon">
                    <?php include 'components/icon/search_type.php'; ?>
                    <select name="type" class="search-select">
                        <option value="">All</option>

                        <?php if ($page == "index" || $page == "dash_favorite" || $page == "dash_project" || $page == "dash_approve") {
                            $TypeData = GetProjectTypeData($conn);
                            foreach ($TypeData  as $TypeDataRow) { ?>
                                <option value="<?= $TypeDataRow['id'] ?>"><?= $TypeDataRow['type'] ?></option>
                        <?php }
                        } ?>

                        <?php if ($page == "dash_user") {
                            $RoleData = GetRoleData($conn);
                            foreach ($RoleData  as $RoleDataRow) { ?>
                                <option value="<?= $RoleDataRow['id'] ?>"><?= $RoleDataRow['role'] ?></option>
                        <?php }
                        } ?>

                        <?php if ($page == "dash_ins") { ?>
                        <?php } ?>

                        <?php if ($page == "dash_faculty") {
                            $InsData = GetInsData($conn);
                            foreach ($InsData  as $InsDataRow) { ?>
                                <option value="<?= $InsDataRow['id'] ?>"><?= $InsDataRow['ins'] ?></option>
                        <?php }
                        } ?>

                        <?php if ($page == "dash_dept") {
                            $FacultyData = GetFacultyData($conn);
                            foreach ($FacultyData  as $FacultyDataRow) { ?>
                                <option value="<?= $FacultyDataRow['id'] ?>"><?= $FacultyDataRow['faculty'] ?></option>
                                <?php }
                        } ?>s

                                <?php if ($page == "dash_major") {
                                    $DeptData = GetDeptData($conn);
                                    foreach ($DeptData  as $DeptDataRow) {  ?>
                                        <option value="<?= $DeptDataRow['id'] ?>"><?= $DeptDataRow['dept'] ?></option>
                                <?php }
                                } ?>

                                <?php if ($page == "dash_request") { ?>
                                <?php } ?>

                    </select>
                </div>

                <?php if ($page == "index" || $page == "dash_favorite" || $page == "dash_project" || $page == "dash_approve") { ?>

                    <div class="search-icon">
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

                <?php } ?>

            </form>

            <div class="menu-box">

                <?php

                $data = SearchMajor("", "", $conn);
                $itemsPerPage = 3;
                if (isset($_GET['page'])) {
                    $currentPage = $_GET['page'];
                    $page_no = $_GET['name'] ?? '';
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

                        <div class="menu-box-group" onclick="window.location='gallery.php?type=<?= $row['id'] ?>'">

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

</body>

</html>