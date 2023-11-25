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
    <div class="form-input">
        <input id="Detail" name="detail" class="input" type="text" minlength="1" maxlength="200" value="<?= $value ?>" required="required" onkeyup="CheckDetail()">
        <span class="label"><?= $detail ?></span>
        <p id="MsgDetail" class="validation-message"></p>
    </div>
</div>