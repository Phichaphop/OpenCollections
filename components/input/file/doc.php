<div class="form-group">
    <div class="form-input">
        <input id="File" name="file" class="input" type="file" minlength="1" required="required" onkeyup="CheckInputFile()">
        <span class="label-fix"><?= $file ?></span>
        <p id="MsgFile" class="validation-message"></p>
    </div>
</div>