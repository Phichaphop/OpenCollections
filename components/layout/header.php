<header id="header">

    <div class="header-group">
        <div class="header-content" onclick="toggleSide()">
            <div class="icon">
                <?php include 'components/icon/logo.php' ?>
            </div>
        </div>

        <?php
        if ($page == "index") {
            $header_title = $home;
        } else if ($page == "sign") {
            $header_title = $sign_in;
        } else if ($page == "dash_manual") {
            $header_title = $dash_manual;
        } else if ($page == "App") {
            $header_title = $setting;
        } else if ($page == "account") {
            $header_title = $account;
        } else if ($page == "dash_approve") {
            $header_title = $dash_approve;
        } else if ($page == "dash_dept") {
            $header_title = $department_dashboard;
        } else if ($page == "dash_faculty") {
            $header_title = $dash_faculty;
        } else if ($page == "dash_favorite") {
            $header_title = $dash_favorite;
        } else if ($page == "dash_ins") {
            $header_title = $dash_institute;
        } else if ($page == "dash_major") {
            $header_title = $dash_major;
        } else if ($page == "dash_project_type") {
            $header_title = $dash_project_type;
        } else if ($page == "dash_project") {
            $header_title = $dash_project;
        } else if ($page == "dash_request") {
            $header_title = $dash_request;
        } else if ($page == "dash_user") {
            $header_title = $dash_user;
        } else if ($page == "frm_dept") {
            $header_title = $frm_dept;
        } else if ($page == "frm_faculty") {
            $header_title = $frm_faculty;
        } else if ($page == "frm_ins") {
            $header_title = $frm_ins;
        } else if ($page == "frm_major") {
            $header_title = $frm_major;
        } else if ($page == "frm_manual") {
            $header_title = $frm_manual;
        } else if ($page == "frm_project") {
            $header_title = $frm_project;
        } else if ($page == "frm_request") {
            $header_title = $frm_request;
        } else if ($page == "frm_user") {
            $header_title = $frm_user;
        } else if ($page == "index") {
            $header_title = $index;
        } else if ($page == "policy") {
            $header_title = $policy;
        } else if ($page == "profile") {
            $header_title = $profile;
        } else if ($page == "Setup") {
            $header_title = $Setup;
        } else if ($page == "VerifyEmail") {
            $header_title = $VerifyEmail;
        } else if ($page == "VerifyPass") {
            $header_title = $VerifyPass;
        } else {
            $header_title = "";
        }
        ?>

        <div class="header-content">
            <h3>
                <?php
                if (empty($header_title)) {
                } else {
                    echo $header_title;
                }
                ?>
            </h3>
        </div>
    </div>

    <div class="header-group">

        <?php
        if ($lang == 'th') { ?>
            <div class="icon" onclick="setLanguage('en');">
                <?php include 'components/icon/lang.php' ?>
            </div>
        <?php } else if ($lang == 'en') { ?>
            <div class="icon" onclick="setLanguage('th');">
                <?php include 'components/icon/lang.php' ?>
            </div>
        <?php } ?>

        <div class="icon" onclick="toggleTheme()">
            <?php include 'components/icon/theme.php' ?>
        </div>

        <?php if (isset($_SESSION['login'])) { ?>

            <?php if (UserPic($_SESSION['login']) != "") { ?>
                <div class="icon" onclick="window.location='profile.php'">
                    <img id="headerProfile" class="profile" src="resource/img/profile/<?= UserPic($_SESSION['login']); ?>">
                </div>
            <?php } else { ?>
                <div class="icon" onclick="window.location='profile.php'">
                    <?php include 'components/icon/profile.php' ?>
                </div>
            <?php } ?>

        <?php } else { ?>
            <div id="ProfileIcon" class="icon">
                <div class="icon">
                    <span class="material-symbols-outlined" class="" onclick="window.location='sign.php?signin'">login</span>
                </div>
            </div>
        <?php } ?>
    </div>

</header>