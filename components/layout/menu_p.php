<div class="menu">
    <div class="menu-title">
        <h1>Project</h1>
    </div>

    <?php if (isset($_SESSION['admin']) || isset($_SESSION['officer'])) { ?>
        <div class="menu-group" onclick="window.location='dash_approve.php'">
            <div class="menu-icon">
                <?php include 'components/icon/approve.php'; ?>
            </div>
            <div class="menu-content">
                <h4><?= $approve ?></h4>
                <p><?= $approve_requests ?></p>
            </div>
            <div class="menu-next"><?php include 'components/icon/next.php'; ?></div>
        </div>
    <?php }  ?>

    <div class="menu-group" onclick="window.location='dash_project.php'">
        <div class="menu-icon">
            <?php include 'components/icon/project.php'; ?>
        </div>
        <div class="menu-content">
            <h4><?= $my_project ?></h4>
            <p><?= $management_your_project ?></p>
        </div>
        <div class="menu-next"><?php include 'components/icon/next.php'; ?></div>
    </div>
    <div class="menu-group" onclick="window.location='dash_favorite.php'">
        <div class="menu-icon">
            <?php include 'components/icon/favorite.php'; ?>
        </div>
        <div class="menu-content">
            <h4><?= $favorite ?></h4>
            <p><?= $my_favorite ?></p>
        </div>
        <div class="menu-next"><?php include 'components/icon/next.php'; ?></div>
    </div>
    <div class="menu-title">
        <h1><?= $support ?></h1>
    </div>
    <div class="menu-group" onclick="window.location='dash_request.php'">
        <div class="menu-icon">
            <?php include 'components/icon/request.php'; ?>
        </div>
        <div class="menu-content">
            <h4><?= $contact_us ?></h4>
            <p><?= $contact_us_detail ?></p>
        </div>
        <div class="menu-next">
            <?php include 'components/icon/next.php'; ?>
        </div>
    </div>
    <div class="menu-group" onclick="window.location='Backend/DBSignOut.php?SignOut'">
        <div class="menu-icon">
            <?php include 'components/icon/logout.php'; ?>
        </div>
        <div class="menu-content">
            <h4><?= $sign_out ?></h4>
            <p><?= $sign_out_your_account ?></p>
        </div>
        <div class="menu-next">
            <?php include 'components/icon/next.php'; ?>
        </div>
    </div>
</div>