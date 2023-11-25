<?php
    if (isset($_GET['insert'])) {
        $value = "";
    } else if (isset($_GET['update'])) {
        $value = $user['email'];
        echo "<script>" . " var DataEmail = '" . $value . "'" . "</script>";
    } else {
        $value = "";
    }
?>

<div class="form-group">
    <div class="form-input">
        <input id="Email" name="email" class="input" type="email" minlength="1" maxlength="100" required="required" value="<?= $value ?>" onkeyup="CheckEmail()">
        <span id="LabelEmail" class="label"><?= $email ?></span>
        <p id="MsgEmail" class="validation-message"></p>
    </div>
</div>