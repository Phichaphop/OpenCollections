<?php if (isset($_SESSION['success'])) { ?>
    <div id="Alert" class="alert-success">
        <div class="alert-icon">
            <span class="material-symbols-outlined alert-logo">done</span>
        </div>
        <div class="alert-title">
            <h4>Success</h4>
            <p>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </p>
        </div>
        <span id="Close" class="material-symbols-outlined" onclick="CloseAlert()">close</span>
        <div id="Progress" class="progress-success active"></div>
    </div>

    <script>
        var AutoTimer = 5000;
        setTimeout(AutoCloseAlert, AutoTimer);
    </script>

<?php } ?>
<?php if (isset($_SESSION['warning'])) { ?>
    <div id="Alert" class="alert-warning">
        <div class="alert-icon">
            <span class="material-symbols-outlined alert-logo">done</span>
        </div>
        <div class="alert-title">
            <h4>Warning</h4>
            <p>
                <?php
                echo $_SESSION['warning'];
                unset($_SESSION['warning']);
                ?>
            </p>
        </div>
        <span id="Close" class="material-symbols-outlined" onclick="CloseAlert()">close</span>
        <div id="Progress" class="progress-warning active"></div>
    </div>

    <script>
        var AutoTimer = 5000;
        setTimeout(AutoCloseAlert, AutoTimer);
    </script>

<?php } ?>
<?php if (isset($_SESSION['error'])) { ?>
    <div id="Alert" class="alert-error">
        <div class="alert-icon">
            <span class="material-symbols-outlined alert-logo">done</span>
        </div>
        <div class="alert-title">
            <h4>Error</h4>
            <p>
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </p>
        </div>
        <span id="Close" class="material-symbols-outlined" onclick="CloseAlert()">close</span>
        <div id="Progress" class="progress-error active"></div>
    </div>

    <script>
        var AutoTimer = 5000;
        setTimeout(AutoCloseAlert, AutoTimer);
    </script>

<?php } ?>