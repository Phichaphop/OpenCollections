<?php
if (isset($_GET['insert'])) {
    $value = "";
} else if (isset($_GET['update']) && isset($_GET['ins'])) {
    $value = $data['pic'];
    $path = "ins_logo";
    echo "<script>" . " var DataPic = '" . $value . "'" . "</script>";
} else {
    $value = "";
}
?>

<div class="form-group">
    <?php if ($value != "") { ?>
        <img id="PreviewPic" src="./Backend/Picture/<?= $path ?>/<?= $value ?>">
    <?php } else { ?>
        <img id="PreviewPic">
    <?php } ?>
</div>

<div class="form-group">
    <div class="form-input">
        <input id="Pic" name="pic" class="input" type="file" minlength="1" required="required" onchange="PreviewPicture(); CheckInputPic();">
        <p id="MsgPic" class="validation-message"></p>
    </div>
</div>

