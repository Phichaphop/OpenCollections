<?php
    if (isset($_GET['insert'])) {
        $degree_text = "";
    } else if (isset($_GET['update']) && isset($_GET['major'])) {
        $degree_text = $data['degree'];
        echo "<script>" . " var DataDegree = '" . $degree_text . "'" . "</script>";
    } else {
        $degree_text = "";
    }
?>

<div class="form-group">
    <div class="form-input">
        <input id="Degree" name="degree" class="input" type="text" minlength="1" maxlength="50" value="<?= $degree_text ?>" required="required" onkeyup="CheckInputDegree()">
        <span class="label"><?= $degree ?></span>
        <p id="MsgDegree" class="validation-message"></p>
    </div>
</div>