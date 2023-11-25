<header id="header">

    <div class="header-group">
        <div class="header-content" onclick="window.location='index.php'">
            <div class="icon">
                <?php include 'components/icon/logo.php' ?>
            </div>
        </div>
    </div>

    <div class="header-group">

    <?php
        if ($lang == 'th') { ?>
            <a class="header-icon" href="#" onclick="setLanguage('en');">
                <span>TH</span>
            </a>
        <?php } else if ($lang == 'en') { ?>
            <a class="header-icon" href="#" onclick="setLanguage('th');">
                <span>EN</span>
            </a>
        <?php } ?>

        <div class="header-icon" onclick="toggleTheme()">
            <?php include 'components/icon/theme.php' ?>
        </div>

        <?php if (isset($_SESSION['login'])) { ?>
            <div class="header-icon">
                <?php if (UserPic($_SESSION['login']) != "") { ?>
                    <img class="header-profile" src="resource/img/profile/<?= UserPic($_SESSION['login']); ?>" onclick="window.location='profile.php'">
                <?php } else { ?>
                    <span class="material-symbols-outlined" class="" onclick="window.location='profile.php'">account_circle</span>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div id="ProfileIcon" class="header-icon">
                <div class="icon">
                    <span class="material-symbols-outlined" class="" onclick="window.location='sign.php?signin'">login</span>
                </div>
            </div>
        <?php } ?>
    </div>

</header>