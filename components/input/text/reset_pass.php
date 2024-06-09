<div class="form-group">
    <div class="form-set">
        <input id="NewPass" name="pass" class="input" type="password" minlength="1" maxlength="11" required="required" onkeyup="CheckResetPass()">
        <span class="label"><?= $new_password ?></span>
        <span id="VisibilityNewPass" class="material-symbols-outlined eye" onclick="VisibilityNewPassChange()">visibility_off</span>
        <div id="MsgBoxNewPass" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconNewPass" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgNewPass" class="validation-message"></p>
        </div>
    </div>
</div>