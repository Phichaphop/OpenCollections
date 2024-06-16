<?php
if (isset($_GET['insert'])) {
    $value = "";
} else if (isset($_GET['update']) && isset($_GET['project'])) {
    $value = $data['note'];
    echo "<script>" . " var DataNote = '" . $value . "'" . "</script>";
} else {
    $value = "";
}
?>

<div class="form-group">
    <div class="form-set">
        <textarea id="Note" name="Note" class="input longtext" rows="10%" maxlength="10000" required="required" onkeyup="CheckInputNote()"><?= $value ?></textarea>
        <span class="label"><?= $note ?></span>
        <div id="MsgBoxNote" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconNote" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgNote" class="validation-message"></p>
        </div>
    </div>
</div>