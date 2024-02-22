<?php require_once 'Backend/DBSession.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'head.php'; ?>

<body>

    <?php require_once 'components/loading/loading.php'; ?>

    <!-- Content here -->

    <div class="home">

    <?php require_once 'components/layout/header.php'; ?>
    <?php include "components/layout/side.php" ?>
    <?php require_once 'components/layout/alert.php'; ?>

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

        </div>

    </div>

    <!-- End Content here -->

    <?php require_once 'components/layout/nav.php'; ?>

</body>

</html>