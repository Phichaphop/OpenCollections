<?php
    if (isset($_GET['insert'])) {
        $name_text = "";
    } else if (isset($_GET['update']) && isset($_GET['ins'])) {
        $name_text = $data['ins'];
        echo "<script>" . " var DataIns = '" . $name_text . "'" . "</script>";
    } else if (isset($_GET['update']) && isset($_GET['faculty'])) {
        $name_text = $data ['faculty'];
        echo "<script>" . " var DataFaculty = '" . $name_text . "'" . "</script>";
    } else if (isset($_GET['update']) && isset($_GET['dept'])) {
        $name_text = $data['dept'];
        echo "<script>" . " var DataDept = '" . $name_text . "'" . "</script>";
    } else if (isset($_GET['update']) && isset($_GET['major'])) {
        $name_text = $data['major'];
        echo "<script>" . " var DataDept = '" . $name_text . "'" . "</script>";
    } else if (isset($_GET['update']) && isset($_GET['project_type'])) {
        $name_text = $data['type'];
        echo "<script>" . " var DataProjectType = '" . $name_text . "'" . "</script>";
    } else {
        $name_text = "";
    }
?>

<div class="form-group">
    <div class="form-input">
        <input id="Name" name="name" class="input" type="text" minlength="1" maxlength="50" value="<?= $name_text ?>" required="required" onkeyup="CheckName()">
        <span class="label"><?= $name ?></span>
        <p id="MsgName" class="validation-message"></p>
    </div>
</div>