<div class="form-group">
    <div class="form-input">
        <input id="NewPass" name="pass" class="input" type="password" minlength="1" maxlength="11" required="required" onkeyup="CheckResetPass()">
        <span class="label">New password</span>
        <span id="VisibilityNewPass" class="material-symbols-outlined eye" onclick="VisibilityNewPassChange()">visibility_off</span>
        <p id="MsgNewPass" class="validation-message"></p>
    </div>
</div>