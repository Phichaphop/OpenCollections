<?php include 'backend/Database/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once 'head.php'; ?>

<body onload="set()">

    <?php require_once 'components/loading/loading.php'; ?>

    <div class="container">

        <section>

            <div class="section-group">

                <?php require_once 'components/layout/alert.php'; ?>

                <!-- Content here -->

                <div class="menu">

                    <h1 class="menu-title">Database Management</h1>

                    <div class="menu-group">
                        <div class="menu-content">
                            <div class="icon">
                                <?php include 'components/icon/database.php'; ?>
                            </div>
                            <div class="menu-title">
                                <h4>Database OPC.</h4>
                            </div>
                        </div>
                        <div class="menu-content">
                            <?php if ($conn != "error") { ?>
                                <div class="icon" onclick="window.location='backend/Database/config.php?DeleteDB'">
                                    <?php include 'components/icon/delete.php'; ?>
                                </div>
                            <?php } ?>
                            <?php if ($conn == "error") { ?>
                                <div class="icon" onclick="window.location='backend/Database/config.php?CreDB'">
                                    <?php include 'components/icon/next.php'; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <?php if ($conn != "error") { ?>

                        <h1 class="menu-title">User</h1>

                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/user_role.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4>User Role Table</h4>
                                </div>
                            </div>
                            <div class="menu-content">
                                <?php if ($check_user_role != "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?DelUserRoleTable'">
                                        <?php include 'components/icon/delete.php'; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($check_user_role == "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?CreUserRoleTable'">
                                        <?php include 'components/icon/next.php'; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/user.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4>User Table </h4>
                                </div>
                            </div>
                            <div class="menu-content">
                                <?php if ($check_user != "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?DelUserTable'">
                                        <?php include 'components/icon/delete.php'; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($check_user == "error") { ?>
                                    <div class="icon">
                                        <div class="icon" onclick="window.location='backend/Database/config.php?CreUserTable'">
                                            <?php include 'components/icon/next.php'; ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <h1 class="menu-title">Institution</h1>

                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/ins.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4>Institute Table</h4>
                                </div>
                            </div>
                            <div class="menu-content">
                                <?php if ($check_ins != "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?DelInsTable'">
                                        <?php include 'components/icon/delete.php'; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($check_ins == "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?CreInsTable'">
                                        <?php include 'components/icon/next.php'; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/faculty.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4>Faculty Table</h4>
                                </div>
                            </div>
                            <div class="menu-content">
                                <?php if ($check_faculty != "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?DelFacultyTable'">
                                        <?php include 'components/icon/delete.php'; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($check_faculty == "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?CreFacultyTable'">
                                        <?php include 'components/icon/next.php'; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/dept.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4>Dept Table</h4>
                                </div>
                            </div>
                            <div class="menu-content">
                                <?php if ($check_dept != "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?DelDeptTable'">
                                        <?php include 'components/icon/delete.php'; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($check_dept == "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?CreDeptTable'">
                                        <?php include 'components/icon/next.php'; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/major.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4>Major Table</h4>
                                </div>
                            </div>
                            <div class="menu-content">
                                <?php if ($check_major != "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?DelMajorTable'">
                                        <?php include 'components/icon/delete.php'; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($check_major == "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?CreMajorTable'">
                                        <?php include 'components/icon/next.php'; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <h1 class="menu-title">Project</h1>

                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/project_type.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4>Type Table</h4>
                                </div>
                            </div>
                            <div class="menu-content">
                                <?php if ($check_project_type != "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?DelProjectTypeTable'">
                                        <?php include 'components/icon/delete.php'; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($check_project_type == "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?CreProjectTypeTable'">
                                        <?php include 'components/icon/next.php'; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/status.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4>Status Table</h4>
                                </div>
                            </div>
                            <div class="menu-content">
                                <?php if ($check_project_status != "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?DelProjectStatusTable'">
                                        <?php include 'components/icon/delete.php'; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($check_project_status == "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?CreProjectStatusTable'">
                                        <?php include 'components/icon/next.php'; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/project.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4>Project Table</h4>
                                </div>
                            </div>
                            <div class="menu-content">
                                <?php if ($check_project != "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?DelProjectTable'">
                                        <?php include 'components/icon/delete.php'; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($check_project == "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?CreateProjectTable'">
                                        <?php include 'components/icon/next.php'; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <h1 class="menu-title">Other</h1>

                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/favorite.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4>Favorite Table</h4>
                                </div>
                            </div>
                            <div class="menu-content">
                                <?php if ($check_favorite != "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?DelFavoriteTable'">
                                        <?php include 'components/icon/delete.php'; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($check_favorite == "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?CreFavoriteTable'">
                                        <?php include 'components/icon/next.php'; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/request.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4>Request Status Table</h4>
                                </div>
                            </div>
                            <div class="menu-content">
                                <?php if ($check_request_status != "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?DelRequestStatusTable'">
                                        <?php include 'components/icon/delete.php'; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($check_request_status == "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?CreRequestStatusTable'">
                                        <?php include 'components/icon/next.php'; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/request.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4>Request Table</h4>
                                </div>
                            </div>
                            <div class="menu-content">
                                <?php if ($check_request != "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?DelRequestTable'">
                                        <?php include 'components/icon/delete.php'; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($check_request == "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?CreRequestTable'">
                                        <?php include 'components/icon/next.php'; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/counter.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4>Counter Table</h4>
                                </div>
                            </div>
                            <div class="menu-content">
                                <?php if ($check_counter != "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?DelCounterTable'">
                                        <?php include 'components/icon/delete.php'; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($check_counter == "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?CreCounterTable'">
                                        <?php include 'components/icon/next.php'; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="menu-group">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/doc.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4>Manual Table</h4>
                                </div>
                            </div>
                            <div class="menu-content">
                                <?php if ($check_manual != "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?DelManualTable'">
                                        <?php include 'components/icon/delete.php'; ?>
                                    </div>
                                <?php } ?>
                                <?php if ($check_manual == "error") { ?>
                                    <div class="icon" onclick="window.location='backend/Database/config.php?CreManualTable'">
                                        <?php include 'components/icon/next.php'; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    <?php } ?>

                </div>

                <!-- End Content here -->

            </div>

        </section>

    </div>

</body>

</html>