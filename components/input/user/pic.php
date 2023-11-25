<?php
if (isset($_GET['insert'])) {
    $data = "";
} else if (isset($_GET['update']) && isset($_GET['user'])) {
    $data = $user['pic'];
} else {
    $data = "";
}
?>

<div class="form-group">
    <?php if ($data != "") {?>
        <img id="PreviewPic" src="./Backend/Picture/profile/<?= $data ?> ">
    <?php } else { ?>
        <img id="PreviewPic">
    <?php } ?>
</div>

<div class="form-group">
    <div class="form-input">
        <input id="Pic" name="pic" class="input" type="file" minlength="1" required="required" onchange="PreviewPicture()">
        <p id="MsgPic" class="validation-message"></p>
    </div>
</div>