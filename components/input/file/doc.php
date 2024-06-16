<div class="form-group">
    <div class="form-set">
        <input id="File" name="file" class="input" type="file" minlength="1" required="required" onchange="CheckInputFile()">
        <span class="label-fix"><?= $file ?></span>
        <div id="MsgBoxFile" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconFile" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgFile" class="validation-message"></p>
        </div>
    </div>
</div>