<?php
    $aside_index = "pass";
    $aside_favorite = "pass";
    $aside_user = "pass";
    $aside_create_user = "pass";
    $aside_request = "pass";
    $aside_create_request = "pass";
    $aside_ins = "pass";
    $aside_create_ins = "pass";
    $aside_faculty = "pass";
    $aside_create_faculty = "pass";
    $aside_dept = "pass";
    $aside_create_dept  = "pass";
    $aside_major = "pass";
    $aside_create_major  = "pass";
    $aside_project_type = "pass";
    $aside_create_project_type  = "pass";
    $aside_project = "pass";
    $aside_create_project  = "pass";
    $aside_dash_approve = "pass";
    $aside_create_manual  = "pass";
    $aside_dash_manual = "pass";
    if ($page == "index") {
        $aside_index = "act";
    }
    if ($page == "dash_favorite") {
        $aside_favorite = "act";
    }
    if ($page == "dash_user") {
        $aside_user  = "act";
    }
    if ($page == "frm_user") {
        $aside_create_user = "act";
    }
    if ($page == "dash_request") {
        $aside_request  = "act";
    }
    if ($page == "frm_request") {
        $aside_create_request = "act";
    }
    if ($page == "dash_ins") {
        $aside_ins  = "act";
    }
    if ($page == "frm_ins") {
        $aside_create_ins = "act";
    }
    if ($page == "dash_faculty") {
        $aside_faculty  = "act";
    }
    if ($page == "frm_faculty") {
        $aside_create_faculty = "act";
    }
    if ($page == "dash_dept") {
        $aside_dept   = "act";
    }
    if ($page == "frm_dept") {
        $aside_create_dept  = "act";
    }
    if ($page == "dash_major") {
        $aside_major   = "act";
    }
    if ($page == "frm_major") {
        $aside_create_major  = "act";
    }
    if ($page == "dash_project_type") {
        $aside_project_type   = "act";
    }
    if ($page == "frm_project_type") {
        $aside_create_project_type  = "act";
    }
    if ($page == "dash_project") {
        $aside_project   = "act";
    }
    if ($page == "frm_project") {
        $aside_create_project  = "act";
    }
    if ($page == "dash_approve") {
        $aside_dash_approve = "act";
    }
?>

<aside>
    <?php if ($page == "index") { ?>
        <div class="aside-group <?= $aside_index ?>" onclick="window.location='index.php'">
            <div class="aside-content">
                <p><?= $home ?></p>
            </div>
        </div>
        <div class="aside-group <?= $aside_favorite ?>" onclick="window.location='dash_favorite.php'">
            <div class="aside-content">
                <p><?= $favorite ?></p>
            </div>
        </div>
    <?php } ?>

    <?php if ($page == "dash_favorite") { ?>
        <div class="aside-group <?= $aside_favorite ?>" onclick="window.location='dash_favorite.php'">
            <div class="aside-content">
                <p><?= $favorite ?></p>
            </div>
        </div>
        <div class="aside-group <?= $aside_index ?>" onclick="window.location='index.php'">
            <div class="aside-content">
                <p><?= $home ?></p>
            </div>
        </div>
    <?php } ?>

    <?php if ($page == "dash_user") { ?>
        <div class="aside-group <?= $aside_user ?>" onclick="window.location='dash_user.php'">
            <div class="aside-content">
                <p><?= $dash_user ?></p>
            </div>
        </div>

        <div class="aside-group <?= $aside_create_user ?>" onclick="window.location='frm_user.php?insert&user'">
            <div class="aside-content">
                <p><?= $create ?></p>
            </div>
        </div>
    <?php } ?>

    <?php if ($page == "dash_request") { ?>
        <div class="aside-group <?= $aside_request ?>" onclick="window.location='dash_request.php'">
            <div class="aside-content">
                <p><?= $dash_request ?></p>
            </div>
        </div>
        <div class="aside-group <?= $aside_create_request ?>" onclick="window.location='frm_request.php?insert&request'">
            <div class="aside-content">
                <p><?= $create ?></p>
            </div>
        </div>
    <?php } ?>

    <?php if ($page == "dash_ins") { ?>
        <div class="aside-group <?= $aside_ins ?>" onclick="window.location='dash_ins.php'">
            <div class="aside-content">
                <p><?= $dash_institute ?></p>
            </div>
        </div>

        <div class="aside-group <?= $aside_create_ins ?>" onclick="window.location='frm_ins.php?insert&ins'">
            <div class="aside-content">
                <p><?= $create ?></p>
            </div>
        </div>
    <?php } ?>

    <?php if ($page == "dash_faculty") { ?>
        <div class="aside-group <?= $aside_faculty ?>" onclick="window.location='dash_faculty.php'">
            <div class="aside-content">
                <p><?= $dash_faculty ?></p>
            </div>
        </div>

        <div class="aside-group <?= $aside_create_faculty ?>" onclick="window.location='frm_faculty.php?insert&faculty'">
            <div class="aside-content">
                <p><?= $create ?></p>
            </div>
        </div>
    <?php } ?>

    <?php if ($page == "dash_dept") { ?>
        <div class="aside-group <?= $aside_dept ?>" onclick="window.location='dash_dept.php'">
            <div class="aside-content">
                <p><?= $dash_department ?></p>
            </div>
        </div>

        <div class="aside-group <?= $aside_create_dept ?>" onclick="window.location='frm_dept.php?insert&dept'">
            <div class="aside-content">
                <p><?= $create ?></p>
            </div>
        </div>
    <?php } ?>

    <?php if ($page == "dash_major") { ?>
        <div class="aside-group <?= $aside_major ?>" onclick="window.location='dash_major.php'">
            <div class="aside-content">
                <p><?= $dash_major ?></p>
            </div>
        </div>

        <div class="aside-group <?= $aside_create_major ?>" onclick="window.location='frm_major.php?insert&major'">
            <div class="aside-content">
                <p><?= $create ?></p>
            </div>
        </div>
    <?php } ?>

    <?php if ($page == "dash_project_type") { ?>
        <div class="aside-group <?= $aside_project_type ?>" onclick="window.location='dash_project_type.php'">
            <div class="aside-content">
                <p><?= $dash_project_type ?></p>
            </div>
        </div>
        <div class="aside-group <?= $aside_create_project_type ?>" onclick="window.location='frm_project.php?insert&project_type'">
            <div class="aside-content">
                <p><?= $create ?></p>
            </div>
        </div>
    <?php } ?>

    <?php if ($page == "dash_project"){ ?>
        <div class="aside-group <?= $aside_project ?>" onclick="window.location='dash_project.php'">
            <div class="aside-content">
                <p><?= $dash_project ?></p>
            </div>
        </div>

        <div class="aside-group <?= $aside_create_project ?>" onclick="window.location='frm_project.php?insert&project'">
            <div class="aside-content">
                <p><?= $create ?></p>
            </div>
        </div>

    <?php } ?>

    <?php if ($page == "dash_approve"){ ?>
        <div class="aside-group <?= $aside_project ?>" onclick="window.location='dash_project.php'">
            <div class="aside-content">
                <p><?= $dash_project ?></p>
            </div>
        </div>

        <div class="aside-group <?= $aside_dash_approve ?>" onclick="window.location='dash_approve.php?insert&project'">
            <div class="aside-content">
                <p><?= $dash_approve ?></p>
            </div>
        </div>

        <div class="aside-group <?= $aside_create_project ?>" onclick="window.location='frm_project.php?insert&project'">
            <div class="aside-content">
                <p><?= $create ?></p>
            </div>
        </div>

    <?php } ?>

    <?php if ($page == "dash_manual" && isset($_SESSION['admin'])){ ?>
        <div class="aside-group <?= $aside_manual ?>" onclick="window.location='dash_manual.php'">
            <div class="aside-content">
                <p><?= $dash_manual ?></p>
            </div>
        </div>

        <div class="aside-group <?= $aside_create_manual ?>" onclick="window.location='frm_manual.php?insert&manual'">
            <div class="aside-content">
                <p><?= $create ?></p>
            </div>
        </div>

    <?php } ?>

</aside>