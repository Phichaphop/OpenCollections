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
    <div class="form-set">
        <textarea id="Abstract" name="abstract" class="input longtext" rows="20%" maxlength="10000" required="required" onkeyup="CheckInputAbstract()"><?= $value ?></textarea>
        <span class="label"><?= $abstract ?></span> 
        <div id="MsgBoxAbstract" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconAbstract" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgAbstract" class="validation-message"></p>
        </div>
    </div>
</div>