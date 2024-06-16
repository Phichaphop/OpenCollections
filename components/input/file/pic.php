<?php
if (isset($_GET['insert'])) {
    $value = "";
} else if (isset($_GET['update']) && isset($_GET['user'])) {
    $value = $user['pic'];
    $path = "resource/img/profile/";
} else if (isset($_GET['update']) && isset($_GET['ins'])) {
    $value = $data['pic'];
    $path = "resource/img/ins_logo/";
} else if (isset($_GET['update']) && isset($_GET['project'])) {
    $value = $data['pic'];
    $path = "resource/img/project/";
} else {
    $value = "";
}
?>

<div class="form-group">
    <?php if (!$value) { ?>
        <img id="PreviewPic">
    <?php } else { ?>
        <img id="PreviewPic" src="<?= $path ?><?= $value ?>">
    <?php } ?>
</div>

<div class="form-group">
    <div class="form-set">
        <input id="Pic" name="pic" class="input" type="file" minlength="1" required="required" onchange="PreviewPicture(); CheckInputPic();">
        <span class="label-fix"><?= $pic ?></span>
        <div id="MsgBoxPic" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconPic" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgPic" class="validation-message"></p>
        </div>

    </div>
</div>