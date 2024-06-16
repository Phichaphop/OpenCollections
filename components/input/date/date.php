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
    <div class="form-set">
        <input id="Date" name="date" class="input" type="date" minlength="1" maxlength="100" value="<?= $value ?>" required="required" onchange="CheckInputDate()">
        <span class="label-fix"><?= $release_date ?></span>
        <div id="MsgBoxDate" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconDate" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgDate" class="validation-message"></p>
        </div>
    </div>
</div>