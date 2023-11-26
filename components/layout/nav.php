<?php

$home_content = "nav-content-passive";
$home_icon = "nav-icon-passive";
$home_logo = "nav-logo-passive";
$home_text = "nav-text-passive";

$setting_content = "nav-content-passive";
$setting_icon = "nav-icon-passive";
$setting_logo = "nav-logo-passive";
$setting_text = "nav-text-passive";

$profile_content = "nav-content-passive";
$profile_icon = "nav-icon-passive";
$profile_logo = "nav-logo-passive";
$profile_text = "nav-text-passive";

$signin_content = "nav-content-passive";
$signin_icon = "nav-icon-passive";
$signin_logo = "nav-logo-passive";
$signin_text = "nav-text-passive";
$signin_menu = $login;

if ($page == "index") {
    $home_content = "nav-content-active";
    $home_icon = "nav-icon-active";
    $home_logo = "nav-logo-active";
    $home_text = "nav-text-active";
} else if ($page == "App" && isset($_GET["setting"])) {
    $setting_content = "nav-content-active";
    $setting_icon = "nav-icon-active";
    $setting_logo = "nav-logo-active";
    $setting_text = "nav-text-active";
} else if ($page == "profile") {
    $profile_content = "nav-content-active";
    $profile_icon = "nav-icon-active";
    $profile_logo = "nav-logo-active";
    $profile_text = "nav-text-active";
} else if ($page == "form_edit") {
    $profile_content = "nav-content-active";
    $profile_icon = "nav-icon-active";
    $profile_logo = "nav-logo-active";
    $profile_text = "nav-text-active";
} else if ($page == "signin") {
    $signin_content = "nav-content-active";
    $signin_icon = "nav-icon-active";
    $signin_logo = "nav-logo-active";
    $signin_text = "nav-text-active";
} else if ($page == "signup") {
    $signin_content = "nav-content-active";
    $signin_icon = "nav-icon-active";
    $signin_logo = "nav-logo-active";
    $signin_text = "nav-text-active";
    $signin_menu = "Signup";
}
?>

<nav>

    <?php if (isset($_SESSION['login'])) { ?>

        <div class="<?= $home_content ?>" onclick="window.location='index.php'">
            <div class="<?= $home_icon ?>">
                <span class="material-symbols-outlined <?= $home_logo ?>">home</span>
            </div>
            <p class="<?= $home_text ?>"><?= $home ?></p>
        </div>

        <?php if (isset($_SESSION['admin']) /*|| isset($_SESSION['officer'])*/) { ?>

            <div class="<?= $setting_content ?>" onclick="window.location='App.php?setting'">
                <div class="<?= $setting_icon ?>">
                    <span class="material-symbols-outlined <?= $setting_logo ?>">settings</span>
                </div>
                <p class="<?= $setting_text ?>"><?= $setting ?></p>
            </div>

        <?php } ?>

        <div class="<?= $profile_content ?>" onclick="window.location='profile.php'">

            <?php if (UserPic($_SESSION['login']) != "") { ?>
                <div class="nav-profile-icon">
                    <img class="nav-profile" src="resource/img/profile/<?= UserPic($_SESSION['login']); ?>" onclick="window.location='profile.php'">
                </div>
            <?php } else { ?>
                <div class="<?= $profile_icon ?>">
                    <span class="material-symbols-outlined" onclick="window.location='profile.php'">account_circle</span>
                </div>
            <?php } ?>

            <p class="<?= $profile_text ?>">Profile</p>
        </div>

    <?php } else { ?>

        <div class="<?= $home_content ?>" onclick="window.location='index.php'">
            <div class="<?= $home_icon ?>">
                <span class="material-symbols-outlined <?= $home_logo ?>">home</span>
            </div>
            <p class="<?= $home_text ?>"><?= $home ?></p>
        </div>

        <div class="<?= $signin_content ?>" onclick="window.location='sign.php?signin'">
            <div class="<?= $signin_icon ?>">
                <span class="material-symbols-outlined <?= $signin_logo ?>">login</span>
            </div>
            <p class="<?= $signin_text ?>"><?= $signin_menu ?></p>
        </div>

    <?php } ?>

</nav>