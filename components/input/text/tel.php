<?php
    if (isset($_GET['insert'])) {
        $value = "";
    } else if (isset($_GET['update'])) {
        $value = $user['tel'];
        echo "<script>" . " var DataTel = '" . $value . "'" . "</script>";
    } else {
        $value = "";
    }
?>

<div class="form-group">
    <div class="form-set">
        <input id="Tel" name="tel" class="input" type="text" minlength="1" maxlength="10" required="required" value="<?= $value ?>" onkeyup="CheckTel()">
        <span class="label"><?= $tel ?></span>
        <div id="MsgBoxTel" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconTel" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgTel" class="validation-message"></p>
        </div>
    </div>
</div>