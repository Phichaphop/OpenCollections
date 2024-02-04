<div id="side" class="side">
    <a href="javascript:void(0)" class="closebtn" onclick="toggleSide()">&times;</a>
    <a href="index.php"><?= $home ?></a>

    <?php if (isset($_SESSION['admin']) || isset($_SESSION['publisher']) || isset($_SESSION['officer'])) { ?>
        <a href="dash_approve.php"><?= $approve_dashboard ?></a>
    <?php } ?>

    <?php if (isset($_SESSION['login'])) { ?>
        <a href="dash_project.php"><?= $my_project ?></a>
        <a href="dash_favorite.php"><?= $favorite ?></a>
        <a href="dash_request.php"><?= $request ?></a>
    <?php } ?>

    <a href="dash_manual.php"><?= $manual ?></a>

    <?php if (isset($_SESSION['admin'])) { ?>
        <a href="App.php?setting"><?= $setting ?></a>
    <?php } ?>

    <?php if (isset($_SESSION['login'])) { ?>
        <a href="Backend/DBSign.php?signout"><?= $sign_out ?></a>
    <?php } else { ?>
        <a href="sign.php?signin"><?= $sign_in ?></a>
    <?php } ?>
</div>