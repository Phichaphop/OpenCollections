<?php
if (isset($_GET['insert'])) {
    $value = "";
} else if (isset($_GET['update']) && isset($_GET['project'])) {
    $value = $data['abstract'];
    echo "<script>" . " var DataAbstract = '" . $value . "'" . "</script>";
} else {
    $value = "";
}
?>

<div class="form-group">
    <div class="form-input">
        <textarea id="Abstract" name="abstract" class="input longtext" rows="20%" maxlength="10000" required="required" onkeyup="CheckInputAbstract()"><?= $value ?></textarea>
        <span class="label"><?= $abstract ?></span>
        <p id="MsgAbstract" class="validation-message"></p>
    </div>
</div>