<aside id="side">

    <div class="aside-group">
        <a href="javascript:void(0)" class="closebtn" onclick="toggleSide()">&times;</a>
        <div class="aside-content">
            <div class="content"><?php include 'components/icon/home.php'; ?></div>
            <div class="content"><a href="index.php"><?= $home ?></a></div>
        </div>

        <?php if (isset($_SESSION['admin']) || isset($_SESSION['publisher']) || isset($_SESSION['officer'])) { ?>
            <div class="aside-content">
                <div class="content"><?php include 'components/icon/approve.php'; ?></div>
                <div class="content"><a href="dash_approve.php"><?= $approve_dashboard ?></a></div>
            </div>
        <?php } ?>

        <?php if (isset($_SESSION['login'])) { ?>
            <div class="aside-content">
                <div class="content"><?php include 'components/icon/project.php'; ?></div>
                <div class="content"><a href="dash_project.php"><?= $my_project ?></a></div>
            </div>

            <div class="aside-content">
                <div class="content"><?php include 'components/icon/favorite.php'; ?></div>
                <div class="content"><a href="dash_favorite.php"><?= $favorite ?></a></div>
            </div>

            <div class="aside-content">
                <div class="content"><?php include 'components/icon/request.php'; ?></div>
                <div class="content"><a href="dash_request.php"><?= $request ?></a></div>
            </div>
        <?php } ?>

        <div class="aside-content">
            <div class="content"><?php include 'components/icon/manual.php'; ?></div>
            <div class="content"><a href="dash_manual.php"><?= $manual ?></a></div>
        </div>

        <?php if (isset($_SESSION['admin'])) { ?>
            <div class="aside-content">
                <div class="content"><?php include 'components/icon/setting.php'; ?></div>
                <div class="content"><a href="App.php?setting"><?= $setting ?></a></div>
            </div>
        <?php } ?>
    </div>

    <div class="aside-group">
        <div class="aside-content">
            <?php if (isset($_SESSION['login'])) { ?>
                <div class="content"><?php include 'components/icon/logout.php'; ?></div>
                <div class="content"><a href="backend/sign.php?signout"><?= $sign_out ?></a></div>
            <?php } else { ?>
                <div class="content"><?php include 'components/icon/login.php'; ?></div>
                <div class="content"><a href="sign.php?signin"><?= $sign_in ?></a></div>
            <?php } ?>
        </div>

    </div>

</aside>