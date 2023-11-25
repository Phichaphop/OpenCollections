<?php
    if (isset($_GET['insert'])) {
        $name = "";
    } else if (isset($_GET['update']) && isset($_GET['ins'])) {
        $name = $_GET['ins'];
        echo "<script>" . " var DataIns = '" . $name . "'" . "</script>";
    } else if (isset($_GET['update']) && isset($_GET['faculty'])) {
        $name = $_GET['faculty'];
        echo "<script>" . " var DataFaculty = '" . $name . "'" . "</script>";
    } else if (isset($_GET['update']) && isset($_GET['dept'])) {
        $name = $_GET['dept'];
        echo "<script>" . " var DataDept = '" . $name . "'" . "</script>";
    } else if (isset($_GET['update']) && isset($_GET['major'])) {
        $name = $_GET['major'];
        echo "<script>" . " var DataDept = '" . $name . "'" . "</script>";
    } else if (isset($_GET['update']) && isset($_GET['project_type'])) {
        $name = $data['type'];
        echo "<script>" . " var DataProjectType = '" . $name . "'" . "</script>";
    } else {
        $name = "";
    }
?>

<div class="form-group">
    <div class="form-input">
        <input id="Name" name="name" class="input" type="text" minlength="1" maxlength="50" value="<?= $name ?>" required="required" onkeyup="CheckName()">
        <span class="label">Name</span>
        <p id="MsgName" class="validation-message"></p>
    </div>
</div>