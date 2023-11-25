<div class="menu">
    <div class="menu-title">
        <h1>Project</h1>
    </div>

    <?php if (isset($_SESSION['admin']) || isset($_SESSION['officer'])) { ?>
        <div class="menu-group" onclick="window.location='dash_approve.php'">
            <div class="menu-content">
                <div class="icon">
                    <?php include 'components/icon/approve_list.php'; ?>
                </div>
                <div class="menu-title">
                    <h4><?= $approve ?></h4>
                    <p class="menu-sub-title"><?= $approve_requests ?></p>
                </div>
            </div>
            <div class="menu-content">
                <div class="icon"><?php include 'components/icon/next.php'; ?></div>
            </div>
        </div>
    <?php }  ?>

    <div class="menu-group" onclick="window.location='dash_project.php'">
        <div class="menu-content">
            <div class="icon">
                <?php include 'components/icon/project.php'; ?>
            </div>
            <div class="menu-title">
                <h4><?= $my_project ?></h4>
                <p class="menu-sub-title"><?= $management_your_project ?></p>
            </div>
        </div>
        <div class="menu-content">
            <div class="icon"><?php include 'components/icon/next.php'; ?></div>
        </div>
    </div>

    <div class="menu-group" onclick="window.location='dash_favorite.php'">
        <div class="menu-content">
            <div class="icon">
                <?php include 'components/icon/favorite.php'; ?>
            </div>
            <div class="menu-title">
                <h4><?= $favorite ?></h4>
                <p class="menu-sub-title"><?= $my_favorite ?></p>
            </div>
        </div>
        <div class="menu-content">
            <div class="icon"><?php include 'components/icon/next.php'; ?></div>
        </div>
    </div>

    <div class="menu-title">
        <h1><?= $support ?></h1>
    </div>

    <div class="menu-group" onclick="window.location='dash_request.php'">
        <div class="menu-content">
            <div class="icon">
                <?php include 'components/icon/help.php'; ?>
            </div>
            <div class="menu-title">
                <h4><?= $contact_us ?></h4>
                <p class="menu-sub-title"><?= $contact_us_detail ?></p>
            </div>
        </div>
        <div class="menu-content">
            <div class="icon">
                <?php include 'components/icon/next.php'; ?>
            </div>
        </div>
    </div>

    <div class="menu-group" onclick="window.location='Backend/DBSign.php?signout'">
        <div class="menu-content">
            <div class="icon">
                <?php include 'components/icon/logout.php'; ?>
            </div>
            <div class="menu-title">
                <h4><?= $sign_out ?></h4>
                <p class="menu-sub-title"><?= $sign_out_your_account ?></p>
            </div>
        </div>
        <div class="menu-content">
            <div class="icon">
                <?php include 'components/icon/next.php'; ?>
            </div>
        </div>
    </div>
</div>