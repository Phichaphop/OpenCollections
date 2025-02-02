<?php
if (isset($_GET['insert'])) {
    $name_text = "";
} else if (isset($_GET['update']) && isset($_GET['ins'])) {
    $name_text = $data['ins'];
    echo "<script>" . " var DataIns = '" . $name_text . "'" . "</script>";
} else if (isset($_GET['update']) && isset($_GET['faculty'])) {
    $name_text = $data['faculty'];
    echo "<script>" . " var DataFaculty = '" . $name_text . "'" . "</script>";
} else if (isset($_GET['update']) && isset($_GET['dept'])) {
    $name_text = $data['dept'];
    echo "<script>" . " var DataDept = '" . $name_text . "'" . "</script>";
} else if (isset($_GET['update']) && isset($_GET['major'])) {
    $name_text = $data['major'];
    echo "<script>" . " var DataMajor = '" . $name_text . "'" . "</script>";
} else if (isset($_GET['update']) && isset($_GET['project_type'])) {
    $name_text = $data['type'];
    echo "<script>" . " var DataProjectType = '" . $name_text . "'" . "</script>";
} else {
    $name_text = "";
}
?>

<div class="form-group">
    <div class="form-set">
        <input id="Name" name="name" class="input" type="text" minlength="1" maxlength="100" value="<?= $name_text ?>" required="required" onkeyup="CheckName()">
        <span class="label"><?= $name ?></span>
        <div id="MsgBoxName" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconName" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgName" class="validation-message"></p>
        </div>
    </div>
</div>