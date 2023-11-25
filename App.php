<?php require_once 'Backend/DBSession.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'head.php'; ?>

<body>

    <?php require_once 'components/loading/loading.php'; ?>

    <div class="container">

        <?php require_once 'components/layout/header.php'; ?>

        <section>

            <div class="section-group">

                <?php require_once 'components/layout/alert.php'; ?>

                <!-- Content here -->

                <?php if (isset($_GET['setup_database'])) { ?>

                    <div class="menu">

                        <h1 class="menu-title">Database Management</h1>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/database.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4>Database OPC.</h4>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?DelDatabase'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?CreDB'">
                                <?php include 'components/icon/next.php'; ?>
                            </div>
                        </div>

                        <h1 class="menu-title">User</h1>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/user_role.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4>User Role Table</h4>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?DelUserRoleTable'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?CreUserRoleTable'">
                                <?php include 'components/icon/next.php'; ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/user.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4>User Table </h4>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?DelUserTable'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next">
                                <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?CreUserTable'">
                                    <?php include 'components/icon/next.php'; ?>
                                </div>
                            </div>

                        </div>

                        <h1 class="menu-title">Institution</h1>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/ins.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4>Institute Table</h4>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?DelInsTable'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?CreInsTable'">
                                <?php include 'components/icon/next.php'; ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/faculty.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4>Faculty Table</h4>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?DelFacultyTable'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?CreFacultyTable'">
                                <?php include 'components/icon/next.php'; ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/dept.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4>Dept Table</h4>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?DelDeptTable'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?CreDeptTable'">
                                <?php include 'components/icon/next.php'; ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/major.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4>Major Table</h4>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?DelMajorTable'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?CreMajorTable'">
                                <?php include 'components/icon/next.php'; ?>
                            </div>
                        </div>

                        <h1 class="menu-title">Project</h1>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/project_type.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4>Type Table</h4>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?DelProjectTypeTable'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?CreProjectTypeTable'">
                                <?php include 'components/icon/next.php'; ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/status.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4>Status Table</h4>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?DelProjectStatusTable'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?CreProjectStatusTable'">
                                <?php include 'components/icon/next.php'; ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/project.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4>Project Table</h4>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?DelProjectTable'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?CreateProjectTable'">
                                <?php include 'components/icon/next.php'; ?>
                            </div>
                        </div>

                        <h1 class="menu-title">Other</h1>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/favorite.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4>Favorite Table</h4>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?DelFavoriteTable'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?CreFavoriteTable'">
                                <?php include 'components/icon/next.php'; ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/request.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4>Request Status Table</h4>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?DelRequestStatusTable'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?CreRequestStatusTable'">
                                <?php include 'components/icon/next.php'; ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/request.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4>Request Table</h4>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?DelRequestTable'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?CreRequestTable'">
                                <?php include 'components/icon/next.php'; ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-icon">
                                <?php include 'components/icon/counter.php'; ?>
                            </div>
                            <div class="menu-content">
                                <h4>Counter Table</h4>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?DelCounterTable'">
                                <?php include 'components/icon/delete.php'; ?>
                            </div>
                            <div class="menu-next" onclick="window.location='Backend/Database/DatabaseSetup.php?CreCounterTable'">
                                <?php include 'components/icon/next.php'; ?>
                            </div>
                        </div>

                    </div>

                <?php } ?>

                <?php if (isset($_GET['setting'])) { ?>
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
                <?php } ?>

                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

    </div>

</body>

</html>