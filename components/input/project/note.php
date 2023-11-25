<?php
if (isset($_GET['insert'])) {
    $value = "";
} else if (isset($_GET['update']) && isset($_GET['project'])) {
    $value = $data['note'];
    echo "<script>" . " var DataNote = '" . $value . "'" . "</script>";
} else {
    $value = "";
}
?>

<div class="form-group">
    <div class="form-input">
        <input id="Note" name="Note" class="input" type="text" minlength="1" maxlength="100" value="<?= $value ?>" required="required" onkeyup="CheckInputNote()">
        <span class="label"><?= $note ?></span>
        <p id="MsgNote" class="validation-message"></p>
    </div>
</div>