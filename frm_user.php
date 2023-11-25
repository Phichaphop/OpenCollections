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

                <?php
                if (isset($_GET['update'])) {
                    $user = GetUserByID($_GET['user'], $conn);
                    $_SESSION['user_id'] = $_GET['user'];
                }

                if (isset($_GET['insert']) && isset($_GET['user'])) {
                    $title = $create_new_user;
                    $action = "Backend/DBUser.php";
                    $btn_id = "Insert";
                    $btn_text = $insert;
                    $submit = "insert_user";
                }

                if (isset($_GET['update']) && isset($_GET['pic'])) {
                    $title = $profile_picture;
                    $action = "Backend/DBUser.php";
                    $btn_id = "Update";
                    $btn_text = $update;
                    $submit = "update_user_pic";
                }

                if (isset($_GET['update']) && isset($_GET['username'])) {
                    $title = $update_username;
                    $action = "Backend/DBUser.php";
                    $btn_id = "Update";
                    $btn_text = $update;
                    $submit = "update_username";
                }

                if (isset($_GET['update']) && isset($_GET['pass']) && isset($_SESSION['admin'])) {
                    $title = $update_password;
                    $action = "Backend/DBUser.php";
                    $btn_id = "Update";
                    $btn_text = $update;
                    $submit = "update_pass_from_admin";
                } else if (isset($_GET['update']) && isset($_GET['pass'])) {
                    $title = $update_password;
                    $action = "Backend/DBUser.php";
                    $btn_id = "Update";
                    $btn_text = $update;
                    $submit = "update_pass";
                }

                if (isset($_GET['update']) && isset($_GET['email']) && isset($_SESSION['admin'])) {
                    $title = $update_email;
                    $action = "Backend/DBUser.php";
                    $btn_id = "Update";
                    $btn_text = $update;
                    $submit = "update_email";
                } else if (isset($_GET['update']) && isset($_GET['email'])) {
                    $title = $update_email;
                    $action = "Backend/DBVerifyEmail.php";
                    $btn_id = "Update";
                    $btn_text = $update;
                    $submit = "update_email";
                }

                if (isset($_GET['update']) && isset($_GET['tel'])) {
                    $title = $update_tel;
                    $action = "Backend/DBUser.php";
                    $btn_id = "Update";
                    $btn_text = $update;
                    $submit = "update_tel";
                }

                if (isset($_GET['update']) && isset($_GET['role']) && isset($_SESSION['admin'])) {
                    $title = $update_role;
                    $action = "Backend/DBUser.php";
                    $btn_id = "Update";
                    $btn_text = $update;
                    $submit = "update_role_from_admin";
                } else if (isset($_GET['update']) && isset($_GET['role'])) {
                    $title = $update_role;
                    $action = "VerifyPass.php";
                    $btn_id = "Update";
                    $btn_text = $update;
                    $submit = "update_role";
                }

                if (isset($_GET['delete']) && isset($_GET['user'])) {
                    $title = $delete_account;
                    $action = "VerifyPass.php";
                    $btn_id = "Delete";
                    $btn_text = $delete;
                    $submit = "delete_user";
                    $_SESSION['user_id'] = $_GET['user'];
                }
                ?>

                <div class="section-group">

                    <form class="form" action="<?= $action ?>" method="post" enctype="multipart/form-data" autocomplete="off">

                        <div class="form-head">
                            <h1><?= $title ?></h1>
                        </div>

                        <?php if (isset($_GET['update']) && isset($_GET['pic'])) { ?>
                            <?php include 'components/input/user/pic.php'; ?>
                            <script>
                                document.getElementById("Pic").addEventListener("change", CheckUpdatePicture)
                            </script>
                        <?php } ?>

                        <?php if (isset($_GET['update']) && isset($_GET['username'])) { ?>
                            <?php include 'components/input/user/username.php'; ?>
                            <script>
                                document.getElementById("Username").addEventListener("keyup", CheckUpdateUser)
                            </script>
                        <?php } ?>

                        <?php if (isset($_GET['update']) && isset($_GET['pass']) && isset($_SESSION['admin'])) { ?>
                            <?php include 'components/input/user/pass.php'; ?>
                            <script>
                                document.getElementById("Pass").addEventListener("keyup", CheckUpdatePassFromAdmin)
                            </script>
                        <?php } else if (isset($_GET['update']) && isset($_GET['pass'])) { ?>
                            <?php include 'components/input/user/pass.php'; ?>
                            <?php include 'components/input/user/new_pass.php'; ?>
                            <?php include 'components/input/user/confirm_pass.php'; ?>
                            <script>
                                document.getElementById("Pass").addEventListener("keyup", CheckUpdatePass)
                                document.getElementById("NewPass").addEventListener("keyup", CheckUpdatePass)
                                document.getElementById("ConfirmPass").addEventListener("keyup", CheckUpdatePass)
                            </script>
                        <?php } ?>

                        <?php if (isset($_GET['update']) && isset($_GET['tel'])) { ?>
                            <?php include 'components/input/user/tel.php'; ?>
                            <script>
                                document.getElementById("Tel").addEventListener("keyup", CheckUpdateTel)
                            </script>
                        <?php } ?>

                        <?php if (isset($_GET['update']) && isset($_GET['role'])) { ?>
                            <?php include 'components/input/user/role.php'; ?>
                            <script>
                                document.getElementById("Role").addEventListener("change", CheckUpdateRole)
                            </script>
                        <?php } ?>

                        <?php if (isset($_GET['update']) && isset($_GET['email'])) { ?>
                            <?php include 'components/input/user/email.php'; ?>
                            <script>
                                document.getElementById("Email").addEventListener("keyup", CheckUpdateEmail)
                            </script>
                        <?php } ?>

                        <?php if (isset($_GET['insert']) && isset($_GET['user'])) { ?>
                            <?php include 'components/input/user/username.php'; ?>
                            <?php include 'components/input/user/pass.php'; ?>
                            <?php include 'components/input/user/email.php'; ?>
                            <?php include 'components/input/user/tel.php'; ?>
                            <?php include 'components/input/user/role.php'; ?>
                            <script>
                                document.getElementById("Username").addEventListener("keyup", CheckInsertUser)
                                document.getElementById("Pass").addEventListener("keyup", CheckInsertUser)
                                document.getElementById("Email").addEventListener("keyup", CheckInsertUser)
                                document.getElementById("Tel").addEventListener("keyup", CheckInsertUser)
                                document.getElementById("Role").addEventListener("change", CheckInsertUser)
                            </script>
                        <?php } ?>

                        <?php if (isset($_GET['delete']) && isset($_GET['user'])) { ?>
                            <script>
                                window.onload = function() {
                                    document.getElementById("Delete").disabled = false
                                    document.getElementById("Delete").classList = "btn-pr";
                                }
                            </script>
                        <?php } ?>

                        <div class="form-group">
                            <button id="<?= $btn_id ?>" name="<?= $submit ?>" class="btn-se" type="submit" disabled><?= $btn_text ?></button>
                            <div class="btn-te" onclick="history.back()"><?= $cancel ?></div>
                        </div>

                    </form>
                </div>

                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

    </div>

</body>

</html>