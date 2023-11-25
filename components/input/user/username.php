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
    <div class="form-input">
        <input id="Username" name="username" class="input" type="text" minlength="1" maxlength="50" value="<?= $value ?>" required="required" onkeyup="CheckUsername()">
        <span class="label"><?= $username ?></span>
        <p id="MsgUsername" class="validation-message"></p>
    </div>
</div>