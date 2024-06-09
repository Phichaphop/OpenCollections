<div class="form-group">
    <div class="form-set">
        <input id="ConfirmPass" name="confirm_pass" class="input" type="password" minlength="1" maxlength="12" required="required" onkeyup="CheckConfirmPass()">
        <span class="label"><?= $confirm_password ?></span>
        <span id="VisibilityConfirmPass" class="material-symbols-outlined eye" onclick="VisibilityConfirmPassChange()">visibility_off</span>
        <div id="MsgBoxConfirmPass" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconConfirmPass" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgConfirmPass" class="validation-message"></p>
        </div>
    </div>
</div>