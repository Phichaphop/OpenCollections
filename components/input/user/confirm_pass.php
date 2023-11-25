<div class="form-group">
    <div class="form-input">
        <input id="ConfirmPass" name="confirm_pass" class="input" type="password" minlength="1" maxlength="12" required="required" onkeyup="CheckConfirmPass()">
        <span class="label">Confirm Password</span>
        <span id="VisibilityConfirmPass" class="material-symbols-outlined eye" onclick="VisibilityConfirmPassChange()">visibility_off</span>
        <p id="MsgConfirmPass" class="validation-message"></p>
    </div>
</div>