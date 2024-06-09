<?php
if (isset($_GET['insert'])) {
    $value = "";
} else if (isset($_GET['update']) && isset($_GET['project'])) {
    $value = $data['title'];
    echo "<script>" . " var DataTitle = '" . $value . "'" . "</script>";
} else if (isset($_GET['update']) && isset($_GET['request'])) {
    $value = $data['title'];
    echo "<script>" . " var DataTitle = '" . $value . "'" . "</script>";
} else if (isset($_GET['update']) && isset($_GET['manual'])) {
    $value = $data['title'];
    echo "<script>" . " var DataTitle = '" . $value . "'" . "</script>";
} else {
    $value = "";
}
?>

<div class="form-group">
    <div class="form-set">
        <input id="Title" name="title" class="input" type="text" minlength="1" maxlength="50" value="<?= $value ?>" required="required" onkeyup="CheckInputTitle()">
        <span class="label"><?= $title ?></span>
        <div id="MsgBoxTitle" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconTitle" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgTitle" class="validation-message"></p>
        </div>
    </div>
</div>