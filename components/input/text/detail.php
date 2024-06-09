<?php
if (isset($_GET['insert'])) {
    $value = "";
} else if (isset($_GET['update']) && isset($_GET['request'])) {
    $value = $data['detail'];
    echo "<script>" . " var DataDetail = '" . $value . "'" . "</script>";
} else {
    $value = "";
}
?>

<div class="form-group">
    <div class="form-set">
        <input id="Detail" name="detail" class="input" type="text" minlength="1" maxlength="200" value="<?= $value ?>" required="required" onkeyup="CheckDetail()">
        <span class="label"><?= $detail ?></span>
        <div id="MsgBoxDetail" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconDetail" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgDetail" class="validation-message"></p>
        </div>
    </div>
</div>