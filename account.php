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
                    <?php include 'components/layout/alert.php'; ?>

                    <div class="menu-title">
                        <h1><?= $your_account ?></h1>
                    </div>

                    <?php
                    $user_id = $_GET['user_id'] ?? '';
                    $user = GetUserByID($user_id, $conn);
                    ?>

                    <div class="account-profile">
                        <?php if ($user['pic'] != "") { ?>
                            <img class="account-pic" src="./Backend/picture/profile/<?= $user['pic']; ?>" onclick="window.location='frm_user.php?update&pic&user=<?= $user['id']; ?>'">
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
                                <h4><?= $username ?></h4>
                                <p><?= $user['username'] ?></p>
                            </div>
                            <div class="menu-next"><?php include 'components/icon/next.php'; ?></div>
                        </div>

                        <div class="menu-group" onclick="window.location='frm_user.php?update&pass&user=<?= $user['id']; ?>'">
                            <div class="menu-content">
                                <h4><?= $password ?></h4>
                                <p>***********</p>
                            </div>
                            <div class="menu-next"><?php include 'components/icon/next.php'; ?></div>
                        </div>

                        <div class="menu-group" onclick="window.location='frm_user.php?update&email&user=<?= $user['id']; ?>'">

                            <div class="menu-content">
                                <h4><?= $email ?></h4>
                                <p><?= $user['email'] ?></p>
                            </div>
                            <div class="menu-next"><?php include 'components/icon/next.php'; ?></div>
                        </div>

                        <div class="menu-group" onclick="window.location='frm_user.php?update&tel&user=<?= $user['id']; ?>'">
                            <div class="menu-content">
                                <h4><?= $tel ?></h4>
                                <p><?= $user['tel'] ?></p>
                            </div>
                            <div class="menu-next"><?php include 'components/icon/next.php'; ?></div>
                        </div>

                        <?php if (isset($_SESSION['admin'])) { ?>
                            <div class="menu-group" onclick="window.location='frm_user.php?update&role&user=<?= $user['id']; ?>'">
                                <div class="menu-content">
                                    <h4><?= $role ?></h4>
                                    <p><?= $user['role'] ?></p>
                                </div>
                                <div class="menu-next"><?php include 'components/icon/next.php'; ?></div>
                            </div>
                        <?php  } ?>

                        <div class="menu-group bg-red" onclick="window.location='frm_user.php?delete&user=<?= $user['id']; ?>'">
                            <div class="menu-content">
                                <h4><?= $delete_account ?></h4>
                                <p><?= $you_ll_lose_your_information ?></p>
                            </div>
                            <div class="menu-next"><?php include 'components/icon/next.php'; ?></div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <?php require_once 'components/layout/nav.php'; ?>
    </div>
</body>

</html>