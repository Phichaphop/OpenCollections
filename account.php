<?php require_once 'backend/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include "components/layout/head.php" ?>

<body onload="set()">

    <?php require_once 'components/loading/loading.php'; ?>

    <div class="container">

        <?php include "components/layout/aside.php" ?>

        <?php require_once 'components/layout/header.php'; ?>

        <section>

            <div class="section-group">

                <?php require_once 'components/layout/alert.php'; ?>

                <!-- Content here -->

                <div class="menu-title">
                    <h1><?= $your_account ?></h1>
                </div>

                <?php
                $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';
                $user = GetUserByID($user_id, $conn);
                ?>

                <div class="account-profile">
                    <?php if ($user['pic'] != "") { ?>
                        <img class="account-pic" src="resource/img/profile/<?= $user['pic']; ?>" onclick="window.location='frm_user.php?update&pic&user=<?= $user['id']; ?>'">
                    <?php } else { ?>
                        <span class="material-symbols-outlined account-logo" onclick="window.location='frm_user.php?update&pic&user=<?= $user['id']; ?>'">account_circle</span>
                    <?php } ?>
                    <div class="account-icon">
                        <?php include 'components/icon/edit.php'; ?>
                    </div>
                </div>

                <div class="menu">

                    <div class="menu-group" onclick="window.location='frm_user.php?update&username&user=<?= $user['id']; ?>'">
                        <div class="menu-content">
                            <div class="icon">
                                <?php include 'components/icon/user.php'; ?>
                            </div>
                            <div class="menu-title">
                                <h4><?= $username ?></h4>
                                <p class="menu-sub-title"><?= $user['username'] ?></p>
                            </div>
                        </div>
                        <div class="menu-content">
                            <div class="icon"><?php include 'components/icon/next.php'; ?></div>
                        </div>
                    </div>

                    <div class="menu-group" onclick="window.location='frm_user.php?update&pass&user=<?= $user['id']; ?>'">
                        <div class="menu-content">
                            <div class="icon">
                                <?php include 'components/icon/pass.php'; ?>
                            </div>
                            <div class="menu-title">
                                <h4><?= $password ?></h4>
                                <p class="menu-sub-title">***********</p>
                            </div>
                        </div>
                        <div class="menu-content">
                            <div class="icon"><?php include 'components/icon/next.php'; ?></div>
                        </div>
                    </div>

                    <div class="menu-group" onclick="window.location='frm_user.php?update&email&user=<?= $user['id']; ?>'">
                        <div class="menu-content">
                            <div class="icon">
                                <?php include 'components/icon/email.php'; ?>
                            </div>
                            <div class="menu-title">
                                <h4><?= $email ?></h4>
                                <p class="menu-sub-title"><?= $user['email'] ?></p>
                            </div>
                        </div>
                        <div class="menu-content">
                            <div class="icon"><?php include 'components/icon/next.php'; ?></div>
                        </div>
                    </div>

                    <div class="menu-group" onclick="window.location='frm_user.php?update&tel&user=<?= $user['id']; ?>'">
                        <div class="menu-content">
                            <div class="icon">
                                <?php include 'components/icon/phone.php'; ?>
                            </div>
                            <div class="menu-title">
                                <h4><?= $tel ?></h4>
                                <p class="menu-sub-title"><?= $user['tel'] ?></p>
                            </div>
                        </div>
                        <div class="menu-content">
                            <div class="icon"><?php include 'components/icon/next.php'; ?></div>
                        </div>
                    </div>

                    <?php if (isset($_SESSION['admin'])) { ?>
                        <div class="menu-group" onclick="window.location='frm_user.php?update&role&user=<?= $user['id']; ?>'">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/user_role.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4><?= $role ?></h4>
                                    <p class="menu-sub-title"><?= $user['role'] ?></p>
                                </div>
                            </div>
                            <div class="menu-content">
                                <div class="icon"><?php include 'components/icon/next.php'; ?></div>
                            </div>
                        </div>
                    <?php  } ?>

                    <?php if (isset($_SESSION['admin'])) { ?>

                        <div class="menu-group bg-red" onclick="window.location='frm_user.php?delete&user=<?= $user['id']; ?>'">
                            <div class="menu-content">
                                <div class="icon">
                                    <?php include 'components/icon/delete.php'; ?>
                                </div>
                                <div class="menu-title">
                                    <h4><?= $delete_account ?></h4>
                                    <p class="menu-sub-title"><?= $you_ll_lose_your_information ?></p>
                                </div>
                            </div>
                            <div class="menu-content">
                                <div class="icon"><?php include 'components/icon/next.php'; ?></div>
                            </div>
                        </div>

                    <?php  } ?>

                </div>

                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

        <?php require_once 'components/layout/footer.php'; ?>

    </div>

</body>

</html>