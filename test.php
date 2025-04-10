<?php require_once 'backend/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include "components/layout/head.php" ?>

<body onload="set(), GenerateQRcode()">

    <?php require_once 'components/loading/loading.php'; ?>

    <div class="container">

        <?php include "components/layout/aside.php" ?>

        <?php require_once 'components/layout/header.php'; ?>

        <section>

            <div class="section-group">

                <?php require_once 'components/layout/alert.php'; ?>

                <!-- Content here -->

                <h class="home-title" style="margin: auto;">เลือกบริการ</h>

                <div class="app-box">

                    <div class="app-box-group" onclick="window.location='index.php'">
                        <div class="app-box-content">
                            <div class="icon on-off">
                                <img src="resource/img/logo/logo.png">
                            </div>
                        </div>
                        <div class="app-box-content">
                            <div class="app-box-title">
                                <h4>Opec Collections</h4>
                                <p class="app-box-sub-title">ระบบบริหารจัดการฐานข้อมูลโครงงานออนไลน์</p>
                            </div>
                        </div>
                    </div>

                    <div class="app-box-group" onclick="window.location='index.php'">
                        <div class="app-box-content">
                            <div class="icon on-off">
                                <img src="resource/img/logo/logo.png">
                            </div>
                        </div>
                        <div class="app-box-content">
                            <div class="app-box-title">
                                <h4>FIX IT CENTER</h4>
                                <p class="app-box-sub-title">ระบบนัดหมายบริการซ่อมรถออนไลน์</p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- End Content here -->

            </div>

        </section>

        <?php require_once 'components/layout/nav.php'; ?>

        <?php require_once 'components/layout/footer.php'; ?>

    </div>

</body>

</html>