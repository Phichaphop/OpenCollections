<?php require_once 'Backend/DBSession.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'head.php';
?>

<body>
    <?php include 'components/loading/loading.php'; ?>
    <div class="container">
        <?php include 'components/layout/header.php'; ?>
        <section>
            <div class="section-group">
                <div class="menu">

                    <div class="menu-title">
                        <h1><?= $approve ?></h1>
                    </div>

                    <div class="menu-group" onclick="window.location='dash_approve.php'">
                        <div class="menu-icon">
                            <?php include 'components/icon/approve.php'; ?>
                        </div>
                        <div class="menu-content">
                            <h4><?= $approve ?></h4>
                            <p><?= $approve_menu_detail ?></p>
                        </div>
                        <div class="menu-next">
                            <?php include 'components/icon/next.php'; ?>
                        </div>
                    </div>

                    <div class="menu-title">
                        <h1><?= $project ?></h1>
                    </div>

                    <div class="menu-group" onclick="window.location='dash_project.php'">
                        <div class="menu-icon">
                            <?php include 'components/icon/project.php'; ?>
                        </div>
                        <div class="menu-content">
                            <h4><?= $project ?></h4>
                            <p><?= $project_menu_detail ?></p>
                        </div>
                        <div class="menu-next">
                            <?php include 'components/icon/next.php'; ?>
                        </div>
                    </div>

                    <div class="menu-group" onclick="window.location='dash_project_type.php'">
                        <div class="menu-icon">
                            <?php include 'components/icon/project_type.php'; ?>
                        </div>
                        <div class="menu-content">
                            <h4><?= $project_type ?></h4>
                            <p><?= $project_type_menu_detail ?></p>
                        </div>
                        <div class="menu-next">
                            <?php include 'components/icon/next.php'; ?>
                        </div>
                    </div>

                    <div class="menu-title">
                        <h1><?= $institute ?></h1>
                    </div>

                    <div class="menu-group" onclick="window.location='dash_ins.php'">
                        <div class="menu-icon">
                            <?php include 'components/icon/ins.php'; ?>
                        </div>
                        <div class="menu-content">
                            <h4><?= $institute ?></h4>
                            <p><?= $institute_menu_detail ?></p>
                        </div>
                        <div class="menu-next">
                            <?php include 'components/icon/next.php'; ?>
                        </div>
                    </div>

                    <div class="menu-group" onclick="window.location='dash_faculty.php'">
                        <div class="menu-icon">
                            <?php include 'components/icon/faculty.php'; ?>
                        </div>
                        <div class="menu-content">
                            <h4><?= $faculty ?></h4>
                            <p><?= $faculty_menu_detail ?></p>
                        </div>
                        <div class="menu-next">
                            <?php include 'components/icon/next.php'; ?>
                        </div>
                    </div>

                    <div class="menu-group" onclick="window.location='dash_dept.php'">
                        <div class="menu-icon">
                            <?php include 'components/icon/dept.php'; ?>
                        </div>
                        <div class="menu-content">
                            <h4><?= $department ?></h4>
                            <p><?= $department_menu_detail ?></p>
                        </div>
                        <div class="menu-next">
                            <?php include 'components/icon/next.php'; ?>
                        </div>
                    </div>

                    <div class="menu-group" onclick="window.location='dash_major.php'">
                        <div class="menu-icon">
                            <?php include 'components/icon/major.php'; ?>
                        </div>
                        <div class="menu-content">
                            <h4><?= $major_and_degree ?></h4>
                            <p><?= $major_and_degree_menu_detail ?></p>
                        </div>
                        <div class="menu-next">
                            <?php include 'components/icon/next.php'; ?>
                        </div>
                    </div>

                    <div class="menu-title">
                        <h1><?= $other ?></h1>
                    </div>

                    <div class="menu-group" onclick="window.location='dash_user.php'">
                        <div class="menu-icon">
                            <?php include 'components/icon/manage_accounts.php'; ?>
                        </div>
                        <div class="menu-content">
                            <h4><?= $user ?></h4>
                            <p><?= $user_menu_detail ?></p>
                        </div>
                        <div class="menu-next">
                            <?php include 'components/icon/next.php'; ?>
                        </div>
                    </div>

                    <div class="menu-group" onclick="window.location='dash_request.php'">
                        <div class="menu-icon">
                            <?php include 'components/icon/request.php'; ?>
                        </div>
                        <div class="menu-content">
                            <h4><?= $request ?></h4>
                            <p><?= $request_menu_detail ?></p>
                        </div>
                        <div class="menu-next">
                            <?php include 'components/icon/next.php'; ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <?php include 'components/layout/nav.php'; ?>
    </div>
</body>

</html>