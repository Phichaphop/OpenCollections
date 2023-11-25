<?php
    if (isset($_GET['insert'])) {
        $value = "";
    } else if (isset($_GET['update']) && isset($_GET['project'])) {
        $value = $data['date'];
        echo "<script>" . " var DataDate = '" . $value . "'" . "</script>";
    } else {
        $value = "";
    }
?>

<div class="form-group">
    <div class="form-input">
        <input id="Date" name="date" class="input" type="date" minlength="1" maxlength="100" value="<?= $value ?>" required="required" onkeyup="CheckInputDate()">
        <span class="label-fix"><?= $release_date ?></span>
        <p id="MsgDate" class="validation-message"></p>
    </div>
</div>