<?php
    if (isset($_GET['insert'])) {
        $value = "";
    }else if (isset($_GET['update'])) {
        $value = $user['username'];
        echo "<script>" . " var DataUsername = '" . $value . "'" . "</script>";
    } else {
        $value = "";
    }
?>

<div class="form-group">
    <div class="form-set">
        <input id="Username" name="username" class="input" type="text" minlength="1" maxlength="50" required="required" value="<?= $value ?>" onkeyup="CheckUsername()">
        <span class="label"><?= $username ?></span>
        <div id="MsgBoxUsername" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconUsername" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgUsername" class="validation-message"></p>
        </div>
    </div>
</div>