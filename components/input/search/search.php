<form class="search" method="get">
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

    <button class="search-icon">
        <?php include 'components/icon/page.php'; ?>
        <select name="page" class="search-select">
            <?php for ($page_no = 1; $page_no <= count($chunks); $page_no++) {
                echo "<option value='$page_no'>$page_no</option>";
            } ?>
        </select>
    </button>

</form>